@extends('admin.layouts.master')
@section('styles')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.css') }}">
<style>
    label.error { color: #dc3545; font-size: 12px; margin-top: 10px; }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.head', ['mainPangeName' => 'دسته بندی ها', 'pageName' => 'لیست دسته بندی ها'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          @include('admin.partials.alert', ['type' => 'success', 'sessionName' => 'storeCategory'])
          @include('admin.partials.alert', ['type' => 'info', 'sessionName' => 'updateCategory'])
          @include('admin.partials.alert', ['type' => 'warning', 'sessionName' => 'deleteCategory'])
          <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">لیست دسته بندی ها</h3>
                    <button button type="button" data-toggle="modal" data-target="#kt_modal_add_category"
                            class="btn btn-primary">افزودن دسته بندی</button>
                    @include('admin.category.modal-add-category')
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="kt_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>نام دسته</th>
                  <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $key => $item)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $item->name }}</td>
                  <td>
                    <div class="d-flex">
                    <button button type="button" data-toggle="modal" data-target="#kt_modal_edit_category{{ $item->id }}"
                            class="btn btn-outline-info ml-2"><i class="fa fa-edit"></i></button>
                    @include('admin.category.modal-edit-category', ['category' => $item])
                    <form action="{{ route('admin.category.delete', $item->id) }}" method="POST">
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
<script src="{{ asset('admin/dist/js/jquery.validate.js') }}"></script>
<script src="{{ asset('admin/dist/js/items-validation.js') }}"></script>
@endsection