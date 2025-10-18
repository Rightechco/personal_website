@extends('front.layouts.master')
@section('content')
<section class="container mt-3">
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb mb-0 rad25">
                    <li class="breadcrumb-item"><a href="{{ route('front.index') }}">صفحه اصلی</a></li>
                    <li class="breadcrumb-item active" aria-current="page">مدیران و معاونان</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<section class="container-fluid mt-3 pb-5">
    <div class="container p-md-5 box p-4 bg-page">
        <h5 class="mb-4 bt-color IRANSansWeb_Medium">السَّلام عَلَیکِ یا ایَّتُها الجَبَل الصَبر</h5>
        <p>گروه جهادی شهید حتمی</p>
        <p>با اتکا به ذات اقدس اله و استعانت از امام عصر (عج) در جهت محرومیت زدایی در همه ی ابعاد فرهنگی ، آموزشی ، پزشکی بهداشتی ، عمرانی و ورزشی . اجتماعی به منظور ادای دین و تکلیف انسانی نسبت به انسان های مظلومی که در مناطق محروم و کم برخوردارند شهرستان بروجرد و اشترینان زندگی می کنند ، همزمان با سالروز میلاد فرخنده اسوه ی صبر و استقامت،حضرت زینب (س) گروه جهادی شهید حتمی در بهار سال ۱۴۰۱تاسیس گردیده است. این گروه یک موسسه ی مردمی و مستقل وغیر تجاری می باشد و به هیچگونه نهاد دولتی و غیر دولتی وابستگی ندارد و مجوز فعالیت خود را از سپاه شهرستان بروجرد اخذ نموده است. فعالیت های جهادی در این گروه به صورت داوطلبانه و بر اساس احساس مسئولیت و بی تفاوت نبودن نسبت به همنوعان و همچنین تعهدات اخلاقی و تکلیف دینی
بوده و بدون چشم داشت مادی و هیچگونه امتیاز یا سابقه ی استخدامی محسوب نمی شود. این گروه منبع مالی مستقلی نداشته و تمام سعی خود را در رساندن کمک های نیکوکاران و خیرین به نیازمندان و محرومین معطوف می دارد. گروه جهادی شهید حتمی با رویکرد آسیب شناسی وارائه ی راهکار و زدودن محرومیت در همه ی ابعاد فقر فرهنگی و معیشتی ، ارتقای بهداشت و سلامت جسم و روان و ایجاد اشتغال زایی و کار آفرینی با ۱۲۰ نیروی متخصص و متعهد مشغول به خدمات رسانی می باشد. *چشم انداز: گروه جهادی طی دو سند چشم انداز ۳ ساله اهداف خود را پی ریزی نموده است ۱– شهرستان بروجرد که به لطف خداوند در پایان سال ۱۴۰۴ به ۱۰۰% اهداف در حوزه های آموزشی ، بهداشتی ، پزشکی ، عمرانی ، دامپزشکی ، کار آفرینی دست یابد . ان شاءالله. هدف کلان گروه جهادی ما: (ارائه ی خدمات وتوانمند سازی روستاییان تا زمانی که یک فرد محروم در منطقه باقی نماند)</p>          
        <div class="row">
            @foreach($introductions as $item)
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="card">
                    <img src="{{ asset('uploads/introductions/'.$item->image) }}" alt="" />
                    <div class="data">
                        <h6 class="IRANSansWeb_Medium">{{ $item->full_name }}</h6>
                        <span>{{ $item->position }}</span>
                        <hr />
                        <p class="text-center">راه های ارتباطی با مدیر کل</p>
                        <a href="{{ $item->whatsapp }}" target="_blank"><i class="fab fa-2x fa-whatsapp rounded text-success"></i></a>
                        <a href="{{ $item->telegram }}" target="_blank"><i class="fab fa-2x fa-telegram rounded text-info"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection