<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Provincial\UpdateProvincialnewsRequest;
use Goutte\Client;
use App\Models\Provincialnews;

class ProvincialNewsController extends Controller
{
    protected $results = [];
    protected $body = [];
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    public function list() {
        $provincialNews = Provincialnews::orderBy('id','desc')->get();
        return view('admin.provincial.list', compact('provincialNews'));
    }
    
    public function edit(Provincialnews $provincialnews) {
        return view('admin.provincial.edit', compact('provincialnews'));
    }

    public function store(Request $request) {
        $base_url = "https://www.mehrnews.com";
        $client = new Client();
        $url = 'https://www.mehrnews.com/tag/%D8%A8%D8%B1%D9%88%D8%AC%D8%B1%D8%AF';
        $page = $client->request('GET', $url);
        $page->filter('.desc h3 > a')->each(function ($node) {
            $this->results[] = $node->attr('href');
        });
        $links = [];
        foreach($this->results as $link) {
            $links[] = $base_url.'/'.$link;
        }
        /********************************/
        foreach($this->results as $key => $link) {
            $this->body = [];
            $single_page = $client->request('GET', $base_url.'/'.$link);
            $head = $single_page->filter('.item-title > .title > a')->text();
            $summary = $single_page->filter('.item-summary > .summary')->text();
            $summary = $single_page->filter('.item-summary > .summary')->text();
            $single_page->filter('.item-body > .item-text > p')->each(function ($node) {
                $this->body[] = $node->text();
            });
            $image = $single_page->filter('.item-summary > .item-img > img')->attr('src');
            $date = $single_page->filter('.item-date > span')->text();
            $provincialnews = Provincialnews::where('title',$head)->where('summary',$summary)
                              ->where('image',$image)->first();
            if(is_null($provincialnews)) {
                Provincialnews::create([
                    'user_id' => \Auth::user()->id,
                    'title' => $head,
                    'summary' => $summary,
                    'description' => json_encode($this->body),
                    'image' => $image,
                    'date' => $date
                ]);
            }

            if($key == 11)
            break;
        }
        
        return back()->with('storeProvicialnews', 'اخبار بروزرسانی گردید');
    }

    public function update(UpdateProvincialnewsRequest $request, Provincialnews $provincialnews) {
        if($request->image != null) {
            $imageName = rand(1,1000).'-'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/provincials'), $imageName);
            $imageUlr = asset('/uploads/provincials/'.$imageName);
        } else {
            $imageUlr = $provincialnews->image;
        }
        $desc = explode('.', $request->description);
        $provincialnews->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'summary' => $request->summary,
            'image' => $imageUlr
        ]);

        return redirect()->route('admin.provincial.list')->with('updateProvicialnews', 'خبر مورد نظر بروزرسانی گردید');
    }

    public function delete(Provincialnews $provincialnews) {
        $provincialnews->delete();
        return back()->with('deleteProvicialnews', 'خبر مورد نظر حذف گردید');
    }
}
