<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Introduction\StoreIntroductionRequest;
use App\Http\Requests\Admin\Introduction\UpdateIntroductionRequest;
use App\Models\Introduction;

class IntroductionController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function list() {
        $introductions = Introduction::get();
        return view('admin.introduction.list', compact('introductions'));
    }

    public function create() {
      return view('admin.introduction.create');
    }

    public function edit(Introduction $introduction) {
      return view('admin.introduction.edit', compact('introduction'));
    }

    public function store(StoreIntroductionRequest $request) {
      if($request->image != null) {
        $imageName = rand(1,1000).'-'.time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/introductions'), $imageName);
      }
      Introduction::create(array_merge($request->all(),['image' => $imageName]));

      return redirect()->route('admin.introduction.list')->with('storeIntroduction', 'آیتم مورد نظر افزوده گردید');
    }

    public function update(Introduction $introduction, UpdateIntroductionRequest $request) {
      if($request->image != null) {
        $imageName = rand(1,1000).'-'.time().'.'.$request->image->extension();
        $request->image->move(public_path('uploads/introductions'), $imageName);
      } else {
        $imageName = $introduction->image;
      }
      $introduction->update(array_merge($request->all(),['image' => $imageName]));

      return redirect()->route('admin.introduction.list')->with('updateIntroduction', 'آیتم مورد نظر بروزرسانی گردید');
    }

    public function delete(Introduction $introduction) {
      $introduction->delete();
      return back()->with('deleteIntroduction', 'آیتم مورد نظر حذف گردید');
    }
}
