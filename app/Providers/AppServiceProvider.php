<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use App\Models\Category;
use App\Models\News;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['front.partials.header', 'front.partials.footer'], function($view)
        {
            $view->with('setting', Setting::where('type',1)->first());
            $view->with('categories', Category::take(5)->get());
            $view->with('latestNews', News::orderBy('id','desc')->select('id','title')->take(5)->get());
        });

        View::composer(['front.index'], function($view)
        {
            $view->with('setting', Setting::where('type',1)->first());
        });
    }
}
