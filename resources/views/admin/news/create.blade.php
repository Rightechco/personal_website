@extends('admin.layouts.master')
@section('styles')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        background-color: #007bff !important; border-color: #006fe6 !important; padding: 1px 10px !important; color: #fff !important;
    }
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.head', ['mainPangeName' => 'اخبار', 'pageName' => 'افزودن خبر'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">افزودن خبر</h3>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>عنوان خبر</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            </div>
                            @error('title')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>انتخاب دسته بندی</label>
                                <select class="form-control select2" name="category_id" style="width: 100%;">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>تصویر</label>
                                <input type="file" class="form-control" name="image" id="imgInp" accept="image/*">
                                <img id="blah" class="mt-2" src="{{ asset('admin/dist/img/img.png') }}" alt="your image" width="100px"/>
                            </div>
                            @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>انتخاب برچسب</label>
                                <select class="form-control select2" name="tag[]" multiple="multiple" 
                                        data-placeholder="انتخاب برچسب" style="width: 100%;text-align: right">
                                    @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach 
                                </select>
                            </div>
                            @error('tag')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>وضعیت انتشار</label><br>
                                <label class="ml-5"><input type="radio" name="status" class="minimal" value="1">
                                    <span class="text-success">منتشر شود</span>
                                </label>
                                <label><input type="radio" name="status" class="minimal" value="0">
                                    <span class="text-danger">منتشر نشود</span>
                                </label>
                            </div>
                            @error('status')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>نوع خبر</label><br>
                                <input type="checkbox" name="special" class="flat-red ml-2">ویژه
                            </div>
                            @error('special')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>توضیحات</label>
                                <textarea name="description" id="kt_docs_tinymce_hidden" class="ckeditor form-control"></textarea>
                            </div>
                            @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">ذخیره</button>
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
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.5.1/tinymce.min.js"></script>
<script>
    // ckeditor
    tinymce.init({selector: "#kt_docs_tinymce_hidden", height : "380",
        toolbar: ["styleselect fontselect fontsizeselect",
        "undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify",
        "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code"],
    });
    // select 2 form
    $(document).ready(function() {
        $('.select2').select2()
    });
    // preview image before upload
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection