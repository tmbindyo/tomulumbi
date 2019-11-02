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
                <span class="symbol"><img src="{{ route('welcome') }}" alt="" /></span><span class="title">TOMULUMBI</span>
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
        <h2>Menu</h2>
        <ul>
            <li><a href="{{route('client.proofs')}}">Home</a></li>
            <li><a href="generic.html">Ipsum veroeros</a></li>
            <li><a href="generic.html">Tempus etiam</a></li>
            <li><a href="generic.html">Consequat dolor</a></li>
            <li><a href="elements.html">Elements</a></li>
        </ul>
    </nav>
    <!-- nav -->

    <!-- Main -->
    <div id="main">
        <div class="inner">


            <!-- page header -->
            <header>
                {{--        <h1><!--[-->This is Phantom, a free, fully responsive site<!--]--><br />--}}
                {{--            <!--[-->template designed by <a href="http://html5up.net">HTML5 UP</a>.<!--]--></h1>--}}
                {{--        <p>Etiam quis viverra lorem, in semper lorem. Sed nisl arcu euismod sit amet nisi euismod sed cursus arcu elementum ipsum arcu vivamus quis venenatis orci lorem ipsum et magna feugiat veroeros aliquam. Lorem ipsum dolor sit amet nullam dolore.</p>--}}
            </header>
        <!-- /page header -->

            <!-- page content -->
            <section class="tiles">
                @foreach($albums as $album)
                    <article class="style1">
                <span class="image">
                    @if(empty($album->cover_image->small_thumbnail))
                        <img src="{{ asset('client_proof/phantom') }}/images/pic01.jpg" alt="" />
                    @elseif(isset($album->cover_image->small_thumbnail))
                        <img src="{{ asset('') }}{{ $album->cover_image->small_thumbnail }}" alt="" />
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

    <!-- footer -->
    <footer id="footer">
        <div class="inner">
            <section>
                <h2>Get in touch</h2>
                <form method="post" action="#">
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
            <section>
                <h2>Follow</h2>
                <ul class="icons">
                    <li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
                    <li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
                    <li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
                    <li><a href="#" class="icon style2 fa-dribbble"><span class="label">Dribbble</span></a></li>
                    <li><a href="#" class="icon style2 fa-phone"><span class="label">Phone</span></a></li>
                    <li><a href="#" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
                </ul>
            </section>
            <ul class="copyright">
                <li>&copy; tomulumbi. All rights reserved</li><li>Design: <a href="http://www.tomulumbi.com">tomulumbi</a></li>
            </ul>
        </div>
    </footer>

    <!-- /footer -->

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
