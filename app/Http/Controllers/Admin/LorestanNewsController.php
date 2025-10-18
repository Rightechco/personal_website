<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Lorestan\UpdateLorestannewsRequest;
use Goutte\Client;
use App\Models\Lorestannews;

class LorestanNewsController extends Controller
{
    protected $results = [];
    protected $body = [];
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function list() {
        $lorestannews = Lorestannews::orderBy('id','desc')->get();
        return view('admin.lorestan.list', compact('lorestannews'));
    }

    public function edit(Lorestannews $lorestannews) {
        return view('admin.lorestan.edit', compact('lorestannews'));
    }

    public function store(Request $request) {
        $base_url = "https://www.mehrnews.com";
        $client = new Client();
        $url = 'https://www.mehrnews.com/service/Provinces/Lorestan';
        $page = $client->request('GET', $url);
        $page->filter('.desc h3 > a')->each(function ($node) {
            $this->results[] = $node->attr('href');
        });
        $links = [];
        /*-----------------------------------------------------------*/
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
            $provincialnews = Lorestannews::where('title',$head)->where('summary',$summary)
                              ->where('image',$image)->first();
            if(is_null($provincialnews)) {
                Lorestannews::create([
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
        
        return back()->with('storeLorestannews', 'اخبار بروزرسانی گردید');
    }

    public function update(UpdateLorestannewsRequest $request, Lorestannews $lorestannews) {
        if($request->image != null) {
            $imageName = rand(1,1000).'-'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/lorestan/'), $imageName);
            $imageUlr = asset('/uploads/lorestan/'.$imageName);
        } else {
            $imageUlr = $lorestannews->image;
        }
        $desc = explode('.', $request->description);
        $lorestannews->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'summary' => $request->summary,
            'image' => $imageUlr,
            'description' => json_encode($desc)
        ]);

        return redirect()->route('admin.lorestan.list')->with('updateLorestannews', 'خبر مورد نظر بروزرسانی گردید');
    }

    public function delete(Lorestannews $lorestannews) {
        $lorestannews->delete();
        return back()->with('deleteLorestannews', 'خبر مورد نظر حذف گردید');
    }
}
