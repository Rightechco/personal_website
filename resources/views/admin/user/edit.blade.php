@extends('admin.layouts.master')
@section('styles')

@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.head', ['mainPangeName' => 'کاربران', 'pageName' => 'ویرایش کاربر'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ویرایش کاربر</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>نام و نام خانوادگی</label>
                                <input type="text" name="full_name" value="{{ $user->full_name }}" class="form-control">
                            </div>
                            @error('full_name')<b class="text-danger">{{ $message }}</b>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>نقش کاربر</label>
                                <select name="role" class="form-control">
                                    <option @if($user->role == 'writer') selected @endif value="writer">نویسنده</option>
                                    <option @if($user->role == 'admin') selected @endif value="admin">ادمین</option>
                                </select>
                            </div>
                            @error('role')<b class="text-danger">{{ $message }}</b>@enderror
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
@endsection