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
        <link rel="shortcut icon" type="image/favicon" href="{{asset('frontend-assets/image/icon-logo.jpg')}}">
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
                                    <a href="{{route('product')}}">
                                        <img src="{{url('/')}}/uploads/setting/<?php echo $settings->id; ?>/<?php echo $settings->company_logo; ?>" alt="logo-image" class="img-fluid">
                                    </a>
                                </div>
                                <!-- logo end -->
                                <!-- main menu start -->
                                <div class="header-element megamenu-content">
                                    <div class="mainwrap">
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
                                <!-- main menu end -->
                                <div class="search-area">
                                    <!-- search start -->
                                 
                                    <!-- search end -->
                                    <div class="header-element right-block-box">
                                        <ul class="shop-element">
                                            <li class="top-home-li">
                                               
                                            
                                                <div class="currency">
                                                    <div class="currency-drop">
                                                        <div class="eur">
                                                            <span class="cur-name"><a href="#"><i class="icon-user"></i></a></span>
                                                        </div>
                                                        <ul class="all-currency">
                                                            <li>
                                                                <a href="{{route('web-profileupdate')}}">
                                                                    <span class="cur-name">My Profile</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('web-changepassword')}}">
                                                                    <span class="cur-name">Change Password</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:void(0)" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                    <span class="cur-name">Logout</span>
                                                                </a>
                                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                    @csrf
                                                                </form>
                                                            </li>
                                                            
                                                        </ul>
                                                    </div>
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
                                            <!-- <li class="side-wrap user-wrap">
                                                <div class="acc-desk">
                                                    <div class="user-icon">
                                                        <span><a href="#"><i class="icon-user"></i></a></span>
                                                    </div>
                                                </div>
                                                <div class="acc-mob">
                                                    <a href="#" class="user-icon">
                                                        <span><i class="icon-user"></i></span>
                                                    </a>
                                                </div>
                                            </li> -->
                                            <li class="side-wrap wishlist-wrap">
                                                <a href="{{route('wishlist')}}" class="header-wishlist">
                                                    <span class="wishlist-icon"><i class="icon-heart"></i></span>
                                                    <span class="wishlist-counter" id="fav_count">0</span>
                                                </a>
                                            </li>
                                            <li class="side-wrap cart-wrap">
                                                <div class="shopping-widget">
                                                    <div class="shopping-cart">
                                                        <a href="javascript:void(0)" class="cart-count">
                                                            <span class="cart-icon-wrap">
                                                                <span class="cart-icon"><i class="icon-handbag"></i></span>
                                                                <span id="cart_count" class="bigcounter">0</span>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
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
                        <span class="cart-count-item bigcounter minicartcount">0</span>
                        <span class="cart-count-desc">Product(s)</span>
                    </p>
                </div>
                <ul class="cart-item-loop" id="cart_list">
                    
                </ul>
                <ul class="subtotal-title-area">
                    <li class="subtotal-info">
                        <div class="subtotal-titles">
                            <h6>Sub total:
</h6>
                            <span class="subtotal-price" id="sub_total">0 </span>
                        </div>
                    </li>
                    <li class="mini-cart-btns" style="display:none;">
                        <div class="cart-btns">
                            <a href="{{route('cart')}}" class="btn btn-style1" ><span>View cart</span></a>
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
                                            <div class="mainwrap">
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
                          
                            <div class="pop-up-newsletter" style="background-image: url(frontend-assets/image/news-popup.jpg);">
                                <div class="logo-content">
                                    <a href="{{route('product')}}"><img src="{{asset('frontend-assets/image/footer-logo.png')}}" alt="image" class="img-fluid" width="200"></a>
                                    
                                </div>
                                <div class="subscribe-area">
                                    <label>Email Address erfewre</label>
                                    <input type="text" name="comment">

                                    <label>Password</label>
                                    <input type="password" name="comment">

                                    <div class="col-lg-12 text-end">
                                    <a href="#" class="btn btn-style1 forgot" data-bs-toggle="modal" data-bs-target="#forgetPasswordModel">Forgot your password?</a>
                                    </div>
                                    <a href="product-list.html" class="btn btn-style1"><span>Login</span></a>
                                </div>
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
        <!-- <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script> -->

        <!-- toastr -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        @yield ('javascript')
        <script type="text/javascript">

            function add_fav(id,hide_product="")
            {
               // alert(id);
                $.ajax({
                    type: 'POST',
                    data: {
                        id: id,
                        '_token': '{{ csrf_token() }}'
                    },
                    url: "{{ route('add-fav') }}",
                    success: function (data)
                    {
                        
                        /*if($("#fav_"+id).attr('class').indexOf('fvt') > -1){
                        $('.favp_'+id).removeClass('fvt');
                        $('.favm_'+id).removeClass('fvt');
                        $('.fav_'+id).removeClass('fvt');
                        if(hide_product=='1'){
                            $(".fav_prod_"+id).fadeOut("slow").remove();
                        }
                        } else{
                        $('.favp_'+id).addClass('fvt');
                        $('.favm_'+id).addClass('fvt');
                        $('.fav_'+id).addClass('fvt');
                        }*/
                        toastr.success(data.message);
                        cart_count();
                    },
                    error: function (data)
                    {
                        console.log(data);
                        toastr.error(data.message);
                    }
                });
            }
            $(document).ready(function () {
                toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-bottom-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "500",
                            "hideDuration": "500",
                            "timeOut": "1000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"}
                cart_count();
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
                            $(".mini-cart-btns").show();
                            $('.minicartcount').text(data.data.cart.length);
                            $(".checkout-btn").show();

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
                            $('.minicartcount').text('0');
                            $(".mini-cart-btns").hide();
                            $(".checkout_total").text('0');
                            $(".overallAmount").text('0');
                            $(".checkout-btn").hide();
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
                        toastr.success(data.message);  
                        cart_count();                      
                    },
                    error: function (data)
                    {
                        console.log(data);
                        toastr.error(data.message);
                    }
                });
            }


            $(document).ready(function () {
                
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
        </script>
    </body>
</html>