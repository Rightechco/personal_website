@extends('admin.layouts.master')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.head', ['mainPangeName' => 'پنل مدیریت', 'pageName' => 'بنر'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        @include('admin.partials.alert', ['type' => 'success', 'sessionName' => 'updateBanner'])
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ویرایش بنر</h3>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('admin.panel.banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>بنر بالا</label>
                                <input type="file" class="form-control" name="banner_top" id="bannerTop" accept="image/*">
                                <img id="imageTop" class="mt-2" src="{{ asset('uploads/setting/'.$banner->banner_top) }}" alt="your image" width="120px"/>
                            </div>
                            @error('banner_top')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>بنر پایین</label>
                                <input type="file" class="form-control" name="banner_bottom" id="bannerBottom" accept="image/*">
                                <img id="imageBottom" class="mt-2" src="{{ asset('uploads/setting/'.$banner->banner_bottom) }}" alt="your image" width="120px"/>
                            </div>
                            @error('banner_bottom')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">بروزرسانی</button>
                </div>
              </form>
            </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
@section('scripts')
<script>
    bannerTop.onchange = evt => {
        const [file] = bannerTop.files
        if (file) {
            imageTop.src = URL.createObjectURL(file)
        }
    }
    bannerBottom.onchange = evt => {
        const [file] = bannerBottom.files
        if (file) {
            imageBottom.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection