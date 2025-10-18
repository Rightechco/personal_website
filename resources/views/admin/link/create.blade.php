@extends('admin.layouts.master')
@section('styles')
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('admin.partials.head', ['mainPangeName' => 'لینک ها', 'pageName' => 'افزودن لینک ها'])
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">افزودن لینک</h3>
              </div>
              <!-- /.card-header -->
              <form action="{{ route('admin.link.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>لینک</label>
                                <input type="text" name="external_link" class="form-control" value="{{ old('external_link') }}">
                            </div>
                            @error('external_link')<span class="text-danger">{{ $message }}<span>@enderror
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>تصویر</label>
                                <input type="file" class="form-control" name="image" id="imgInp" accept="image/*">
                                <img id="blah" class="mt-2" src="{{ asset('admin/dist/img/img.png') }}" alt="your image" width="120px"/>
                            </div>
                            @error('image')<span class="text-danger">{{ $message }}</span>@enderror
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
<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection