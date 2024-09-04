@extends('layouts.app')

@section('content')
    <style>
        .specifications-row > td{
            vertical-align:bottom;
        }
        .prices-row> td{
            vertical-align:top;
        }
    </style>
    <link href="{{ url('/') }}/plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">
    <link href="{{ url('/') }}/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet"
        type="text/css" />
    <div class="layout-px-spacing">

        <div class="seperator-header layout-top-spacing ">
            <h3 class=""> Add Course</h3>
        </div>

        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6 p-4">
                    <div class="col-lg-11">
                        <form method="POST" id="course_edit_form" enctype="multipart/form-data"
                            action="{{route('admin.courses.update',$course->id)}}">
                            @csrf()
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label for="product" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Course Title <span class="redC">*</span></label>
                                <div class="col-xl-8 col-lg-9 col-sm-10">
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter course title"
                                        value="{{old('title',$course->title) }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="product" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Course Duration <span class="redC">*</span></label>
                                <div class="col-xl-8 col-lg-9 col-sm-10">
                                    <input type="number" class="form-control" min="0" id="duration" name="duration" placeholder="Enter course duration"
                                        value="{{old('duration',$course->duration) }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="product" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Course Meta Title <span class="redC">*</span></label>
                                <div class="col-xl-8 col-lg-9 col-sm-10">
                                    <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter course meta title"
                                        value="{{old('meta_title',$course->meta_title) }}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="product" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Department<span class="redC">*</span></label>
                                <div class="col-xl-8 col-lg-9 col-sm-10">
                                    <select id="department_id" name="department_id" class="form-control">
                                        <option value="" {{(old('department_id',$course->department_id)=='')?'selected':''}}>Select Department</option>
                                        @if ($departments)
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}"
                                                {{(old('department_id',$course->department_id)==$department->id)?'selected':''}}>
                                                    {{ $department->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="product" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Course
                                    Category <span class="redC">*</span></label>
                                <div class="col-xl-8 col-lg-9 col-sm-10">
                                    <select id="category_id" name="category_id" class="form-control">
                                    <option value="">Select course category</option>
                                        <option value="" {{(old('category_id',$course->category_id)=='')?'selected':''}}>Select category</option>
                                        @if ($categories)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                {{(old('category_id',$course->category_id)==$category->id)?'selected':''}}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-4">
                                <label for="details" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Course Details<span class="redC">*</span></label>
                                <div class="col-xl-8 col-lg-9 col-sm-10">
                                    <textarea id="details" name="details" class="details">{{ old('details',$course->details) }}</textarea>
                                    <label id="details-error" class="error" for="details"></label>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="meta_description" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Course Meta Description<span class="redC">*</span></label>
                                <div class="col-xl-8 col-lg-9 col-sm-10">
                                    <textarea id="meta_description" name="meta_description" class="meta_description">{{ old('meta_description',$course->meta_description) }}</textarea>
                                    <label id="meta_description-error" class="error" for="meta_description"></label>
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="product" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Course Image <span class="redC">*</span></label>
                                <div class="col-xl-8 col-lg-9 col-sm-10">
                                    <div id="fuSingleFile" class="layout-spacing">
                                        <div class="statbox widget box box-shadow">

                                            <div class="widget-content widget-content-area">
                                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                                    <label>Upload Course Image <a href="javascript:void(0)"
                                                            class="custom-file-container__image-clear removeimage"
                                                            title="Clear Image">x</a></label>
                                                    <label class="custom-file-container__custom-file">
                                                        <input type="file"
                                                            class="custom-file-container__custom-file__custom-file-input"
                                                            accept="image/*" name="image" id="image">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                        <span
                                                            class="custom-file-container__custom-file__custom-file-control"></span>
                                                    </label>
                                                    <label for="image" class="error" style="display:nblone;"></label>
                                                    <div class="custom-file-container__image-preview">
                                                        <a href="javascript:void(0)" class="custom-file-container__image-clear text-danger removeimage" style="position: absolute;top: 100px;right: 0px;display:none" title="Remove Image">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                                <code>Note: Accept only Image jpg, jpeg, png & Maximum file size 5 MB</code>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="product" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Video URL </label>
                                <div class="col-xl-8 col-lg-9 col-sm-10">
                                    <input type="text" class="form-control" id="video_url" name="video_url" placeholder="Enter video url"
                                        value="{{old('video_url',$course->video_url) }}">
                                </div>

                            </div>
                            <div class="form-group row mb-4">    
                                <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Featured Status</label>
                                <div class="col-xl-8 col-lg-9 col-sm-10">
                                    <select name="featured_status" class="form-control" >
                                        <option value="1" {{(old('featured_status',$course->featured_status)=='1')?'selected':''}}>Active</option>
                                        <option value="0" {{(old('featured_status',$course->featured_status)=='0')?'selected':''}}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">    
                                <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Published Status</label>
                                <div class="col-xl-8 col-lg-9 col-sm-10">
                                    <select name="published" class="form-control" >
                                        <option value="1" {{(old('published',$course->published)=='1')?'selected':''}}>Active</option>
                                        <option value="0" {{(old('published',$course->published)=='0')?'selected':''}}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">    
                                <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Status</label>
                                <div class="col-xl-8 col-lg-9 col-sm-10">
                                    <select name="status" class="form-control" >
                                        <option value="1" {{(old('status',$course->status)=='1')?'selected':''}}>Active</option>
                                        <option value="0" {{(old('status',$course->status)=='0')?'selected':''}}>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            

                            <div class="form-group row">
                                <div class="col-sm-2">&nbsp;</div>
                                <div class="col-sm-10">
                                    <button type="submit" class="submit_course_form btn btn-primary mt-3">Save</button>
                                    <a href="{{ route('admin.courses.index') }}" class="btn btn-dark mt-3">Cancel</a>
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
    <script src="{{ url('/') }}/plugins/blockui/jquery.blockUI.min.js"></script>
    <script src="{{ url('/') }}/assets/js/scrollspyNav.js"></script>
    <script src="{{ url('/') }}/plugins/file-upload/file-upload-with-preview.min.js"></script>
    <script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('details');
        CKEDITOR.replace('meta_description');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var firstUpload = new FileUploadWithPreview("myFirstImage",{
        @if($course->id!="")
            @php
                $course_image_path = asset('/course_image/') . '/' . $course->image;
            @endphp
        presetFiles: ["{{ $course_image_path }}",], @endif });
        function isFile(input) {
            if ('File' in window && input instanceof File)
                return true;
            else return false;
        }

        function isBlob(input) {
            if ('Blob' in window && input instanceof Blob)
                return true;
            else return false;
        }
        $(document).on('click','.removeimage',function(){
            $('form#course_edit_form').validate();
            $('#image').rules('add',  { required: true , messages : { required : 'Please upload valid course image' }});
            
        });

        $(document).on('click', '.submit_course_form', function (e) {
            e.preventDefault();
            $("form#course_edit_form").validate({
                ignore: [],
                rules: {
                    
                    title: { required: true, },
                    meta_title: { required: true},
                    category_id: { required: true, },
                    department_id: { required: true, },
                    meta_description: { required: function(textarea) {
                            CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                            var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                            return editorcontent.length === 0;
                        }
                    },
                    details: {
                        required: function(textarea) {
                            CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                            var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                            return editorcontent.length === 0;
                        }
                    },
                },
                messages: {
                    title: { required: "Please enter course title",maxlength:"Please enter maximum 50 characters"},   
                    meta_title: { required: "Please enter course meta title",maxlength:"Please enter maximum 50 characters"},            
                    category_id:{required:"Please select category"}, 
                    department_id: { required: "Please select department", },
                    details:{required:"Please enter course details"}, 
                    meta_description:{required:"Please enter course meta description"}, 
                },
            errorPlacement:function(error,element){
                console.log("input element",element);
                if(element.is(":radio"))
                {
                    error.insertAfter(element.parents('checkboxsequence'));
                }
                else if(element.is(":checkbox")){
                    error.appendTo(element.parents('.checkboxsequence'));
                }
                else{
                    error.insertAfter(element);
                }
            },
                focusInvalid: true,
                invalidHandler: function () {
                    $(this).find(":input.error:first").focus();
                },
            });
            if ($("form#course_edit_form").valid()) {
                $("form#course_edit_form").submit();
            }
        });
    </script>
@endsection
