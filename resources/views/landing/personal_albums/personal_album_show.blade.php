<!DOCTYPE html>

<html class="no-js"  lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="{{ asset('') }}/tomulumbi_logo.ico" type="image/x-icon">
    <title>tomulumbi | {{$album->name}}</title>

    <!-- Gallery Popup Plugin With jQuery - LC Lightbox -->
    <link rel="stylesheet" href="{{ asset('inspinia') }}/css/plugins/lc-lightbox/css/lc_lightbox.css">
    <!-- dark -->
    <link rel="stylesheet" href="{{ asset('inspinia') }}/css/plugins/lc-lightbox/skins/dark.css">
    <!-- light -->
    <link rel="stylesheet" href="{{ asset('inspinia') }}/css/plugins/lc-lightbox/skins/light.css">
    <!-- minimal -->
    <link rel="stylesheet" href="{{ asset('inspinia') }}/css/plugins/lc-lightbox/skins/minimal.css">


    <!-- Normalize -->
    <link rel="stylesheet" href="{{ asset('themes/personal_albums/pixca') }}/css/assets/normalize.css" type="text/css">

    <!-- Bootstrap -->
    <link href="{{ asset('themes/personal_albums/pixca') }}/css/assets/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Font-awesome.min -->
    <link href="{{ asset('themes/personal_albums/pixca') }}/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Effet -->
    <link rel="stylesheet" href="{{ asset('themes/personal_albums/pixca') }}/css/gallery/foundation.min.css"  type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('themes/personal_albums/pixca') }}/css/gallery/set1.css" />

    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('themes/personal_albums/pixca') }}/css/main.css" type="text/css">

    <!-- Responsive Style -->
    <link href="{{ asset('themes/personal_albums/pixca') }}/css/responsive.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="{{ asset('themes/personal_albums/pixca') }}/js/assets/modernizr-2.8.3.min.js" type="text/javascript"></script>
</head>

<body>

<!-- header -->

<header id="header" class="header">
    <div class="container-fluid">
        <hgroup>

            <!-- logo -->

            <h1> <a href="{{route('personal.albums')}}" title="tomulumbi"><img src="{{ asset('') }}tomulumbi/logotype/solid/2000px/1.png" alt="tomulumbi" title="tomulumbi"/></a> </h1>

            <!-- logo -->

            <!-- nav -->
            <nav>
                <div class="menu-expanded">
                    <div class="nav-icon">
                        <div id="menu" class="menu"></div>
                        <p>menu</p>
                        <p>menu</p>
                        <p>menu</p>
                        <p>menu</p>
                    </div>
                    <div class="cross"> <span class="linee linea1"></span> <span class="linee linea2"></span> <span class="linee linea3"></span> </div>
                    <div class="main-menu">
                        <ul>
                            <li><a href="{{route('tomulumbi')}}">Home</a></li>
                            <li class="active"><a href="{{route('personal.albums')}}">Gallery</a></li>
                            <li><a href="{{route('tags')}}">Gallery Tag View</a></li>
                            <li class=""><a href="{{route('client.proofs')}}">Client Proof</a></li>
                            <li class=""><a href="{{route('designs')}}">Design</a></li>
                            <li class=""><a href="{{route('journals')}}">Journals</a></li>
                            <li class=""><a href="{{route('projects')}}">Projects</a></li>
                            <li class=""><a href="{{route('tudeme')}}">Tudeme</a></li>
                            <li class=""><a href="{{route('store')}}">Store</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- nav -->

        </hgroup>
    </div>
</header>

<!-- header -->

<main class="main-wrapper" id="container">

    <!-- image Gallery -->

    <div class="wrapper">
        <div class="">
            <ul class="{{$album->thumbnail_size->reference}} masonry">
                @foreach($albumSets as $albumSet)
                    @foreach($albumSet->album_images as $albumSetImage)
                        <li class="masonry-item grid">
                            <figure class="effect-sarah"> <img src="{{ asset('') }}{{ $albumSetImage->upload->pixels750 }}" alt="" />
                                <figcaption>
                                     {{-- <h2>{{ $albumSetImage->upload->large }}</h2> --}}
                                    {{--  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>  --}}
                                    <a class="elem"
                                       href="{{ asset('') }}{{ $albumSetImage->upload->pixels1500 }}"
                                       title="View"
                                       data-lcl-txt="Description 1"
                                       data-lcl-author="tomulumbi"
                                       data-lcl-thumb="{{ asset('') }}{{ $albumSetImage->upload->pixels750 }}">
                                        <span style="background-image: url({{ asset('') }}{{ $albumSetImage->upload->large }});"></span>
                                    </a>
                                </figcaption>
                            </figure>
                        </li>
                    @endforeach
                @endforeach
            </ul>
        </div>
        <br>

        <br>
    </div>
</main>

<!-- Image Gallery -->

<!-- footer -->

<footer class="footer">
    <h3>Stay connected with us</h3>
    <div class="container footer-bot">
        <div class="row">
            <!-- logo -->

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3"> <img width="93px" src="{{ asset('') }}tomulumbi/logotype/solid/2000px/1.png" alt="tomulumbi" title="tomulumbi"/>
                <p class="copy-right">Copyright &copy; <script>document.write(new Date().getFullYear());</script></p>
            </div>

            <!-- logo -->

            <!-- address -->

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 padding-top">
                <address>
                    <p>General Accident House</p>
                    <p>Ralph Bunche Rd,  Nairobi</p>
                </address>
            </div>

            <!-- address -->

            <!-- email -->

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 padding-top">
                <p><a href="mailto:contact@tomulumbi.com">contact@tomulumbi.com</a></p>
                <p>+254 739 459 370</p>
            </div>

            <!-- social -->

            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 padding-top">
                <ul class="social">
                    <li><a href="https://facebook.com/tomulumbi"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/tomulumbi"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/tomulumbi"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.behance.net/tomulumbi"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
                </ul>
                <p class="made-by">Made with by <i class="fa fa-heart" aria-hidden="true"></i> <a href="http://www.fluidtechglobal.com/" target="_blank">Fluidtech Global</a>
                <p>
            </div>

            <!-- social -->

        </div>
    </div>
</footer>

<!-- footer -->

<!-- ***** donwload pin modal ***** -->
<div class="contact-popup-form" id="contact-modal-md">
    <div class="modal fade contact-modal-md" tabindex="-1" role="dialog" aria-labelledby="contact-modal-md" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <i class="center fa fa-4x fa-download"></i>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('personal.album.download.pin',$albumView->id) }}" autocomplete="off" class="form-horizontal form-label-left">
                        @csrf

                        <div class="has-warning">
                            <input type="number" name="download_pin" required="required" class="form-control input-lg" required="required" placeholder="Proof Download Pin">
                        </div>

                        <br>

                        @if($album->client_access_password != '')
                            <div class="has-warning">
                                <input type="text" name="client_exclusive_password" required="required" class="form-control input-lg" required="required" placeholder="Client Exclusive Password">
                            </div>
                        @endif

                        <br>

                        <div class="row text-center">
                            <button type="submit" class="btn btn-success btn-block btn-lg ">{{ __('DOWNLOAD') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** download pin modal ***** -->


<!-- jQuery -->
<script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/lc-lightbox/js/lc_lightbox.lite.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/lc-lightbox/lib/AlloyFinger/alloy_finger.min.js"></script>
<script src="{{ asset('themes/personal_albums/pixca') }}/js/assets/plugins.js" type="text/javascript"></script>
<script src="{{ asset('themes/personal_albums/pixca') }}/js/assets/bootstrap.min.js" type="text/javascript"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script src="{{ asset('themes/personal_albums/pixca') }}/js/maps.js" type="text/javascript"></script>
<script src="{{ asset('themes/personal_albums/pixca') }}/js/custom.js" type="text/javascript"></script>
<script src="{{ asset('themes/personal_albums/pixca') }}/js/jquery.contact.js" type="text/javascript"></script>
<script src="{{ asset('themes/personal_albums/pixca') }}/js/main.js" type="text/javascript"></script>
<script src="{{ asset('themes/personal_albums/pixca') }}/js/gallery/masonry.pkgd.min.js" type="text/javascript"></script>
<script src="{{ asset('themes/personal_albums/pixca') }}/js/gallery/imagesloaded.pkgd.min.js" type="text/javascript"></script>
<script src="{{ asset('themes/personal_albums/pixca') }}/js/gallery/jquery.infinitescroll.min.js" type="text/javascript"></script>
<script src="{{ asset('themes/personal_albums/pixca') }}/js/gallery/main.js" type="text/javascript"></script>
<script src="{{ asset('themes/personal_albums/pixca') }}/js/jquery.nicescroll.min.js" type="text/javascript"></script>
<script>
    lc_lightbox('.elem', {
        wrap_class: 'lcl_fade_oc',
        gallery : true,
        thumb_attr: 'data-lcl-thumb',
        skin: 'dark',
        preload_all   :false,
        ol_time_diff  : 100,
        fading_time   : 50,
        animation_time  : 300,
        fullscreen    :true,
        show_author   :false,
        show_descr    :false,
        show_title    :false,
        touchswipe    :true,
        mousewheel    :true,
        rclick_prevent  :true,
        @if($album->is_download == 1 )
        download    :true,
        @endif
        // more options here
    });
</script>
</body>
</html>
