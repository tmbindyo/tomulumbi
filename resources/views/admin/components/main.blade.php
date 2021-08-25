
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>tomulumbi | @yield('title')</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Create stunning tree like views with this awesome React plugin.">
    <link rel="shortcut icon" href="{{ asset('') }}tomulumbi_logo.ico" type="image/x-icon">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{ asset('architectui') }}/pro-main.css" rel="stylesheet">

    {{-- select 2 --}}
    <link href="{{ asset('architectui') }}/select-2.css" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}

    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css" rel="stylesheet">

    @yield ('css')

</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
        {{-- top navbar start --}}
        @include('admin.components.navbar.top')
        {{-- top navbar end --}}

        {{-- right navbar start --}}
        {{-- @include('admin.components.navbar.right') --}}
        {{-- right navbar start --}}

        <div class="app-main">

            {{-- left navbar start --}}
            @include('admin.components.navbar.left')
            {{-- left navbar end --}}


            <div class="app-main__outer">

                {{-- popover start --}}
                @include('admin.components.alerts.alerts')
                {{-- popover end --}}

                {{-- page content start --}}
                @yield ('content')
                {{-- page content end --}}

                {{-- @include('admin.components.navbar.bottom') --}}


            </div>
        </div>
    </div>

    {{-- @include('admin.components.navbar.right') --}}

    <div class="app-drawer-overlay d-none animated fadeIn"></div>
    <script type="text/javascript" src="{{ asset('architectui') }}/assets/scripts/pro-main.js"></script>

    {{-- jQuery --}}
    <script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>

    {{-- select 2 --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('architectui') }}/assets/scripts/select-2.js"></script>


    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    {{--  datatables  --}}
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                    customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

        });
    </script>
    <script>
        $(document).ready(function(){
            $(document).ready(function() {
                $('.account-select').select2();
            });
            $(document).ready(function() {
                $('.account-account-adjustment-select').select2();
            });
            $(document).ready(function() {
                $('.account-asset-action-select').select2();
            });
            $(document).ready(function() {
                $('.account-deposit-select').select2();
            });
            $(document).ready(function() {
                $('.account-expense-select').select2();
            });
            $(document).ready(function() {
                $('.account-liability-select').select2();
            });
            $(document).ready(function() {
                $('.account-loan-select').select2();
            });
            $(document).ready(function() {
                $('.account-loan-payment-select').select2();
            });
            $(document).ready(function() {
                $('.account-order-select').select2();
            });
            $(document).ready(function() {
                $('.account-payment-select').select2();
            });
            $(document).ready(function() {
                $('.account-payment-loan-select').select2();
            });
            $(document).ready(function() {
                $('.account-quote-select').select2();
            });
            $(document).ready(function() {
                $('.account-refund-select').select2();
            });
            $(document).ready(function() {
                $('.account-transaction-select').select2();
            });
            $(document).ready(function() {
                $('.account-status-select').select2();
            });
            $(document).ready(function() {
                $('.account-withdrawal-select').select2();
            });
            $(document).ready(function() {
                $('.album-select').select2();
            });
            $(document).ready(function() {
                $('.asset-select').select2();
            });
            $(document).ready(function() {
                $('.asset-kit-select').select2();
            });
            $(document).ready(function() {
                $('.asset-category').select2();
            });
            $(document).ready(function() {
                $('.campaign-select').select2();
            });
            $(document).ready(function() {
                $('.category-select').select2();
            });
            $(document).ready(function() {
                $('.color-select').select2();
            });
            $(document).ready(function() {
                $('.contact-select').select2();
            });
            $(document).ready(function() {
                $('.cooking-skill-select').select2();
            });
            $(document).ready(function() {
                $('.cuisine-select').select2();
            });
            $(document).ready(function() {
                $('.course-select').select2();
            });
            $(document).ready(function() {
                $('.dietary-preference-select').select2();
            });
            $(document).ready(function() {
                $('.cooking-style-select').select2();
            });
            $(document).ready(function() {
                $('.ingredient-measurment-select').select2();
            });
            $(document).ready(function() {
                $('.ingredient-select').select2();
            });
            $(document).ready(function() {
                $('.dish-type-select').select2();
            });
            $(document).ready(function() {
                $('.contact-loan-select').select2();
            });
            $(document).ready(function() {
                $('.contact-liability-select').select2();
            });
            $(document).ready(function() {
                $('.content-align-select').select2();
            });
            $(document).ready(function() {
                $('.cover-design-select').select2();
            });
            $(document).ready(function() {
                $('.deal-select').select2();
            });
            $(document).ready(function() {
                $('.design-select').select2();
            });
            $(document).ready(function() {
                $('.destination-account-select').select2();
            });
            $(document).ready(function() {
                $('.expense-account-select').select2();
            });
            $(document).ready(function() {
                $('.journal-series-select').select2();
            });
            $(document).ready(function() {
                $('.journal-select').select2();
            });
            $(document).ready(function() {
                $('.thumbnail-size-select').select2();
            });
            $(document).ready(function() {
                $('.frequency-select').select2();
            });
            $(document).ready(function() {
                $('.frequency-type-select').select2();
            });
            $(document).ready(function() {
                $('.kit-select').select2();
            });
            $(document).ready(function() {
                $('.image-position-select').select2();
            });
            $(document).ready(function() {
                $('.kit-action-select').select2();
            });
            $(document).ready(function() {
                $('.label-select').select2();
            });
            $(document).ready(function() {
                $('.liability-select').select2();
            });
            $(document).ready(function() {
                $('.liability-account-select').select2();
            });
            $(document).ready(function() {
                $('.liability-contact-select').select2();
            });
            $(document).ready(function() {
                $('.loan-select').select2();
            });
            $(document).ready(function() {
                $('.loan-account-select').select2();
            });
            $(document).ready(function() {
                $('.loan-contact-select').select2();
            });
            $(document).ready(function() {
                $('.order-select').select2();
            });
            $(document).ready(function() {
                $('.order-status-select').select2();
            });
            $(document).ready(function() {
                $('.orientation-select').select2();
            });
            $(document).ready(function() {
                $('.project-type-select').select2();
            });
            $(document).ready(function() {
                $('.price-list-select').select2();
            });
            $(document).ready(function() {
                $('.letter-tag-select').select2();
            });
            $(document).ready(function() {
                $('.size-select').select2();
            });
            $(document).ready(function() {
                $('.scheme-select').select2();
            });
            $(document).ready(function() {
                $('.status-select').select2();
            });
            $(document).ready(function() {
                $('.sub-type-select').select2();
            });
            $(document).ready(function() {
                $('.tag-select').select2();
            });
            $(document).ready(function() {
                $('.tudeme-select').select2();
            });
            $(document).ready(function() {
                $('.tudeme-type-select').select2();
            });
            $(document).ready(function() {
                $('.tudeme-tags-select').select2();
            });
            $(document).ready(function() {
                $('.client-proof-tag-select').select2();
            });
            $(document).ready(function() {
                $('.personal-album-tag-select').select2();
            });
            $(document).ready(function() {
                $('.thumbnail-size-select').select2();
            });
            $(document).ready(function() {
                $('.transfer-destination-account-select').select2();
            });
            $(document).ready(function() {
                $('.transfer-source-account-select').select2();
            });
            $(document).ready(function() {
                $('.type-select').select2();
            });
            $(document).ready(function() {
                $('.transfer-select').select2();
            });
            $(document).ready(function() {
                $('.project-select').select2();
            });
        });
    </script>

@yield ('js')

</body>

</html>
