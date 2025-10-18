<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function list() {
        $galleries = Gallery::get();
        return view('admin.gallery.list', compact('galleries'));
    }

    public function create() {
        return view('admin.gallery.create');
    }

    public function store(Request $request) {
      $request->validate(['type' => 'required']);
      if($request->type == 1) {
        $request->validate([
          'title' => 'required|string',
          'image' => 'required|mimes:jpeg,png,jpg,gif,sv'
        ]);
        $imageName = rand(1,1000).'-'.time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/gallery'), $imageName);
        Gallery::create([
          'title' => $request->title,
          'image' => $imageName,
          'type' => $request->type
        ]);
      } elseif($request->type == 2) {
        $request->validate(['link' => 'required|string']);
        Gallery::create([
          'link' => $request->link,
          'type' => $request->type
        ]);
      }

      return redirect()->route('admin.gallery.list')->with('storeGallery', 'با موفقیت ثبت گردید');
    }

    public function edit(Gallery $gallery) {
      return view('admin.gallery.edit', compact('gallery'));
    }

    public function update(Gallery $gallery, Request $request) {
      if($gallery->type == 1) {
        $request->validate([
          'title' => 'required|string',
          'image' => 'nullable|mimes:jpeg,png,jpg,gif,sv'
        ]);
        if($request->image != null) {
          $imageName = rand(1,1000).'-'.time().'.'.$request->image->extension();
          $request->image->move(public_path('uploads/gallery'), $imageName);
        } else {
          $imageName = $gallery->image;
        }
        $gallery->update([
          'title' => $request->title,
          'image' => $imageName
        ]);
      } elseif($gallery->type == 2) {
        $gallery->update([
          'link' => $request->link
        ]);
      }
      return redirect()->route('admin.gallery.list')->with('updateGallery', 'بروزرسانی با موفقیت انجام شد');
    }

    public function delete(Gallery $gallery) {
      $gallery->delete();
      return back()->with('deleteGallery', 'آیتم مورد نظر حذف گردید');
    }
}
