<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>tomulumbi | Letters</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />


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
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('themes/letters/words') }}/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('themes/letters/words') }}/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('themes/letters/words') }}/css/bootstrap.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('themes/letters/words') }}/css/flexslider.css">

	<link rel="stylesheet" href="{{ asset('themes/letters/words') }}/css/style.css">


	<!-- Modernizr JS -->
	<script src="{{ asset('themes/letters/words') }}/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="{{ asset('themes/letters/words') }}/js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

	<nav id="fh5co-main-nav" role="navigation">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle active"><i></i></a>
		<div class="js-fullheight fh5co-table">
			<div class="fh5co-table-cell js-fullheight">
				<h1 class="text-center"><a class="fh5co-logo" href="{{route('letters')}}">Letters</a></h1>
				<ul>
					<li><a href="{{route('welcome')}}">Home</a></li>
				</ul>
				<p class="fh5co-social-icon">
					<a href="https://twitter.com/tomulumbi"><i class="icon-twitter2"></i></a>
					<a href="https://www.facebook.com/tomulumbi"><i class="icon-facebook2"></i></a>
					<a href="https://www.instagram.com/tomulumbi"><i class="icon-instagram"></i></a>
				</p>
			</div>
		</div>
	</nav>

	<div id="fh5co-page">
		<header>
			<div class="container">
				<div class="fh5co-navbar-brand">
					<div class="row">
						<div class="col-xs-6">
                            <a href="{{route('welcome')}}" class="fh5co-logo"><img width="93px" src="{{ asset('') }}/tomulumbi.png" alt="tomulumbi"></a>
							{{--  <h1 class="text-left"><a  href="{{route('welcome')}}"><span>tomulumbi</span></a></h1>  --}}
						</div>
						<div class="col-xs-6">
							<p class="fh5co-social-icon text-right">
								<a href="https://twitter.com/tomulumbi"><i class="icon-twitter2"></i></a>
								<a href="https://www.facebook.com/tomulumbi"><i class="icon-facebook2"></i></a>
								<a href="https://www.instagram.com/tomulumbi"><i class="icon-instagram"></i></a>
							</p>
						</div>
					</div>
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
				</div>
			</div>
		</header>
		<aside id="fh5co-hero" class="js-fullheight">
			<div class="flexslider js-fullheight">
				<ul class="slides">
			   	<li style="background-image: url(images/slide_3.jpg);">
			   		<div class="overlay-gradient"></div>
			   		<div class="container">
			   			<div class="col-md-8 col-md-offset-2 col-md-push-4 js-fullheight slider-text">
			   				<div class="slider-text-inner">
			   					<div class="desc">
			   						<span>Read My Letters To You</span>
			   						<h2>My Thoughts, My Fears</h2>
			   						<p class="fh5co-lead">With <i class="icon-heart3"></i></p>
			   					</div>
			   				</div>
			   			</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="fh5co-blog" class="fh5co-bg-section">
			<div class="container">
				<div class="row">
                    @foreach($letters as $letter)
                        <div class="col-md-4">
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="fh5co-blog animate-box">
                                        <a href="{{route('letter.show', $letter->id)}}"><img class="img-responsive" src="{{ asset('themes/letters/words') }}/images/img-4.jpg" alt=""></a>
                                        <div class="blog-text">
                                            <span class="posted_on">{{$letter->created_at}}</span>
                                            <span class="comment"><a href="">{{$letter->views}}<i class="icon-bubble"></i></a></span>
                                            <h3><a href="{{route('letter.show', $letter->id)}}">{{$letter->name}}</a></h3>
                                            <p>{{str_limit($letter->description, 200, '...')}}.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach()
				</div>
			</div>
		</div>

		<footer>
			<div id="footer">
				<div class="container">
					<div class="row copy-right">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icon">
								<a href="https://twitter.com/tomulumbi"><i class="icon-twitter2"></i></a>
								<a href="https://www.facebook.com/tomulumbi"><i class="icon-facebook2"></i></a>
								<a href="https://www.instagram.com/tomulumbi"><i class="icon-instagram"></i></a>
							</p>
							<p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> <a href="https://www.tomulumbi.com">tomulumbi</a>. All Rights Reserved. <br> Designed &amp; Developed by <a href="https://fluidtechglobal.com">Fluidtech Global</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<!-- jQuery -->
	<script src="{{ asset('themes/letters/words') }}/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('themes/letters/words') }}/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('themes/letters/words') }}/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="{{ asset('themes/letters/words') }}/js/jquery.waypoints.min.js"></script>
	<!-- Counters -->
	<script src="{{ asset('themes/letters/words') }}/js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="{{ asset('themes/letters/words') }}/js/jquery.flexslider-min.js"></script>

	<!-- Main JS (Do not remove) -->
	<script src="{{ asset('themes/letters/words') }}/js/main.js"></script>

	</body>
</html>

