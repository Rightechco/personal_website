@extends('admin.layouts.master')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.head', ['mainPangeName' => 'گالری', 'pageName' => 'ویرایش گالری'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">ویرایش گالری</h3>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('admin.gallery.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>نوع گالری</label>
                                <select name="type" disabled class="form-control">
                                    <option @if($gallery->type == 1) selected @endif value="1">گالری تصاویر</option>
                                    <option @if($gallery->type == 2) selected @endif value="2">گالری ویدیو</option>
                                </select>
                            </div>
                            @error('type')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        @if($gallery->type == 1)
                        <div class="col-6">
                            <div class="form-group">
                                <label>عنوان</label>
                                <input type="text" name="title" class="form-control" value="{{ $gallery->title }}">
                            </div>
                            @error('title')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>تصویر</label>
                                <input type="file" class="form-control" name="image" id="imgInp" accept="image/*">
                                <img id="blah" class="mt-2" src="{{ asset('uploads/gallery/'.$gallery->image) }}" width="120px"/>
                            </div>
                            @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        @elseif($gallery->type == 2)
                        <div class="col-6">
                            <div class="form-group">
                                <label>لینک</label>
                                <textarea name="link" rows="10" class="form-control">{{ $gallery->link }}</textarea>
                            </div>
                            @error('link')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        @endif
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
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection