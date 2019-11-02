@extends('admin.layouts.app')

@section('title', 'Album Type')

@section('css')

    <link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">

@endsection



@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Masonry</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="index.html">Home</a>
                </li>
                <li>
                    Miscellaneous
                </li>
                <li class="active">
                    <strong>Masonry</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-12">

                <div class="ibox">
                    <div class="ibox-content">
                        <h2>
                            Masonry
                        </h2>
                        <p>
                            Masonry is a JavaScript grid layout library. It works by placing elements in optimal position based on available vertical space, sort of like a mason fitting stones in a wall. You’ve probably seen it in use all over the Internet.
                            <a href="http://masonry.desandro.com/" target="_blank">http://masonry.desandro.com/</a>
                        </p>
                    </div>
                </div>


            </div>
        </div>

        <div class="grid" >

            <div class="grid-item">
                <div class="ibox">
                    <div class="">
                        <img src="http://localhost:8000/client/proof/HeidiRatliff/Highlights/577A9983_medium.jpg" alt="577A9983" data-fullsrc="http://localhost:8000/client/proof/HeidiRatliff/Highlights/577A9983_medium.jpg" class="imgal-img"/>
                    </div>
                </div>
            </div>

            <div class="grid-item">
                <div class="ibox">
                    <div class="">
                        <img src="http://localhost:8000/client/proof/HeidiRatliff/Highlights/577A9982_medium.jpg" alt="577A9982" data-fullsrc="http://localhost:8000/client/proof/HeidiRatliff/Highlights/577A9982_medium.jpg" class="imgal-img"/>
                    </div>
                </div>
            </div>

            <div class="grid-item">
                <div class="ibox">
                    <div class="">
                        <img src="http://localhost:8000/client/proof/HeidiRatliff/Highlights/577A9996_medium.jpg" alt="577A9996" data-fullsrc="http://localhost:8000/client/proof/HeidiRatliff/Highlights/577A9996_medium.jpg" class="imgal-img"/>
                    </div>
                </div>
            </div>

            <div class="grid-item">
                <div class="ibox">
                    <div class="">
                        <img src="http://localhost:8000/client/proof/HeidiRatliff/Highlights/577A9984_medium.jpg" alt="577A9984" data-fullsrc="http://localhost:8000/client/proof/HeidiRatliff/Highlights/577A9984_medium.jpg" class="imgal-img"/>
                    </div>
                </div>
            </div>

            <div class="grid-item">
                <div class="ibox">
                    <div class="">
                        <img src="http://localhost:8000/client/proof/HeidiRatliff/Highlights/577A9980_medium.jpg" alt="577A9980" data-fullsrc="http://localhost:8000/client/proof/HeidiRatliff/Highlights/577A9980_medium.jpg" class="imgal-img"/>
                    </div>
                </div>
            </div>

            <div class="grid-item">
                <div class="ibox">
                    <div class="">
                        <img src="http://localhost:8000/client/proof/HeidiRatliff/Call/577A9990_medium.jpg" alt="577A9990" data-fullsrc="http://localhost:8000/client/proof/HeidiRatliff/Call/577A9990_medium.jpg" class="imgal-img"/>
                    </div>
                </div>
            </div>

            <div class="grid-item">
                <div class="ibox">
                    <div class="">
                        <img src="http://localhost:8000/client/proof/HeidiRatliff/Call/577A9994_medium.jpg" alt="577A9994" data-fullsrc="http://localhost:8000/client/proof/HeidiRatliff/Call/577A9994_medium.jpg" class="imgal-img"/>
                    </div>
                </div>
            </div>

            <div class="grid-item">
                <div class="ibox">
                    <div class="">
                        <img src="http://localhost:8000/client/proof/HeidiRatliff/Call/577A9992_medium.jpg" alt="577A9992" data-fullsrc="http://localhost:8000/client/proof/HeidiRatliff/Call/577A9992_medium.jpg" class="imgal-img"/>
                    </div>
                </div>
            </div>

            <div class="grid-item">
                <div class="ibox">
                    <div class="">
                        <img src="http://localhost:8000/client/proof/HeidiRatliff/Call/577A9999_medium.jpg" alt="577A9999" data-fullsrc="http://localhost:8000/client/proof/HeidiRatliff/Call/577A9999_medium.jpg" class="imgal-img"/>
                    </div>
                </div>
            </div>

            <div class="grid-item">
                <div class="ibox">
                    <div class="">
                        <img src="http://localhost:8000/client/proof/HeidiRatliff/Call/577A9998_medium.jpg" alt="577A9998" data-fullsrc="http://localhost:8000/client/proof/HeidiRatliff/Call/577A9998_medium.jpg" class="imgal-img"/>
                    </div>
                </div>
            </div>


        </div>

    </div>

@endsection

@section('js')


    <!-- Mainly scripts -->
    <script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
    <script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/jeditable/jquery.jeditable.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>

    <script src="{{ asset('inspinia') }}/js/plugins/masonary/masonry.pkgd.min.js"></script>

    <!-- Page-Level Scripts -->
    <style>

        .grid .ibox {
            margin-bottom: 0;
        }

        .grid-item {
            margin-bottom: 25px;
            width: 310px;
        }
    </style>

    <script>
        $(window).load(function() {

            $('.grid').masonry({
                // options
                itemSelector: '.grid-item',
                columnWidth: 315,
                gutter: 25
            });

        });
    </script>

@endsection
