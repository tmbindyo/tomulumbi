<!DOCTYPE HTML>
<html lang="en-US">
    <head>

        <title>letters - {{$letter->name}}</title>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="description" content="Template by Dry Themes" />
        <meta name="keywords" content="HTML, CSS, JavaScript, PHP" />
        <meta name="author" content="DryThemes" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="{{ asset('') }}/tomulumbi_logo.ico" type="image/x-icon">

        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700%7CPT+Serif:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css"  href='{{ asset('themes/letters/sun') }}/css/clear.css' />
        <link rel="stylesheet" type="text/css"  href='{{ asset('themes/letters/sun') }}/css/common.css' />
        <link rel="stylesheet" type="text/css"  href='{{ asset('themes/letters/sun') }}/css/font-awesome.min.css' />
        <link rel="stylesheet" type="text/css"  href='{{ asset('themes/letters/sun') }}/css/carouFredSel.css' />
        <link rel="stylesheet" type="text/css"  href='{{ asset('themes/letters/sun') }}/css/prettyPhoto.css' />
        <link rel="stylesheet" type="text/css"  href='{{ asset('themes/letters/sun') }}/css/sm-clean.css' />
        <link rel="stylesheet" type="text/css"  href='{{ asset('themes/letters/sun') }}/style.css' />

        <!--[if lt IE 9]>
                <script src="{{ asset('themes/letters/sun') }}/js/html5shiv.js"></script>
                <script src="{{ asset('themes/letters/sun') }}/js/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="single single-post">

        <table class="doc-loader">
            <tbody>
                <tr>
                    <td>
                        <img src="{{ asset('') }}tomulumbi/symbol/transparent/500*500px/1.png" alt="Loading...">
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="header-search">
            <div class="content-1330 center-relative">
                <form class="search-form">
                    <label>
                        <input type="search" class="search-field" placeholder="Search ..." value="" name="s" title="Search for:">
                    </label>
                </form>
            </div>
        </div>


        <div class="body-wrapper">
            <div class="content-1330 header-holder center-relative">
                <div class="header-logo left">

                    <h1 class="site-title">
                        <a href="{{route('welcome')}}">
                            <img width="128px" src="{{ asset('') }}/tomulumbi_sm.png" alt="Sun-">
                        </a>
                    </h1>

                </div>

                <div class="header-menu right">
                    <nav id="header-main-menu" class="left">
                        <ul class="main-menu sm sm-clean">
                            <li>
                                <a href="{{route('welcome')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{route('letters')}}">Letters</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="toggle-holder relative right">
                        <div id="toggle">
                            <i class="fa fa-search"></i>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>

            <div id="content" class="site-content content-1330 center-relative">
                <article>
                    <h1 class="entry-title">{{$letter->name}}</h1>
                    <div class="center-relative clear">

                        <div class="post-info">
                            <div class="cat-links">
                                <ul>
                                    <li>
                                        @foreach($letter->letterLetterTags as $letterLetterTag)
                                            <a href="#">{{$letterLetterTag->letterTag->name}}</a>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                            <div class="post-author">
                                Author: <a href="#">Your's Truly</a>
                            </div>
                            <div class="post-date">Date: {{$letter->created_at}}</div>
                        </div>

                        <div class="entry-content">
                            <div class="content-wrap">
                                {!! $letter->description !!}
                            </div>
                            <br>
                            <div class="clear"></div>
                            <br>


                            <div class="content-wrap">
                                {!! $letter->body !!}
                            </div>

                            <br>
                            <div class="clear"></div>
                            <br>

{{--                            <div class="post-full-width ">--}}
{{--                                <iframe src="https://player.vimeo.com/video/150685211" width="640" height="360" allowfullscreen="allowfullscreen"></iframe>--}}
{{--                            </div>--}}

                        </div>
                        <div class="clear"></div>
                    </div>
                </article>

                <div class="nav-links">
                    <div class="nav-previous">
                        <p class="nav-previous-text">PREVIOUS STORY</p>
                        @if($previous)
                            <a href="{{route('letter.show', $previous->id)}}" rel="prev">{{$previous->name}}</a>
                        @endif
                    </div>
                    <div class="nav-next">
                        <p class="nav-next-text">NEXT STORY</p>
                        @if($next)
                            <a href="{{route('letter.show', $next->id)}}" rel="next">{{$next->name}}</a>
                        @endif
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

            <!--Footer-->

            <footer class="footer">
                <div class="content-1330 center-relative">
                    <ul>
                        <li class="left-footer-content">
                            <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> <a href="https://www.tomulumbi.com">tomulumbi</a>. All Rights Reserved. <br> Designed &amp; Developed by <a href="https://fluidtechglobal.com">Fluidtech Global</a></p>
                        </li>
                        <li class="center-footer-content">
                            <a href="{{route('welcome')}}">
                                <img width="72px" src="{{ asset('') }}/tomulumbi_sm.png" alt="Sun-">
                            </a>
                        </li>
                        <li class="right-footer-contnet">
                            <a href="https://twitter.com/tomulumbi">Twitter</a>
                            <a href="https://www.facebook.com/tomulumbi">Facebook</a>
                            <a href="https://www.instagram.com/tomulumbi">Instagram</a>
                        </li>
                        <li class="left-footer-content mobile">
                            <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> <a href="https://www.tomulumbi.com">tomulumbi</a>. All Rights Reserved. <br> Designed &amp; Developed by <a href="https://fluidtechglobal.com">Fluidtech Global</a></p>
                        </li>
                    </ul>
                </div>
            </footer>

            <!-- End .body-border -->
        </div>



        <!--Load JavaScript-->
        <script src="{{ asset('themes/letters/sun') }}/js/jquery.js"></script>
        <script src="{{ asset('themes/letters/sun') }}/js/jquery.fitvids.js"></script>
        <script src="{{ asset('themes/letters/sun') }}/js/jquery.smartmenus.min.js"></script>
        <script src="{{ asset('themes/letters/sun') }}/js/imagesloaded.pkgd.js"></script>
        <script src="{{ asset('themes/letters/sun') }}/js/isotope.pkgd.js"></script>
        <script src="{{ asset('themes/letters/sun') }}/js/jquery.carouFredSel-6.0.0-packed.js"></script>
        <script src="{{ asset('themes/letters/sun') }}/js/jquery.mousewheel.min.js"></script>
        <script src="{{ asset('themes/letters/sun') }}/js/jquery.touchSwipe.min.js"></script>
        <script src="{{ asset('themes/letters/sun') }}/js/jquery.easing.1.3.js"></script>
        <script src="{{ asset('themes/letters/sun') }}/js/jquery.prettyPhoto.js"></script>
        <script src="{{ asset('themes/letters/sun') }}/js/jquery.ba-throttle-debounce.min.js"></script>
        <script src="{{ asset('themes/letters/sun') }}/js/jquery.nicescroll.min.js"></script>
        <script src="{{ asset('themes/letters/sun') }}/js/main.js"></script>
    </body>
</html>
