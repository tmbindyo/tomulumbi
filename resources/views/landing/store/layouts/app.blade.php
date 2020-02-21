<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>tomulumbi | @yield('title')</title>

    <!-- Favicon  -->
    <link rel="shortcut icon" href="{{ asset('') }}/tomulumbi_logo.ico" type="image/x-icon">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('themes/store/amado/') }}/css/core-style.css">
    <link rel="stylesheet" href="{{ asset('themes/store/amado/') }}/style.css">

</head>

<body>
<!-- Search Wrapper Area Start -->
@include('landing.store.layouts.header.search')
<!-- Search Wrapper Area End -->

<!-- Popover Area Start -->
@include('landing.store.layouts.popover.popover')
<!-- Popover Area End -->

<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">

    <!-- Mobile Nav (max width 767px)-->
    <div class="mobile-nav">
        <!-- Navbar Brand -->
        <div class="amado-navbar-brand">
            <a href="{{route('tomulumbi')}}"><img src="{{ asset('themes/store/amado/') }}/img/core-img/logo.png" alt=""></a>
        </div>
        <!-- Navbar Toggler -->
        <div class="amado-navbar-toggler">
            <span></span><span></span><span></span>
        </div>
    </div>

    <!-- Header Area Start -->
    @include('landing.store.layouts.header.header')
    <!-- Header Area End -->

    <!-- page content -->
    @yield ('content')
    <!-- /page content -->

</div>
<!-- ##### Main Content Wrapper End ##### -->

<!-- ##### Newsletter Area Start ##### -->
{{--@include('landing.store.layouts.footer.newsletter')--}}
<!-- ##### Newsletter Area End ##### -->

<!-- ##### Footer Area Start ##### -->
@include('landing.store.layouts.footer.footer')
<!-- ##### Footer Area End ##### -->

<!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
<script src="{{ asset('themes/store/amado/') }}/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="{{ asset('themes/store/amado/') }}/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="{{ asset('themes/store/amado/') }}/js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="{{ asset('themes/store/amado/') }}/js/plugins.js"></script>
<!-- Active js -->
<script src="{{ asset('themes/store/amado/') }}/js/active.js"></script>

<!-- js content -->
@yield ('js')
<!-- /js content -->

</body>

</html>
