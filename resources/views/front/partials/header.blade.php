<section id="tophead" class="container-fluid p-2 grad-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-5 d-lg-block d-none">
                    <a href="{{ route('front.main') }}"><img src="{{ asset('uploads/setting/'.$setting->logo) }}" width="13%" class="img-fluid"/></a>
                </div>
                <div class="col-lg-3 col-6 mr-auto">
                    <div class="d-flex flex-column">
                        <span class="text-white">
                            @php
                            $v = verta(); $today = $v->format('%d %B %Y');
                            @endphp
                            امروز {{ $today }}
                        </span>
                        <form class="d-sm-block d-none">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="جستجو .." onfocus="this.placeholder = ''" onblur="this.placeholder = 'جستجو ..'">
                                <div class="input-group-prepend">
                                    <button class="btn btn-success" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="col-lg-1 col-6  text-left">
                    <img src="{{ asset('front/theme/Images/logo-2.png') }}" class="pt-sm-4 flag img-fluid" />
                </div>
            </div>
        </div>
    </section>

    <header class="nav-container">
        <nav class="sina-nav mobile-sidebar navbar-fixed" data-top="60">
            <div class="container">

                <div class="extension-nav">
                    <ul class="pt-2">
                        <li>
                            @if(Auth::check())
                            <a id="loginbtn" href="{{ route('login') }}" class="btn btn-link p-1 ml-2">
                                <i class="fa fa-user"></i><span class="mr-1">پنل کاربری</span>
                            </a>
                            @else
                            <a id="loginbtn" href="{{ route('login') }}" class="btn btn-link p-1 ml-2">
                                <img src="{{ asset('front/theme/Images/Svg/login.svg') }}" /><span class="mr-1">ورود</span>
                            </a>
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="sina-nav-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="sina-brand pl-4 d-lg-none d-block" href="Index.html">
                        <img src="{{ asset('front/theme/Images/logo.png') }}" class="img-fluid" />
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="sina-menu sina-menu-center">
                        <li><a href="{{ route('front.index') }}">صفحه اصلی</a></li>
                        <li><a href="{{ route('front.gallery') }}">گالری تصاویر</a></li>
                        <li><a href="{{ route('front.introduction') }}">معرفی گروه </a></li>
                        <li><a href="{{ route('front.news') }}">اخبار و رویدادها</a></li>
                        <li><a href="{{ route('front.about.us') }}">درباره ما</a></li>
                        <li><a href="{{ route('front.contact.us') }}">ارتباط با ما</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>