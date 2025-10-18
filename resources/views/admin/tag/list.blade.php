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
    @include('admin.partials.head', ['mainPangeName' => 'برچسب ها', 'pageName' => 'لیست برچسب ها'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          @include('admin.partials.alert', ['type' => 'success', 'sessionName' => 'storeTag'])
          @include('admin.partials.alert', ['type' => 'warning', 'sessionName' => 'deleteTag'])
          <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">لیست برچسب ها</h3>
                    <button button type="button" data-toggle="modal" data-target="#kt_modal_add_tag"
                            class="btn btn-primary">افزودن برچسب</button>
                    @include('admin.tag.modal-add-tag')
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="kt_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>عنوان</th>
                  <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tags as $key => $item)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $item->name }}</td>
                  <td>
                    <div class="d-flex">
                    <form action="{{ route('admin.tag.delete', $item->id) }}" method="POST">
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