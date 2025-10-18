<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Relatedlink\StoreRalatedlinkRequest;
use App\Http\Requests\Admin\Relatedlink\UpdateRelatedlinkRequest;
use App\Models\Relatedlink;

class RelatedlinkController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function list() {
        $relatedlinks = Relatedlink::get();
        return view('admin.related.list', compact('relatedlinks'));
    }

    public function create() {
        return view('admin.related.create');
    }

    public function store(StoreRalatedlinkRequest $request) {
        if($request->image != null) {
            $imageName = rand(1,1000).'-'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/related'), $imageName);
        }
        Relatedlink::create([
            'external_link' => $request->external_link,
            'image' => $imageName
        ]);

        return redirect()->route('admin.related.link.list')->with('storeRelatedLink', 'لینک مورد نظر افزوده گردید');
    }

    public function edit(Relatedlink $relatedlink) {
        return view('admin.related.edit', compact('relatedlink'));
    }

    public function update(Relatedlink $relatedlink, UpdateRelatedlinkRequest $request) {
        if($request->image != null) {
            $imageName = rand(1,1000).'-'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/related'), $imageName);
        } else {
            $imageName = $link->image;
        }
        $relatedlink->update([
            'external_link' => $request->external_link,
            'image' => $imageName
        ]);

        return redirect()->route('admin.related.link.list')->with('updateRelatedLink', 'لینک مورد نظر بروزرسانی گردید');
    }

    public function delete(Relatedlink $relatedlink) {
        $relatedlink->delete();
        return back()->with('deleteRelatedLink', 'لینک مورد نظر حذف گردید');
    }
}
