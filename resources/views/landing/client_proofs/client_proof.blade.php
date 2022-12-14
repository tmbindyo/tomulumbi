<!DOCTYPE HTML>
<html>
	<head>
		<title>tomulumbi | {{$album->name}}</title>
		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="{{ asset('') }}/tomulumbi_logo.ico" type="image/x-icon">
		<link rel="stylesheet" href="{{ asset('themes/client_proof/story') }}/assets/css/main.css" />

	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper" class="divided">

				<!-- Banner -->
					<section class="banner {{$album->cover_design->reference}} {{$album->scheme->reference}} {{$album->color->reference}} {{$album->orientation->reference}} {{$album->content_align->reference}} {{$album->image_position->reference}} fullscreen onload-image-fade-in onload-content-fade-right">
						<div class="content">
							<h1>{{$album->name}}</h1>
							<p class="major">{{$album->date}}</p>
							<ul class="actions horizontal">
								<li><a href="{{route('client.proofs')}}" class="button big wide smooth-scroll-middle"><span class="fa fa-arrow-left"></span> BACK</a></li>
								<li><a href="{{route('client.proof.access',$album->id)}}" class="button big wide smooth-scroll-middle"><span class="fa fa-arrow-right"></span> VIEW</a></li>
							</ul>

						</div>
                        <div class="p-grid-isotope">


                        </div><!-- p-grid -->
						<div class="image">
                            @if(empty($album->cover_image->pixels1500))
                                <img src="{{ asset('themes/client_proof/story') }}/images/banner.jpg" alt="" />
                            @elseif(isset($album->cover_image->pixels1500))
							    <img src="{{Minio::getUserMediumFileUrl( $album->cover_image->pixels1500 )}}" alt="" />
                            @endif
						</div>
					</section>

				<!-- Footer -->


			</div>


		<!-- Scripts -->
        <script src="{{ asset('themes/client_proof/story') }}/assets/js/jquery.min.js"></script>
        <script src="{{ asset('themes/client_proof/story') }}/assets/js/jquery.scrollex.min.js"></script>
        <script src="{{ asset('themes/client_proof/story') }}/assets/js/jquery.scrolly.min.js"></script>
        <script src="{{ asset('themes/client_proof/story') }}/assets/js/skel.min.js"></script>
        <script src="{{ asset('themes/client_proof/story') }}/assets/js/util.js"></script>
        <script src="{{ asset('themes/client_proof/story') }}/assets/js/main.js"></script>

		<!-- Note: Only needed for demo purposes. Delete for production sites. -->
        <script src="{{ asset('themes/client_proof/story') }}/assets/js/demo.js"></script>


	</body>
</html>
