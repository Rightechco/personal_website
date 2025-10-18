@extends('front.layouts.master')
@section('content')
<section class="container mt-3">
        <div class="row">
            <div class="col-lg-3 card pt-2 order-lg-1 order-2 text-center">
                <div class="container">

                    <div class="row Qlink">
                        <div class="col-lg-12 pt-lg-2">
                            <img src="{{ asset('front/theme/Images/head.png') }}" class="mx-auto text-center img-fluid" />
                        </div>
                        @foreach($links as $key => $item)
                        @if($key == 0)
                        <div class="col-lg-12 col-md-3 col-6 mb-lg-2 mt-lg-0 my-md-2 my-1">
                            <a href="{{ $item->external_link }}"><img src="{{ asset('uploads/links/'.$item->image) }}" class="img-fluid rad12"></a>
                        </div>
                        @elseif($key == count($links) - 1)
                        <div class="col-lg-12 col-md-3 col-6 mt-lg-2 mb-lg-0 my-md-2 my-1">
                            <a href="{{ $item->external_link }}"><img src="{{ asset('uploads/links/'.$item->image) }}" class="img-fluid rad12"></a>
                        </div>
                        @else
                        <div class="col-lg-12 col-md-3 col-6 my-md-2 my-1">
                            <a href="{{ $item->external_link }}"><img src="{{ asset('uploads/links/'.$item->image) }}" class="img-fluid rad12"></a>
                        </div>
                        @endif
                        @endforeach
                        <div class="col-lg-12">
                            <img src="{{ asset('front/theme/Images/foot.png') }}" class="mx-auto img-fluid" />
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-9 mb-lg-0 mb-3 order-lg-2  order-1">
                <div id="owl-slider" class="owl-carousel">
                    @foreach($sliders as $item)
                    <div class="item">
                        <a href="{{ route('front.news.details', ['type' => 'slider', 'id' => $item->id]) }}">
                            <img src="{{ asset('uploads/sliders/'.$item->image) }}" alt="slide1" class="img-fluid" />
                            <div class="caption">
                                <span class="SlideCategori position-absolute bg-danger px-3">{{ $item->title }}</span>
                                <p>{{ $item->description }}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </section>

    <section class="container  Nlist wt_box mt-5 relative">

        <div class="row">

            <div class="col-lg-9 bx-nws card mb-3">
                <div class="widget-title">
                    <h1>اخبار مرکز و استان ها</h1>
                </div>
                <div class="bg-white  m-0 p-2">
                    <ul>
                        @foreach($provincialnews as $news)
                        <li>
                            <div class="row">
                                <div class="col-lg-2 col-md-3">
                                    <a href="{{ route('front.news.details', ['type' => 'provincial','id' => $news->id]) }}"><img src="{{ $news->image }}" class="img-fluid"></a>
                                </div>
                                <div class="col-lg-10 col-md-9">
                                    <a href="News_Details.html"><h2>{{ $news->title }}</h2></a>
                                    <p>{{ $news->summary }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="d-flex flex-row tttt justify-content-between pb-2 px-3">
                        <div>
                            « نمایش 10 از کل »
                        </div>

                        <div>
                            <a href="#">مشاهده بیشتر »</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-3 d-lg-block d-none">
                <a href="#"><img src="{{ asset('uploads/setting/'.$banner->banner_top) }}" class="img-fluid rad12 mb-3"></a>
                <a href="#"><img src="{{ asset('uploads/setting/'.$banner->banner_bottom) }}" class="img-fluid rad12 mb-3"></a>
            </div>
        </div>

    </section>

    <section class="container Lnews mt-5">

        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="card wt_box px-3">
                    <div class="widget-title">
                        <h1>اخبـار گروه جهادی</h1>
                    </div>
                    <ul>
                        @foreach($groupnews as $item)
                        <li><a href="{{ route('front.news.details', ['type' => 'news','id' => $item->id]) }}">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="card wt_box px-3">
                    <div class="widget-title">
                        <h1>اخبـار استان لرستان</h1>
                    </div>
                    <ul>
                        @foreach($lorestannews as $item)
                        <li><a href="{{ route('front.news.details', ['type' => 'lorestan','id' => $item->id]) }}">{{ $item->title }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="container mt-5">
        <h5 class="IRANSansWeb_Medium text-center bt-color">آخرین اخبارها و رویدادها</h5>
        <div id="owl-topnews" class="owl-carousel mt-3 text-center">
            @foreach($lastnews as $item)
            <div class="card my-3 mx-2">
                <a href="News_Details.html" class="relative">
                    <img src="{{ asset('uploads/news/'.$item->image) }}" class="mb-3 img-fluid rad12" />
                    <div class="covernews d-flex flex-row justify-content-between px-3 text-white IRANSansWeb_Medium ">
                        <span class="bottom_p"><i class="fas fa-clock ml-1"></i>98/5/9</span>
                        <span><i class="fas fa-eye ml-1"></i>28 بار</span>
                    </div>
                </a>
                <a href="{{ route('front.news.details', ['type' => 'news','id' => $item->id]) }}"><h2>{{ $item->title }}</h2></a>
                @php $desc = strip_tags($item->description); @endphp
                <p>{{ \Str::limit($desc, 30) }}</p>
                <a href="{{ route('front.news.details', ['type' => 'news','id' => $item->id]) }}" class="text-danger IRANSansWeb_Medium mb-3">مشاهده خبر »</a>
            </div>
            @endforeach
        </div>
    </section>

    <section class="container-fluid py-5">
        <div class="container">
            <div id="foottop" class="row p-3 mx-2 mt-2 grad-bg text-center text-white rad25">
                <div class="col-lg-4">
                    <a href="#"><img src="{{ asset('uploads/setting/'.$setting->logo) }}" width="30%"/></a>
                </div>
                <div class="col-lg-8">
                    <h6 class="mb-2 IRANSansWeb_Medium">شماره های تماس :</h6>
                    <img src="{{ asset('front/theme/Images/chevron.png') }}" />
                    <a href="#" class="rounded-btn text-white text-center support-phone IRANSansWeb_Bold">{{ $setting->tell }} __
                        {{ $setting->mobile }}</a>
                    <img src="{{ asset('front/theme/Images/chevron2.png') }}" />
                </div>
            </div>

        </div>
    </section>

    <section class="container text-center pb-5">
        <h5 class="IRANSansWeb_Bold bt-color">لینک های مرتبط</h5>
        <p>جهت مشاهده بر روی هر لینک کلیک کرده و وارد سایت مربوطه شوید</p>
        <div id="owl-province" class="owl-carousel mt-4">
            @foreach($relatedlinks as $item)
            <div class="card m-2">
                <a href="{{ $item->external_link }}" target="_blank">
                    <img src="{{ asset('uploads/related/'.$item->image) }}" class="rad25" />
                </a>
            </div>
            @endforeach
        </div>

    </section>
@endsection