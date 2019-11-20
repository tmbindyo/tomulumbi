<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>tomulumbi | journals</title>
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
                <h3><a href="{{route('welcome')}}">Home</a></h3>
                <div class="col-md-12">
                    <ul>
                        <li></li>
                        <li class="active"></li>
                    </ul>
                </div>
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
                        <a class="colorlib-logo" href="{{route('welcome')}}">tomulumbi</a>
                    </div>
                    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
                </div>
            </div>
        </div>
    </header>

    <div id="colorlib-blog">
        <div class="container">
            <div class="row text-center">
                <h2 class="bold">Journals</h2>
            </div>
            <div class="row row-pb-md">
                @foreach($journals as $journal)
                    <div class="col-md-4">
                        <div class="article animate-box">
                            <a href="{{route('journal.show',$journal->id)}}" class="blog-img">
                                <img class="img-responsive" src="{{ asset('') }}{{$journal->cover_image->pixels750}}" alt="html5 bootstrap by colorlib.com">
                                <div class="overlay"></div>
                                <div class="link">
                                        <span class="read"><h2>Read more</h2></span>
                                </div>
                            </a>
                            <div class="desc">
                                <span class="meta">{{$journal->date}}</span>
                                <h2><a href="{{route('journal.show',$journal->id)}}">{{$journal->name}}</a></h2>
                                <p>{{$journal->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach


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

