<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('admin/dist/img/icons8-news-80.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ (Auth::user()->role == 'admin') ? 'ادمین' : 'نویسنده' }}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <div>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            @if(Auth::user()->image == null)
              <img src="{{ asset('admin/dist/img/user-2.png') }}" alt="User Avatar" class="img-size-50 ml-3 img-circle">
            @endif
          </div>
          <div class="info">
            <a href="#" class="d-block">{{ Auth::user()->full_name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            @if(Auth::user()->role == 'admin')
            {!! menu([
              'url' => 'admin.panel.index',
              'name' => 'پنل مدیریت',
              'icon' => 'nav-icon fa fa-dashboard'
            ]) !!}
            {!! submenu([
              'urls' => ['admin.user.list','admin.user.create'],
              'names' => ['لیست کاربران','افزودن کاربر'],
              'nameActive' => 'user',
              'mainName' => 'کاربران',
              'icon' => 'fa fa-users'
            ]) !!}
            {!! submenu([
              'urls' => ['admin.slider.list','admin.slider.create'],
              'names' => ['لیست اسلایدر','افزودن اسلایدر'],
              'nameActive' => 'slider',
              'mainName' => 'اسلایدر',
              'icon' => 'fa fa-sliders'
            ]) !!}
            {!! submenu([
              'urls' => ['admin.link.list','admin.link.create'],
              'names' => ['لیست لینک','افزودن لینک'],
              'nameActive' => 'link',
              'mainName' => 'لینک های کناری',
              'icon' => 'fa fa-link'
            ]) !!}
            {!! menu([
              'url' => 'admin.tag.list',
              'name' => 'برچسب ها',
              'icon' => 'fa fa-tag'
            ]) !!}
            {!! menu([
              'url' => 'admin.category.list',
              'name' => 'دسته بندی ها',
              'icon' => 'fa fa-list-alt'
            ]) !!}
            {!! submenu([
              'urls' => ['admin.news.list','admin.news.create'],
              'names' => ['لیست خبرها','افزودن خبر'],
              'nameActive' => 'news',
              'mainName' => 'اخبار گروه جهادی',
              'icon' => 'fa fa-newspaper-o'
            ]) !!}
            {!! menu([
              'url' => 'admin.provincial.list',
              'name' => 'اخبار استانی',
              'icon' => 'fa fa-reorder'
            ]) !!}
            {!! menu([
              'url' => 'admin.lorestan.list',
              'name' => 'اخبار لرستان',
              'icon' => 'fa fa-reorder'
            ]) !!}
            {!! submenu([
              'urls' => ['admin.related.link.list','admin.related.link.create'],
              'names' => ['لیست لینک ها','افزودن لینک'],
              'nameActive' => 'related',
              'mainName' => 'لینک های مرتبط',
              'icon' => 'fa fa-link'
            ]) !!}
            {!! submenu([
              'urls' => ['admin.gallery.list','admin.gallery.create'],
              'names' => ['لیست گالری','افزودن گالری'],
              'nameActive' => 'gallery',
              'mainName' => 'مدیریت گالری',
              'icon' => 'fa fa-picture-o'
            ]) !!}
            {!! submenu([
              'urls' => ['admin.introduction.list','admin.introduction.create'],
              'names' => ['لیست معرفی','افزودن معرفی'],
              'nameActive' => 'introduction',
              'mainName' => 'گروه معرفی',
              'icon' => 'fa fa-id-card'
            ]) !!}
            {!! menu([
              'url' => 'admin.panel.banner',
              'name' => 'بنر',
              'icon' => 'fa fa-wpforms'
            ]) !!}
            {!! menu([
              'url' => 'admin.panel.setting',
              'name' => 'تنظیمات',
              'icon' => 'fa fa-cog'
            ]) !!}
            @endif
            <!-- ********************************************************************************88  -->
            @if(Auth::user()->role == 'writer')
            {!! menu([
              'url' => 'admin.panel.index',
              'name' => 'پنل مدیریت',
              'icon' => 'nav-icon fa fa-dashboard'
            ]) !!}
            @endif
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
    </div>
    <!-- /.sidebar -->
  </aside>