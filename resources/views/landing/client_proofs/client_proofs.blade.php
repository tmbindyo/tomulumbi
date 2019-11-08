<!DOCTYPE HTML>
<html>
<head>

    <title>Tomulumbi | Client Proofs)</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--[if lte IE 8]><script src="{{ asset('client_proof/phantom') }}/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="{{ asset('client_proof/phantom') }}/assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="{{ asset('client_proof/phantom') }}/assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{ asset('client_proof/phantom') }}/assets/css/ie8.css" />
    <![endif]-->


</head>
<body>
<!-- Wrapper -->
<div id="wrapper">

    <!-- top navbar -->
    <header id="header">
        <div class="inner">

            <!-- Logo -->
            <a href="{{ route('welcome') }}" class="logo">
                <span class="symbol"><img src="{{ route('welcome') }}" alt="" /></span><span class="title">tomulumbi</span>
            </a>

            <!-- Nav -->
            <nav>
                <ul>
                    <li><a href="#menu">Menu</a></li>
                </ul>
            </nav>

        </div>
    </header>
    <!-- top navbar -->

    <!-- Menu -->
    <!-- nav -->
    <nav id="menu">
        <div class="row">
            <section>
                <h2>Get in touch</h2>
                <form method="post" action="{{ route('contact.save') }}" autocomplete="off" class="form-horizontal form-label-left">
                    @csrf
                    <div class="field half first">
                        <input type="text" name="name" id="name" placeholder="Name" />
                    </div>
                    <div class="field half">
                        <input type="email" name="email" id="email" placeholder="Email" />
                    </div>
                    <div class="field">
                        <textarea name="message" id="message" placeholder="Message"></textarea>
                    </div>
                    <ul class="actions">
                        <li><input type="submit" value="Send" class="special" /></li>
                    </ul>
                </form>
            </section>
        </div>


    </nav>
    <!-- nav -->

    <!-- Main -->
    <div id="main">
        <div class="inner">


            <!-- page header -->
            <header>
{{--                        <h1><!--[-->This is Phantom, a free, fully responsive site<!--]--><br />--}}
                {{--            <!--[-->template designed by <a href="http://html5up.net">HTML5 UP</a>.<!--]--></h1>--}}
                {{--        <p>Etiam quis viverra lorem, in semper lorem. Sed nisl arcu euismod sit amet nisi euismod sed cursus arcu elementum ipsum arcu vivamus quis venenatis orci lorem ipsum et magna feugiat veroeros aliquam. Lorem ipsum dolor sit amet nullam dolore.</p>--}}
            </header>
        <!-- /page header -->

            <!-- page content -->
            <section class="tiles">
                @foreach($albums as $album)
                    <article class="style1">
                <span class="image">
                    @if(empty($album->cover_image->large_thumbnail))
                        <img src="{{ asset('client_proof/phantom') }}/images/pic01.jpg" alt="" />
                    @elseif(isset($album->cover_image->large_thumbnail))
                        <img src="{{ asset('') }}{{ $album->cover_image->large_thumbnail }}" alt="" />
                    @endif
                </span>
                        <a href="{{route('client.proof', $album->id)}}">
                            <h2>{{$album->name}}</h2>
                            <div class="content">
                                <h5>{{$album->date}}</h5>
                            </div>
                        </a>
                    </article>
                @endforeach
            </section>
            <!-- /page content -->
        </div>
    </div>

</div>

<!-- Scripts -->
<script src="{{ asset('client_proof/phantom') }}/assets/js/jquery.min.js"></script>
<script src="{{ asset('client_proof/phantom') }}/assets/js/skel.min.js"></script>
<script src="{{ asset('client_proof/phantom') }}/assets/js/util.js"></script>

<!--[if lte IE 8]>
<script src="{{ asset('client_proof/phantom') }}/assets/js/ie/respond.min.js"></script>
<![endif]-->

<script src="{{ asset('client_proof/phantom') }}/assets/js/main.js"></script>


</body>
</html>
