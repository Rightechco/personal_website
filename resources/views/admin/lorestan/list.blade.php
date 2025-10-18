@extends('admin.layouts.master')
@section('styles')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.css') }}">
<style>
    .rotate {
        animation: rotating 1s linear infinite;
    }
    @keyframes rotating {
        0% { 
    transform: rotate(0); 
  }
  100% { 
    transform: rotate(360deg);
  }
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.head', ['mainPangeName' => 'اخبار لرستان', 'pageName' => 'لیست خبرها'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          @include('admin.partials.alert', ['type' => 'success', 'sessionName' => 'storeLorestannews'])
          @include('admin.partials.alert', ['type' => 'info', 'sessionName' => 'updateLorestannews'])
          @include('admin.partials.alert', ['type' => 'warning', 'sessionName' => 'deleteLorestannews'])
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                    <h3 class="card-title">لیست خبر ها</h3>
                    <form action="{{ route('admin.lorestan.store') }}" method="POST" id="form-block">
                        @csrf
                        <button type="submit" id="btn-block" class="spinner-border btn btn-primary">بروزرسانی خبر <i class="fa fa-refresh" id="rotate"></i></button>
                    </form>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="kt_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>عنوان</th>
                  <th>خلاصه</th>
                  <th>توضیحات</th>
                  <th>تصویر</th>
                  <th>تاریخ</th>
                  <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lorestannews as $key => $item)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $item->title }}</td>
                  <td>{{ $item->summary }}</td>
                  <td>
                    @php
                    $desc = json_decode($item->description); echo $desc[0].'...';
                    @endphp
                  </td>
                  <td><img src="{{ $item->image }}" width="80px"></td>
                  <td>{{ $item->date }}</td>
                  <td>
                    <div class="d-flex">
                    <a href="{{ route('admin.lorestan.edit', $item->id) }}" class="btn btn-outline-info ml-2"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('admin.lorestan.delete', $item->id) }}" method="POST">
                      @csrf
                      @method("DELETE")
                      <button type="submit" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                    </form>
                    </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
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
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('admin/dist/js/persian-datatable.js') }}"></script>
<script>
    $(document).ready(function () {
        $("#form-block").submit(function (e) {
            $("#btn-block").attr("disabled", true);
            $("#rotate").addClass("rotate");
        });
    });
</script>
@endsection