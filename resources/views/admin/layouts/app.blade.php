<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tomulumbi | @yield('title')</title>

    @yield('css')

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">

        <!-- logout -->
        @include('admin.layouts.header.logout')
        <!-- logout -->

        <!-- sidebar navigation -->
        @include('admin.layouts.navbars.sidebar')
        <!-- sidebar navigation -->

        <!-- top navigation -->
        @include('admin.layouts.navbars.navbar')
        <!-- /top navigation -->

        <!-- page content -->
        @yield ('content')
        <!-- /page content -->

        <!-- footer content -->
        @include('admin.layouts.footers.nav')
        <!-- /footer content -->
    </div>
</div>

@yield('js')
</body>
</html>