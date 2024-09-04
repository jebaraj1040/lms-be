@extends('layouts.app')

@section('content')
<div class="layout-px-spacing">

<div class="seperator-header layout-top-spacing ">
    <h3 class="">Profile Update</h3>
</div>

<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget-content widget-content-area br-6 p-4">
            <div class="col-lg-11">
            <form style="min-height:500px;" id="unit_add_edit_form" method="post" action="{{route('profile-update')}}">
                @csrf
                <div class="form-group row mb-4">
                    <label for="name" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">First Name <span style="color:red;">*</span></label>
                    <div class="col-xl-5 col-lg-9 col-sm-10">
                        <input type="text" class="form-control" id="first_name" name="first_name" maxlength="50" placeholder="Enter first name" value="{{old('first_name',$senddata->first_name)}}">
                        @error('first_name')
                            <label for="first_name" class="error" role="alert">{{ $message }}</label>
                        @enderror
                    </div>
                </div>   
                <div class="form-group row mb-4">
                    <label for="name" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Last Name <span style="color:red;">*</span></label>
                    <div class="col-xl-5 col-lg-9 col-sm-10">
                        <input type="text" class="form-control" id="last_name" name="last_name" maxlength="50" placeholder="Enter last name" value="{{old('last_name',$senddata->last_name)}}">
                        @error('last_name')
                            <label for="last_name" class="error" role="alert">{{ $message }}</label>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="name" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">User name <span style="color:red;">*</span></label>
                    <div class="col-xl-5 col-lg-9 col-sm-10">
                        <input type="text" class="form-control" id="user_name" name="user_name" maxlength="50" placeholder="Enter username" value="{{old('user_name',$senddata->username)}}" readonly>
                        @error('user_name')
                            <label for="user_name" class="error" role="alert">{{ $message }}</label>
                        @enderror
                    </div>
                </div>    
                <div class="form-group row mb-4">
                    <label for="name" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Email <span style="color:red;">*</span></label>
                    <div class="col-xl-5 col-lg-9 col-sm-10">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email ID" value="{{old('email',$senddata->email)}}" readonly>
                    </div>
                </div>  



                <div class="form-group row">
                    <div class="col-sm-2">&nbsp;</div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary mt-3 submit_unit_form">{{ ($senddata->id != '') ? 'Update' : 'Save' }}</button>
                        <a href="{{route('admin-home')}}" type="submit" class="btn btn-dark mt-3">Cancel</a>
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
<script type="text/javascript">

$(document).ready(function () {
    $(document).on('click', '.submit_unit_form', function (e) {
        e.preventDefault();
        $("form#unit_add_edit_form").validate({
            rules: {
                first_name: { required: true, maxlength:50},
                last_name: { required: true, maxlength:50},
                user_name :{required : true , maxlength:50},
            },
            messages: {
                first_name: { required: "Please enter first name", maxlength:"Please enter maximum 50 characters"},   
                last_name: { required: "Please enter last name", maxlength:"Please enter maximum 50 characters"},
                user_name: { required: "Please enter username", maxlength:"Please enter maximum 50 characters"},
                email:{required :"Please enter company email",email:"Please enter valid  company email"},               
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
</script>
@endsection