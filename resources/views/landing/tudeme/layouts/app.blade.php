<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Yoga Studio Template">
    <meta name="keywords" content="Yoga, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tudeme | @yield('title')</title>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ asset('') }}/tomulumbi_logo.ico" type="image/x-icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('themes/tudeme/yummy') }}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/tudeme/yummy') }}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/tudeme/yummy') }}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/tudeme/yummy') }}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{ asset('themes/tudeme/yummy') }}/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
        @include('landing.tudeme.layouts.header')
    <!-- Header End -->

    <!-- Popover Section Begin -->
    <div class="x_content bs-example-popovers">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Success!</strong> {{ session('success') }}
            </div>
        @endif
    
        @if (session('info'))
            <div class="alert alert-info alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Info!</strong> {{ session('info') }}
            </div>
        @endif
    
        @if (session('warning'))
            <div class="alert alert-warning alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Warning!</strong> {{ session('warning') }}
            </div>
        @endif
    
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Danger!</strong> {{ session('danger') }}
                </div>
            @endforeach
        @endif
    
    </div>
    <!-- Popover End -->

    <!-- Body Start -->
        @yield('body')
    <!-- Body End -->

    <!-- Footer Section Begin -->
        @include('landing.tudeme.layouts.footer')
    <!-- Footer Section End -->

    <!-- Search model -->
	    @include('landing.tudeme.layouts.search')
	<!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{ asset('themes/tudeme/yummy') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('themes/tudeme/yummy') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('themes/tudeme/yummy') }}/js/jquery.slicknav.js"></script>
    <script src="{{ asset('themes/tudeme/yummy') }}/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('themes/tudeme/yummy') }}/js/mixitup.min.js"></script>
    <script src="{{ asset('themes/tudeme/yummy') }}/js/main.js"></script>
</body>

</html>
