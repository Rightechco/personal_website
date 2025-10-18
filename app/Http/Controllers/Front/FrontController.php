<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Slider;
use App\Models\Provincialnews;
use App\Models\Lorestannews;
use App\Models\Relatedlink;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Introduction;
use App\Models\Setting;

class FrontController extends Controller
{
    public function main() {
        return view('front.main');
    }

    public function index() {
        $links = Link::select('external_link','image')->get();
        $sliders = Slider::select('id','title','description','image')->get();
        $provincialnews = Provincialnews::orderBy('date','desc')->take('10')->get();
        $groupnews = News::take('7')->get();
        $lastnews = News::orderBy('id','desc')->take('10')->get();
        $lorestannews = Lorestannews::orderBy('date','desc')->take('7')->get();
        $relatedlinks = Relatedlink::get();
        $banner = Setting::where('type',2)->first();
        return view('front.index', [
            'links' => $links,
            'sliders' => $sliders,
            'provincialnews' => $provincialnews,
            'groupnews' => $groupnews,
            'lastnews' => $lastnews,
            'lorestannews' => $lorestannews,
            'relatedlinks' => $relatedlinks,
            'banner' => $banner
        ]);
    }

    public function gallery() {
        $imageGalleries = Gallery::type(1)->get();
        $videoGalleries = Gallery::type(2)->get();
        return view('front.gallery', compact('imageGalleries', 'videoGalleries'));
    }

    public function introduction() {
        $introductions = Introduction::get();
        return view('front.introduction', compact('introductions'));
    }

    public function aboutUs() {
        return view('front.about-us');
    }

    public function contactUs() {
        return view('front.contact-us');
    }
}
