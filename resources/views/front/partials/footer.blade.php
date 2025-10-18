<footer class="rel-footer">
        <div id="footer-content">
            <div class="container">
                <div class="row pt-4 mx-2">
                    <div class="col-lg-4 col-sm-6 py-3 order-lg-1 order-1 pl-lg-2">
                        <h5 class="IRANSansWeb_Medium">آخرین ارسالی ها : </h5>
                        <ul>
                            @foreach($latestNews as $item)
                            <li>
                                <a href="{{ route('front.news.details', ['type' => 'news','id' => $item->id]) }}" title="">{{ $item->title }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-2 col-sm-6 py-3 order-lg-1 order-1">
                        <h5 class="IRANSansWeb_Medium"> لینک های سریع : </h5>
                        <ul>
                            @foreach($categories as $item)
                            <li>
                                <a href="#">{{ $item->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-lg-2 col-sm-6 py-3 order-lg-2  order-3">
                        <h5 class="IRANSansWeb_Medium">پیوندها : </h5>
                        <ul>
                            <li>
                                <a href="{{ route('login') }}" title="">ورود</a>
                            </li>
                            <li>
                                <a href="{{ route('front.introduction') }}" title="">معرفی گروه</a>
                            </li>
                            <li>
                                <a href="{{ route('front.news') }}" title="">اخبار و رویدادها</a>
                            </li>
                            <li>
                                <a href="{{ route('front.about.us') }}" title="">درباره ما</a>
                            </li>
                            <li>
                                <a href="{{ route('front.contact.us') }}" title="">تماس با ما </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-sm-6 pr-lg-4 py-3 IRANSansWeb_FaNum  order-lg-3  order-2">
                        <h5 class="IRANSansWeb_Medium"> ارتباط با ما : </h5>
                        <p><i class="fas fa-2x fa-map-marker-alt ml-2"></i>{{ $setting->address }}</p>
                        <p><i class="fas fa-2x fa-phone ml-2"></i>تلفن : {{ $setting->tell }}</p>
                        <p><i class="fas fa-2x fa-mobile-alt ml-2"></i>تلفن همراه : {{ $setting->mobile }}</p>
                    </div>


                </div>
            </div>
        </div>
        <div id="footer-copyright">
            <div class="container text-center">
                <div class="row">
                    <div class="col-md-12">
                        <a href="https://www.rtl-theme.com/author/shamim831/" class="text-white ">
                            کلیه حقوق این وبسایت برای مدیر وبسایت محفوظ می باشد - طراحی و توسعه : رایتک .
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </footer>