<!DOCTYPE HTML>
<html>
<head>

    <title>tomulumbi | Client Proofs</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="shortcut icon" href="{{ asset('') }}/tomulumbi_logo.ico" type="image/x-icon">

    <!--[if lte IE 8]><script src="{{ asset('themes/client_proof/phantom') }}/assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="{{ asset('themes/client_proof/phantom') }}/assets/css/main.css" />
    <!--[if lte IE 9]><link rel="stylesheet" href="{{ asset('themes/client_proof/phantom') }}/assets/css/ie9.css" /><![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{ asset('themes/client_proof/phantom') }}/assets/css/ie8.css" />
    <![endif]-->


</head>
<body>
<!-- Wrapper -->
<div id="wrapper">

    <!-- top navbar -->
    <header id="header">
        <div class="inner">

            <!-- Logo -->
            <a href="{{ route('tomulumbi') }}" class="logo">
                <span class="symbol"><img src="{{ asset('') }}tomulumbi/symbol/solid/500px/1.png" alt="" /></span><span class="title">tomulumbi</span>
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
                <li><a href="{{route('tomulumbi')}}">Home</a></li>
                <li><a href="{{route('personal.albums')}}">Galleries</a></li>
                <li><a href="{{route('client.proofs')}}">Client Proof</a></li>
                <li><a href="{{route('designs')}}">Designs</a></li>
                <li><a href="{{route('journals')}}">Journals</a></li>
                <li><a href="{{route('projects')}}">Projects</a></li>
                <li><a href="{{route('tudeme')}}">Tudeme</a></li>
                <li><a href="{{route('store')}}">Store</a></li>
            </ul>
    </nav>
    <!-- nav -->

    <!-- Main -->
    <div id="main">
        <div class="inner">

            <!-- page content -->
            <section class="tiles">
                @foreach($albums as $album)
                    <article class="style1">
                <span class="image">
                    @if(empty($album->cover_image->pixels1500))
                        <img src="{{ asset('themes/client_proof/phantom') }}/images/background.jpg" alt="" />
                    @elseif(isset($album->cover_image->pixels1500))
                        <img src="{{Minio::getUserMediumFileUrl( $album->cover_image->pixels750 )}}" alt="" />
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

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">
            <section>
                <h2>Get in touch</h2>
                <form method="post" action="{{ route('email.store') }}">
                    @csrf
                    <div class="field half first">
                        <input type="text" name="name" id="name" placeholder="Name" required />
                    </div>
                    <div class="field half">
                        <input type="email" name="email" id="email" placeholder="Email" required />
                    </div>
                    <div class="field">
                        <input type="text" name="subject" id="subject" placeholder="Subject" required />
                    </div>
                    <div class="field">
                        <textarea name="message" id="message" placeholder="Message" required></textarea>
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
                    <li><a href="#" class="icon style2 fa-dribbble"><span class="label">Behance</span></a></li>
                    <li><a href="#" class="icon style2 fa-dribbble"><span class="label">Dribbble</span></a></li>
                    <li><a href="#" class="icon style2 fa-phone"><span class="label">Phone</span></a></li>
                    <li><a href="#" class="icon style2 fa-envelope-o"><span class="label">Email</span></a></li>
                </ul>
            </section>
            <ul class="copyright">
                <li>&copy; tomulumbi. All rights reserved</li><li>Design: <a href="http://fluidtechglobal.com">Fluidtech Global</a></li>
            </ul>
        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('themes/client_proof/phantom') }}/assets/js/jquery.min.js"></script>
<script src="{{ asset('themes/client_proof/phantom') }}/assets/js/skel.min.js"></script>
<script src="{{ asset('themes/client_proof/phantom') }}/assets/js/util.js"></script>

<!--[if lte IE 8]>
<script src="{{ asset('themes/client_proof/phantom') }}/assets/js/ie/respond.min.js"></script>
<![endif]-->

<script src="{{ asset('themes/client_proof/phantom') }}/assets/js/main.js"></script>


</body>
</html>
