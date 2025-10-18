<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Slider\StoreSliderRequest;
use App\Http\Requests\Admin\Slider\UpdateSliderRequest;
use App\Models\Slider;

class SliderController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    
    public function list() {
        $sliders = Slider::orderBy('id','desc')->get();
        return view('admin.slider.list', compact('sliders'));
    }

    public function create() {
        return view('admin.slider.create');
    }

    public function store(StoreSliderRequest $request) {
        if($request->image != null) {
            $imageName = rand(1,1000).'-'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/sliders'), $imageName);
        }
        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName
        ]);

        return redirect()->route('admin.slider.list')->with('storeSlider', 'اسلایدر مورد نظر افزوده گردید');
    }

    public function edit(Slider $slider) {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Slider $slider, UpdateSliderRequest $request) {
        if($request->image != null) {
            $imageName = rand(1,1000).'-'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/sliders'), $imageName);
        } else {
            $imageName = $slider->image;
        }
        $slider->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName
        ]);

        return redirect()->route('admin.slider.list')->with('updateSlider', 'اسلایدر مورد نظر بروزرسانی گردید');
    }

    public function delete(Slider $slider) {
        $slider->delete();
        return back()->with('deleteSlider', 'اسلایدر مورد نظر حذف گردید');
    }
}
