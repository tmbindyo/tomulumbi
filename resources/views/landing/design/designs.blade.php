<!DOCTYPE HTML>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta charset="utf-8">
    <!-- Description, Keywords and Author -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>tomulumbi | designs</title>
    <link rel="shortcut icon" href="{{ asset('themes/design/avana') }}/images/favicon.ico" type="image/x-icon">

    <!-- style -->
    <link href="{{ asset('themes/design/avana') }}/css/style.css" rel="stylesheet" type="text/css">
    <!-- style -->

    <!-- bootstrap -->
    <link href="{{ asset('themes/design/avana') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- responsive -->
    <link href="{{ asset('themes/design/avana') }}/css/responsive.css" rel="stylesheet" type="text/css">

    <!-- font-awesome -->
    <link href="{{ asset('themes/design/avana') }}/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- font-awesome -->
    <link href="{{ asset('themes/design/avana') }}/css/effects/set2.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('themes/design/avana') }}/css/effects/normalize.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('themes/design/avana') }}/css/effects/component.css"  rel="stylesheet" type="text/css" >

</head>
<body>

<!-- header -->
<header role="header">
    <div class="container">
        <!-- logo -->
        <h1>
            <a href="{{route('welcome')}}" title="tomulumbi"><img src="{{ asset('themes/design/avana') }}/images/logo.png" title="tomulumbi" alt="tomulumbi"/></a>
        </h1>
        <!-- logo -->

        <!-- nav -->
        <nav role="header-nav" class="navy">
            <ul>
                <li class="nav-active"><a href="{{route('welcome')}}" title="Work">Home</a></li>
            </ul>
        </nav>
        <!-- nav -->
    </div>
</header>
<!-- header -->

<!-- main -->
<main role="main-home-wrapper" class="container">
    <div class="row">
        <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">
            <ul class="grid-lod effect-2" id="grid">
                @foreach($firstColumn as $design)
                    <li>
                        <figure class="effect-oscar">
                            <img src="{{ asset('') }}{{ $design->pixels1000 }}" alt="" class="img-responsive"/>
                            <figcaption>
                                <h2>{{ $design->design_name }} <span>@isset($design->client_name)[{{$design->client_name}}]@endisset</span></h2>
                                <p>{{ $design->description }}</p>
                                <a href="{{route('design.show',$design->design_id)}}">View</a>
                            </figcaption>
                        </figure>
                    </li>
                @endforeach
            </ul>
        </section>

        <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">
            <ul class="grid-lod effect-2" id="grid">
                @foreach($secondColumn as $design)
                    <li>
                        <figure class="effect-oscar">
                            <img src="{{ asset('') }}{{ $design->pixels1000 }}" alt="" class="img-responsive"/>
                            <figcaption>
                                <h2>{{ $design->design_name }} <span>@isset($design->client_name)[{{$design->client_name}}] @endisset</span></h2>
                                <p>{{ $design->description }}</p>
                                <a href="{{route('design.show',$design->design_id)}}">View</a>
                            </figcaption>
                        </figure>
                    </li>
                @endforeach
            </ul>
        </section>
        <div class="clearfix"></div>
    </div>
</main>
<!-- main -->


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('themes/design/avana') }}/js/jquery.min.js" type="text/javascript"></script>

<!-- custom -->
<script src="{{ asset('themes/design/avana') }}/js/nav.js" type="text/javascript"></script>
<script src="{{ asset('themes/design/avana') }}/js/custom.js" type="text/javascript"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ asset('themes/design/avana') }}/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ asset('themes/design/avana') }}/js/effects/masonry.pkgd.min.js"  type="text/javascript"></script>
<script src="{{ asset('themes/design/avana') }}/js/effects/imagesloaded.js"  type="text/javascript"></script>
<script src="{{ asset('themes/design/avana') }}/js/effects/classie.js"  type="text/javascript"></script>
<script src="{{ asset('themes/design/avana') }}/js/effects/AnimOnScroll.js"  type="text/javascript"></script>
<script src="{{ asset('themes/design/avana') }}/js/effects/modernizr.custom.js"></script>

<!-- jquery.countdown -->
<script src="{{ asset('themes/design/avana') }}/js/html5shiv.js" type="text/javascript"></script>

</body>

</html>
