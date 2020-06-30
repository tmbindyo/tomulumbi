<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>tomulumbi | {{$design->name}}</title>
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
    <link rel="shortcut icon" href="{{ asset('') }}/tomulumbi_logo.ico" type="image/x-icon">

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
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="{{route('welcome')}}">Home</a></li>
                        <li><a href="{{route('personal.albums')}}">Personal Albums</a></li>
                        <li><a href="{{route('client.proofs')}}">Client Proofs</a></li>
                        <li class="active"><a href="{{route('designs')}}">Designs</a></li>
                        <li><a href="{{route('journals')}}">Journals</a></li>
                        <li><a href="{{route('projects')}}">Projects</a></li>
                        <li><a href="{{route('tudeme')}}">Tudeme</a></li>
                        <li><a href="{{route('store')}}">Store</a></li>
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
                        <a class="colorlib-logo" href="{{route('designs')}}">tomulumbi</a>
                    </div>
                    <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
                </div>
            </div>
        </div>
    </header>

    <div id="colorlib-work">
        <div class="container">
            <div class="row text-center">
                <h2 class="bold">{{$design->name}}</h2>
            </div>

            <div class="row">
                @foreach($design->design_works as $designWork)
                    @if($loop->iteration % 2 == 0)
                        <div class="col-md-12">
                            <div class="work-entry-flex animate-box js-fullheight">
                                <div class="col-three-forth js-fullheight">
                                    <div class="row no-gutters">
                                        <div class="col-md-12 no-gutters">
                                            <div class="work-img js-fullheight" style="background-image: url({{Minio::getUserMediumFileUrl( $designWork->upload->pixels1500 )}});">
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
                                                        <h2><a href="{{route('design.work',$designWork->id)}}">{{$designWork->name}}</a></h2>
                                                        <p>{{$designWork->description}}</p>
                                                        <p><a href="{{route('design.work',$designWork->id)}}" class="btn-view">View Photo</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="work-entry-flex animate-box js-fullheight">
                                <div class="col-three-forth js-fullheight">
                                    <div class="row no-gutters">
                                        <div class="col-md-12 col-md-push-10 no-gutters">
                                            <div class="work-img js-fullheight" style="background-image: url({{Minio::getUserMediumFileUrl( $designWork->upload->pixels1500 )}});">
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
                                                        <h2><a href="{{route('design.work',$designWork->id)}}">{{$designWork->name}}</a></h2>
                                                        <p>{{$designWork->description}}</p>
                                                        <p><a href="{{route('design.work',$designWork->id)}}" class="btn-view">View Work</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                @endforeach



            </div>
        </div>
    </div>

    <div id="colorlib-subscribe">
        <div class="overlay"></div>
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-6 col-md-offset-3">
                    <div class="row">
                        <div class="col-md-12">

                            {{--  albums  --}}
                            @if($designAlbums)
                                @foreach ($designAlbums as $album)
                                    <div class="col-one-third">
                                        <div class="form-group">
                                            @if($album->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                                <a href="{{ route('client.proof.access', $album->id) }}" class="btn btn-primary">View Album {{$album->name}}</a>
                                            @elseif($album->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                                <a href="{{ route('personal.album.access', $album->id) }}" class="btn btn-primary">View Album {{$album->name}}</a>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            {{--  journals  --}}
                            @if($designJournals)
                                @foreach ($designJournals as $journal)
                                    <div class="col-one-third">
                                        <div class="form-group">
                                            <a href="{{ route('journal.show', $journal->id) }}" class="btn btn-primary">View Journal {{$journal->name}}</a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

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
                                <p>General Accident House, <br> 2nd Floor</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-pb-sm text-center">
                        <h2>Get in Touch</h2>
                        <p><a href="#">info@tomulumbi.com</a></p>
                    </div>
                    <div class="col-md-4 col-pb-sm text-center">
                        <h2>Social</h2>
                        <p class="colorlib-social-icons">
                            <a href="https://www.instagram.com/tomulumbi/"><i class="icon-instagram2"></i></a>
                            <a href="https://twitter.com/tomulumbi"><i class="icon-twitter2"></i></a>
                            <a href="https://www.behance.net/tomulumbi"><i class="icon-behance"></i></a>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>
								<span class="block"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This site is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://fluidtechglobal.com" target="_blank">Fluidtech Global</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --><br></span>
                            <span class="block">Images: <a href="https://www.tomulumbi.com/" target="_blank">tomulumbi</a></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

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

