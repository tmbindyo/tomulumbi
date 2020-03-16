@extends('admin.layouts.app')

@section('title', "Feed")

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Feed</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong>CRM</strong>
                </li>
                <li class="active">
                    <strong>Feed</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="#" data-toggle="modal" data-target="#toDoRegistration" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> New </a>
            </div>
        </div>
    </div>


    <div class="wrapper wrapper-content  animated fadeInRight">
        <div class="row">
            <div class="col-lg-4">
                <div class="ibox">
                    <div class="ibox-content">
                        <h3>Contacts</h3>
                        <p class="small"><i class="fa fa-hand-o-up"></i> Drag task between list</p>

                        <div class="input-group">
                            <input type="text" placeholder="Add new task. " class="input input-sm form-control">
                            <span class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-white"> <i class="fa fa-plus"></i> Add task</button>
                            </span>
                        </div>

                        <ul class="sortable-list connectList agile-list" id="todo">
                            <li class="warning-element" id="task1">
                                Simply dummy text of the printing and typesetting industry.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Tag</a>
                                    <i class="fa fa-clock-o"></i> 12.10.2015
                                </div>
                            </li>
                            <li class="success-element" id="task2">
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                    <i class="fa fa-clock-o"></i> 05.04.2015
                                </div>
                            </li>
                            <li class="info-element" id="task3">
                                Sometimes by accident, sometimes on purpose (injected humour and the like).
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                    <i class="fa fa-clock-o"></i> 16.11.2015
                                </div>
                            </li>
                            <li class="danger-element" id="task4">
                                All the Lorem Ipsum generators
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-primary">Done</a>
                                    <i class="fa fa-clock-o"></i> 06.10.2015
                                </div>
                            </li>
                            <li class="warning-element" id="task5">
                                Which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Tag</a>
                                    <i class="fa fa-clock-o"></i> 09.12.2015
                                </div>
                            </li>
                            <li class="warning-element" id="task6">
                                Packages and web page editors now use Lorem Ipsum as
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-primary">Done</a>
                                    <i class="fa fa-clock-o"></i> 08.04.2015
                                </div>
                            </li>
                            <li class="success-element" id="task7">
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                    <i class="fa fa-clock-o"></i> 05.04.2015
                                </div>
                            </li>
                            <li class="info-element" id="task8">
                                Sometimes by accident, sometimes on purpose (injected humour and the like).
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                    <i class="fa fa-clock-o"></i> 16.11.2015
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox">
                    <div class="ibox-content">
                        <h3>Open Deals</h3>
                        <p class="small"><i class="fa fa-hand-o-up"></i> Drag task between list</p>
                        <ul class="sortable-list connectList agile-list" id="inprogress">
                            <li class="success-element" id="task9">
                                Quisque venenatis ante in porta suscipit.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Tag</a>
                                    <i class="fa fa-clock-o"></i> 12.10.2015
                                </div>
                            </li>
                            <li class="success-element" id="task10">
                                Phasellus sit amet tortor sed enim mollis accumsan in consequat orci.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                    <i class="fa fa-clock-o"></i> 05.04.2015
                                </div>
                            </li>
                            <li class="warning-element" id="task11">
                                Nunc sed arcu at ligula faucibus tempus ac id felis. Vestibulum et nulla quis turpis sagittis fringilla.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                    <i class="fa fa-clock-o"></i> 16.11.2015
                                </div>
                            </li>
                            <li class="warning-element" id="task12">
                                Ut porttitor augue non sapien mollis accumsan.
                                Nulla non elit eget lacus elementum viverra.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Tag</a>
                                    <i class="fa fa-clock-o"></i> 09.12.2015
                                </div>
                            </li>
                            <li class="info-element" id="task13">
                                Packages and web page editors now use Lorem Ipsum as
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-primary">Done</a>
                                    <i class="fa fa-clock-o"></i> 08.04.2015
                                </div>
                            </li>
                            <li class="success-element" id="task14">
                                Quisque lacinia tellus et odio ornare maximus.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                    <i class="fa fa-clock-o"></i> 05.04.2015
                                </div>
                            </li>
                            <li class="danger-element" id="task15">
                                Enim mollis accumsan in consequat orci.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                    <i class="fa fa-clock-o"></i> 11.04.2015
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox">
                    <div class="ibox-content">
                        <h3>Leads/Contacts</h3>
                        <p class="small"><i class="fa fa-hand-o-up"></i> Drag task between list</p>
                        <ul class="sortable-list connectList agile-list" id="completed">
                            <li class="info-element" id="task16">
                                Sometimes by accident, sometimes on purpose (injected humour and the like).
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                    <i class="fa fa-clock-o"></i> 16.11.2015
                                </div>
                            </li>
                            <li class="warning-element" id="task17">
                                Ut porttitor augue non sapien mollis accumsan.
                                Nulla non elit eget lacus elementum viverra.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Tag</a>
                                    <i class="fa fa-clock-o"></i> 09.12.2015
                                </div>
                            </li>
                            <li class="warning-element" id="task18">
                                Which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Tag</a>
                                    <i class="fa fa-clock-o"></i> 09.12.2015
                                </div>
                            </li>
                            <li class="warning-element" id="task19">
                                Packages and web page editors now use Lorem Ipsum as
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-primary">Done</a>
                                    <i class="fa fa-clock-o"></i> 08.04.2015
                                </div>
                            </li>
                            <li class="success-element" id="task20">
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                    <i class="fa fa-clock-o"></i> 05.04.2015
                                </div>
                            </li>
                            <li class="info-element" id="task21">
                                Sometimes by accident, sometimes on purpose (injected humour and the like).
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                    <i class="fa fa-clock-o"></i> 16.11.2015
                                </div>
                            </li>
                            <li class="warning-element" id="task22">
                                Simply dummy text of the printing and typesetting industry.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Tag</a>
                                    <i class="fa fa-clock-o"></i> 12.10.2015
                                </div>
                            </li>
                            <li class="success-element" id="task23">
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default.
                                <div class="agile-detail">
                                    <a href="#" class="pull-right btn btn-xs btn-white">Mark</a>
                                    <i class="fa fa-clock-o"></i> 05.04.2015
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">

                <h4>
                    Serialised Output
                </h4>
                <p>
                    Serializes the sortable's item id's into an array of string.
                </p>

                <div class="output p-m m white-bg"></div>


            </div>
        </div>


    </div>

@endsection


@section('js')

    <!-- Mainly scripts -->
    <script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
    <!-- Mainly scripts -->
    <script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
    <script src="{{ asset('inspinia') }}/js/jquery-ui-1.10.4.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>

    <script>
        $(document).ready(function(){

            $("#todo, #inprogress, #completed").sortable({
                connectWith: ".connectList",
                update: function( event, ui ) {

                    var todo = $( "#todo" ).sortable( "toArray" );
                    var inprogress = $( "#inprogress" ).sortable( "toArray" );
                    var completed = $( "#completed" ).sortable( "toArray" );
                    $('.output').html("ToDo: " + window.JSON.stringify(todo) + "<br/>" + "In Progress: " + window.JSON.stringify(inprogress) + "<br/>" + "Completed: " + window.JSON.stringify(completed));
                }
            }).disableSelection();

        });
    </script>
@endsection
