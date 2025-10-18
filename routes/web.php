<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'App\Http\Controllers\Front',
    'as' => 'front.'
], function(){
    Route::group([], function() {
        Route::get('/', 'FrontController@main')->name('main');
        Route::get('/index', 'FrontController@index')->name('index');
        Route::get('/gallery', 'FrontController@gallery')->name('gallery');
        Route::get('/introduction', 'FrontController@introduction')->name('introduction');
        Route::get('/about-us', 'FrontController@aboutUs')->name('about.us');
        Route::get('/contact-us', 'FrontController@contactUs')->name('contact.us');
        // news
        Route::get('/news', 'NewsController@news')->name('news');
        Route::get('/details/{type}/{id}', 'NewsController@details')->name('news.details');
    });
});
//*************************************************** admin ***************************************************//
Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin',
    'as' => 'admin.'
], function(){
    /* panel */
    Route::group(['prefix' => 'panel', 'as' => 'panel.'], function() {
        Route::get('/', 'PanelController@index')->name('index')->middleware(['roleChecker:admin,writer']);
        Route::get('/setting', 'PanelController@setting')->name('setting')->middleware(['roleChecker:admin']);
        Route::post('/setting/update/{setting}', 'PanelController@settingUpdate')->name('setting.update')->middleware(['roleChecker:admin']);
        Route::get('/banner', 'PanelController@banner')->name('banner')->middleware(['roleChecker:admin']);
        Route::post('/banner/update/{setting}', 'PanelController@bannerUpdate')->name('banner.update')->middleware(['roleChecker:admin']);
    });
    /* user */
    Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => ['roleChecker:admin']], function() {
        Route::get('/list', 'UserController@list')->name('list');
        Route::get('/create', 'UserController@create')->name('create');
        Route::post('/store', 'UserController@store')->name('store');
        Route::get('/edit/{user}', 'UserController@edit')->name('edit');
        Route::post('/update/{user}', 'UserController@update')->name('update');
        Route::delete('/delete/{user}', 'UserController@delete')->name('delete');
    });
    /* slider */
    Route::group(['prefix' => 'slider', 'as' => 'slider.'], function() {
        Route::get('/list', 'SliderController@list')->name('list');
        Route::get('/create', 'SliderController@create')->name('create');
        Route::post('/store', 'SliderController@store')->name('store');
        Route::get('/edit/{slider}', 'SliderController@edit')->name('edit');
        Route::post('/update/{slider}', 'SliderController@update')->name('update');
        Route::delete('/delete/{slider}', 'SliderController@delete')->name('delete');
    });
    /* link */
    Route::group(['prefix' => 'link', 'as' => 'link.'], function() {
        Route::get('/list', 'LinkController@list')->name('list');
        Route::get('/create', 'LinkController@create')->name('create');
        Route::post('/store', 'LinkController@store')->name('store');
        Route::get('/edit/{link}', 'LinkController@edit')->name('edit');
        Route::post('/update/{link}', 'LinkController@update')->name('update');
        Route::delete('/delete/{link}', 'LinkController@delete')->name('delete');
    });
    /* tag */
    Route::group(['prefix' => 'tag', 'as' => 'tag.'], function() {
        Route::get('/list', 'TagController@list')->name('list');
        Route::post('/store', 'TagController@store')->name('store');
        Route::delete('/delete/{tag}', 'TagController@delete')->name('delete');
    });
    /* category */
    Route::group(['prefix' => 'category', 'as' => 'category.'], function() {
        Route::get('/list', 'CategoryController@list')->name('list');
        Route::post('/store', 'CategoryController@store')->name('store');
        Route::post('/update/{category}', 'CategoryController@update')->name('update');
        Route::delete('/delete/{category}', 'CategoryController@delete')->name('delete');
    });
    /* news */
    Route::group(['prefix' => 'news', 'as' => 'news.'], function() {
        Route::get('/list', 'NewsController@list')->name('list');
        Route::get('/create', 'NewsController@create')->name('create');
        Route::post('/store', 'NewsController@store')->name('store');
        Route::get('/edit/{news}', 'NewsController@edit')->name('edit');
        Route::post('/update/{news}', 'NewsController@update')->name('update');
        Route::delete('/delete/{news}', 'NewsController@delete')->name('delete');
    });
    /* provincial_news */
    Route::group(['prefix' => 'provincial', 'as' => 'provincial.'], function() {
        Route::get('/list', 'ProvincialNewsController@list')->name('list');
        Route::get('/edit/{provincialnews}', 'ProvincialNewsController@edit')->name('edit');
        Route::post('/store', 'ProvincialNewsController@store')->name('store');
        Route::post('/update/{provincialnews}', 'ProvincialNewsController@update')->name('update');
        Route::delete('/delete/{provincialnews}', 'ProvincialNewsController@delete')->name('delete');
    });
    /* lorestan news */
    Route::group(['prefix' => 'lorestan', 'as' => 'lorestan.'], function() {
        Route::get('/list', 'LorestanNewsController@list')->name('list');
        Route::get('/edit/{lorestannews}', 'LorestanNewsController@edit')->name('edit');
        Route::post('/store', 'LorestanNewsController@store')->name('store');
        Route::post('/update/{lorestannews}', 'LorestanNewsController@update')->name('update');
        Route::delete('/delete/{lorestannews}', 'LorestanNewsController@delete')->name('delete');
    });
    /* related links */
    Route::group(['prefix' => 'related', 'as' => 'related.link.'], function() {
        Route::get('/list', 'RelatedlinkController@list')->name('list');
        Route::get('/create', 'RelatedlinkController@create')->name('create');
        Route::post('/store', 'RelatedlinkController@store')->name('store');
        Route::get('/edit/{relatedlink}', 'RelatedlinkController@edit')->name('edit');
        Route::post('/update/{relatedlink}', 'RelatedlinkController@update')->name('update');
        Route::delete('/delete/{relatedlink}', 'RelatedlinkController@delete')->name('delete');
    });
    /* gallery */
    Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function() {
        Route::get('/list', 'GalleryController@list')->name('list');
        Route::get('/create', 'GalleryController@create')->name('create');
        Route::post('/store', 'GalleryController@store')->name('store');
        Route::get('/edit/{gallery}', 'GalleryController@edit')->name('edit');
        Route::post('/update/{gallery}', 'GalleryController@update')->name('update');
        Route::delete('/delete/{gallery}', 'GalleryController@delete')->name('delete');
    });
    /* introduction */
    Route::group(['prefix' => 'introduction', 'as' => 'introduction.'], function() {
        Route::get('/list', 'IntroductionController@list')->name('list');
        Route::get('/create', 'IntroductionController@create')->name('create');
        Route::post('/store', 'IntroductionController@store')->name('store');
        Route::get('/edit/{introduction}', 'IntroductionController@edit')->name('edit');
        Route::post('/update/{introduction}', 'IntroductionController@update')->name('update');
        Route::delete('/delete/{introduction}', 'IntroductionController@delete')->name('delete');
    });
});
//*************************************************** admin ***************************************************//

//*************************************************** auth ***************************************************//
Auth::routes(['register' => false]);
Route::group([
    'namespace' => 'App\Http\Controllers\Auth',
    ], function(){
        Route::get('/login', 'LoginController@showLoginForm')->name('login');
        Route::post('/login', 'LoginController@login');
        Route::post('/logout', 'LoginController@logout')->name('logout');
    });
//*************************************************** auth ***************************************************//