
@extends('layouts.auth')
@section('content')
<div class="form-container outer">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                {{--<div class="logo-content">
                    <img src="{{url('/')}}/uploads/setting/<?php echo $settings->id; ?>/<?php echo $settings->company_logo; ?>" alt="logo-image" class="img-fluid">
                </div> --}}
                    <p class="text-dark sign-text">Sign in</p>
                    {{-- Success Alert --}}
                    @if(session('status'))
                    <div class="alert alert-success alert-dismissible show" role="alert">
                        {{session('status.msg')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    {{-- Error Alert --}}
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible show" role="alert">
                        {{session('error.msg')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form class="text-left" id="login_form" method="POST" action="{{ route('admin.check') }}" autocomplete="off">
                        @csrf
                        <div class="form">

                            <div id="username-field" class="field-wrapper input">
                                <label for="email">E-MAIL</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <input id="email" name="email" type="text" class="form-control" placeholder="Enter user email"  maxlength="60">
                                @error('email')
                                    <label for="email" class="error" role="alert">
                                      {{ $message }}
                                    </label>
                                @enderror
                            </div>

                            <div id="password-field" class="field-wrapper input mb-2">
                                <div class="d-flex justify-content-between">
                                    <label for="password">PASSWORD</label>

                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                </svg>
                                <input id="password" name="password" type="password" class="form-control" placeholder="Enter password" maxlength="15">
                                @error('password')
                                    <label for="password" class="error" role="alert">
                                      {{ $message }}
                                    </label>
                                @enderror

                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="password-icon feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                    <line style="display:none;" class="passwordToggle" x1="1" y1="1" x2="23" y2="23"></line>
                                </svg>
                            </div>
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button class="btn btn-primary submit_login_form" style="width: 100%; padding: 15px;">Sign in</button>
                                </div>
                            </div>


                            <!-- <p class="signup-link">Not registered ? <a href="#">Create an account</a></p>-->

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script>
    $('body').on('click', '.password-icon', function() {
        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
            $(".passwordToggle").css('display', 'block');
        } else {
            x.type = "password";
            $(".passwordToggle").css('display', 'none');
        }
    });
</script>
@endsection