@extends('front.layouts.master')
@section('content')
<section class="container p-lg-0 mt-3">
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb mb-0 rad25">
                    <li class="breadcrumb-item"><a href="{{ route('front.index')}}">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> اخبار</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="container mt-2">
    <div class="mx-auto text-center">
        <img src="{{ asset('front/theme/Images/head.png') }}" />
    </div>
    <div class="grad-bg px-md-2 pt-3 pb-4 rad25">
        <h5 class="IRANSansWeb_Medium text-center bt-color text-white pt-2 pb-3">محبوب ترین ارسالی ها</h5>
        <div id="owl-secondevent" class="owl-carousel owl-theme text-right mb-3 ">
            @foreach($specialNews as $item)
            <div class="mx-2">
                <a href="{{ route('front.news.details', ['type' => 'news','id' => $item->id]) }}">
                    <img src="{{ asset('uploads/news/'.$item->image) }}" class="img-fluid rad12 bigpic " />
                    <div class="blogdiv">
                        <h6 class="text-white text-shadow">{{ $item->title }}</h6>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="mx-auto text-center">
        <img src="{{ asset('front/theme/Images/foot.png') }}" />
    </div>
</section>

<section class="container mt-5 pb-5">
    <div id="category" class="row">
        <div class="col-md-3">
            <div class="mb-2 box p-3">
                <h6 class="IRANSansWeb_Medium bt-color  bg-light py-2 px-3 mb-3 rad25">آخرین اخبار</h6>
                <ul class="prof">
                    @foreach($lastNews as $item)
                    <li>
                        <a href="#"><i class="far fa-file-alt text-info ml-1"></i>{{ $item->title }}</a>
                    </li>
                    @endforeach
                </ul>

            </div>
            <div class="my-2 box p-3">
                <h6 class="IRANSansWeb_Medium bt-color  bg-light py-2 px-3 rad25">دسته بندی ها</h6>
                <ul class="prof">
                    @foreach($categories as $item)
                    <li>
                        <a href="#"><i class="far fa-folder ml-1 text-info"></i>{{ $item->name }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="my-2 box p-3">
                <h6 class="IRANSansWeb_Medium bt-color  bg-light py-2 px-3 mb-3 rad25">اخبار استانی</h6>
                <ul class="prof">
                    @foreach($provincialNews as $item)
                    <li>
                        <a href="#"><i class="far fa-file-alt text-info ml-1"></i>{!! $item->title !!}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div id="article" class="col-md-9 text-center">
            <div class="row">
                @foreach($news as $item)
                <div class="col-md-4 mb-3">
                    <div class="card my-3 mx-2">
                        <a href="{{ route('front.news.details', ['type' => 'news','id' => $item->id]) }}" class="relative">
                            <img src="{{ asset('uploads/news/'.$item->image) }}" class="mb-3 img-fluid rad12" />
                            <div class="covernews d-flex flex-row justify-content-between px-3 text-white IRANSansWeb_Medium ">
                                <span class="bottom_p"><i class="fas fa-clock ml-1"></i>{{ changeDateToPersian($item->created_at, 'Y/m/d') }}</span>
                                <!-- <span><i class="fas fa-eye ml-1"></i>28 بار</span> -->
                            </div> 
                        </a>
                        <a href="News_Details.html"><h2>{{ $item->title }}</h2></a>
                        @php $desc = strip_tags($item->description); @endphp
                        <p>{!! \Str::limit($desc, 30) !!}</p>
                        <a href="{{ route('front.news.details', ['type' => 'news','id'=>$item->id]) }}" class="text-danger IRANSansWeb_Medium mb-3">مشاهده خبر »</a>
                    </div>
                </div>
                @endforeach
            </div>
            {{ $news->links('pagination.custom') }}
        </div>
    </div>
</section>
@endsection