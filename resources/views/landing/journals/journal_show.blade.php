<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>tomulumbi | Journal</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
  ================================================== -->
    <link rel="stylesheet" href="{{ asset('themes/journal/Infinity10') }}/css/base.css">
    <link rel="stylesheet" href="{{ asset('themes/journal/Infinity10') }}/css/vendor.css">
    <link rel="stylesheet" href="{{ asset('themes/journal/Infinity10') }}/css/main.css">

    <style type="text/css" media="screen">
        #body {
            background: black;
            padding-top: 12rem;
            padding-bottom: 12rem;
        }
    </style>

    <!-- script
    ================================================== -->
    <script src="{{ asset('themes/journal/Infinity10') }}/js/modernizr.js"></script>
    <script src="{{ asset('themes/journal/Infinity10') }}/js/pace.min.js"></script>

    <!-- favicons
     ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

<!-- header
================================================== -->
<header>

    <div class="header-logo">
        <a href="{{route('welcome')}}">tomulumbi</a>
    </div>

    <a id="header-menu-trigger" href="#0">
        <span class="header-menu-text">Menu</span>
        <span class="header-menu-icon"></span>
    </a>

    <nav id="menu-nav-wrap">

        <a href="#0" class="close-button" title="close"><span>Close</span></a>

        <h3>tomulumbi.</h3>

        <ul class="nav-list">
            <li class="current"><a href="index.html" title="">Home</a></li>
            <li><a href="{{route('journals')}}" title="">Journals</a></li>
        </ul>

        <ul class="header-social-list">
            <li>
                <a href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-behance"></i></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-dribbble"></i></a>
            </li>
        </ul>

    </nav>  <!-- end #menu-nav-wrap -->

</header> <!-- end header -->


<!-- home
================================================== -->
<section id="home">

    <div class="overlay"></div>

    <div class="home-content-table">
        <div class="home-content-tablecell">
            <div class="row">
                <div class="col-twelve">

                    <h3 class="animate-intro">We Are Infinity.</h3>
                    <h1 class="animate-intro">
                        We Craft Stunning  <br>
                        Digital Experiences.
                    </h1>

                    <div class="more animate-intro">
                        <a class="smoothscroll button stroke" href="#body">
                            READ
                        </a>
                    </div>

                </div> <!-- end col-twelve -->
            </div> <!-- end row -->
        </div> <!-- end home-content-tablecell -->
    </div> <!-- end home-content-table -->

    <ul class="home-social-list">
        <li class="animate-intro">
            <a href="#"><i class="fa fa-twitter"></i></a>
        </li>
        <li class="animate-intro">
            <a href="#"><i class="fa fa-instagram"></i></a>
        </li>
        <li class="animate-intro">
            <a href="#"><i class="fa fa-behance"></i></a>
        </li>
        <li class="animate-intro">
            <a href="#"><i class="fa fa-dribbble"></i></a>
        </li>
    </ul> <!-- end home-social-list -->

    <div class="scrolldown">
        <a href="#about" class="scroll-icon smoothscroll">
            Scroll Down
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
        </a>
    </div>

</section> <!-- end home -->


<!-- body
================================================== -->
<section id="body">

    <div class="row narrow add-bottom text-center">

        <div class="col-twelve tab-full">

            <h1>This is the style page.</h1>

            <p class="lead">Lorem ipsum Officia elit ad tempor dolore est ex incididunt incididunt occaecat culpa deserunt sunt labore in cillum ullamco magna in Excepteur consequat in reprehenderit proident mollit incididunt officia commodo.
                Duis ea officia sed dolor pariatur enim dolore dolore quis incididunt nulla exercitation commodo veniam et ea incididunt.</p>

        </div>

    </div>

    <div class="row">

        <div class="col-six tab-full">

            <h3>Paragraph and Image</h3>

            <p><a href="#"><img width="120" height="120" class="pull-left" alt="sample-image" src="{{ asset('themes/journal/Infinity10') }}/images/sample-image.jpg"></a>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum.Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque posuere nunc justo tempus leo. </p>

            <p>
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentumodio, ac blandit ante orci ut diam.
            </p>

            <p>A <a href="#">link</a>,
                <abbr title="this really isn't a very good description">abbrebation</abbr>,
                <strong>strong text</strong>,
                <em>em text</em>,
                <del>deleted text</del>, and
                <mark>this is a mark text.</mark>
                <code>.code</code>
            </p>

        </div>

        <div class="col-six tab-full">

            <h3>Drop Caps</h3>

            <p class="drop-cap">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the
                Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu	posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque.
            </p>

            <h3>Small Print</h3>

            <p>Buy one widget, get one free!
                <small>(While supplies last. Offer expires on the vernal equinox. Not valid in Ohio.)</small>
            </p>

        </div>

    </div> <!-- end row -->

    <div class="row">

        <div class="col-six tab-full">

            <h3>Pull Quotes</h3>

            <aside class="pull-quote">
                <blockquote>
                    <p>It is a paradisematic country, in which roasted parts of
                        sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind
                        texts it is an almost unorthographic life One day however a small line of blind text by the name
                        of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                </blockquote>
            </aside>

        </div>

        <div class="col-six tab-full">

            <h3>Block Quotes</h3>

            <blockquote cite="http://where-i-got-my-info-from.com">
                <p>Your work is going to fill a large part of your life, and the only way to be truly satisfied is
                    to do what you believe is great work. And the only way to do great work is to love what you do.
                    If you haven't found it yet, keep looking. Don't settle. As with all matters of the heart, you'll know when you find it.
                </p>
                <cite>
                    <a href="#">Steve Jobs</a>
                </cite>
            </blockquote>

            <blockquote>
                <p>Good design is as little design as possible.</p>
                <cite>Dieter Rams</cite>
            </blockquote>

        </div>

    </div> <!-- end row -->

    <div class="row half-bottom">

        <div class="col-six tab-full">

            <h3>Example Lists</h3>

            <ol>
                <li>Here is an example</li>
                <li>of an ordered list.</li>
                <li>A parent list item.
                    <ul>
                        <li>one</li>
                        <li>two</li>
                        <li>three</li>
                    </ul>
                </li>
                <li>A list item.</li>
            </ol>

            <ul class="disc">
                <li>Here is an example</li>
                <li>of an unordered list.</li>
            </ul>

            <h3>Definition Lists</h3>

            <h5>a) Multi-line Definitions (default)</h5>

            <dl>
                <dt><strong>This is a term</strong></dt>
                <dd>this is the definition of that term, which both live in a <code>dl</code>.</dd>
                <dt><strong>Another Term</strong></dt>
                <dd>And it gets a definition too, which is this line</dd>
                <dd>This is a 2<sup>nd</sup> definition for a single term. A <code>dt</code> may be followed by multiple <code>dd</code>s.</dd>
            </dl>

        </div>

        <div class="col-six tab-full">

            <h3>Headers</h3>

            <h1>H1 Heading</h1>
            <h2>H2 Heading</h2>
            <h3>H3 Heading</h3>
            <h4>H4 Heading</h4>
            <h5>H5 Heading</h5>
            <h6>H6 Heading</h6>

            <br>

            <h3>Buttons</h3>

            <p>
                <a class="button button-primary full-width" href="#">Primary Button</a>
                <a class="button full-width" href="#">Default Button</a>
            </p>

        </div>

    </div> <!-- end row -->

    <div class="row half-bottom">

        <div class="col-twelve">

            <h3>Stats Tabs</h3>

            <ul class="stats-tabs">
                <li><a href="#">1,234 <em>Sasuke</em></a></li>
                <li><a href="#">567 <em>Hinata</em></a></li>
                <li><a href="#">23,456 <em>Naruto</em></a></li>
                <li><a href="#">3,456 <em>Kiba</em></a></li>
                <li><a href="#">456 <em>Shikamaru</em></a></li>
                <li><a href="#">26 <em>Sakura</em></a></li>
            </ul>

        </div>

    </div> <!-- end row -->

    <div class="row half-bottom">

        <div class="col-six tab-full">

            <h3>Responsive Image</h3>
            <p><img src="{{ asset('themes/journal/Infinity10') }}/images/shutterbug.jpg"></p>

        </div>

        <div class="col-six tab-full">

            <h3>Responsive video</h3>

            <div class="fluid-video-wrapper">
                <iframe src="http://player.vimeo.com/video/14592941?title=0&amp;byline=0&amp;portrait=0&amp;color=F64B39" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>

        </div>

    </div> <!-- end row -->

    <div class="row add-bottom">

        <div class="col-twelve">

            <h3>Tables</h3>
            <p>Be sure to use properly formed table markup with <code>&lt;thead&gt;</code> and <code>&lt;tbody&gt;</code> when building a <code>table</code>.</p>

            <div class="table-responsive">

                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Sex</th>
                        <th>Location</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Naruto Uzumaki</td>
                        <td>16</td>
                        <td>Male</td>
                        <td>Konoha</td>
                    </tr>
                    <tr>
                        <td>Sakura Haruno</td>
                        <td>16</td>
                        <td>Female</td>
                        <td>Konoha</td>
                    </tr>
                    </tbody>
                </table>

            </div>

        </div>

    </div> <!-- end row -->

    <div class="row">

        <div class="col-six tab-full">

            <h3>Form Styles</h3>

            <form>
                <div>
                    <label for="sampleInput">Your email</label>
                    <input class="full-width" type="email" placeholder="test@mailbox.com" id="sampleInput">
                </div>
                <div>
                    <label for="sampleRecipientInput">Reason for contacting</label>
                    <div class="ss-custom-select">
                        <select class="full-width" id="sampleRecipientInput">
                            <option value="Option 1">Questions</option>
                            <option value="Option 2">Report</option>
                            <option value="Option 3">Others</option>
                        </select>
                    </div>
                </div>

                <label for="exampleMessage">Message</label>
                <textarea class="full-width" placeholder="Your message" id="exampleMessage"></textarea>

                <label class="add-bottom">
                    <input type="checkbox">
                    <span class="label-text">Send a copy to yourself</span>
                </label>

                <input class="button-primary" type="submit" value="Submit">

            </form>

        </div>

        <div class="col-six tab-full">

            <h3>Alert Boxes</h3>

            <br>

            <div class="alert-box ss-error hideit">
                <p>Error Message. Your Message Goes Here.</p>
                <i class="fa fa-times close"></i>
            </div><!-- /error -->

            <div class="alert-box ss-success hideit">
                <p>Success Message. Your Message Goes Here.</p>
                <i class="fa fa-times close"></i>
            </div><!-- /success -->

            <div class="alert-box ss-info hideit">
                <p>Info Message. Your Message Goes Here.</p>
                <i class="fa fa-times close"></i>
            </div><!-- /info -->

            <div class="alert-box ss-notice hideit">
                <p>Notice Message. Your Message Goes Here.</p>
                <i class="fa fa-times close"></i>
            </div><!-- /notice -->

        </div>

    </div> <!-- end row -->

</section> <!-- end body -->

<!-- portfolio
   ================================================== -->
<section id="portfolio">

    <div class="intro-wrap">

        <div class="row narrow section-intro with-bottom-sep animate-this">
            <div class="col-twelve">
                <h3>Gallery</h3>
                <a class="button full-width" href="{{route('journal.gallery.show',1)}}">View</a>
            </div>
        </div> <!-- end row section-intro -->

    </div> <!-- end intro-wrap -->

    <div class="row portfolio-content">
        <div class="col-twelve">
            <div id="folio-wrap" class="bricks-wrapper">

                <div class="brick folio-item">
                    <div class="item-wrap animate-this" data-src="{{ asset('themes/journal/Infinity10') }}/images/portfolio/gallery/g-shutterbug.jpg" data-sub-html="#01" >
                        <a href="#" class="overlay">
                            <img src="{{ asset('themes/journal/Infinity10') }}/images/portfolio/shutterbug.jpg" alt="Skaterboy">
                            <div class="item-text">
	                     	<span class="folio-types">
		     					      Web Development
		     					   </span>
                                <h3 class="folio-title">Shutterbug</h3>
                            </div>
                        </a>
                        <a href="https://www.behance.net/" class='details-link' title="details">
                            <i class="icon-link"></i>
                        </a>
                    </div> <!-- end item-wrap -->

                    <div id="01" class='hide'>
                        <h4>Shutterbug</h4>
                        <p>Lorem ipsum Dolor deserunt labore sint officia. Magna et aute enim proident tempor sunt quis nulla voluptate fugiat velit. <a href="https://www.behance.net/">Details</a></p>
                    </div>
                </div> <!-- end folio-item -->

                <div class="brick folio-item">
                    <div class="item-wrap animate-this" data-src="{{ asset('themes/journal/Infinity10') }}/images/portfolio/gallery/g-yellowwall.jpg" data-sub-html="#02">
                        <a href="#" class="overlay">
                            <img src="{{ asset('themes/journal/Infinity10') }}/images/portfolio/yellowwall.jpg" alt="Shutterbug">
                            <div class="item-text">
	                     	<span class="folio-types">
		     					      Marketing
		     					   </span>
                                <h3 class="folio-title">Yellow Wall</h3>
                            </div>
                        </a>
                        <a href="https://www.behance.net/" class='details-link' title="details">
                            <i class="icon-link"></i>
                        </a>
                    </div> <!-- end item-wrap -->

                    <div id="02" class='hide'>
                        <h4>Yellow Wall</h4>
                        <p>Lorem ipsum Dolor deserunt labore sint officia. Magna et aute enim proident tempor sunt quis nulla voluptate fugiat velit. <a href="https://www.behance.net/">Details</a></p>
                    </div>
                </div> <!-- end folio-item -->

                <div class="brick folio-item">
                    <div class="item-wrap animate-this" data-src="{{ asset('themes/journal/Infinity10') }}/images/portfolio/gallery/g-architecture.jpg" data-sub-html="#03" >
                        <a href="#" class="overlay">
                            <img src="{{ asset('themes/journal/Infinity10') }}/images/portfolio/architecture.jpg" alt="Explore">
                            <div class="item-text">
		     					   <span class="folio-types">
		     					      Web Design
		     					   </span>
                                <h3 class="folio-title">Architecture</h3>
                            </div>
                        </a>
                        <a href="https://www.behance.net/" class='details-link' title="details">
                            <i class="icon-link"></i>
                        </a>
                    </div> <!-- end item-wrap -->

                    <div id="03" class='hide'>
                        <h4>Architecture</h4>
                        <p>Lorem ipsum Dolor deserunt labore sint officia. Magna et aute enim proident tempor sunt quis nulla voluptate fugiat velit. <a href="https://www.behance.net/">Details</a></p>
                    </div>
                </div> <!-- end folio-item -->

                <div class="brick folio-item">
                    <div class="item-wrap animate-this"  data-src="{{ asset('themes/journal/Infinity10') }}/images/portfolio/gallery/g-minimalismo.jpg"  data-sub-html="#04" >
                        <a href="#" class="overlay">
                            <img src="{{ asset('themes/journal/Infinity10') }}/images/portfolio/minimalismo.jpg" alt="Minimalismo">
                            <div class="item-text">
		     					   <span class="folio-types">
		     					      Web Design
		     					   </span>
                                <h3 class="folio-title">Minimalismo</h3>
                            </div>
                        </a>
                        <a href="https://www.behance.net/" class='details-link' title="details">
                            <i class="icon-link"></i>
                        </a>
                    </div> <!-- end item-wrap -->

                    <div id="04" class='hide'>
                        <h4>Minimalismo</h4>
                        <p>Lorem ipsum Dolor deserunt labore sint officia. Magna et aute enim proident tempor sunt quis nulla voluptate fugiat velit. <a href="https://www.behance.net/">Details</a></p>
                    </div>
                </div> <!-- end folio-item -->

                <div class="brick folio-item">
                    <div class="item-wrap animate-this"  data-src="{{ asset('themes/journal/Infinity10') }}/images/portfolio/gallery/g-skaterboy.jpg"  data-sub-html="#05" >
                        <a href="#" class="overlay">
                            <img src="{{ asset('themes/journal/Infinity10') }}/images/portfolio/skaterboy.jpg" alt="Bicycle">
                            <div class="item-text">
		     					   <span class="folio-types">
		     					      Branding
		     					   </span>
                                <h3 class="folio-title">Skaterboy</h3>
                            </div>
                        </a>
                        <a href="https://www.behance.net/" class='details-link' title="details">
                            <i class="icon-link"></i>
                        </a>
                    </div> <!-- end item-wrap -->

                    <div id="05" class='hide'>
                        <h4>Skaterboy</h4>
                        <p>Lorem ipsum Dolor deserunt labore sint officia. Magna et aute enim proident tempor sunt quis nulla voluptate fugiat velit. <a href="https://www.behance.net/">Details</a></p>
                    </div>
                </div> <!-- end folio-item -->

                <div class="brick folio-item">
                    <div class="item-wrap animate-this"  data-src="{{ asset('themes/journal/Infinity10') }}/images/portfolio/gallery/g-salad.jpg"  data-sub-html="#06">
                        <a href="#" class="overlay">
                            <img src="{{ asset('themes/journal/Infinity10') }}/images/portfolio/salad.jpg" alt="Salad">
                            <div class="item-text">
		     					   <span class="folio-types">
		     					      Branding
		     					   </span>
                                <h3 class="folio-title">Salad</h3>
                            </div>
                        </a>
                        <a href="https://www.behance.net/" class='details-link' title="details">
                            <i class="icon-link"></i>
                        </a>
                    </div> <!-- end item-wrap -->

                    <div id="06" class='hide'>
                        <h4>Salad</h4>
                        <p>Lorem ipsum Dolor deserunt labore sint officia. Magna et aute enim proident tempor sunt quis nulla voluptate fugiat velit. <a href="www.behance.net">Details</a></p>
                    </div>
                </div> <!-- end folio-item -->

            </div> <!-- end folio-wrap -->
        </div> <!-- end twelve -->
    </div> <!-- end portfolio-content -->

</section>  <!-- end portfolio -->

<!-- footer
================================================== -->
<footer>
    <div class="footer-bottom">

        <div class="row">

            <div class="col-twelve">
                <div class="copyright">
                    <span>Copyright &copy; <script>document.write(new Date().getFullYear());</script> tomulumbi.</span>
                    <span>Design by <a href="http://www.fluidtechglobal.com/">Fluidtech Global</a></span>
                </div>
            </div>

        </div>

    </div> <!-- end footer-bottom -->

    <div id="go-top">
        <a class="smoothscroll" title="Back to Top" href="#top">
            <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
        </a>
    </div>
</footer>

<div id="preloader">
    <div id="loader"></div>
</div>

<!-- Java Script
================================================== -->
<script src="{{ asset('themes/journal/Infinity10') }}/js/jquery-2.1.3.min.js"></script>
<script src="{{ asset('themes/journal/Infinity10') }}/js/plugins.js"></script>
<script src="{{ asset('themes/journal/Infinity10') }}/js/main.js"></script>

</body>

</html>
