<!DOCTYPE HTML>
<html>
<head>

    <title>Tomulumbi | @yield('title')</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    @yield('css')

</head>
<body>
<!-- Wrapper -->
<div id="wrapper">

    <!-- top navbar -->
    @include('client_proof.landing.layouts.navbars.navbar')
    <!-- top navbar -->

    <!-- Menu -->
    <!-- nav -->
    @include('client_proof.landing.layouts.navbars.left_sidebar')
    <!-- nav -->

    <!-- Main -->
    <div id="main">
        <div class="inner">


            <!-- page header -->
            @yield ('header')
            <!-- /page header -->

            <!-- page content -->
            @yield ('content')
            <!-- /page content -->
        </div>
    </div>

    <!-- footer -->
    @include('client_proof.landing.layouts.footers.nav')
    <!-- /footer -->

</div>

@yield('js')

</body>
</html>
