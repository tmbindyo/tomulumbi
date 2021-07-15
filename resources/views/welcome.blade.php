{{--  bato template  --}}
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>tomulumbi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="{{ asset('') }}/tomulumbi_logo.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('themes/design/bato') }}/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('themes/design/bato') }}/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('themes/design/bato') }}/css/bootstrap.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('themes/design/bato') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('themes/design/bato') }}/css/owl.theme.default.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('themes/design/bato') }}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ asset('themes/design/bato') }}/css/style.css">


    <!-- Modernizr JS -->
    <script src="{{ asset('themes/design/bato') }}/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{ asset('themes/design/bato') }}/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<nav id="colorlib-main-nav" role="navigation">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
    <div class="js-fullheight colorlib-table">
        <div class="colorlib-table-cell js-fullheight">

            <div class="row text-center">
                <h2>Get in Touch</h2>
                <p><a href="mailto:info@tomulumbi.com">info@tomulumbi.com</a></p>
            </div>

            <div class="row text-center">
                <h2>Social</h2>
                <p class="colorlib-social-icons">
                    <a href="https://twitter.com/tomulumbi"><i class="icon-twitter3"></i></a>
                    <a href="https://www.instagram.com/tomulumbi/"><i class="icon-instagram"></i></a>
                    <a href="https://www.behance.net/tomulumbi"><i class="icon-behance"></i></a>
                </p>
            </div>


            <div class="row text-center">
                <h2>Office</h2>
                <p>General Accident House, <br> Ralph bunche Rd, Nairobi.</p>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <p>
                        <span class="block">
                            Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://www.fluidtechglobal.com" target="_blank">Fluidtech Global</a>
                            <br>
                        </span>
                    </p>
                </div>
            </div>

        </div>
    </div>
</nav>

<div id="colorlib-page">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="colorlib-navbar-brand">
                        <a class="colorlib-logo" href="{{route('tomulumbi')}}" title="tomulumbi"><img width="30em" src="{{ asset('') }}tomulumbi/symbol/solid/500px/1.png" alt="tomulumbi" title="tomulumbi"/></a>
                        {{--  <a class="colorlib-logo" href="{{route('tomulumbi')}}">tomulumbi</a>  --}}
                    </div>
                    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
                </div>
            </div>
        </div>
    </header>
    <div id="colorlib-hero" class="js-fullheight">
        <div class="owl-carousel">
            <div class="item">
                <div class="hero-flex js-fullheight">
                    <div class="col-three-forth">
                        <div class="hero-img js-fullheight" style="background-image: url({{ asset('themes/design/bato') }}/images/DSC_4799_small_2.jpg);"></div>
                    </div>
                    <div class="col-one-forth js-fullheight">
                        <div class="display-t js-fullheight">
                            <div class="display-tc js-fullheight">
                                <h2 class="number">01/07</h2>
                                <div class="text-inner">
                                    <div class="desc">
                                        <span class="tag">Galleries</span>
                                        <br>
                                        <p><a href="#" class="btn-view">Coming Soon</a></p>
{{--                                        <p><a href="{{route('personal.albums')}}" class="btn-view"> View <i class="icon-arrow-right3"></i></a></p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="hero-flex js-fullheight">
                    <div class="col-three-forth">
                        <div class="hero-img js-fullheight" style="background-image: url({{ asset('themes/design/bato') }}/images/DSC_9317_1.jpg);"></div>
                    </div>
                    <div class="col-one-forth js-fullheight">
                        <div class="display-t js-fullheight">
                            <div class="display-tc js-fullheight">
                                <h2 class="number">02/07</h2>
                                <div class="text-inner">
                                    <div class="desc">
                                        <span class="tag">Client Proofs</span>
                                        <br>
                                        <p><a href="#" class="btn-view">Coming Soon</a></p>
{{--                                        <p><a href="{{route('client.proofs')}}" class="btn-view">View <i class="icon-arrow-right3"></i></a></p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="hero-flex js-fullheight">
                    <div class="col-three-forth">
                        <div class="hero-img js-fullheight" style="background-image: url({{ asset('themes/design/bato') }}/images/kicoo_1.jpg);"></div>
                    </div>
                    <div class="col-one-forth js-fullheight">
                        <div class="display-t js-fullheight">
                            <div class="display-tc js-fullheight">
                                <h2 class="number">03/07</h2>
                                <div class="text-inner">
                                    <div class="desc">
                                        <span class="tag">Design Work</span>
                                        <br>
                                        <p><a href="#" class="btn-view">Coming Soon</a></p>
{{--                                        <p><a href="{{route('designs')}}" class="btn-view">View <i class="icon-arrow-right3"></i></a></p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="hero-flex js-fullheight">
                    <div class="col-three-forth">
                        <div class="hero-img js-fullheight" style="background-image: url({{ asset('themes/design/bato') }}/images/journals_2.jpg);"></div>
                    </div>
                    <div class="col-one-forth js-fullheight">
                        <h2 class="number">04/07</h2>
                        <div class="display-t js-fullheight">
                            <div class="display-tc js-fullheight">
                                <div class="text-inner">
                                    <div class="desc">
                                        <span class="tag">Journals</span>
                                        <br>
                                        <p><a href="#" class="btn-view">Coming Soon</a></p>
{{--                                        <p><a href="{{route('journals')}}" class="btn-view">View <i class="icon-arrow-right3"></i></a></p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="hero-flex js-fullheight">
                    <div class="col-three-forth">
                        <div class="hero-img js-fullheight" style="background-image: url({{ asset('themes/design/bato') }}/images/photo_2020-03-19_17-56-31.jpg);"></div>
                    </div>
                    <div class="col-one-forth js-fullheight">
                        <h2 class="number">05/07</h2>
                        <div class="display-t js-fullheight">
                            <div class="display-tc js-fullheight">
                                <div class="text-inner">
                                    <div class="desc">
                                        <span class="tag">Projects</span>
                                        <br>
                                        <p><a href="#" class="btn-view">Coming Soon</a></p>
{{--                                        <p><a href="{{route('projects')}}" class="btn-view">View <i class="icon-arrow-right3"></i></a></p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="hero-flex js-fullheight">
                    <div class="col-three-forth">
                        <div class="hero-img js-fullheight" style="background-image: url({{ asset('themes/design/bato') }}/images/DSC_1000.jpg);"></div>
                    </div>
                    <div class="col-one-forth js-fullheight">
                        <h2 class="number">06/07</h2>
                        <div class="display-t js-fullheight">
                            <div class="display-tc js-fullheight">
                                <div class="text-inner">
                                    <div class="desc">
                                        <span class="tag">Tudeme</span>
                                        <br>
                                        <p><a href="#" class="btn-view">Coming Soon</a></p>
{{--                                        <p><a href="{{route('tudeme')}}" class="btn-view">View <i class="icon-arrow-right3"></i></a></p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="hero-flex js-fullheight">
                    <div class="col-three-forth">
                        <div class="hero-img js-fullheight" style="background-image: url({{ asset('themes/design/bato') }}/images/store.jpg);"></div>
                    </div>
                    <div class="col-one-forth js-fullheight">
                        <h2 class="number">07/07</h2>
                        <div class="display-t js-fullheight">
                            <div class="display-tc js-fullheight">
                                <div class="text-inner">
                                    <div class="desc">
                                        <span class="tag">Store</span>
                                        <br>
                                        <p><a href="#" class="btn-view">Coming Soon</a></p>
{{--                                          <p><a href="{{route('store')}}" class="btn-view">View Store <i class="icon-arrow-right3"></i></a></p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- jQuery -->
<script src="{{ asset('themes/design/bato') }}/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="{{ asset('themes/design/bato') }}/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('themes/design/bato') }}/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="{{ asset('themes/design/bato') }}/js/jquery.waypoints.min.js"></script>
<!-- Owl Carousel -->
<script src="{{ asset('themes/design/bato') }}/js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="{{ asset('themes/design/bato') }}/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('themes/design/bato') }}/js/magnific-popup-options.js"></script>

<!-- Main JS (Do not remove) -->
<script src="{{ asset('themes/design/bato') }}/js/main.js"></script>

</body>
</html>

