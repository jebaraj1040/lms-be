@extends('layouts.app')

@section('content')
<link href="{{ url('/') }}/plugins/file-upload/file-upload-with-preview.min.css" rel="stylesheet" type="text/css" />
<div class="layout-px-spacing">

    <div class="seperator-header layout-top-spacing ">
        <h3 class="">Edit Employee</h3>
    </div>

    <div class="row layout-top-spacing" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6 p-4">
                <div class="col-lg-11">
                    <form style="min-height:500px;" id="edit_employee_form" method="POST" action="{{route('admin.employees.update',$employees->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-4">
                            <label for="name" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Employee Name <span style="color:red;">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                                <input type="text" class="form-control alphabets" id="name" maxlength="50" name="name" placeholder="Enter name" value="{{old('name',$employees->name)}}">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="code" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Employee Code <span style="color:red;">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="code" name="code" value="{{old('code',$employees->code)}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="contact_no" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Employee Contact Number <span style="color:red;">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                            <input type="tel" class="form-control" id="contact_no" name="contact_no" value="{{old('contact_no',$employees->contact_no)}}" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="email" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Employee Email <span style="color:red;">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="{{old('email',$employees->email)}}" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="designation" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Employee Designation <span style="color:red;">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                            <input type="text" class="form-control alphabets" id="designation" name="designation" value="{{old('designation',$employees->designation)}}" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="product" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Department<span class="redC">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                                <select id="department_id" name="department_id" class="form-control">
                                    <option value="" {{(old('role_id',$employees->department_id)=='')?'selected':''}}>Select Department</option>
                                    @if ($departments)
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}"
                                            {{(old('department_id',$employees->department_id)==$department->id)?'selected':''}}>
                                                {{ $department->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="product" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">User Role<span class="redC">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                                <select id="role_id" name="role_id" class="form-control">
                                    <option value="" {{(old('role_id',$employees->role_id)=='')?'selected':''}}>Select Role</option>
                                    @if ($roles)
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                            {{(old('role_id',$employees->role_id)==$role->id)?'selected':''}}>
                                                {{ $role->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="skills" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Employee Skill Set <span style="color:red;">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                            <input type="text" class="form-control alphabets" id="skills" name="skills" value="{{old('skills',$employees->skills)}}" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="total_experience" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Employee Total Experience <span style="color:red;">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="total_experience" name="total_experience" value="{{old('total_experience',$employees->total_experience)}}" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="relevant_experience" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Employee Relevant Experience</label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="relevant_experience" name="relevant_experience" value="{{old('relevant_experience',$employees->relevant_experience)}}" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="current_ctc" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Employee Current CTC <span style="color:red;">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="current_ctc" name="current_ctc" value="{{old('current_ctc',$employees->current_ctc)}}" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="expected_ctc" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Employee Expected CTC</label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                                <input type="text" class="form-control" id="expected_ctc" name="expected_ctc" value="{{old('expected_ctc',$employees->expected_ctc)}}" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="product" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Last Reason For Resignation <span style="color:red;">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                                <textarea id="last_reason_resignation" name="last_reason_resignation">{{ old('last_reason_resignation',$employees->last_reason_resignation) }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="location" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Location <span style="color:red;">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="location" name="location" value="{{old('location',$employees->location)}}" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="notice_period" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Notice Period <span style="color:red;">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="notice_period" name="notice_period" value="{{old('notice_period',$employees->notice_period)}}" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="cri_past_six_month" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">CRI Past Six Months</label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="cri_past_six_month" name="cri_past_six_month" value="{{old('cri_past_six_month',$employees->cri_past_six_month)}}" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="acquaintances_in_cri" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Acquaintances In CRI</label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                            <input type="text" class="form-control" id="acquaintances_in_cri" name="acquaintances_in_cri" value="{{old('acquaintances_in_cri',$employees->acquaintances_in_cri)}}" >
                            </div>
                        </div>
                        <!-- <div class="form-group row mb-4">
                            <label for="family_backgroud" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Family Background</label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                                <input type="text" class="form-control" id="family_backgroud" name="family_backgroud" value="{{old('family_backgroud',$employees->family_backgroud)}}" >
                            </div>
                        </div> -->
                        <div class="form-group row mb-4">
                            <label class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Profile <span style="color:red;">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                                <div id="fuSingleFile" class="layout-spacing">
                                    <div class="statbox widget box box-shadow">
                                        <div class="widget-content widget-content-area">
                                            <div class="custom-file-container" data-upload-id="myFirstImage">
                                                <label for>Upload Image <a href="javascript:void(0)" 
                                                class="custom-file-container__image-clear removeimage" title="Clear Image">x</a></label>
                                                <label class="custom-file-container__custom-file">
                                                    <input type="file"
                                                        class="custom-file-container__custom-file__custom-file-input"
                                                        accept="image/*" name="employee_image" id="employee_image">
                                                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                                    <span
                                                        class="custom-file-container__custom-file__custom-file-control"></span>
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>
                                            </div>
                                            <code>Note: Accept only Image jpg, jpeg, png & Maximum file size 1 MB</code>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="name" class="col-xl-3 col-sm-3 col-sm-2 col-form-label">Status <span style="color:red;">*</span></label>
                            <div class="col-xl-8 col-lg-9 col-sm-10">
                                <select name="status" class="form-control" >
                                    <option value="1" {{$employees->status==1?"selected":""}}>Active</option>
                                    <option value="0" {{$employees->status==0?"selected":""}}>Inactive</option>
                                    <option value="2" {{$employees->status==2?"selected":""}}>DropOut</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2">&nbsp;</div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mt-3 submit_employee_form">Save</button>
                                <a href="{{ route('admin.employees.index') }}" type="submit" class="btn btn-dark mt-3">Cancel</a>
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
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ url('/') }}/plugins/file-upload/file-upload-with-preview.min.js"></script>
<script type="text/javascript">
        CKEDITOR.replace('last_reason_resignation');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
$(document).on('click','.removeimage',function(){
            $('form#edit_employee_form').validate();
            $('#employee_image').rules('add',  { required: true , messages : { required : 'Please upload image' }});
            
});

        @if($employees->id!="")
            @php
                $employee_image_path = !empty($employees->image)?asset('/employee_profile_image/') . '/' . $employees->image:'';
            @endphp
        @endif
        var presetFiles = @if(!empty($employee_image_path)) ["{{ $employee_image_path }}"] @else [] @endif;
        var firstUpload = new FileUploadWithPreview("myFirstImage",{
            presetFiles: presetFiles });

$(document).ready(function () {
    $(document).on('click', '.submit_employee_form', function (e) {
        e.preventDefault();
        $("form#edit_employee_form").validate({
            rules: {
                name: { required: true, maxlength:50},
                contact_no:{required: true},
                email:{required: true,email:true},
                designation:{required: true},
                skills:{required: true},
                total_experience:{required: true},
                relevant_experience:{required: true},
                current_ctc:{required: true},
                last_reason_resignation: {
                        required: function(textarea) {
                            CKEDITOR.instances[textarea.id].updateElement(); // update textarea
                            var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
                            return editorcontent.length === 0;
                        }
                },
                location:{required: true},
                notice_period:{required: true}
            },
            messages: {
                name: { required: "Please enter name",maxlength:"Please enter maximum 50 characters"},
                email: { required: "Please enter email", email:"Please enter valid email"},
                contact_no: { required: "Please enter contact number", },
                designation:{required: "Please enter designation"},
                skills:{required: "Please enter skill set"},
                total_experience:{required: "Please enter total years of experience"},
                relevant_experience:{required: "Please enter current CTC"},
                last_reason_resignation:{required:"Please enter last resignation reason"},
                location:{required:"Please enter location"},
                notice_period:{required: "Please enter notice period"}
            },
            focusInvalid: true,
            invalidHandler: function () {
                $(this).find(":input.error:first").focus();
            }
        });
        if ($("form#edit_employee_form").valid()) {
            $("form#edit_employee_form").submit();
        }
    });
});
$(document).on('keypress','[type="tel"],[type="numebr"],.contact_no',function(e){
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode == 65 && e.ctrlKey === true) || (e.keyCode >= 35 && e.keyCode <= 39))
        return;
    var charValue = String.fromCharCode(e.keyCode),valid = /^[0-9]+$/.test(charValue);
    if (!valid)
        e.preventDefault();
    this.value = this.value.replace(/\D/g,'');
});
$(document).on('keypress','.alphabets',function(e){
    var keyCode = e.keyCode || e.which;
    var regex = /^[A-Za-z ]+$/;
    console.log(regex.test(String.fromCharCode(keyCode)));
    return regex.test(String.fromCharCode(keyCode));
});
var firstUpload = new FileUploadWithPreview("myFirstImage");
</script>
@endsection