@extends('layouts.app')

@section('content')
<div class="layout-px-spacing">

<div class="seperator-header layout-top-spacing ">
    <h3 class="">Change Password</h3>
</div>

<div class="row layout-top-spacing" id="cancel-row">
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget-content widget-content-area br-6 p-4">
            <div class="col-lg-11">
            <form style="min-height:500px;" id="password_form" method="PUT" action="{{route('change-password')}}">
                @csrf
                <div class="form-group row mb-4">
                    <label for="name" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Current Password<span style="color:red;">*</span></label>
                    <div class="col-xl-5 col-lg-9 col-sm-10">
                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter Current Password">
                    </div>
                </div> 
                <div class="form-group row mb-4">
                    <label for="name" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">New Password<span style="color:red;">*</span></label>
                    <div class="col-xl-5 col-lg-9 col-sm-10">
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password">
                    </div>
                </div> 
                <div class="form-group row mb-4">
                    <label for="name" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Confirm Password<span style="color:red;">*</span></label>
                    <div class="col-xl-5 col-lg-9 col-sm-10">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Enter Confirm Password">
                    </div>
                </div> 


                <div class="form-group row">
                    <div class="col-sm-2">&nbsp;</div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary mt-3 submit_password_form">Update</button>
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

    $(document).on('click', '.submit_password_form', function (e) {
        e.preventDefault();
            $.validator.addMethod("notEqualTo", function(value, element, param){
            return this.optional(element) || value != param;
        },"The new password you've entered is the same as your old password.Enter a diffrent password");
        $("form#password_form").validate({
            rules: {
                current_password: { required: true, },
                new_password : {
                    required: true,
                    minlength : 6,
                    maxlength : 18,
                    notEqualTo : function(){return $('#current_password').val()}

                },
                confirm_password : {
                    required: true,
                    minlength : 6,
                    maxlength : 18,
                    equalTo : "#new_password"
                }
            },
            messages: {
                current_password: { required: "Please enter current password",},
                new_password: { 
                    required: "Please enter new password",
                    minlength: "Please enter minimum 6 characters",
                    maxlength: "Maximum of 18 characters allowed",
                },
                confirm_password: { 
                    required: "Please enter confirm password",
                    minlength: "Please enter minimum 6 characters",
                    maxlength: "Maximum of 18 characters allowed",
                    equalTo:'New password and confirmation password not match'
                },

            },

            focusInvalid: true,
            invalidHandler: function () {
                $(this).find(":input.error:first").focus();
            }
        });
        if ($("form#password_form").valid()) {
            $("form#password_form").submit();
        }
    });
});
</script>
@endsection