<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tomulumbi | Projects</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('themes/project/connect/') }}/css/styles-merged.css">
    <link rel="stylesheet" href="{{ asset('themes/project/connect/') }}/css/style.min.css">
    <link rel="stylesheet" href="{{ asset('themes/project/connect/') }}/css/custom.css">

    <!--[if lt IE 9]>
    <script src="{{ asset('themes/project/connect/') }}/js/vendor/html5shiv.min.js"></script>
    <script src="{{ asset('themes/project/connect/') }}/js/vendor/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- START: header -->

<div class="probootstrap-loader"></div>

<header role="banner" class="probootstrap-header">
    <div class="container">
        <a href="{{route('welcome')}}" class="probootstrap-logo">tomulumbi</a>

        <a href="#" class="probootstrap-burger-menu visible-xs" ><i>Menu</i></a>
        <div class="mobile-menu-overlay"></div>

        <nav role="navigation" class="probootstrap-nav hidden-xs">
            <ul class="probootstrap-main-nav">
                <li class="active"><a href="{{route('welcome')}}">Home</a></li>
            </ul>
            <div class="extra-text visible-xs">
                <a href="#" class="probootstrap-burger-menu"><i>Menu</i></a>
                <h5>Address</h5>
                <p>198 West 21th Street, Suite 721 New York NY 10016</p>
                <h5>Connect</h5>
                <ul class="social-buttons">
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-facebook2"></i></a></li>
                    <li><a href="#"><i class="icon-instagram2"></i></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- END: header -->

<div class="probootstrap-main">

    <section class="probootstrap-section-half">
        <div class="probootstrap-image probootstrap-animate" data-animate-effect="fadeIn" style="background-image: url({{ asset('themes/project/connect/') }}/img/image_1.jpg)"></div>
        <div class="probootstrap-text">
            <div class="probootstrap-inner probootstrap-animate">
                <h1 class="heading">Pouring Milk In Hand</h1>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <p><a href="{{route('project.show',1)}}" class="btn btn-primary">View Case Study</a></p>
            </div>
        </div>
    </section>
    <!-- END section -->
    <section class="probootstrap-section-half probootstrap-reverse">
        <div class="probootstrap-image probootstrap-animate"  data-animate-effect="fadeIn" style="background-image: url({{ asset('themes/project/connect/') }}/img/image_2.jpg)"></div>
        <div class="probootstrap-text">
            <div class="probootstrap-inner probootstrap-animate">
                <h1 class="heading">Ice Cream Sweetness</h1>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <p><a href="{{route('project.show',1)}}" class="btn btn-primary">View Case Study</a></p>
            </div>
        </div>
    </section>
    <!-- END section -->
    <section class="probootstrap-section-half">
        <div class="probootstrap-image probootstrap-animate" data-animate-effect="fadeIn" style="background-image: url({{ asset('themes/project/connect/') }}/img/image_3.jpg)"></div>
        <div class="probootstrap-text">
            <div class="probootstrap-inner probootstrap-animate">
                <h1 class="heading">Baloon on the Chair</h1>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <p><a href="{{route('project.show',1)}}" class="btn btn-primary">View Case Study</a></p>
            </div>
        </div>
    </section>
    <!-- END section -->
    <section class="probootstrap-section-half probootstrap-reverse">
        <div class="probootstrap-image probootstrap-animate" data-animate-effect="fadeIn" style="background-image: url({{ asset('themes/project/connect/') }}/img/image_4.jpg)"></div>
        <div class="probootstrap-text">
            <div class="probootstrap-inner probootstrap-animate">
                <h1 class="heading">Pink Lips in the Hole</h1>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <p><a href="{{route('project.show',1)}}" class="btn btn-primary">View Case Study</a></p>
            </div>
        </div>
    </section>
    <!-- END section -->
</div>
<footer class="probootstrap-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> <a href="https://www.tomulumbi.com">tomulumbi</a>. All Rights Reserved. <br> Designed &amp; Developed by <a href="https://fluidtechglobal.com">Fluidtech Global</a></p>
            </div>
        </div>
    </div>
</footer>



<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
</div>


<script src="{{ asset('themes/project/connect/') }}/js/scripts.min.js"></script>
<script src="{{ asset('themes/project/connect/') }}/js/main.min.js"></script>
<script src="{{ asset('themes/project/connect/') }}/js/custom.js"></script>

</body>
</html>
