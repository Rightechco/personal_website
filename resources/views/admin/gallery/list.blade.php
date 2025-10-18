@extends('admin.layouts.master')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.head', ['mainPangeName' => 'گالری', 'pageName' => 'لیست گالری'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          @include('admin.partials.alert', ['type' => 'success', 'sessionName' => 'storeGallery'])
          @include('admin.partials.alert', ['type' => 'info', 'sessionName' => 'updateGallery'])
          @include('admin.partials.alert', ['type' => 'warning', 'sessionName' => 'deleteGallery'])
          <div class="card">
            <div class="card-header">
              <div class="d-flex justify-content-between">
                <h3 class="card-title">لیست گالری</h3>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>عنوان</th>
                  <th>تصویر</th>
                  <th>ویدیو</th>
                  <th>نوع گالری</th>
                  <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($galleries as $key => $item)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $item->title ?? '---' }}</td>
                  <td>
                    @if(!empty($item->image))
                    <img src="{{ asset('uploads/gallery/'.$item->image) }}" width="80px">
                    @else
                    ---
                    @endif
                  </td>
                  <td>{!! $item->link ?? '---' !!}</td>
                  <td>{{ ($item->type == 1) ? 'تصویر' : 'ویدیو' }}</td>
                  <td>
                    <div class="d-flex">
                    <a href="{{ route('admin.gallery.edit', $item->id) }}" class="btn btn-outline-info ml-2"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('admin.gallery.delete', $item->id) }}" method="POST">
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