<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>tomulumbi | {{$designWork->name}}</title>
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

            <div class="row  text-center">
                <h3><a href="{{route('tomulumbi')}}">Home</a></h3>
                <h3><a class="active" href="{{route('designs')}}">Designs</a></h3>
                <h3><a class="active" href="{{route('design.show',$designWork->design_id)}}">Back To {{$designWork->design->name}}</a></h3>
                <div class="col-md-12">
                    <ul>
                        <li></li>
                        <li class="active"></li>
                    </ul>
                </div>
            </div>

            <div class="row text-center">
                <h2>Get in Touch</h2>
                <p><a href="mailto:contact@tomulumbi.com">contact@tomulumbi.com</a></p>
            </div>

            <div class="row text-center">
                <h2>Social</h2>
                <p class="colorlib-social-icons">
                    <a href="#"><i class="icon-twitter3"></i></a>
                    <a href="#"><i class="icon-instagram"></i></a>
                    <a href="#"><i class="icon-behance"></i></a>
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
                        <a class="colorlib-logo" href="{{route('designs')}}">tomulumbi</a>
                    </div>
                    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
                </div>
            </div>
        </div>
    </header>

    <div class="work-single-flex js-fullheight">
        <div class="col-half js-full-height work-img" style="background-image: url({{ asset('') }}{{ $designWork->upload->pixels1000 }});"></div>
        <div class="col-half js-fullheight">
            <div class="display-t js-fullheight">
                <div class="display-tc js-fullheight">
                    <div class="work-desc">
                        <h2>{{$designWork->name}}</h2>
                        <p>{{$designWork->description}}</p>
                        <p><a href="{{route('design.gallery',$designWork->design_id)}}" class="btn-preview">View Gallery</a></p>
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

