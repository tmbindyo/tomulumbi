<!DOCTYPE HTML>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta charset="utf-8">
    <!-- Description, Keywords and Author -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>tomulumbi | designs</title>
    <link rel="shortcut icon" href="{{ asset('') }}/tomulumbi_logo.ico" type="image/x-icon">

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
            <a href="{{route('tomulumbi')}}" title="tomulumbi"><img width="93px" src="{{ asset('') }}tomulumbi/logotype/solid/2000px/1.png" title="tomulumbi" alt="tomulumbi"/></a>
        </h1>
        <!-- logo -->

        <!-- nav -->
        <nav role="header-nav" class="navy">
            <ul>
                <li class=""><a href="{{route('tomulumbi')}}" title="home">Home</a></li>
                <li class=""><a href="{{route('personal.albums')}}" title="Gallaries">Gallaries</a></li>
                <li class=""><a href="{{route('client.proofs')}}" title="Client Proofs">Client Proofs</a></li>
                <li class="nav-active"><a href="{{route('designs')}}" title="Designa">Designs</a></li>
                <li class=""><a href="{{route('journals')}}" title="Journals">Journals</a></li>
                <li class=""><a href="{{route('projects')}}" title="Projects">Projects</a></li>
                <li class=""><a href="{{route('tudeme')}}" title="Tudeme">Tudeme</a></li>
                <li class=""><a href="{{route('store')}}" title="Store">Store</a></li>
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
            <ul class="grid-lod effect-1" id="grid">
                @foreach($designs as $design)
                    @if($loop->iteration % 2 == 1)
                        <li>
                            <figure class="effect-oscar">
                                <img src="{{Minio::getUserMediumFileUrl( $design->cover_image->pixels750 )}}" alt="" class="img-responsive"/>
                                <figcaption>
                                    <h2>{{ $design->name }}</h2>
                                    <p>{{ $design->description }}</p>
                                    <h5><span>@isset($design->design_contacts) @foreach($design->design_contacts as $contact)[{{$contact->contact->first_name}} {{$contact->contact->last_name}}] @endforeach @endisset</span></h5>
                                    <a href="{{route('design.show',$design->id)}}">View</a>
                                </figcaption>
                            </figure>
                        </li>
                    @endif
                @endforeach
            </ul>
        </section>

        <section class="col-xs-12 col-sm-6 col-md-6 col-lg-6 grid">
            <ul class="grid-lod effect-2" id="grid">
                @foreach($designs as $design)
                    @if($loop->iteration % 2 == 0)
                        <li>
                            <figure class="effect-oscar">
                                <img src="{{Minio::getUserMediumFileUrl( $design->cover_image->pixels750 )}}" alt="" class="img-responsive"/>
                                <figcaption>
                                    <h2>{{ $design->name }} </h2>
                                    <p>{{ $design->description }}</p>
                                    <p><span>@isset($design->design_contacts) @foreach($design->design_contacts as $contact)[{{$contact->contact->first_name}} {{$contact->contact->last_name}}] @endforeach @endisset</span></p>
                                    <a href="{{route('design.show',$design->id)}}">View</a>
                                </figcaption>
                            </figure>
                        </li>
                    @endif
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
