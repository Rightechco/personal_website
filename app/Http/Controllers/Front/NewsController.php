<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Provincialnews;
use App\Models\Lorestannews;

class NewsController extends Controller
{
    public function news() {
        $specialNews = News::special()->get();
        $lastNews = News::orderBy('id','desc')->take(4)->get();
        $categories = Category::select('name')->get();
        $provincialNews = Provincialnews::select('title')->take(4)->get();
        $news = News::paginate(6);
        return view('front.news', compact('specialNews', 'lastNews', 'categories', 'provincialNews', 'news'));
    }

    public function details($type, $id) {
        if($type == 'news') {
            $detail = News::findOrFail($id);
        } elseif($type == 'slider') {
            $detail = Slider::findOrFail($id);
        } elseif($type == 'provincial') {
            $detail = Provincialnews::findOrFail($id);
        } elseif($type == 'lorestan') {
            $detail = Lorestannews::findOrFail($id);
        }
        return view('front.news-details',compact('detail'));
    }   
}
