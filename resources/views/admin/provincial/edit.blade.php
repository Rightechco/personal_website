@extends('admin.layouts.master')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.head', ['mainPangeName' => 'اخبار استانی', 'pageName' => 'ویرایش خبر'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ویرایش خبر</h3>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('admin.provincial.update', $provincialnews->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>عنوان خبر</label>
                                <input type="text" name="title" class="form-control" value="{{ $provincialnews->title }}">
                            </div>
                            @error('title')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>خلاصه خبر</label>
                                <textarea name="summary" class="ckeditor form-control">{{ $provincialnews->summary }}</textarea>
                            </div>
                            @error('summary')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>تصویر</label>
                                <input type="file" class="form-control" name="image" id="imgInp" accept="image/*">
                                <img id="blah" class="mt-2" src="{{ $provincialnews->image }}" alt="your image" width="100px"/>
                            </div>
                            @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>توضیحات</label>
                                <textarea name="description" rows="10" class="form-control">@php foreach(json_decode($provincialnews->description) as $desc) { echo $desc."\n"; } @endphp</textarea>
                            </div>
                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
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
    // preview image before upload
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection