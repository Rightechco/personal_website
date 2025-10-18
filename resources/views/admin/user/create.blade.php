@extends('admin.layouts.master')
@section('styles')

@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.head', ['mainPangeName' => 'کاربران', 'pageName' => 'افزودن کاربر'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">افزودن کاربر</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>نام و نام خانوادگی</label>
                                <input type="text" name="full_name" class="form-control" value="{{ old('full_name') }}">
                            </div>
                            @error('full_name')<b class="text-danger">{{ $message }}</b>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>شماره موبایل</label>
                                <input type="text" name="mobile" class="form-control">
                            </div>
                            @error('mobile')<b class="text-danger">{{ $message }}</b>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>رمز عبور</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            @error('password')<b class="text-danger">{{ $message }}</b>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>تکرار رمز عبور</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                            @error('password_confirmation')<b class="text-danger">{{ $message }}</b>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>نقش کاربر</label>
                                <select name="role" class="form-control">
                                    <option value="writer">نویسنده</option>
                                    <option value="admin">ادمین</option>
                                </select>
                            </div>
                            @error('role')<b class="text-danger">{{ $message }}</b>@enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ذخیره</button>
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
@endsection