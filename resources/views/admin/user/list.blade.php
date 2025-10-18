@extends('admin.layouts.master')
@section('styles')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.head', ['mainPangeName' => 'کاربران', 'pageName' => 'لیست کاربران'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          @include('admin.partials.alert', ['type' => 'success', 'sessionName' => 'storeUser'])
          @include('admin.partials.alert', ['type' => 'info', 'sessionName' => 'updateUser'])
          @include('admin.partials.alert', ['type' => 'warning', 'sessionName' => 'deleteUser'])
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">لیست کاربران</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="kt_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>نام و نام خانوادگی</th>
                  <th>موبایل</th>
                  <th>نقش</th>
                  <th>تاریخ ایجاد</th>
                  <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $item)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $item->full_name }}</td>
                  <td>{{ $item->mobile }}</td>
                  <td><span class="badge badge-{{ ($item->role == 'writer') ? 'success' : 'primary' }}">{{ ($item->role == 'writer') ? 'نویسنده' : 'ادمین' }}</span></td>
                  <td>{{ $item->created_at }}</td>
                  <td>
                    <div class="d-flex">
                    <a href="{{ route('admin.user.edit', $item->id) }}" class="btn btn-outline-info ml-2"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('admin.user.delete', $item->id) }}" method="POST">
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
@endsection