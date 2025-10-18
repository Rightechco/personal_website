<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    public function list() {
        $tags = Tag::orderBy('id','desc')->get();
        return view('admin.tag.list', compact('tags'));
    }
    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:500',
        ]);
        Tag::create($request->all());
        return back()->with('storeTag','برچسب مورد نظر افزوده شد');
    }

    public function delete(Tag $tag) {
        $tag->delete();
        return back()->with('deleteTag', 'برچسب مورد نظر حذف گردید');
    }
}
