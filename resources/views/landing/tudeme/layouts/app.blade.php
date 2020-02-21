<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tudeme | @yield('title')</title>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ asset('') }}/tomulumbi_logo.ico" type="image/x-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('themes/tudeme/yummy') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/tudeme/yummy') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/tudeme/yummy') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/tudeme/yummy') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/tudeme/yummy') }}/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container">
            <div class="logo">
                <a href="{{route('tudeme')}}"><img width="93px" src="{{ asset('') }}/tomulumbi.png" alt="tomulumbi"></a>
            </div>
            <div class="nav-menu">
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="{{route('tudeme')}}">Home</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="{{route('tudeme.about')}}">About Me</a></li>
                                <li><a href="{{route('tudeme.categories')}}">Categories</a></li>
                                <li><a href="{{route('tudeme.recipe')}}">Recipe</a></li>
                                <li><a href="{{route('tudeme.blog')}}">Blog</a></li>
                                <li><a href="{{route('tudeme.contact')}}">Contact</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('tudeme.recipe')}}">Recipes</a></li>
                        <li><a href="{{route('tudeme.categories')}}">Best Of</a></li>
                        <li><a href="{{route('tudeme.contact')}}">Contact</a></li>
                    </ul>
                </nav>
                <div class="nav-right search-switch">
                    <i class="fa fa-search"></i>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->
    @yield('body')

    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="fs-left">
                        <div class="logo">
                            <a href="{{route('tudeme')}}">
                                <img width="150px" src="{{ asset('') }}/tomulumbi.png" alt="tomulumbi">
                            </a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                            viverra maecenas accumsan lacus vel facilisis.</p>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <form action="#" class="subscribe-form">
                        <h3>Subscribe to our newsletter</h3>
                        <input type="email" placeholder="Your e-mail">
                        <button type="submit">Subscribe</button>
                    </form>
                    <div class="social-links">
                        <a href="https://www.instagram.com/tomulumbi"><i class="fa fa-instagram"></i><span>Instagram</span></a>
                        <a href="https://www.facebook.com/tomulumbi"><i class="fa fa-facebook"></i><span>Facebook</span></a>
                        <a href="https://twitter.com/tomulumbi"><i class="fa fa-twitter"></i><span>Twitter</span></a>
                        <a href="#"><i class="fa fa-youtube"></i><span>Youtube</span></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text">
                        <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> <a href="https://www.tomulumbi.com">tomulumbi</a>. All Rights Reserved. <br> Designed &amp; Developed by <a href="https://fluidtechglobal.com">Fluidtech Global</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model -->
	<div class="search-model">
		<div class="h-100 d-flex align-items-center justify-content-center">
			<div class="search-close-switch">+</div>
			<form class="search-model-form">
				<input type="text" id="search-input" placeholder="Search here.....">
			</form>
		</div>
	</div>
	<!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{ asset('themes/tudeme/yummy') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('themes/tudeme/yummy') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('themes/tudeme/yummy') }}/js/jquery.slicknav.js"></script>
    <script src="{{ asset('themes/tudeme/yummy') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('themes/tudeme/yummy') }}/js/mixitup.min.js"></script>
    <script src="{{ asset('themes/tudeme/yummy') }}/js/main.js"></script>
</body>

</html>
