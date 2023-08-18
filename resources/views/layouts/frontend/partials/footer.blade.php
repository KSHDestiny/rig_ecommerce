<footer class="sec-footer py-4">
    <div class="container px-4 px-md-0 py-0 pt-md-5">
        <div class="row mx-0">
            <div class="footer-nav col-lg-4 px-0">
                <div class="text-uppercase fw-bold fs-4">
                    <div class="row">
                        <div class="col-2 ps-2">
                            <img src="{{asset('frontend/img/common/img_rig_logo_plain_bg.png')}}" alt="logo" class="logo" width="20" height="60">
                        </div>
                        <div class="col-8 pe-4">RIG <span>Ecommerce</span></div>
                    </div>
                </div>
                <div class="mt-2">
                    <p class="fs-14" style="text-align: justify;">
                    We believe that shopping should be an enjoyable and convenient experience for everyone. That's why we have built a platform that offers a wide range of high-quality products, exceptional customer service, and a seamless shopping journey from start to finish.
                    </p>
                 </div>
            </div>

            <div class="footer-nav col-lg-2 mx-auto mb-4 px-0">
                <h5 class="text-uppercase fw-bold fs-4 mb-3">Our <span>Services</span></h5>
                <ul class="fs-14">
                    <li><a href="{{route('frontend.home')}}">Home</a></li>
                    <li><a href="{{route('wishlist.show')}}">Wishlist</a></li>
                    <li><a href="{{route('cart.list')}}">Shopping Cart</a></li>
                </ul>
            </div>

            <div class="footer-nav col-lg-2 mx-auto mb-4 px-0">
                <h5 class="text-uppercase fw-bold fs-4 mb-3">Quick <span>Links</span></h5>
                <ul class="fs-14">
                    <li><a href="{{ route('frontend.product-list')}}" class="text-decoration-underline"><i class="ri ri-login-circle-line"></i> PRODUCT</a></li>
                    <li><a href="{{ route('frontend.contact-us')}}" class="text-decoration-underline"><i class="ri ri-login-circle-line"></i> CONTACT</a></li>
                    <li><a href="{{ route('frontend.blog') }}" class="text-decoration-underline"><i class="ri ri-login-circle-line"></i> BLOG</a></li>
                    <li><a href="{{ route('frontend.about') }}" class="text-decoration-underline"><i class="ri ri-login-circle-line"></i> ABOUT</a></li>
                </ul>
            </div>

            <div class="footer-nav col-lg-2 mx-auto mb-4 px-0">
                <h5 class="text-uppercase fw-bold fs-4 mb-3">Contact <span>Us</span></h5>
                <ul class="fs-14">
                    <li><a href="#"><i class="ri ri ri-map-pin-line"></i> No. 801, Kan Yeik Mon Condo, Hlaing Township, Yangon, Myanmar</a></li>
                    <li><a href="#"><i class="ri ri ri-headphone-line"></i>+95 9 953 933826</a></li>
                    <li><a href="#"><i class="ri ri ri-mail-send-line"></i> services@rig-info.com</a></li>
                    <li><a href="https://rig-info.com/" target="_blank"><i class="ri ri-globe-line"></i> www.rig-info.com</a></li>
                </ul>
            </div>
        </div>
        <hr style="height: 2.5px;">

        <div class="row mt-5 mx-0 text-center">
            <p class="mb-0 fs-14">Copyright &copy; 2023. All Right and Reserved.</p>
        </div>
    </div>
</footer><!-- /.sec-footer -->
