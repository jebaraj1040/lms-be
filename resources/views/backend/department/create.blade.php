@extends('layouts.app')

@section('content')
<link href="{{ url('/') }}/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
<div class="layout-px-spacing">

<div class="seperator-header layout-top-spacing ">
    <h3 class="">Add Department</h3>
</div>

<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget-content widget-content-area br-6 p-4">
            <div class="col-lg-11">
            <form style="min-height:500px;" id="department_create_form" method="POST" action="{{route('admin.departments.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row mb-4">
                    <label for="name" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Name <span style="color:red;">*</span></label>
                    <div class="col-xl-8 col-lg-9 col-sm-10">
                        <input type="text" class="form-control alphabets" id="name" maxlength="50" name="name" placeholder="Enter name" value="{{old('name')}}">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="name" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Status <span style="color:red;">*</span></label>
                    <div class="col-xl-8 col-lg-9 col-sm-10">
                        <select name="status" class="form-control" >
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-2">&nbsp;</div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary mt-3 submit_department_form">Save</button>
                        <a href="{{ route('admin.departments.index') }}" type="submit" class="btn btn-dark mt-3">Cancel</a>
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
<script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
$(document).ready(function () {
    $(document).on('click', '.submit_department_form', function (e) {
        e.preventDefault();
        $("form#department_create_form").validate({
            rules: {
                name: { required: true, maxlength:50},
                description: { required: function(textarea) {
                            CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                            var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                            return editorcontent.length === 0;
                        }
                    },
            },
            messages: {
                name: { required: "Please enter name",maxlength:"Please enter maximum 50 characters"},           
            },
            focusInvalid: true,
            invalidHandler: function () {
                $(this).find(":input.error:first").focus();
            }
        });
        if ($("form#department_create_form").valid()) {
            $("form#department_create_form").submit();
        }
    });
});
</script>
@endsection