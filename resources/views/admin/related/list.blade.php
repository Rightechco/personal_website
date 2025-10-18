@extends('admin.layouts.master')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.head', ['mainPangeName' => 'لینک ها', 'pageName' => 'لیست لینک های مرتبط'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          @include('admin.partials.alert', ['type' => 'success', 'sessionName' => 'storeRelatedLink'])
          @include('admin.partials.alert', ['type' => 'info', 'sessionName' => 'updateRelatedLink'])
          @include('admin.partials.alert', ['type' => 'warning', 'sessionName' => 'deleteRelatedLink'])
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">لیست لینک ها</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>لینک</th>
                  <th>تصویر</th>
                  <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($relatedlinks as $key => $item)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td><a href="{{ $item->external_link }}" target="_blank">{{ $item->external_link }}</a></td>
                  <td><img src="{{ asset('uploads/related/'.$item->image) }}" width="80px"></td>
                  <td>
                    <div class="d-flex">
                    <a href="{{ route('admin.related.link.edit', $item->id) }}" class="btn btn-outline-info ml-2"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('admin.related.link.delete', $item->id) }}" method="POST">
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
@endsection