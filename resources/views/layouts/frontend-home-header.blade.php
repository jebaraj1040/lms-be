<?php
$settings = DB::table('settings')->first();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- title -->
        <title>E-Regio</title>
        <meta name="description" content="A best clean, modern, stylish, creative, responsive theme for different eCommerce business or industries."/>
        <meta name="keywords" content="organic food theme, vegetables, foof store, eCommerce html template, responsive, electronics store, furniture wood, fashion, furniture, mobile, watches, electronics, computers accessories, toys, jewellery, restaurant accessories"/>
        <meta name="author" content="spacingtech_webify">
        <!-- favicon -->
        <link rel="shortcut icon" type="{{asset('frontend-assets/image/favicon')}}" href="image/icon-logo.jpg">
        <!-- bootstrap -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/bootstrap.min.css')}}">
        <!-- simple-line icon -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/simple-line-icons.css')}}">
        <!-- font-awesome icon -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/font-awesome.min.css')}}">
        <!-- themify icon -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/themify-icons.css')}}">
        <!-- ion icon -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/ionicons.min.css')}}">
        <!-- owl slider -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/owl.theme.default.min.css')}}">
        <!-- swiper -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/swiper.min.css')}}">
        <!-- animation -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/animate.css')}}">
        <!-- style -->
        <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/style7.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('frontend-assets/css/responsive7.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
         <!-- toastr -->
         <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet" type="text/css">
    </head>
    <style>
    label.error{
        color:red !important;
    }
    
    </style>
    <body class="home-7">
        <!-- header start -->
        <header class="header-area">
            <div class="header-main-area">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="header-main">
                                <!-- logo start -->
                                <div class="header-element logo">
                                    <a href="{{url('/')}}/home">
                                        <img src="{{url('/')}}/uploads/setting/<?php echo $settings->id; ?>/<?php echo $settings->company_logo; ?>" alt="logo-image" class="img-fluid">
                                    </a>
                                </div>
                                <!-- logo end -->
                                <!-- main menu start -->
                                
                                <div class="header-element megamenu-content">
                                    <div class="mainwrap">
                                        <ul class="main-menu">
                                            <li class="link-title">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="link-title">
                                                    <span class="sp-link-title">Products</span></a>                               
                                            </li>
                                            <li class="link-title">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="link-title">
                                                    <span class="sp-link-title">Orders</span></a>                               
                                            </li>
                                            <li class="link-title">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="link-title" class="link-title">
                                                    <span class="sp-link-title">Delivery Note</span></a>                             
                                            </li>   
                                            <li class="link-title">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="link-title">
                                                    <span class="sp-link-title">Invoices</span></a>                            
                                            </li>  
                                       
                                        </ul>
                                    </div>
                                </div>
                                <!-- main menu end -->
                               
                                <div class="search-area">
                                    <!-- search start -->
                                 
                                    <!-- search end -->
                                    <div class="header-element right-block-box">
                                        <ul class="shop-element">
                                            <li class="top-home-li">
                                            <div class="eur">
                                                <a href="#" class="btn btn-style1" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Sign in
                                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in">
                                                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                                                        <polyline points="10 17 15 12 10 7"></polyline>
                                                        <line x1="15" y1="12" x2="3" y2="12"></line>
                                                    </svg> -->
                                                </a>
                                                
                                            </div>
                                            </li>
                                            <li class="side-wrap nav-toggler">
                                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent">
                                                <span class="line"></span>
                                                </button>
                                            </li>
                                            <li class="top-home-li">                                              
                                                <div class="r-search">
                                                    <a href="#r-search-modal" class="search-popuup" data-bs-toggle="modal"><i class="ion-ios-search-strong"></i></a>
                                                </div>
                                                <!-- mobile search end -->
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- minicart start -->
            <div class="mini-cart">
                <a href="javascript:void(0)" class="shopping-cart-close"><i class="ion-close-round"></i></a>
                <div class="cart-item-title">
                    <p>
                        <span class="cart-count-desc">There are</span>
                        <span class="cart-count-item bigcounter">4</span>
                        <span class="cart-count-desc">Products</span>
                    </p>
                </div>
                <ul class="cart-item-loop"  id="cart_list">
                </ul>
                <ul class="subtotal-title-area">
                    <li class="subtotal-info">
                        <div class="subtotal-titles">
                            <h6>Sub total:
</h6>
                            <span class="subtotal-price" id="sub_total">0 </span>
                        </div>
                    </li>
                    <li class="mini-cart-btns">
                        <div class="cart-btns">
                            <a href="{{route('cart')}}" class="btn btn-style1"><span>View cart</span></a>
                            <a href="{{route('checkout')}}" class="btn btn-style1"><span>Checkout</span></a>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- minicart end -->
            <!-- mobile menu start -->
            <div class="header-bottom-area">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="main-menu-area">
                                <div class="main-navigation navbar-expand-xl">
                                    <div class="box-header menu-close">
                                        <button class="close-box" type="button"><i class="ion-close-round"></i></button>
                                    </div>
                                    <div class="navbar-collapse" id="navbarContent">
                                        <!-- main-menu start -->
                                        <div class="megamenu-content">
                                            <div class="mainwrap" style="display:@if(Auth::guard('web')->check()) block @else none @endif;">
                                                <ul class="main-menu">
                                                    <li class="link-title">
                                                        <a href="{{route('product')}}" class="link-title">
                                                            <span class="sp-link-title">Products</span>  </a>                               
                                                    </li>
                                                    <li class="link-title">
                                                        <a href="{{route('orders')}}" class="link-title">
                                                            <span class="sp-link-title">Orders</span>   </a>                               
                                                    </li>
                                                    <li class="link-title">
                                                        <a href="{{route('delivery-note')}}" class="link-title">
                                                            <span class="sp-link-title">Delivery Note</span>     </a>                             
                                                    </li>   
                                                    <li class="link-title">
                                                        <a href="{{route('invoices')}}" class="link-title">
                                                            <span class="sp-link-title">Invoices</span>      </a>                            
                                                    </li> 
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- main-menu end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile menu end -->
            <!-- mobile search start -->
            <div class="modal fade" id="r-search-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="m-drop-search">
                                <input type="text" name="search" placeholder="Search products">
                                <button class="search-btn" type="button"><i class="fa fa-search"></i></button>
                            </div>
                            <button type="button" class="close" data-bs-dismiss="modal"><i class="ion-close-round"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile search end -->
        </header>
        <!--header end-->
        @if (session('status'))
        <input type="hidden" id="status_span" data-status="{{ session('status.success') }}" data-msg="{{ session('status.msg') }}">
        @endif
        
        @yield('content')
        @include('layouts.frontend-footer')

      <!-- newsletter pop-up start -->
      
      <div class="vegist-popup modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup-content">
                           
                            <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close" class="close-btn"><i class="ion-close-round"></i></a>
                            <div class="pop-up-newsletter" style="background-image: url(image/news-popup.jpg);">
                                <div class="logo-content">
                                    <a href="{{route('product')}}"><img src="{{asset('frontend-assets/image/footer-logo.png')}}" alt="image" class="img-fluid" width="200"></a>
                                    
                                </div>
                                <form id="login_form" method="post" action="{{route('web.login')}}">
                                    @csrf
                                    <div class="subscribe-area">
                                        <label>Email Address</label>
                                        <input type="text" name="email" id="email" placeholder="Enter email address">

                                        <label>Password</label>
                                        <input type="password" name="password" id="password_login" placeholder="Enter password">

                                        <div class="col-lg-12 text-end">
                                        <a href="#" class="forgot" data-bs-toggle="modal" data-bs-target="#forgetPasswordModel" data-bs-dismiss="modal">Forgot your password?</a>
                                        </div>
                                        <button type="submit" class="btn btn-style1 submit_login_form"><span>Login</span></button>
                                        <span>new customer ?</span><a href="{{route('register')}}" class="text-primary"> Sign up</a>
                                    </div>
                                </form>
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- forget password model -->
        <div class="vegist-popup modal fade" id="forgetPasswordModel" tabindex="-1" role="dialog" aria-labelledby="forgetPasswordModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="popup-content">
                           
                            <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close" class="close-btn"><i class="ion-close-round"></i></a>
                          
                            <div class="pop-up-newsletter" style="background-image: url(frontend-assets/image/news-popup.jpg);">
                                <div class="logo-content">
                                    <a href="{{route('product')}}"><img src="{{asset('frontend-assets/image/footer-logo.png')}}" alt="image" class="img-fluid" width="200"></a>
                                    
                                </div>
                                <form id="forgetpassword_form" method="post" action="">
                                    
                                    <div class="subscribe-area">
                                        <p>Enter your email address and we will send you reset password link</p>
                                    <p class="successmsg"></p>
                                        <label>Email Address</label>
                                        <input type="email" name="email">
                                        <button type="submit" class="btn btn-style1 submit_forgetpassword"><span>Send Password Reset Link</span></button>
                                    </div>
                                </form>
                                
                            </div>
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <a href="javascript:void(0)" class="scroll" id="top">
            <span><i class="fa fa-angle-double-up"></i></span>
        </a>
        <!-- back to top end -->
        <div class="mm-fullscreen-bg"></div>
        <!-- jquery -->
        <script src="{{asset('frontend-assets/js/modernizr-2.8.3.min.js')}}"></script>
        <script src="{{asset('frontend-assets/js/jquery-3.6.0.min.js')}}"></script>
        <!-- bootstrap -->
        <script src="{{asset('frontend-assets/js/bootstrap.min.js')}}"></script>
        <!-- popper -->
        <script src="{{asset('frontend-assets/js/popper.min.js')}}"></script>
        <!-- fontawesome -->
        <script src="{{asset('frontend-assets/js/fontawesome.min.js')}}"></script>
        <!-- owl carousal -->
        <script src="{{asset('frontend-assets/js/owl.carousel.min.js')}}"></script>
        <!-- swiper -->
        <script src="{{asset('frontend-assets/js/swiper.min.js')}}"></script>
        <!-- custom -->
        <script src="{{asset('frontend-assets/js/custom.js')}}"></script>
        <script src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('assets/js/additional-methods.min.js')}}"></script>

         <!-- toastr -->
         <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        @yield ('javascript')
        <script type="text/javascript">
            $(document).ready(function () {
                
                
            });
            $(document).on('click', '.submit_login_form', function (e) {
                    e.preventDefault();
                  
                    $("form#login_form").validate({
                        rules: {
                            email: { required: true,email:true },
                            password: { required: true},
                        },
                        messages: {
                            email: { 
                                required: "Please enter email address",
                                email: "Please enter valid email address"
                            },
                            password: { required: "Please enter password"},
                        },
                        focusInvalid: true,
                        invalidHandler: function () {
                            $(this).find(":input.error:first").focus();
                        }
                    });
                    if ($("form#login_form").valid()) {
                        $("form#login_form").submit();
                    }
                   
                });

                $(document).on('click','.forgot',function(){
                    $(".successmsg").hide();
                    let formId = "#forgetpassword_form";
                    let email = $(formId+' [name="email"]').val('');
                })
                $(document).on('click','.submit_reset_form',function(){
                    let formId = "#resetpassword_form";
                    $(formId).validate({
                            rules: {
                                new_password: { required: true},
                                confirm_password: { required: true, equalTo:"#new_password", minlength:6},
                            },
                            messages: {
                                new_password: { required: "Please enter new password", minlength:"Please enter minimum 6 characters", maxlength:"Please enter maximum 15 characters"},
                                confirm_password: { required: "Please enter confirm password", minlength:"Please enter minimum 6 characters", maxlength:"Please enter maximum 15 characters"},
                            
                            },
                            focusInvalid: true,
                            invalidHandler: function () {
                                $(this).find(":input.error:first").focus();
                            },
                            errorPlacement: function (error, element) {
                                if(element.hasClass('select2') && element.next('.select2-container').length) 
                                {
                                    error.insertAfter(element.next('.select2-container'));
                                }
                                else{
                                    error.insertAfter(element);
                                }
                            },
                        });
                        if ($("form#resetpassword_form").valid())
                        {
                            $("form#resetpassword_form").submit();
                        }
                    });

                $(document).on('click', '.submit_forgetpassword', function (e) {
                    let formId = "#forgetpassword_form";
                    $(formId).validate({
                            rules: {
                                email: { required: true,email:true},
                            },
                            messages: {
                                email: { 
                                required: "Please enter email address",
                                email: "Please enter valid email address"},
                            
                            },
                            focusInvalid: true,
                            invalidHandler: function () {
                                $(this).find(":input.error:first").focus();
                            },
                            errorPlacement: function (error, element) {
                                if(element.hasClass('select2') && element.next('.select2-container').length) 
                                {
                                    error.insertAfter(element.next('.select2-container'));
                                }
                                else{
                                    error.insertAfter(element);
                                }
                            },
                            submitHandler:function(e)
                            {
                                let _form = $(this);
                                $(formId+'.submit_forgetpassword').attr('disabled','disabled');
                                $(formId+' label.text-danger').hide();
                                let email = $(formId+' [name="email"]').val();
                                $.ajax({
                                    type:'POST',
                                    url:"{{route('web.send-password-reset-link')}}",
                                    data:{ _token: '{{csrf_token()}}',email : email},
                                    success:function(res){
                                        $(formId+'.submit_forgetpassword').removeAttr('disabled');
                                        if(res.success==false)
                                        {   $(formId+' [name="email"]').removeClass("valid");
                                            $(formId+' [name="email"]').addClass("error");
                                            $(formId+' label[for="email"]').addClass("error").css({'display':'block'}).text(res.message);
                                            $(formId+' [name="email"]').next().addClass('error');
                                            $(formId+'.submit_forgetpassword').removeAttr('disabled');
                                        }
                                        else{
                                           
                                            $(".successmsg").text(res.message).css({'color':'#64b245','font-weight':'600','display':'block'});
                                            return true;
                                        }
                                       
                                        // console.log(res);
                                        // $(".newtable").html(res);
                                        // getBody();
                                    }
                                });
                            }
                        });
                    });

                $(document).on('click', '.submit_register_form', function (e) {
                    e.preventDefault();
                    $("form#register_form").validate({
                        rules: {
                            first_name: { required: true, maxlength:50},
                            last_name: { required: true, maxlength:50},
                            email: { required: true, email:true},
                            phone: { required: true, },
                            title: { required: true, },
                            company: { required: true, },
                            street: { required: true, },
                            house_no: { required: true, },
                            zip_code: { required: true, },
                            city: { required: true, },
                            password: { required: true, minlength:6},
                            confirm_password: { required: true, equalTo:"#password", minlength:6},
                        },
                        messages: {
                            first_name: { required: "Please enter first name", maxlength:"Please enter maximum 50 characters"},
                            last_name: { required: "Please enter last name", maxlength:"Please enter maximum 50 characters"},
                            email: { required: "Please enter email", email:"Please enter valid email"},
                            phone: { required: "Please enter phone number", },
                            title: { required: "Please select title", },
                            company: { required: "Please enter company", },
                            street: { required: "Please enter street", },
                            house_no: { required: "Please enter house number", },
                            zip_code: { required: "Please enter zipcode", },
                            city: { required: "Please enter city", },
                            password: { required: "Please enter password", minlength:"Please enter minimum 6 characters", maxlength:"Please enter maximum 15 characters"},
                            confirm_password: { required: "Please enter confirm password", minlength:"Please enter minimum 6 characters", maxlength:"Please enter maximum 15 characters"},                  
                        },
                        focusInvalid: true,
                        invalidHandler: function () {
                            $(this).find(":input.error:first").focus();
                        }
                    });
                    if ($("form#register_form").valid()) {
                        $("form#register_form").submit();
                    }
                });
        </script>
        <script>
            if ($('#status_span').length) {
                var status = $('#status_span').attr('data-status');
                if (status === '1') { //success
                    toastr.success($('#status_span').attr('data-msg'));
                } else if (status === '0') { //error
                    toastr.error($('#status_span').attr('data-msg'));
                }
            }
            $(document).ready(function () {
               // cart_count();
            });

            function cart_count()
            {
                $.ajax({
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    },
                    url: "{{ route('cart-count') }}",
                    success: function (data)
                    {
                        var x='';
                        if(data.data.cart.length>0){
                            for(i in data.data.cart){
                                var url = "{{url('/')}}/uploads/products/"+data.data.cart[i]['p_id'];
                                x+='<li class="cart-item">';
                                x+='<div class="cart-img">';
                                x+='<a href="#">';
                                x+='<img src="'+url+'/'+data.data.cart[i]['image']+'" alt="cart-image" class="img-fluid">';
                                x+='</a>';
                                x+='</div>';
                                x+='<div class="cart-title">';
                                x+='<h6><a href="#">'+data.data.cart[i]['p_name']+'</a></h6>';
                                x+='<div class="cart-pro-info">';
                                x+='<div class="cart-qty-price">';
                                x+='<span class="quantity">'+data.data.cart[i]['quantity']+' x </span>';
                                x+='<span class="price-box">'+data.data.cart[i]['price']+'</span>';
                                x+='</div>';
                                x+='<div class="delete-item-cart">';
                                x+='<a href="javascript:void(0)" onclick="delete_cart('+data.data.cart[i]['p_id']+','+data.data.cart[i]['price_id']+');"><i class="icon-trash icons"></i></a>';
                                x+='</div>';
                                x+='</div>';
                                x+='</div>';
                                x+='</li>';
                            }
                        }else{

                        }

                        document.getElementById('cart_list').innerHTML = x;
                        document.getElementById('sub_total').innerHTML = data.data.subtotal;
                        document.getElementById('fav_count').innerHTML = data.data.fvt_count;
                        document.getElementById('cart_count').innerHTML = data.data.cart_total_count;
                        
                    },
                    error: function (data)
                    {
                        console.log(data);
                        toastr.error(data.message);
                    }
                });
            }

            function delete_cart(p_id,price_id)
            {
                $.ajax({
                    type: 'POST',
                    data: {
                        p_id:p_id,
                        price_id:price_id,
                        '_token': '{{ csrf_token() }}'
                    },
                    url: "{{ route('delete-cart') }}",
                    success: function (data)
                    {
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-bottom-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "300",
                            "timeOut": "1000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                            }
                            Command: toastr["success"]("Have fun storming the castle!")

                        cart_count();                      
                    },
                    error: function (data)
                    {
                        console.log(data);
                        toastr.error(data.message,{ timeOut: 1000 });
                    }
                });
            }
        </script>
    </body>
</html>


