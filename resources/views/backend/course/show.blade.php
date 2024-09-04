@extends('layouts.app')

@section('content')
<div class="layout-px-spacing">
    <div class="seperator-header layout-top-spacing ">
        <h3 class="">View Course Details</h3>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6 p-4">
                <div class="col-lg-11">
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2"> Course Title </span> : <span class="mr-2">{{$course->title}}</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2"> Course Duration </span> : <span class="mr-2">{{$course->duration}} Days</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2"> Course Meta Title </span> : <span class="mr-2">{{$course->meta_title}}</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2"> Course Details </span> : <span class="mr-2">{!!$course->details!!}</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2"> Course Meta Description </span> : <span class="mr-2">{!!$course->meta_description!!}</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Course Image </span> : <span class="mr-2">
                            <a href="{{asset('course_image/'.$course->image)}}" data-toggle="lightbox" data-width="1280" data-gallery="example-gallery" class="col-sm-4">
                                        <img src="{{asset('course_image/'.$course->image)}}" class="img-fluid" width="100" height="100">
                                    </a>
                                </span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Video URL </span> : <span class="mr-2">{{$course->video_url}}</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Featured Status</span> : <span class="mr-2">{{!empty($course->featured_status)?'Active':'Inactive'}}</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Published Status</span> : <span class="mr-2"> {{!empty($course->published)?'Active':'Inactive'}} </span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Status </span> : <span class="mr-2"> {{!empty($course->published)?'Active':'Inactive'}}  </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-10">
                            <div class="float-right">
                                <a href="{{ route('admin.courses.index') }}" type="submit" class="btn btn-dark mt-3">Cancel</a>
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script src="{{asset('plugins/lightbox-master/dist/ekko-lightbox.js')}}"></script>
<script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox({
            alwaysShowClose: true
        });
    });
</script>
@endsection