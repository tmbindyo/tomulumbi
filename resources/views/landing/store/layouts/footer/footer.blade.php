<!-- ##### Footer Area Start ##### -->
<footer class="footer_area clearfix">
    <div class="container">
        <div class="row align-items-center">
            <!-- Single Widget Area -->
            <div class="col-12 col-lg-4">
                <div class="single_widget_area">
                    <!-- Logo -->
                    <div class="footer-logo mr-50">
                        <a href="{{route('tomulumbi')}}"><img width="150em" src="{{ asset('') }}/tomulumbi.png" alt=""></a>
                    </div>
                    <!-- Copywrite Text -->
                    <p class="copywrite">
                        Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This site is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://fluidtechglobal.com" target="_blank">Fluidtech Global</a>
                </div>
            </div>
            <!-- Single Widget Area -->
            <div class="col-12 col-lg-8">
                <div class="single_widget_area">
                    <!-- Footer Menu -->
                    <div class="footer_menu">
                        <nav class="navbar navbar-expand-lg justify-content-end">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                            <div class="collapse navbar-collapse" id="footerNavContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{route('store')}}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('store.products')}}">Shop</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('store.cart')}}">Cart</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('store.checkout')}}">Checkout</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- ##### Footer Area End ##### -->
