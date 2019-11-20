<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>tomulumbi | {{$journal->name}}</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="{{ asset('themes/journal/Infinity10') }}/css/base.css">
    <link rel="stylesheet" href="{{ asset('themes/journal/Infinity10') }}/css/vendor.css">
    <link rel="stylesheet" href="{{ asset('themes/journal/Infinity10') }}/css/main.css">

    <style type="text/css" media="screen">
        #body {
            background: {{$journal->color}};
            padding-top: 12rem;
            padding-bottom: 12rem;
        }
    </style>

    <!-- script
    ================================================== -->
    <script src="{{ asset('themes/journal/Infinity10') }}/js/modernizr.js"></script>
    <script src="{{ asset('themes/journal/Infinity10') }}/js/pace.min.js"></script>

    <!-- favicons
     ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

<!-- header
================================================== -->
<header>

    <div class="header-logo">
        <a href="{{route('journals')}}">tomulumbi</a>
    </div>

    <a id="header-menu-trigger" href="#0">
        <span class="header-menu-icon"></span>
    </a>

    <nav id="menu-nav-wrap">

        <a href="#0" class="close-button" title="close"><span>Close</span></a>

        <h3>tomulumbi.</h3>

        <ul class="nav-list">
            <li class="current"><a href="{{route('welcome')}}" title="">Home</a></li>
            <li><a href="{{route('journals')}}" title="">Journals</a></li>
        </ul>

        <ul class="header-social-list">
            <li>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-behance"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-dribbble"></i></a>
            </li>
        </ul>

    </nav>  <!-- end #menu-nav-wrap -->

</header> <!-- end header -->


<!-- home
================================================== -->
<section id="home">

    <div class="overlay"></div>

    <div class="home-content-table">
        <div class="home-content-tablecell">
            <div class="row">
                <div class="col-twelve">

                    <h1 class="animate-intro">
                        {{$journal->name}}
                    </h1>

                    <div class="more animate-intro">
                        <a class="smoothscroll button stroke" href="#body">
                            READ
                        </a>
                    </div>

                </div> <!-- end col-twelve -->
            </div> <!-- end row -->
        </div> <!-- end home-content-tablecell -->
    </div> <!-- end home-content-table -->

    <ul class="home-social-list">
        <li class="animate-intro">
            <a href="#"><i class="fa fa-twitter"></i></a>
        </li>
        <li class="animate-intro">
            <a href="#"><i class="fa fa-instagram"></i></a>
        </li>
        <li class="animate-intro">
            <a href="#"><i class="fa fa-behance"></i></a>
        </li>
        <li class="animate-intro">
            <a href="#"><i class="fa fa-dribbble"></i></a>
        </li>
    </ul> <!-- end home-social-list -->

    <div class="scrolldown">
        <a href="#about" class="scroll-icon smoothscroll">
            Scroll Down
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </a>
    </div>

</section> <!-- end home -->


<!-- body
================================================== -->
<section id="body">

    <div class="row narrow add-bottom">

        <div class="col-twelve tab-full">

            {!! $journal->body !!}

        </div>

    </div>

</section> <!-- end body -->

<!-- portfolio
   ================================================== -->
<section id="portfolio">

    <div class="intro-wrap">

        <div class="row narrow section-intro with-bottom-sep animate-this">
            <div class="col-twelve">
                <h3>Gallery</h3>
{{--                <a class="button full-width" href="{{route('journal.gallery.show',1)}}">View</a>--}}
            </div>
        </div> <!-- end row section-intro -->

    </div> <!-- end intro-wrap -->

    <div class="row portfolio-content">
        <div class="col-twelve">
            <div id="folio-wrap" class="bricks-wrapper">
                @foreach($journal->journal_galleries as $gallery)
                    <div class="brick folio-item">
                        <div class="item-wrap animate-this" data-src="{{ asset('') }}{{$gallery->upload->pixels1000}}" data-sub-html="#01" >
                            <a href="#" class="overlay">
                                <img src="{{ asset('') }}{{$gallery->upload->pixels1000}}" alt="Skaterboy">
                                <div class="item-text">
{{--                                <span class="folio-types">--}}
{{--                                          Web Development--}}
{{--                               </span>--}}
{{--                                    <h3 class="folio-title">Shutterbug</h3>--}}
                                </div>
                            </a>
{{--                            <a href="https://www.behance.net/" class='details-link' title="details">--}}
{{--                                <i class="icon-link"></i>--}}
{{--                            </a>--}}
                        </div> <!-- end item-wrap -->

{{--                        <div id="01" class='hide'>--}}
{{--                            <h4>Shutterbug</h4>--}}
{{--                            <p>Lorem ipsum Dolor deserunt labore sint officia. Magna et aute enim proident tempor sunt quis nulla voluptate fugiat velit. <a href="https://www.behance.net/">Details</a></p>--}}
{{--                        </div>--}}
                    </div> <!-- end folio-item -->
                @endforeach
            </div> <!-- end folio-wrap -->
        </div> <!-- end twelve -->
    </div> <!-- end portfolio-content -->

</section>  <!-- end portfolio -->

<!-- footer
================================================== -->
<footer>
    <div class="footer-bottom">

        <div class="row">

            <div class="col-twelve">
                <div class="copyright">
                    <span>Copyright &copy; <script>document.write(new Date().getFullYear());</script> tomulumbi.</span>
                    <span>Design by <a href="http://www.fluidtechglobal.com/">Fluidtech Global</a></span>
                </div>
            </div>

        </div>

    </div> <!-- end footer-bottom -->

    <div id="go-top">
        <a class="smoothscroll" title="Back to Top" href="#top">
            <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
        </a>
    </div>
</footer>

<div id="preloader">
    <div id="loader"></div>
</div>

<!-- Java Script
================================================== -->
<script src="{{ asset('themes/journal/Infinity10') }}/js/jquery-2.1.3.min.js"></script>
<script src="{{ asset('themes/journal/Infinity10') }}/js/plugins.js"></script>
<script src="{{ asset('themes/journal/Infinity10') }}/js/main.js"></script>

</body>

</html>
