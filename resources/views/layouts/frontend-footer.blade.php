<?php
$settings = DB::table('settings')->first();
?>
<section class="footer-7 section-top-bottom-padding">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="footer-bottom">
                            <div class="footer-link">
                                <div class="f-info">
                                    <ul class="footer-first">
                                        <li class="logo-content">
                                            <a href="{{route('product')}}">
                                                <img src="{{url('/')}}/uploads/setting/<?php echo $settings->id; ?>/<?php echo $settings->company_footer_logo; ?>" class="img-fluid f-logo-image" alt="logo-image" width="200">
                                            </a>
                                        </li>
                                        <li class="logo-content footer-details">
                                            <ul class="f-map">
                                                <li class="map-icn"><i class="ion-ios-location"></i></li>
                                                <li class="map-text">
                                                    <?php echo $settings->company_address; ?>
                                                </li>
                                            </ul>
                                            <ul class="f-contact">
                                                <li class="call-icn"><i class="ion-ios-telephone"></i></li>
                                                <li class="contact-link">
                                                    <a href="tel:1-800-222-000">Phone: {{$settings->company_phone}}</a>
                                                    <a href="mailto:demo@demo.com">Email: {{$settings->company_email}}</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="f-link">
                                    <h2 class="h-footer">Services</h2>
                                    <a href="#services" data-bs-toggle="collapse" class="h-footer">
                                        <span>Quick Link</span>
                                        <!-- <span>Services</span> -->
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="f-link-ul collapse" id="services" data-bs-parent="#footer-accordian">
                                        <li class="f-link-ul-li"><a href="{{route('product')}}">Product</a></li>
                                        <li class="f-link-ul-li"><a href="{{route('orders')}}">Orders</a></li>
                                        <li class="f-link-ul-li"><a href="{{route('delivery-note')}}">Delivery Note</a></li>
                                        <li class="f-link-ul-li"><a href="{{route('invoices')}}">Invoice</a></li>
                                        <!-- <li class="f-link-ul-li"><a href="#">Sitemap</a></li> -->
                                    </ul>
                                </div>
                                <!-- <div class="f-link">
                                    <h2 class="h-footer">Privacy & terms</h2>
                                    <a href="#privacy" data-bs-toggle="collapse" class="h-footer">
                                        <span>Privacy & terms</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="f-link-ul collapse" id="privacy" data-bs-parent="#footer-accordian">
                                        <li class="f-link-ul-li"><a href="#">Payment policy</a></li>
                                        <li class="f-link-ul-li"><a href="#">Privacy policy</a></li>
                                        <li class="f-link-ul-li"><a href="#">Return policy</a></li>
                                        <li class="f-link-ul-li"><a href="#">Shipping policy</a></li>
                                        <li class="f-link-ul-li"><a href="#">Terms & conditions</a></li>
                                    </ul>
                                </div> -->
                                <div class="f-link">
                                    <h2 class="h-footer">My account</h2>
                                    <a href="#account" data-bs-toggle="collapse" class="h-footer">
                                        <span>My account</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="f-link-ul collapse" id="account" data-bs-parent="#footer-accordian">
                                        <li class="f-link-ul-li"><a href="{{route('web-profileupdate')}}">My account</a></li>
                                        <li class="f-link-ul-li"><a href="{{route('cart')}}">My cart</a></li>
                                        <li class="f-link-ul-li"><a href="{{route('orders')}}">Order history</a></li>
                                        <li class="f-link-ul-li"><a href="{{route('wishlist')}}">My wishlist</a></li>
                                        <li class="f-link-ul-li"><a href="{{route('web-profileupdate')}}">My address</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer end -->
        <!-- copyright start -->
        <section class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="f-bottom">
                            <p><i class="fa fa-copyright"></i> {{date('Y')}} e-regio. All Rights Reserved.</p>                          
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- copyright end -->