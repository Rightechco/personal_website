<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Link\StoreLinkRequest;
use App\Http\Requests\Admin\Link\UpdateLinkRequest;
use App\Models\Link;

class LinkController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function list() {
        $links = Link::orderBy('id','desc')->get();
        return view('admin.link.list', compact('links'));
    }

    public function create() {
        return view('admin.link.create');
    }

    public function store(StoreLinkRequest $request) {
        if($request->image != null) {
            $imageName = rand(1,1000).'-'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/links'), $imageName);
        }
        Link::create([
            'external_link' => $request->external_link,
            'image' => $imageName
        ]);

        return redirect()->route('admin.link.list')->with('storeLink', 'لینک مورد نظر افزوده گردید');
    }
    
    public function edit(Link $link) {
        return view('admin.link.edit', compact('link'));
    }
    
    public function update(Link $link, UpdateLinkRequest $request) {
        if($request->image != null) {
            $imageName = rand(1,1000).'-'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/links'), $imageName);
        } else {
            $imageName = $link->image;
        }
        $link->update([
            'external_link' => $request->external_link,
            'image' => $imageName
        ]);

        return redirect()->route('admin.link.list')->with('updateLink', 'لینک مورد نظر بروزرسانی گردید');
    }

    public function delete(Link $link) {
        $link->delete();
        return back()->with('deleteLink', 'لینک مورد نظر حذف گردید');
    }
}
