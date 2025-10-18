@extends('front.layouts.master')
@section('content')
<section class="container mt-3">
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb mb-0 rad25">
                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active" aria-current="page">خطای 404</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
<section class="container-fluid mt-3 error404">
    <div class="container p-md-5 box p-4 bg-page">
        <div class="row">
            <div class="col-lg-12 text-center mb-4">
                <img src="{{ asset('front/theme/Images/404 Error.png') }}" class="img-fluid" />
                <h6 class="IRANSansWeb_Medium">
                    چنین صفحه ای یافت نشد!!!
                </h6>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>
@endsection