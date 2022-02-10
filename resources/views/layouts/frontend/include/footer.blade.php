<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">About Us</h3>
                        <p>The <b>Fast Shop </b> specializes in technology products and accessories.</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>Sana'a , YEMEN</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+967-774-474-100</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>CS@fastshop.com</a></li>
                        </ul>
                    </div>
                </div>
                @if(categories() != 'null' && count(categories()) > 0)
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Top Categories</h3>
                        <ul class="footer-links">
                            @forelse(categories() as $cat)
                            <li><a title="{{$cat->name}}" href="#">{{$cat->name}}</a></li>
                            @empty
                            NULL
                            @endforelse
                        </ul>
                    </div>
                </div>
                @endif

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Information</h3>
                        <ul class="footer-links">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Orders and Returns</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Service</h3>
                        <ul class="footer-links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a title="Order" href="{{ route('order') }}">Your Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{ URL::asset('frontend/js/jquery.min.js'); }}"></script>
<script src="{{ URL::asset('frontend/js/bootstrap.min.js'); }}"></script>
<script src="{{ URL::asset('frontend/js/slick.min.js'); }}"></script>
<script src="{{ URL::asset('frontend/js/nouislider.min.js'); }}"></script>
<script src="{{ URL::asset('frontend/js/jquery.zoom.min.js'); }}"></script>
<script src="{{ URL::asset('frontend/js/main.js'); }}"></script>
<script src="{{ URL::asset('frontend/js/sweetalert.min.js'); }}"></script>

@include('layouts.massage.sweetalert')
</body>

</html>