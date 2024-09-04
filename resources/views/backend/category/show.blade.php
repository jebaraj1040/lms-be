@extends('layouts.app')

@section('content')
<link href="{{ url('/') }}/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
<div class="layout-px-spacing">

<div class="seperator-header layout-top-spacing ">
    <h3 class="">Add Product Category</h3>
</div>

<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget-content widget-content-area br-6 p-4">
            <div class="col-lg-11">
            <form style="min-height:500px;" id="unit_add_edit_form" method="POST" action="{{route('admin.categories.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mb-4">
                    <label for="name" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Name <span style="color:red;">*</span></label>
                    <div class="col-xl-8 col-lg-9 col-sm-10">
                        <input type="text" class="form-control alphabets" id="name" maxlength="50" name="name" placeholder="Enter name" value="{{$category->name}}" readonly>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="product" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Category
                        Description </label>
                    <div class="col-xl-8 col-lg-9 col-sm-10">
                        <textarea id="category_description" name="category_description">{{$category->description}}</textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Image <span style="color:red;">*</span></label>
                    <div class="col-xl-8 col-lg-9 col-sm-10">
                    <img src="{{url('/')}}/uploads/category_images/{{$category->images}}" class="thumbnail" style="width: 100%;" id="editor" />
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="name" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Status <span style="color:red;">*</span></label>
                    <div class="col-xl-8 col-lg-9 col-sm-10">
                        <select name="status" class="form-control" >
                            <option value="1" {{$category->status==1?'selected':''}}>Active</option>
                            <option value="0" {{$category->status==0?'selected':''}}>Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">&nbsp;</div>
                    <div class="col-sm-10">
                        <a href="{{ route('admin.categories.index') }}" type="submit" class="btn btn-dark mt-3">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
</div>
@endsection
@section('javascript')
<script src="{{ url('/') }}/assets/js/scrollspyNav.js"></script>
<script src="{{ url('/') }}/plugins/file-upload/file-upload-with-preview.min.js"></script>
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    CKEDITOR.replace('category_description');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
$(document).on('click','.removeimage',function(){
            $('form#unit_add_edit_form').validate();
            $('#category_image').rules('add',  { required: true , messages : { required : 'Please upload image' }});
            
});
$(document).ready(function () {
    $(document).on('click', '.submit_unit_form', function (e) {
        e.preventDefault();
        $("form#unit_add_edit_form").validate({
            rules: {
                name: { required: true, maxlength:50},
                category_image: {required: true},
            },
            messages: {
                name: { required: "Please enter name",maxlength:"Please enter maximum 50 characters"},
                category_image:{required:"Please upload image"},               
            },
            focusInvalid: true,
            invalidHandler: function () {
                $(this).find(":input.error:first").focus();
            }
        });
        if ($("form#unit_add_edit_form").valid()) {
            $("form#unit_add_edit_form").submit();
        }
    });
});
var firstUpload = new FileUploadWithPreview("myFirstImage");
</script>
@endsection