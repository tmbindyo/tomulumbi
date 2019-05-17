<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'BIP') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <style>
            .stat {
                border-right: 1px solid #ebedef;
                padding: 0px 19px;
                margin-bottom: 25px;
                position: initial;
                max-height: 32px;
            }
            .num {
                color: #1e1e1e;
                font-size: 18px;
                font-weight: 500;
                line-height: 1;
                margin: 0;
            }
            .abbrev-number {
                font-size: 15px;
            }
            .span {
                color: #1e1e1e
            }
            .modal.fade .modal-dialog {
                -webkit-transform: translate(0, 25%);
                    -ms-transform: translate(0, 25%);
                        transform: translate(0, 25%);
                -webkit-transition: -webkit-transform 0.3s ease-out;
                   -moz-transition: -moz-transform 0.3s ease-out;
                     -o-transition: -o-transform 0.3s ease-out;
                        transition: transform 0.3s ease-out;
              }
              
              .modal.in .modal-dialog {
                -webkit-transform: translate(0, 0);
                    -ms-transform: translate(0, 0);
                        transform: translate(0, 0);
              }
              .updates {
                  margin-bottom: 5%;
              }
        </style>
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
            @if (Auth::user()->user_type_id == 1)
                @include('layouts.navbars.adminsidebar')
            @elseif (Auth::user()->user_type_id == 3)
                @include('layouts.navbars.investorsidebar')
            @elseif (Auth::user()->user_type_id == 4)
                @include('layouts.navbars.project_managersidebar')
            @else
            @endif

        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')
            @yield('content')
            @yield('banner')
            @yield('projects')
            @yield('project-info')
            @yield('equity')
            @yield('milestones')
            @yield('testimonials')
            @yield('team')
            @yield('project-images')
            @yield('updates')
            @yield('comments')
        </div>

        @guest()
            @include('layouts.footers.guest')
        @endguest

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
        <!-- <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/dropzone.min.js"></script> -->
        <script src="https://demos.creative-tim.com/argon-dashboard-pro/assets/vendor/dropzone/dist/min/dropzone.min.js"></script>

        <script src="{{ asset('argon') }}/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <!-- <script src="{{ asset('argon') }}/vendor/dropzone/dist/min/dropzone.min.js"></script> -->
        {{-- <script src="/assets"></script> --}}
        
        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
        <script>

            /**
            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
            /*
            var disqus_config = function () {
            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
            };
            */
            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://bip.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    </body>
</html>