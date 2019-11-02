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
    <link rel="shortcut icon" href="favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('design/bato') }}/css/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('design/bato') }}/css/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('design/bato') }}/css/bootstrap.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('design/bato') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('design/bato') }}/css/owl.theme.default.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('design/bato') }}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ asset('design/bato') }}/css/style.css">


    <!-- Modernizr JS -->
    <script src="{{ asset('design/bato') }}/js/modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="{{ asset('design/bato') }}/js/respond.min.js"></script>
    <![endif]-->

</head>
<body>


<div id="colorlib-page">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="colorlib-navbar-brand">
                        <a class="colorlib-logo" href="{{route('welcome')}}">tomulumbi</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="colorlib-hero" class="js-fullheight">
        <div class="owl-carousel">
            <div class="item">
                <div class="hero-flex js-fullheight">
                    <div class="col-three-forth">
                        <div class="hero-img js-fullheight" style="background-image: url({{ asset('design/bato') }}/images/DSC_4799_small.jpg);"></div>
                    </div>
                    <div class="col-one-forth js-fullheight">
                        <div class="display-t js-fullheight">
                            <div class="display-tc js-fullheight">
                                <h2 class="number">01/03</h2>
                                <div class="text-inner">
                                    <div class="desc">
                                        <span class="tag">Photography</span>
                                        <h2>Photography is on it's way.</h2>
                                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                        <p><a href="{{route('personal.albums')}}" class="btn-view">View Galleries <i class="icon-arrow-right3"></i></a></p>
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
                        <div class="hero-img js-fullheight" style="background-image: url({{ asset('design/bato') }}/images/img_bg_2.jpg);"></div>
                    </div>
                    <div class="col-one-forth js-fullheight">
                        <div class="display-t js-fullheight">
                            <div class="display-tc js-fullheight">
                                <h2 class="number">02/03</h2>
                                <div class="text-inner">
                                    <div class="desc">
                                        <span class="tag">Client Proofs</span>
                                        <h2>Capture interesting things.</h2>
                                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                        <p><a href="{{route('client.proofs')}}" class="btn-view">View Galleries <i class="icon-arrow-right3"></i></a></p>
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
                        <div class="hero-img js-fullheight" style="background-image: url({{ asset('design/bato') }}/images/img_bg_3.jpg);"></div>
                    </div>
                    <div class="col-one-forth js-fullheight">
                        <h2 class="number">03/03</h2>
                        <div class="display-t js-fullheight">
                            <div class="display-tc js-fullheight">
                                <div class="text-inner">
                                    <div class="desc">
                                        <span class="tag">Design Work</span>
                                        <h2>Discover New Things</h2>
                                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                        <p><a href="{{route('designs')}}" class="btn-view">View Galleries <i class="icon-arrow-right3"></i></a></p>
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
<script src="{{ asset('design/bato') }}/js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="{{ asset('design/bato') }}/js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('design/bato') }}/js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="{{ asset('design/bato') }}/js/jquery.waypoints.min.js"></script>
<!-- Owl Carousel -->
<script src="{{ asset('design/bato') }}/js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="{{ asset('design/bato') }}/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('design/bato') }}/js/magnific-popup-options.js"></script>

<!-- Main JS (Do not remove) -->
<script src="{{ asset('design/bato') }}/js/main.js"></script>

</body>
</html>

