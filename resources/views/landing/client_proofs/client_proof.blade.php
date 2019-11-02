<!DOCTYPE HTML>
<html>
	<head>
		<title>Tomulumbi | {{$album->name}}</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="{{ asset('client_proof/story') }}/assets/css/main.css" />

	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper" class="divided">

				<!-- Banner -->
					<section class="banner {{$album->cover_design->reference}} {{$album->scheme->reference}} {{$album->color->reference}} {{$album->orientation->reference}} {{$album->content_align->reference}} {{$album->image_position->reference}} fullscreen onload-image-fade-in onload-content-fade-right">
						<div class="content">
							<h1>{{$album->name}}</h1>
							<p class="major">{{$album->date}}</p>
							<ul class="actions vertical">
								<li><a href="{{route('client.proof.show',$album->id)}}" class="button big wide smooth-scroll-middle">CLICK HERE TO OPEN</a></li>
							</ul>
						</div>
                        <div class="p-grid-isotope">


                        </div><!-- p-grid -->
						<div class="image">
                            @if(empty($album->cover_image->banner))
                                <img src="{{ asset('client_proof/story') }}/images/banner.jpg" alt="" />
                            @elseif(isset($album->cover_image->banner))
							    <img src="{{ asset('') }}{{ $album->cover_image->banner }}" alt="" />
                            @endif
						</div>
					</section>

				<!-- Footer -->
					<footer class="wrapper style1 align-center">
						<div class="inner">
							<ul class="icons">
								<li><a href="#" class="icon style2 fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon style2 fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon style2 fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon style2 fa-linkedin"><span class="label">LinkedIn</span></a></li>
								<li><a href="#" class="icon style2 fa-envelope"><span class="label">Email</span></a></li>
							</ul>
							<p>&copy; tomulumbi. Design: <a href="https://www.tomulumbi.com">tomulumbi</a>.</p>
						</div>
					</footer>

			</div>


		<!-- Scripts -->
        <script src="{{ asset('client_proof/story') }}/assets/js/jquery.min.js"></script>
        <script src="{{ asset('client_proof/story') }}/assets/js/jquery.scrollex.min.js"></script>
        <script src="{{ asset('client_proof/story') }}/assets/js/jquery.scrolly.min.js"></script>
        <script src="{{ asset('client_proof/story') }}/assets/js/skel.min.js"></script>
        <script src="{{ asset('client_proof/story') }}/assets/js/util.js"></script>
        <script src="{{ asset('client_proof/story') }}/assets/js/main.js"></script>

		<!-- Note: Only needed for demo purposes. Delete for production sites. -->
        <script src="{{ asset('client_proof/story') }}/assets/js/demo.js"></script>


	</body>
</html>
