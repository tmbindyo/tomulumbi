<!DOCTYPE HTML>
<html>
	<head>
		<title>TOMULUMBI | Album Name</title>
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
								<li><a href="#first" class="button big wide smooth-scroll-middle">OPEN</a></li>
							</ul>
						</div>
						<div class="image">
                            @if(empty($album->cover_image->banner))
                                <img src="{{ asset('client_proof/story') }}/images/banner.jpg" alt="" />
                            @elseif(isset($album->cover_image->banner))
							    <img src="{{ asset('') }}{{ $album->cover_image->banner }}" alt="" />
                            @endif
						</div>
					</section>

				<!-- Spotlight -->
					<section class="spotlight style1 orient-right content-align-left image-position-center onscroll-image-fade-in" id="first">
						<div class="content">
							<h2>Spotlight</h2>
							<p>This is a <strong>Spotlight</strong> element, and it's generally used &ndash; as its name implies &ndash; to spotlight a particular feature, subject, or pretty much whatever. You can customize its <span class="demo-controls">appearance with a number of modifiers</span>, as well as assign it an optional <code>onload</code> or <code>onscroll</code> transition modifier (<a href="#reference-spotlight">details</a>).</p>
							<ul class="actions vertical">
								<li><a href="#" class="button">Learn More</a></li>
							</ul>
						</div>
						<div class="image">
							<img src="{{ asset('client_proof/story') }}/images/spotlight01.jpg" alt="" />
						</div>
					</section>

				<!-- Spotlight -->
					<section class="spotlight style1 orient-left content-align-left image-position-center onscroll-image-fade-in">
						<div class="content">
							<h2>Spotlight</h2>
							<p>This is also a <strong>Spotlight</strong> element, and it's here because this demo would look a bit empty with just one spotlight. Like all spotlights, you can customize its <span class="demo-controls">appearance with a number of modifiers</span>, as well as assign it an optional <code>onload</code> or <code>onscroll</code> transition modifier (<a href="#reference-spotlight">details</a>).</p>
							<ul class="actions vertical">
								<li><a href="#" class="button">Learn More</a></li>
							</ul>
						</div>
						<div class="image">
							<img src="{{ asset('client_proof/story') }}/images/spotlight02.jpg" alt="" />
						</div>
					</section>

				<!-- Spotlight -->
					<section class="spotlight style1 orient-right content-align-left image-position-center onscroll-image-fade-in">
						<div class="content">
							<h2>Spotlight</h2>
							<p>And yes, this is another <strong>Spotlight</strong> element, and it's also here because I need to fill a bit of space. Naturally, like any other spotlight, you can customize its <span class="demo-controls">appearance with a number of modifiers</span>, as well as assign it an optional <code>onload</code> or <code>onscroll</code> transition modifier (<a href="#reference-spotlight">details</a>).</p>
							<ul class="actions vertical">
								<li><a href="#" class="button">Learn More</a></li>
							</ul>
						</div>
						<div class="image">
							<img src="{{ asset('client_proof/story') }}/images/spotlight03.jpg" alt="" />
						</div>
					</section>


				<!-- Gallery -->
					<section class="wrapper style1 align-center">
						<div class="inner">
							<h2>Gallery</h2>
							<p>This is a <strong>Gallery</strong> element. It can behave as a lightbox (when given the <code>lightbox</code> class), and you can customize its <span class="demo-controls">appearance with a number of modifiers</span>, as well as assign it an optional <code>onload</code> or <code>onscroll</code> transition modifier (<a href="#reference-gallery">details</a>).</p>
						</div>

						<!-- Gallery -->
							<div class="gallery style2 medium lightbox onscroll-fade-in">
								<article>
									<a href="{{ asset('client_proof/story') }}/images/gallery/fulls/01.jpg" class="image">
										<img src="{{ asset('client_proof/story') }}/images/gallery/thumbs/01.jpg" alt="" />
									</a>
									<div class="caption">
										<h3>Title</h3>
										<p>Lorem ipsum dolor amet, consectetur magna etiam elit. Etiam sed ultrices.</p>
										<ul class="actions">
											<li><span class="button small">Details</span></li>
										</ul>
									</div>
								</article>
								<article>
									<a href="{{ asset('client_proof/story') }}/images/gallery/fulls/02.jpg" class="image">
										<img src="{{ asset('client_proof/story') }}/images/gallery/thumbs/02.jpg" alt="" />
									</a>
									<div class="caption">
										<h3>Title</h3>
										<p>Lorem ipsum dolor amet, consectetur magna etiam elit. Etiam sed ultrices.</p>
										<ul class="actions">
											<li><span class="button small">Details</span></li>
										</ul>
									</div>
								</article>
								<article>
									<a href="{{ asset('client_proof/story') }}/images/gallery/fulls/03.jpg" class="image">
										<img src="{{ asset('client_proof/story') }}/images/gallery/thumbs/03.jpg" alt="" />
									</a>
									<div class="caption">
										<h3>Title</h3>
										<p>Lorem ipsum dolor amet, consectetur magna etiam elit. Etiam sed ultrices.</p>
										<ul class="actions">
											<li><span class="button small">Details</span></li>
										</ul>
									</div>
								</article>
								<article>
									<a href="{{ asset('client_proof/story') }}/images/gallery/fulls/04.jpg" class="image">
										<img src="{{ asset('client_proof/story') }}/images/gallery/thumbs/04.jpg" alt="" />
									</a>
									<div class="caption">
										<h3>Title</h3>
										<p>Lorem ipsum dolor amet, consectetur magna etiam elit. Etiam sed ultrices.</p>
										<ul class="actions">
											<li><span class="button small">Details</span></li>
										</ul>
									</div>
								</article>
								<article>
									<a href="{{ asset('client_proof/story') }}/images/gallery/fulls/05.jpg" class="image">
										<img src="{{ asset('client_proof/story') }}/images/gallery/thumbs/05.jpg" alt="" />
									</a>
									<div class="caption">
										<h3>Title</h3>
										<p>Lorem ipsum dolor amet, consectetur magna etiam elit. Etiam sed ultrices.</p>
										<ul class="actions">
											<li><span class="button small">Details</span></li>
										</ul>
									</div>
								</article>
								<article>
									<a href="{{ asset('client_proof/story') }}/images/gallery/fulls/06.jpg" class="image">
										<img src="{{ asset('client_proof/story') }}/images/gallery/thumbs/06.jpg" alt="" />
									</a>
									<div class="caption">
										<h3>Title</h3>
										<p>Lorem ipsum dolor amet, consectetur magna etiam elit. Etiam sed ultrices.</p>
										<ul class="actions">
											<li><span class="button small">Details</span></li>
										</ul>
									</div>
								</article>
								<article>
									<a href="{{ asset('client_proof/story') }}/images/gallery/fulls/07.jpg" class="image">
										<img src="{{ asset('client_proof/story') }}/images/gallery/thumbs/07.jpg" alt="" />
									</a>
									<div class="caption">
										<h3>Title</h3>
										<p>Lorem ipsum dolor amet, consectetur magna etiam elit. Etiam sed ultrices.</p>
										<ul class="actions">
											<li><span class="button small">Details</span></li>
										</ul>
									</div>
								</article>
								<article>
									<a href="{{ asset('client_proof/story') }}/images/gallery/fulls/08.jpg" class="image">
										<img src="{{ asset('client_proof/story') }}/images/gallery/thumbs/08.jpg" alt="" />
									</a>
									<div class="caption">
										<h3>Title</h3>
										<p>Lorem ipsum dolor amet, consectetur magna etiam elit. Etiam sed ultrices.</p>
										<ul class="actions">
											<li><span class="button small">Details</span></li>
										</ul>
									</div>
								</article>
								<article>
									<a href="{{ asset('client_proof/story') }}/images/gallery/fulls/09.jpg" class="image">
										<img src="{{ asset('client_proof/story') }}/images/gallery/thumbs/09.jpg" alt="" />
									</a>
									<div class="caption">
										<h3>Title</h3>
										<p>Lorem ipsum dolor amet, consectetur magna etiam elit. Etiam sed ultrices.</p>
										<ul class="actions">
											<li><span class="button small">Details</span></li>
										</ul>
									</div>
								</article>
								<article>
									<a href="{{ asset('client_proof/story') }}/images/gallery/fulls/10.jpg" class="image">
										<img src="{{ asset('client_proof/story') }}/images/gallery/thumbs/10.jpg" alt="" />
									</a>
									<div class="caption">
										<h3>Title</h3>
										<p>Lorem ipsum dolor amet, consectetur magna etiam elit. Etiam sed ultrices.</p>
										<ul class="actions">
											<li><span class="button small">Details</span></li>
										</ul>
									</div>
								</article>
								<article>
									<a href="{{ asset('client_proof/story') }}/images/gallery/fulls/11.jpg" class="image">
										<img src="{{ asset('client_proof/story') }}/images/gallery/thumbs/11.jpg" alt="" />
									</a>
									<div class="caption">
										<h3>Title</h3>
										<p>Lorem ipsum dolor amet, consectetur magna etiam elit. Etiam sed ultrices.</p>
										<ul class="actions">
											<li><span class="button small">Details</span></li>
										</ul>
									</div>
								</article>
								<article>
									<a href="{{ asset('client_proof/story') }}/images/gallery/fulls/12.jpg" class="image">
										<img src="{{ asset('client_proof/story') }}/images/gallery/thumbs/12.jpg" alt="" />
									</a>
									<div class="caption">
										<h3>Title</h3>
										<p>Lorem ipsum dolor amet, consectetur magna etiam elit. Etiam sed ultrices.</p>
										<ul class="actions">
											<li><span class="button small">Details</span></li>
										</ul>
									</div>
								</article>
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
							<p>&copy; tomulumbi. Design: <a href="https://tomulumbi.com">tomulumbi</a>.</p>
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
