<!DOCTYPE html>

<html class="no-js"  lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="{{ asset('') }}/tomulumbi_logo.ico" type="image/x-icon">
    <title>tomulumbi | Personal Albums</title>

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

            <h1> <a href="{{route('tomulumbi')}}" title="tomulumbi"><img src="{{ asset('') }}tomulumbi/logotype/solid/2000px/1.png" alt="tomulumbi" title="tomulumbi"/></a> </h1>

            <!-- logo -->

            <!-- nav -->

            <nav>
                <div class="menu-expanded">
                    <div class="nav-icon">
                        <div id="menu" class="menu"></div>
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
            <ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-3 masonry">
                @foreach($albums as $album)

                    <li class="masonry-item grid">
                        @if(empty($album->cover_image->pixels750))
                            <figure class="effect-sarah"> <img src="{{ asset('client_proof/phantom') }}/images/pic01.jpg" alt="" /> </figure>
                        @elseif(isset($album->cover_image->pixels750))
                            <figure class="effect-sarah"> <img src="{{Minio::getUserMediumFileUrl( $album->cover_image->pixels750 )}}" alt="" />
                        @endif
                            <figcaption>
                                <h2>{{$album->name}}</h2>
{{--                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>--}}
                                <a href="{{route('personal.album.access',$album->id)}}">View more</a>
                            </figcaption>
                        </figure>
                    </li>

                @endforeach
            </ul>
        </div>
    </div>
</main>

<!-- Image Gallery -->


<!-- jQuery -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ asset('themes/personal_albums/pixca') }}/js/assets/jquery.min.js"><\/script>')</script>
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
</body>
</html>
