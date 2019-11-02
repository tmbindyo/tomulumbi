<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> tomulumbi </title>
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

<nav id="colorlib-main-nav" role="navigation">
    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle active"><i></i></a>
    <div class="js-fullheight colorlib-table">
        <div class="colorlib-table-cell js-fullheight">

            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="work.html">Work</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
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
                        <a class="colorlib-logo" href="{{route('welcome')}}">tomulumbi</a>
                    </div>
                    <a href="{{route('design.show',1)}}" class="colorlib-nav-toggle"><i>Back</i></a>
                </div>
            </div>
        </div>
    </header>

    <div class="work-single-flex js-fullheight">
        <div class="col-half js-full-height work-img" style="background-image: url({{ asset('design/bato') }}/images/work-3.jpg);"></div>
        <div class="col-half js-fullheight">
            <div class="display-t js-fullheight">
                <div class="display-tc js-fullheight">
                    <div class="work-desc">
                        <h2>Work Dummy Name</h2>
                        <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
                        <p><a href="{{route('design.gallery',1)}}" class="btn-preview">Gallery</a></p>
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

