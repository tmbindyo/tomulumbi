<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>tomulumbi | {{$project->name}}</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('themes/project/glint/') }}/css/base.css">
    <link rel="stylesheet" href="{{ asset('themes/project/glint/') }}/css/base.css">
    <link rel="stylesheet" href="{{ asset('themes/project/glint/') }}/css/vendor.css">
    <link rel="stylesheet" href="{{ asset('themes/project/glint/') }}/css/main.css">

    <!-- script
    ================================================== -->
    <script src="{{ asset('themes/project/glint/') }}/js/modernizr.js"></script>
    <script src="{{ asset('themes/project/glint/') }}/js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ asset('') }}/tomulumbi_logo.ico" type="image/x-icon">

</head>

<body id="top">

<!-- header
================================================== -->
<header class="s-header">

    <div class="header-logo">
        <a class="site-logo" href="{{route('projects')}}">
            <img src="{{ asset('') }}/tomulumbi_logo.ico" alt="Homepage">
        </a>
    </div>

    <nav class="header-nav">

        <a href="#0" class="header-nav__close" title="close"><span>Close</span></a>

        <div class="header-nav__content">
{{--            <h3>Navigation</h3>--}}

            <ul class="header-nav__list">
                <li class="current"><a href="{{route('welcome')}}" title="home">Home</a></li>
                <li><a href="{{route('client.proofs')}}">Client Proofs</a></li>
                <li><a href="{{route('designs')}}">Designs</a></li>
                <li class="active"><a href="{{route('journals')}}">Journals</a></li>
                <li><a href="{{route('projects')}}">Projects</a></li>
                <li><a href="{{route('tudeme')}}">Tudeme</a></li>
                <li><a href="{{route('store')}}">Store</a></li>
            </ul>

            <ul class="header-nav__social">
                <li>
                    <a href="https://twitter.com/tomulumbi"><i class="fa fa-twitter"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/tomulumbi"><i class="fa fa-instagram"></i></a>
                </li>
                <li>
                    <a href="https://www.behance.net/tomulumbi"><i class="fa fa-behance"></i></a>
                </li>
                <li>
                    <a href="https://dribbble.com/tomulumbi"><i class="fa fa-dribbble"></i></a>
                </li>
            </ul>

            <div class="copyright">
                <span>Copyright &copy; <script>document.write(new Date().getFullYear());</script></span>
                <span>Site by <a href="https://www.fluidtechglobal.com/">Fluidtech</a></span>
            </div>

        </div> <!-- end header-nav__content -->

    </nav>  <!-- end header-nav -->

    <a class="header-menu-toggle" href="#0">
        <span class="header-menu-icon"></span>
    </a>

</header> <!-- end s-header -->


<!-- home
================================================== -->
<section id="home" class="s-home target-section" data-parallax="scroll" data-image-src="{{ asset('') }}{{ $project->cover_image->pixels1500 }}" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

    <div class="overlay"></div>
    <div class="shadow-overlay"></div>

    <div class="home-content">

        <div class="row home-content__main">

            <h3>{{$project->name}}</h3>

            <div class="home-content__buttons">
                <a href="#contact" class="smoothscroll btn btn--stroke">
                    Start a Project
                </a>
                <a href="#about" class="smoothscroll btn btn--stroke">
                    View
                </a>
            </div>

        </div>

        <div class="home-content__scroll">
            <a href="#about" class="scroll-link smoothscroll">
                <span>Scroll Down</span>
            </a>
        </div>

        <div class="home-content__line"></div>

    </div> <!-- end home-content -->


    <ul class="home-social">
        <li>
            <a href="https://twitter.com/tomulumbi"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
        </li>
        <li>
            <a href="https://www.instagram.com/tomulumbi"><i class="fa fa-instagram" aria-hidden="true"></i><span>Instagram</span></a>
        </li>
        <li>
            <a href="https://www.behance.net/tomulumbi"><i class="fa fa-behance" aria-hidden="true"></i><span>Behance</span></a>
        </li>
        <li>
            <a href="https://dribbble.com/tomulumbi"><i class="fa fa-dribbble" aria-hidden="true"></i><span>Dribbble</span></a>
        </li>
    </ul>
    <!-- end home-social -->

</section> <!-- end s-home -->


<!-- about
================================================== -->
<section id='about' class="s-about">

    <div class="row section-header has-bottom-sep" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead subhead--dark">{{$project->name}}</h3>
        </div>
    </div> <!-- end section-header -->

    <div class="row about-desc" data-aos="fade-up">
        <div class="col-full">
            <p>
                {{$project->description}}
            </p>
        </div>
    </div> <!-- end about-desc -->

    <div class="about__line"></div>

</section> <!-- end s-about -->


<!-- services
================================================== -->
<section id='services' class="s-services">

    <div class="row section-header has-bottom-sep" data-aos="fade-up">
        <div class="col-full">
{{--            <h3 class="subhead">What We Do</h3>--}}
{{--            <h1 class="display-2">We’ve got everything you need to launch and grow your business</h1>--}}
        </div>
    </div>

    <div class="row narrow section-intro">

        <div class="col-twelve tab-full">

{{--            <h1 class="display-2">Style Guide.</h1>--}}

            {!! $project->body !!}

        </div>

    </div>

    <div class="row services-list block-1-2 block-tab-full">

{{--        {!! $project->body !!}--}}

    </div> <!-- end services-list -->

</section> <!-- end s-services -->


<!-- clients
    ================================================== -->
    <section id="clients" class="s-clients">

        <div class="row section-header" data-aos="fade-up">
            <div class="col-full">
                <h3 class="subhead">Relationships</h3>
            </div>
        </div> <!-- end section-header -->


        <div class="row clients-outer" data-aos="fade-up">
            <div class="col-full">

                <div class="">


                    {{--  albums  --}}
                    <div class="">
                        @if($projectAlbums)
                            @foreach ($projectAlbums as $album)
                                @if($album->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                    <a class="btn btn--stroke" href="{{ route('client.proof.access', $album->id) }}">View Album {{$album->name}}</a>
                                @elseif($album->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                    <a class="btn btn--stroke" href="{{ route('personal.album.access', $album->id) }}">View Album {{$album->name}}</a>
                                @endif
                            @endforeach
                        @endif
                    </div>


                    {{--  designs  --}}
                    @if($projectDesigns)
                        @foreach ($projectDesigns as $design)
                            <a class="btn btn--stroke" href="{{ route('design.show', $design->id) }}">View Design {{$design->name}}</a>
                        @endforeach
                    @endif


                    {{--  journals  --}}
                    @if($projectJournals)
                        @foreach ($projectJournals as $journal)
                            <a class="btn btn--stroke" href="{{ route('journal.show', $journal->id) }}">View Journal {{$journal->name}}</a>
                        @endforeach
                    @endif


                </div> <!-- end clients -->
            </div> <!-- end col-full -->
        </div> <!-- end clients-outer -->
    </section> <!-- end s-clients -->

<!-- contact
================================================== -->
<section id="contact" class="s-contact">

    <div class="overlay"></div>
    <div class="contact__line"></div>

    <div class="row section-header" data-aos="fade-up">
        <div class="col-full">
            <h3 class="subhead">Contact Us</h3>
            <h1 class="display-2 display-2--light">Reach out for a new project or just say hello</h1>
        </div>
    </div>

    <div class="row contact-content" data-aos="fade-up">

        <div class="contact-primary">

            <h3 class="h6">Send Us A Message</h3>

            <form   method="post" action="{{ route('email.store') }}" novalidate="novalidate">
                @csrf
                <fieldset>

                    <div class="form-field">
                        <input name="name" type="text" id="contactName" placeholder="Your Name" value="" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="email" type="email" id="contactEmail" placeholder="Your Email" value="" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="subject" type="text" id="contactSubject" placeholder="Subject" value="" class="full-width">
                    </div>
                    <div class="form-field">
                        <textarea name="message" id="contactMessage" placeholder="Your Message" rows="10" cols="50" required="" aria-required="true" class="full-width"></textarea>
                    </div>
                    <div class="form-field">
                        <button type="submit" class="full-width btn--primary">Submit</button>
                        <div class="submit-loader">
                            <div class="text-loader">Sending...</div>
                            <div class="s-loader">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                        </div>
                    </div>

                </fieldset>
            </form>

            <!-- contact-warning -->
            <div class="message-warning">
                Something went wrong. Please try again.
            </div>

            @if (session('success'))
                <div class="message-success">
                    Your message was sent, thank you!<br>
                </div>
            @endif

            <!-- contact-success -->
            <div class="message-success">
                Your message was sent, thank you!<br>
            </div>

        </div> <!-- end contact-primary -->

        <div class="contact-secondary">
            <div class="contact-info">

                <h3 class="h6 hide-on-fullwidth">Contact Info</h3>

                <div class="cinfo">
                    <h5>Where to Find Us</h5>
                    <p>
                        General Accident House<br>
                        Ralph Bunche Rd, Nairobi<br>
                    </p>
                </div>

                <div class="cinfo">
                    <h5>Email Us At</h5>
                    <p>
                        info@tomulumbi.com
                    </p>
                </div>

                <div class="cinfo">
                    <h5>Call Us At</h5>
                    <p>
                        Phone: (+254) 739 459 370
                    </p>
                </div>

                <ul class="contact-social">
                    <li>
                        <a href="https://twitter.com/tomulumbi"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/tomulumbi/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://www.behance.net/tomulumbi"><i class="fa fa-behance" aria-hidden="true"></i></a>
                    </li>
                    <li>
                        <a href="https://dribbble.com/tomulumbi"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                    </li>
                </ul> <!-- end contact-social -->

            </div> <!-- end contact-info -->
        </div> <!-- end contact-secondary -->

    </div> <!-- end contact-content -->

    <div class="col-twelve">
        <div class="go-top">
            <a class="smoothscroll" title="Back to Top" href="#top"><i class="icon-arrow-up" aria-hidden="true"></i></a>
        </div>
    </div>
</section> <!-- end s-contact -->



<!-- photoswipe background
================================================== -->
<div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">

        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div><button class="pswp__button pswp__button--close" title="Close (Esc)"></button> <button class="pswp__button pswp__button--share" title=
                "Share"></button> <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom" title=
                "Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                        <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div>
            </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button> <button class="pswp__button pswp__button--arrow--right" title=
            "Next (arrow right)"></button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>

    </div>

</div> <!-- end photoSwipe background -->


<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader">
        <div class="line-scale-pulse-out">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>


<!-- Java Script
================================================== -->
<script src="{{ asset('themes/project/glint/') }}/js/jquery-3.2.1.min.js"></script>
<script src="{{ asset('themes/project/glint/') }}/js/plugins.js"></script>
<script src="{{ asset('themes/project/glint/') }}/js/main.js"></script>

</body>

</html>
