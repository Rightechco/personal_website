<!DOCTYPE html>
<html>

<head>
    <title>وبسایت رسمی دکتر حتمی</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="fa" />
    <meta name="document-type" content="Public" />
    <meta name="document-rating" content="General" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Ofoghata" />

    <link href="{{ asset('front/theme/Css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/theme/Css/bootstrap-rtl.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/theme/Css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/theme/Css/Style.css') }}" rel="stylesheet" />
    <link href="{{ asset('front/theme/Css/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('front/theme/Css/sina-nav.min.css') }}" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js"></script>

</head>

<body id="home">

    @include('front.partials.header')

    @yield('content')

    @include('front.partials.footer')


    <script src="{{ asset('front/theme/Js/jquery-2.0.0.min.js') }}"></script>
    <script src="{{ asset('front/theme/Js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('front/theme/Js/owl.carousel.js') }}"></script>
    <script src="{{ asset('front/theme/Js/custom.js') }}"></script>
    <script src="{{ asset('front/theme/Js/sina-nav.min.js') }}"></script>
</body>

</html>