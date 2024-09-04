@extends('layouts.app')

@section('content')
<link href="{{ url('/') }}/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
<div class="layout-px-spacing">
    <div class="seperator-header layout-top-spacing ">
        <h3 class="">View Employee Details</h3>
    </div>
    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6 p-4">
                <div class="col-lg-11">
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2"> Employee Name </span> : <span class="mr-2">{{$employees->name}}</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2"> Employee Code </span> : <span class="mr-2">{{$employees->code}}</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2"> Contact Number </span> : <span class="mr-2">{{$employees->contact_no}}</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2"> Employee Email </span> : <span class="mr-2">{{$employees->email}}</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2"> Designation </span> : <span class="mr-2">{{$employees->designation}}</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Skill Set </span> : <span class="mr-2">{{$employees->skills}}</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Total Experience </span> : <span class="mr-2">{{$employees->total_experience}}</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Relevant Experience </span> : <span class="mr-2">{{$employees->relevant_experience}}</span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Current CTC </span> : <span class="mr-2"> {{$employees->current_ctc}} </span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Expected CTC </span> : <span class="mr-2"> {{$employees->expected_ctc}} </span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Last Reason For Resignation </span> : <span class="mr-2"> {{$employees->last_reason_resignation}} </span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2"> Location </span> : <span class="mr-2"> {{$employees->location}} </span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Notice Period </span> : <span class="mr-2"> {{$employees->notice_period}} </span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">CRI Past Six Months </span> : <span class="mr-2"> {{$employees->cri_past_six_month}} </span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Acquaintances In CRI  </span> : <span class="mr-2"> {{$employees->acquaintances_in_cri}} </span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Family Background </span> : <span class="mr-2"> {{$employees->family_backgroud}} </span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Profile Image </span> : <span class="mr-2"> {{$employees->image}} </span>
                        </div>
                    </div>
                    <div class="d-flex p-2">  
                        <div class="p-2">
                            <span class="mr-2">Status </span> : <span class="mr-2"> {{($employees->status)?'Active':'Inactive'}} </span>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-10">
                            <div class="float-right">
                                <a href="{{ route('admin.employees.index') }}" type="submit" class="btn btn-dark mt-3">Cancel</a>
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