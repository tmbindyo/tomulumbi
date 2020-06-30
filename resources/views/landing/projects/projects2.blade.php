<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hello World</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('themes/project/po/') }}/css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('themes/project/po/') }}/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('themes/project/po/') }}/style.css">
</head>
<body>
<header class="site-header">
    <div class="site-branding">
        <h1 class="site-title"><a href="{{route('welcome')}}" rel="home"><img width="49px" src="{{ asset('') }}tomulumbi/symbol/solid/500px/1.png" alt="Logo"></a></h1>
    </div><!-- .site-branding -->

    <div class="hamburger-menu">
        <div class="menu-icon">
            <img src="{{ asset('themes/project/po/') }}/images/menu-icon.png" alt="menu icon">
        </div><!-- .menu-icon -->

        <div class="menu-close-icon">
            <img src="{{ asset('themes/project/po/') }}/images/x.png" alt="menu close icon">
        </div><!-- .menu-close-icon -->
    </div><!-- .hamburger-menu -->
</header><!-- .site-header -->

<nav class="site-navigation flex flex-column justify-content-between">
    <div class="site-branding d-none d-lg-block ">
        <h1 class="site-title"><a href="{{route('welcome')}}" rel="home"><img width="79px" src="{{ asset('') }}tomulumbi/logotype/solid/2000px/1.png" alt="Logo"></a></h1>
    </div><!-- .site-branding -->

    <ul class="main-menu flex flex-column justify-content-center">
        <li class="current-menu-item"><a href="{{route('welcome')}}">Home</a></li>
        <li><a href="{{route('personal.albums')}}">Gallaries</a></li>
        <li><a href="{{route('client.proofs')}}">Client Proof</a></li>
        <li><a href="{{route('designs')}}">Design Work</a></li>
        <li><a href="{{route('journals')}}">Journals</a></li>
        <li><a href="{{route('projects')}}">Projects</a></li>
        <li><a href="{{route('tudeme')}}">Tudeme</a></li>
        <li><a href="{{route('store')}}">Store</a></li>
    </ul>

    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> <a href="https://www.tomulumbi.com">tomulumbi</a> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://fluidtechglobal.com" target="_blank">FluidTech Global</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</p>


    <div class="social-profiles">
        <ul class="flex justify-content-start justify-content-lg-center align-items-center">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
        </ul>
    </div><!-- .social-profiles -->
</nav><!-- .site-navigation -->

<div class="nav-bar-sep d-lg-none"></div>

<div class="outer-container blog-page">
    <div class="container-fluid">
        <div class="row">
            @foreach ($projects as $project )

                <div class="col-12 col-xl-6 no-padding">
                    <div class="blog-content flex">
                        <figure>
                        <a href="{{route('project.show',$project->id)}}"><img src="{{Minio::getUserMediumFileUrl( $project->cover_image->pixels750 )}}" alt=""></a>
                        </figure>

                        <div class="entry-content flex flex-column justify-content-between align-items-start">
                            <header>
                                <h3><a href="{{route('project.show',$project->id)}}">{{$project->name}}</a></h3>

                                {{-- <div class="posted-by">Phil Martinez</div> --}}
                            </header>

                            <footer class="flex flex-wrap align-items-center">
                                <div class="posted-on">{{$project->date}}</div>

                                <ul class="flex flex-wrap align-items-center">
                                    <li><a href="">{{$project->project_type->name}}</a></li>
                                </ul>
                            </footer>
                        </div><!-- .entry-content -->
                    </div><!-- .blog-content -->
                </div><!-- .col -->
            @endforeach
        </div><!-- .row -->
    </div><!-- .container-fluid -->
</div><!-- .outer-container -->

<script type='text/javascript' src='{{ asset('themes/project/po/') }}/js/jquery.js'></script>
<script type='text/javascript' src='{{ asset('themes/project/po/') }}/js/custom.js'></script>

</body>
</html>
