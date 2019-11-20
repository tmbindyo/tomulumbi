<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>tomulumbi | {{$design->name}}</title>

    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('themes/design/studio') }}/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('themes/design/studio') }}/css/core-style.css">
    <link rel="stylesheet" href="{{ asset('themes/design/studio') }}/style.css">

    <!-- Responsive CSS -->
    <link href="{{ asset('themes/design/studio') }}/css/responsive.css" rel="stylesheet">

</head>

<body>
<!-- Preloader -->
<div id="preloader">
    <div class="showbox">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
            </svg>
        </div>
    </div>
    <div class="questions-area text-center">
        <p>{{$design->name}} Gallery</p>
    </div>
</div>

<!-- Gradient Background Overlay -->
<div class="gradient-background-overlay"></div>

<!-- Header Area Start -->
<header class="header-area">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 h-100">
                <div class="main-menu h-100">
                    <nav class="navbar h-100 navbar-expand-lg">
                        <!-- Logo Area  -->
                        <a class="navbar-brand" href="{{route('designs')}}"><img src="{{ asset('themes/design/studio') }}/img/core-img/logo.png" alt="Logo"></a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#studioMenu" aria-controls="studioMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>

                        <div class="collapse navbar-collapse" id="studioMenu">
                            <!-- Menu Area Start  -->
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('design.show',$design->id)}}"><span class="fa fa-2x fa-arrow-left"> Back to {{$design->name}}</span></a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Area End -->

<!-- ***** Welcome Area Start ***** -->
<section class="welcome-area">
    <div class="carousel h-100 slide" data-ride="carousel" id="welcomeSlider">
        <!-- Carousel Inner -->
        <div class="carousel-inner h-100">

            @foreach($designGallery as $image)
                <div class="carousel-item h-100 bg-img @if($loop->index == 0) active @endif" style="background-image: url({{ asset('') }}{{ $image->upload->pixels1500 }});">
                    <div class="carousel-content h-100">
                        <div class="slide-text">
                            <span>{{$loop->iteration}}.</span>
                            @if($image->design_work)
                                <h2> {{$image->design_work->name}}</h2>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <!-- Carousel Indicators -->
        <ol class="carousel-indicators">
            @foreach($designGallery as $image)
                <li data-target="#welcomeSlider" data-slide-to="{{$loop->index}}" class="@if($loop->index == 0) active @endif bg-img" style="background-image: url({{ asset('') }}{{ $image->upload->pixels300 }});"></li>
            @endforeach
        </ol>
    </div>
</section>
<!-- ***** Welcome Area End ***** -->


<!-- jQuery (Necessary for All JavaScript Plugins) -->
<script src="{{ asset('themes/design/studio') }}/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="{{ asset('themes/design/studio') }}/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="{{ asset('themes/design/studio') }}/js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="{{ asset('themes/design/studio') }}/js/plugins.js"></script>
<!-- Active js -->
<script src="{{ asset('themes/design/studio') }}/js/active.js"></script>

</body>

</html>
