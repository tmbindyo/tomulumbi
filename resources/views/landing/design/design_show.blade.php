<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bato Template</title>
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
    <link rel="shortcut icon" href="{{ asset('design/bato') }}/favicon.ico">

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
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" placeholder="Enter any key to search...">
                        <button type="submit" class="btn btn-primary"><i class="icon-search3"></i></button>
                    </div>
                </div>
            </div>
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
            <div class="row">
                <div class="col-md-12">
                    <h2 class="head-title">Gallery</h2>
                    <a href="{{ asset('design/bato') }}/images/work-1.jpg" class="gallery image-popup-link text-center" style="background-image: url(images/work-1.jpg);">
                        <span><i class="icon-search3"></i></span>
                    </a>
                    <a href="{{ asset('design/bato') }}/images/work-2.jpg" class="gallery image-popup-link text-center" style="background-image: url(images/work-2.jpg);">
                        <span><i class="icon-search3"></i></span>
                    </a>
                    <a href="{{ asset('design/bato') }}/images/work-3.jpg" class="gallery image-popup-link text-center" style="background-image: url(images/work-3.jpg);">
                        <span><i class="icon-search3"></i></span>
                    </a>
                    <a href="{{ asset('design/bato') }}/images/work-4.jpg" class="gallery image-popup-link text-center" style="background-image: url(images/work-4.jpg);">
                        <span><i class="icon-search3"></i></span>
                    </a>
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
                        <a class="colorlib-logo" href="index.html">Bato</a>
                    </div>
                    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
                </div>
            </div>
        </div>
    </header>

    <div id="colorlib-work">
        <div class="container">
            <div class="row text-center">
                <h2 class="bold">Works</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="work-entry-flex animate-box js-fullheight">
                        <div class="col-three-forth js-fullheight">
                            <div class="row no-gutters">
                                <div class="col-md-12 col-md-push-10 no-gutters">
                                    <div class="work-img js-fullheight" style="background-image: url({{ asset('design/bato') }}/images/work-1.jpg);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-one-forth js-fullheight">
                            <div class="row no-gutters">
                                <div class="col-md-12 col-md-pull-12 no-gutters">
                                    <div class="display-t js-fullheight">
                                        <div class="display-tc js-fullheight">
                                            <div class="text-inner text-inner-right">
                                                <h2><a href="{{route('design.work',1)}}">Application and practice of creating durable images</a></h2>
                                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                                <p><a href="{{route('design.work',1)}}" class="btn-view">View Photo</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="work-entry-flex animate-box js-fullheight">
                        <div class="col-three-forth js-fullheight">
                            <div class="row no-gutters">
                                <div class="col-md-12 no-gutters">
                                    <div class="work-img js-fullheight" style="background-image: url({{ asset('design/bato') }}/images/work-2.jpg);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-one-forth js-fullheight">
                            <div class="row no-gutters">
                                <div class="col-md-12 no-gutters">
                                    <div class="display-t js-fullheight">
                                        <div class="display-tc js-fullheight">
                                            <div class="text-inner text-inner-left">
                                                <h2><a href="{{route('design.work',1)}}">Application and practice of creating durable images</a></h2>
                                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                                <p><a href="{{route('design.work',1)}}" class="btn-view">View Photo</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="work-entry-flex animate-box js-fullheight">
                        <div class="col-three-forth js-fullheight">
                            <div class="row no-gutters">
                                <div class="col-md-12 col-md-push-10 no-gutters">
                                    <div class="work-img js-fullheight" style="background-image: url({{ asset('design/bato') }}/images/work-3.jpg);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-one-forth js-fullheight">
                            <div class="row no-gutters">
                                <div class="col-md-12 col-md-pull-12 no-gutters">
                                    <div class="display-t js-fullheight">
                                        <div class="display-tc js-fullheight">
                                            <div class="text-inner text-inner-right">
                                                <h2><a href="{{route('design.work',1)}}">Application and practice of creating durable images</a></h2>
                                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                                <p><a href="{{route('design.work',1)}}" class="btn-view">View Photo</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="work-entry-flex animate-box js-fullheight">
                        <div class="col-three-forth js-fullheight">
                            <div class="row no-gutters">
                                <div class="col-md-12 no-gutters">
                                    <div class="work-img js-fullheight" style="background-image: url({{ asset('design/bato') }}/images/work-4.jpg);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-one-forth js-fullheight">
                            <div class="row no-gutters">
                                <div class="col-md-12 no-gutters">
                                    <div class="display-t js-fullheight">
                                        <div class="display-tc js-fullheight">
                                            <div class="text-inner text-inner-left">
                                                <h2><a href="{{route('design.work',1)}}">Application and practice of creating durable images</a></h2>
                                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                                <p><a href="{{route('design.work',1)}}" class="btn-view">View Photo</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="work-entry-flex animate-box js-fullheight">
                        <div class="col-three-forth js-fullheight">
                            <div class="row no-gutters">
                                <div class="col-md-12 col-md-push-10 no-gutters">
                                    <div class="work-img js-fullheight" style="background-image: url({{ asset('design/bato') }}/images/work-5.jpg);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-one-forth js-fullheight">
                            <div class="row no-gutters">
                                <div class="col-md-12 col-md-pull-12 no-gutters">
                                    <div class="display-t js-fullheight">
                                        <div class="display-tc js-fullheight">
                                            <div class="text-inner text-inner-right">
                                                <h2><a href="{{route('design.work',1)}}">Application and practice of creating durable images</a></h2>
                                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                                <p><a href="{{route('design.work',1)}}" class="btn-view">View Photo</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="work-entry-flex animate-box js-fullheight">
                        <div class="col-three-forth js-fullheight">
                            <div class="row no-gutters">
                                <div class="col-md-12 no-gutters">
                                    <div class="work-img js-fullheight" style="background-image: url({{ asset('design/bato') }}/images/work-6.jpg);">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-one-forth js-fullheight">
                            <div class="row no-gutters">
                                <div class="col-md-12 no-gutters">
                                    <div class="display-t js-fullheight">
                                        <div class="display-tc js-fullheight">
                                            <div class="text-inner text-inner-left">
                                                <h2><a href="{{route('design.work',1)}}">Application and practice of creating durable images</a></h2>
                                                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                                                <p><a href="{{route('design.work',1)}}" class="btn-view">View Photo</a></p>
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
    </div>

    <div id="colorlib-subscribe">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
                    <h2>Subscribe Newsletter</h2>
                    <p>Subscribe our newsletter and get latest update</p>
                </div>
            </div>
            <div class="row animate-box">
                <div class="col-md-6 col-md-offset-3">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-inline qbstp-header-subscribe">
                                <div class="col-three-forth">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="email" placeholder="Enter your email">
                                    </div>
                                </div>
                                <div class="col-one-third">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Subscribe Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-pb-sm text-center">
                        <div class="row">
                            <div class="col-md-10">
                                <h2>Office</h2>
                                <p>291 South 21th Street, <br> Suite 721 New York NY 10016</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-pb-sm text-center">
                        <h2>Get in Touch</h2>
                        <p><a href="#">noah@info.com</a></p>
                    </div>
                    <div class="col-md-4 col-pb-sm text-center">
                        <h2>Social</h2>
                        <p class="colorlib-social-icons">
                            <a href="#"><i class="icon-facebook4"></i></a>
                            <a href="#"><i class="icon-twitter3"></i></a>
                            <a href="#"><i class="icon-googleplus"></i></a>
                            <a href="#"><i class="icon-dribbble2"></i></a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>
								<span class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --><br></span>
                            <span class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

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

