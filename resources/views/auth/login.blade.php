<!DOCTYPE html>
<html>
<head>
    <title>ورود</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="fa" />
    <meta name="document-type" content="Public" />
    <meta name="document-rating" content="General" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Ofoghata" />
    <link href="{{ asset('app/Css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('app/Css/bootstrap-rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('app/Css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('app/Css/Style.css') }}" rel="stylesheet" />
    <link href="{{ asset('app/Css/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('app/Css/sina-nav.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('app/Js/jquery-2.0.0.min.js') }}"></script>
    <script src="{{ asset('app/Js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('app/Js/owl.carousel.js') }}"></script>
    <script src="{{ asset('app/Js/custom.js') }}"></script>
    <script src="{{ asset('app/Js/sina-nav.min.js') }}"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="bg_dblue pt-5">

    <section class="container-fluid p-5 pb-lg-0">

        <section class="text-center m-3 ">
            <div id="login" class="box shadow text-center border-top-0 p-lg-4 p-3">
                <img src="{{ asset('app/Images/Svg/login.svg') }}" style="width:45px" />
                <h5 class="IRANSansWeb_Bold text-grad pt-3">ورود به سایت </h5>
                <p class="mb-3">جهت ورود ، شماره موبایل و رمز عبور خود را وراد نمایید</p>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    @error('mobile')<span class="text-danger">{{ $message }}</span>@enderror
                    <input class="form-control mb-3" type="text" name="mobile" value="{{ old('mobile') }}" placeholder="شماره موبایل خود را وارد کنید"/>
                    @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                    <input class="form-control mb-3" type="password" name="password" placeholder="رمز عبور خود را وارد کنید"/>
                    <button class="btn btn-grad btn-block text-white mb-3 py-3" type="submit">ورود<i class="fa fa-chevron-left mr-2"></i></button>
                </form>
            </div>
        </section>
    </section>

</body>
</html>
