<div class="modal fade" id="kt_modal_add_tag" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">افزودن برچسب</h5>
                <button type="button" class="close text-end " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.tag.store') }}" method="POST" id="validation-form">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>نام برچسب</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        @error('name')<span class="text-danger">{{ $message }}<span>@enderror
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-primary">ذخیره</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>