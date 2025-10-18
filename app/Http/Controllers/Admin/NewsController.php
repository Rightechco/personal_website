<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\News\StoreNewsRequest;
use App\Http\Requests\Admin\News\UpdateNewsRequest;
use App\Models\News;
use App\Models\Category;
use App\Models\Tag;

class NewsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function list() {
        $news = News::orderBy('id','desc')->get();
        return view('admin.news.list', compact('news'));
    }

    public function create() {
        $categories = Category::select('id','name')->get();
        $tags = Tag::select('id','name')->get();
        return view('admin.news.create', compact('categories', 'tags'));
    }

    public function store(StoreNewsRequest $request) {
        if($request->image != null) {
            $imageName = rand(1,1000).'-'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/news'), $imageName);
        }
        $news = News::create([
            'category_id' => $request->category_id,
            'user_id' => \Auth::user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'special' => (isset($request->special) && $request->special == 'on') ? 1 : 0,
            'image' => $imageName
        ]);
        foreach($request->tag as $item) {
            $tag = Tag::find($item);
            $news->tags()->attach($tag);
        }

        return redirect()->route('admin.news.list')->with('storeNews', 'خبر مورد نظر افزوده گردید');
    }

    public function edit(News $news) {
        $categories = Category::select('id','name')->get();
        $tags = Tag::select('id','name')->get();
        return view('admin.news.edit', compact('categories', 'tags', 'news'));
    }

    public function update(UpdateNewsRequest $request, News $news) {
        if($request->image != null) {
            $imageName = rand(1,1000).'-'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/news'), $imageName);
        } else {
            $imageName = $news->image;
        }
        $news->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'special' => (isset($request->special) && $request->special == 'on') ? 1 : $news->special,
            'image' => $imageName
        ]);
        $tags = Tag::whereIn('id', $request->tag)->get();
        $news->tags()->sync($tags);

        return redirect()->route('admin.news.list')->with('updateNews', 'خبر مورد نظر بروزرسانی گردید');
    }

    public function delete(News $news) {
        $news->tags($news->tags)->detach();
        $news->delete();
        return back()->with('deleteNews', 'خبر مورد نظر حذف گردید');
    }
}
