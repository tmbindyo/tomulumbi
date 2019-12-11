<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>tomulumbi | @yield('title')</title>

    @yield('css')

</head>

<body>
<div id="wrapper">

    <!-- nav -->
    @include('admin.layouts.navbars.left_sidebar')
    <!-- nav -->

    <div id="page-wrapper" class="gray-bg dashbard-1">
        <!-- top navbar -->
        @include('admin.layouts.navbars.navbar')
        @include('admin.layouts.popover.popover')
        <!-- top navbar -->

        <!-- page content -->
        @yield ('content')
        <!-- /page content -->

        <!-- footer -->
        @include('admin.layouts.footers.nav')
        <!-- /footer -->

    </div>
    <!-- chat content -->
    @include('admin.layouts.navbars.chat')
    <!-- /chat content -->

    <!-- right sidebar content -->
    @include('admin.layouts.navbars.right_sidebar')
    <!-- /right sidebar content -->

</div>

@yield('js')
</body>
</html>
