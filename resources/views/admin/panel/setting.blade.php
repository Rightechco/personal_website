@extends('admin.layouts.master')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.head', ['mainPangeName' => 'پنل مدیریت', 'pageName' => 'تنظیمات'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        @include('admin.partials.alert', ['type' => 'success', 'sessionName' => 'updateSetting'])
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ویرایش تنظیمات </h3>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('admin.panel.setting.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>عنوان</label>
                                <input type="text" name="title" class="form-control" value="{{ $setting->title }}">
                            </div>
                            @error('title')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>آدرس</label>
                                <input type="text" name="address" class="form-control" value="{{ $setting->address }}">
                            </div>
                            @error('address')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>تلفن ثابت</label>
                                <input type="text" name="tell" class="form-control" value="{{ $setting->tell }}">
                            </div>
                            @error('tell')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>موبایل</label>
                                <input type="text" name="mobile" class="form-control" value="{{ $setting->mobile }}">
                            </div>
                            @error('mobile')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>فکس</label>
                                <input type="text" name="fax" class="form-control" value="{{ $setting->fax }}">
                            </div>
                            @error('fax')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>لوگو</label>
                                <input type="file" class="form-control" name="logo" id="imgInp" accept="image/*">
                                <img id="blah" class="mt-2" src="{{ asset('uploads/setting/'.$setting->logo) }}" alt="your image" width="120px"/>
                            </div>
                            @error('logo')<span class="text-danger">{{ $message }}</span>@enderror
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
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection