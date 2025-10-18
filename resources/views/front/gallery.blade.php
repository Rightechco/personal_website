@extends('front.layouts.master')
@section('content')
<section class="container mt-3">
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb mb-0 rad25">
                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active" aria-current="page">گالری تصاویر</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<div class="container box p-5 mt-3 tGallery bg-page">
    <div class="bg-cooperation">
                     <div class="box-tabs">
                        <div class="bg-custom-navs">
                            <ul class="nav nav-tabs custom-tabs" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" href="#institution1" role="tab" data-toggle="tab">گالری تصاویر</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="#institution2" role="tab" data-toggle="tab">گالری ویدیو</a>
                                </li>
                            </ul>
                        </div>
                         
                          <!-- Tab panes -->
                          <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active show" id="institution1">

                                <div class="terms-conditions">
                                <div class="container box p-5 mt-3 tGallery bg-page">
                                    <div class="row px-md-5">
                                        @foreach($imageGalleries as $key => $item)
                                        <div class="col-lg-3 col-md-4 col-6" data-toggle="modal" data-target="#modal">
                                            <a href="#lightbox" data-slide-to="{{ $key }}"><img src="{{ asset('uploads/gallery/'.$item->image) }}" class="my-3 img-fluid rad12"></a>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="Lightbox Gallery by Bootstrap 4" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div id="lightbox" class="carousel slide" data-ride="carousel" data-interval="5000" data-keyboard="true">

                                                    <div class="carousel-inner">
                                                        @foreach($imageGalleries as $key => $item)
                                                        <div class="carousel-item {{ ($key == 0) ? 'active' : '' }}" style="position:relative;">
                                                            <div style="position: absolute;top: 0;right: 0;color: #2152cf;background: #ededed;padding: 3px 6px;border-radius: 0px 0px 0px 10px;width: fit-content;">{{ $item->title }}</div>
                                                            <img src="{{ asset('uploads/gallery/'.$item->image) }}" class="w-100" alt="">
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <a class="carousel-control-prev" href="#lightbox" role="button" data-slide="prev"><span
                                                            class="carousel-control-prev-icon" aria-hidden="true"></span><span
                                                            class="sr-only">Previous</span></a>
                                                    <a class="carousel-control-next" href="#lightbox" role="button" data-slide="next"><span
                                                            class="carousel-control-next-icon" aria-hidden="true"></span><span
                                                            class="sr-only">Next</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="institution2">
                            <div class="container box p-5 mt-3 tGallery bg-page">
                                    <div class="row px-md-5">
                                        <div class="col-lg-3 col-md-4 col-6">
                                            @foreach($videoGalleries as $item)
                                                {!! $item->link !!}
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="Lightbox Gallery by Bootstrap 4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div id="lightbox" class="carousel slide" data-ride="carousel" data-interval="5000" data-keyboard="true">
                    <div class="carousel-inner">
                        @foreach($imageGalleries as $key => $item)
                        <div class="carousel-item {{ ($key == 0) ? 'active' : '' }}">
                            <img src="{{ asset('uploads/gallery/'.$item->image) }}" class="w-100" alt="">
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#lightbox" role="button" data-slide="prev"><span
                            class="carousel-control-prev-icon" aria-hidden="true"></span><span
                            class="sr-only">Previous</span></a>
                    <a class="carousel-control-next" href="#lightbox" role="button" data-slide="next"><span
                            class="carousel-control-next-icon" aria-hidden="true"></span><span
                            class="sr-only">Next</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection