@extends('front.layouts.master')
@section('content')
<section class="container mt-3">
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb mb-0 rad25">
                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}">صفحه اصلی</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('front.news') }}">اخبار</a></li>
                    <li class="breadcrumb-item active" aria-current="page">جزئیات اخبار</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="container-fluid mt-3 pb-5">
    <div class="container px-5 py-3 box  bg-page">
        <div class="row">
            <div class="col-lg-12">
                <div id="blog_details">
                    <h1 class="pt-3 IRANSansWeb_Medium">{{ $detail->title }}</h1>
                    <div class="mb-4">
                        @if(request()->segment(2) == 'provincial' || request()->segment(2) == 'lorestan')
                        <span class="pl-2"><i class="fas fa-history pl-1"></i>تاریخ ارسال : {{ $detail->date }} </span>
                        @else
                        <span class="pl-2"><i class="fas fa-history pl-1"></i>تاریخ ارسال : {{ changeDateToPersian($detail->created_at, 'Y/m/d') }} </span>
                        @endif
                        <span><i class="fas fa-user pl-1"></i>نویسنده : مدیریت </span>
                    </div>
                    @if(request()->segment(2) == 'news')
                    <img src="{{ asset('uploads/news/'.$detail->image) }}" class="img-fluid rad25 pb-3 w-75" />
                    @elseif(request()->segment(2) == 'slider')
                    <img src="{{ asset('uploads/sliders/'.$detail->image) }}" class="img-fluid rad25 pb-3 w-75" />
                    @elseif(request()->segment(2) == 'provincial')
                    <img src="{{ $detail->image }}" class="img-fluid rad25 pb-3 w-75" />
                    @elseif(request()->segment(2) == 'lorestan')
                    <img src="{{ $detail->image }}" class="img-fluid rad25 pb-3 w-75" />
                    @endif
                    <p>
                        @if(request()->segment(2) == 'provincial' || request()->segment(2) == 'lorestan')
                        @foreach(json_decode($detail->description) as $desc)
                        <p>{{ $desc }}</p>
                        @endforeach
                        @else
                        {!! $detail->description !!}
                        @endif
                        @if(request()->segment(2) == 'news')
                        <h6>برچسب ها :</h6>
                        <ul class="inline">
                            @foreach($detail->tags as $item)
                            <li class="mb-2">
                                <a href="#" class="key-word"># {{ $item->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection