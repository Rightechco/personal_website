@extends('admin.layouts.master')
@section('styles')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.css') }}">
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.head', ['mainPangeName' => 'اخبار', 'pageName' => 'لیست اخبار'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          @include('admin.partials.alert', ['type' => 'success', 'sessionName' => 'storeNews'])
          @include('admin.partials.alert', ['type' => 'info', 'sessionName' => 'updateNews'])
          @include('admin.partials.alert', ['type' => 'warning', 'sessionName' => 'deleteNews'])
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">لیست خبرها</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="kt_table" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>دسته بندی</th>
                  <th>برچسب</th>
                  <th>نویسنده</th>
                  <th>عنوان</th>
                  <th>توضیحات</th>
                  <th>تصویر</th>
                  <th>وضعیت انتشار</th>
                  <th>نوع خبر</th>
                  <th>تاریخ ایجاد</th>
                  <th>عملیات</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $key => $item)
                <tr>
                  <td>{{ $key + 1 }}</td>
                  <td>{{ $item->category->name }}</td>
                  <td>
                    @foreach($item->tags as $tag)
                      <span class="badge badge-primary">{{ $tag->name }}</span>
                    @endforeach
                  </td>
                  <td>{{ $item->user->full_name }} <span class="text-warning">({{ ($item->user->role == 'admin') ? 'ادمین' : 'نویسنده' }})</span></td>
                  <td>{{ $item->title }}</td>
                  @php $desc = strip_tags($item->description); @endphp
                  <td>{!! \Str::limit($desc, 30) !!}</td>
                  <td><img src="{{ asset('uploads/news/'.$item->image) }}" width="80px"></td>
                  <td>
                    <span class="badge badge-{{ ($item->status == 1) ? 'success' : 'secondary' }}">
                      {{ ($item->status == 1) ? 'منتشر شده' : 'در حالت انتظار' }}</span>
                  </td>
                  <td>
                    <span class="badge badge-{{ ($item->special == 1) ? 'success' : 'danger' }}">
                      {{ ($item->special == 1) ? 'ویژه' : 'معمولی' }}</span>
                  </td>
                  <td>{{ changeDateToPersian($item->created_at, 'H:i:s') }} - {{ changeDateToPersian($item->created_at, 'Y/m/d') }}</td>
                  <td>
                    <div class="d-flex">
                    <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-outline-info ml-2"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('admin.news.delete', $item->id) }}" method="POST">
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