@extends('admin.layouts.app')

@section('title', 'Organization Create')

@section('css')

<link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="{{ asset('inspinia') }}/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
<link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
<link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/chosen/chosen.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/dropzone/basic.css" rel="stylesheet">
<link href="{{ asset('inspinia') }}/css/plugins/dropzone/dropzone.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/switchery/switchery.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/iCheck/custom.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/chosen/chosen.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
<link href="{{ asset('inspinia') }}/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/select2/select2.min.css" rel="stylesheet">

<link href="{{ asset('inspinia') }}/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

@endsection


@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Organization's</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    CRM
                </li>
                <li class="active">
                    <a href="{{route('admin.organizations')}}">Organization's</a>
                </li>
                <li class="active">
                    <strong>Organization Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-4">
            <div class="title-action">
                <a href="{{route('admin.organization.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Contact </a>
                <a href="{{route('admin.organization.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Deal </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Organization Registration <small>Form</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.organization.update',$organization->id) }}" autocomplete="off" class="form-horizontal form-label-left">
                                @csrf

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="col-md-12">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="name" name="name" required="required" value="{{$organization->name}}" class="form-control input-lg">
                                                <i>name</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="parent_organization" class="select2_demo_tag form-control input-lg">
                                                <option selected disabled >Select Parent Organization</option>
                                                @foreach ($organizations as $parent_organization)
                                                    <option @if($parent_organization->parent_organization_id ==$parent_organization->id)selected @endif @if($organization->id ==$parent_organization->id)disabled @endif value="{{$parent_organization->id}}">{{$parent_organization->name}}</option>
                                                @endforeach

                                            </select>
                                            <i>parent organization</i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="phone_number" name="phone_number" required="required" value="{{$organization->phone_number}}" class="form-control input-lg">
                                                <i>phone number</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="email" id="email" name="email" required="required" value="{{$organization->email}}" class="form-control input-lg">
                                                <i>email</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="website" name="website" required="required" value="{{$organization->website}}" class="form-control input-lg">
                                                <i>website</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <select name="organization_type" class="select2_demo_tag form-control input-lg">
                                                    <option selected disabled >Select Type</option>
                                                    @foreach ($organizationTypes as $organizationType)
                                                        <option @if($organizationType->id == $organization->organization_type_id)selected @endif value="{{$organizationType->id}}">{{$organizationType->name}}</option>
                                                    @endforeach

                                                </select>
                                                <i>type</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="street" name="street" required="required" value="{{$organization->street}}" class="form-control input-lg">
                                                <i>street</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="text" id="city" name="city" required="required" value="{{$organization->city}}" class="form-control input-lg">
                                                <i>city</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="has-warning">
                                                <textarea rows="5" id="description" name="description" required="required" class="form-control input-lg">{{$organization->description}}</textarea>
                                                <i>description</i>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <hr>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-block btn-lg btn-outline btn-success mt-4">{{ __('Save') }}</button>
                                    </div>
                                </div>


                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  details  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label {{$organization->status->label}}">{{$organization->status->name}}</span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Created by:</dt> <dd>{{$organization->user->name}}</dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Last Updated:</dt> <dd>{{$organization->updated_at}}</dd>
                                        <dt>Created:</dt> <dd> {{$organization->created_at}} </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#contacts" data-toggle="tab">Contacts</a></li>
                                            <li class=""><a href="#deals" data-toggle="tab">Deals</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="contacts">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($organization->contacts as $contact)
                                                            <tr class="gradeX">
                                                                <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                                                                <td>{{$contact->email}}</td>
                                                                <td>{{$contact->phone_number}}</td>
                                                                <td>{{$contact->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$contact->status->label}}">{{$contact->status->name}}</span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.contact.show', $contact->id) }}" class="btn-white btn btn-xs">View</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="deals">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Amount</th>
                                                        <th>Starting Date</th>
                                                        <th>Closing Date</th>
                                                        <th>Created</th>
                                                        <th>Probability</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($organization->deals as $deal)
                                                        <tr class="gradeA">
                                                            <td>{{$deal->name}}</td>
                                                            <td>{{$deal->amount}}</td>
                                                            <td>{{$deal->starting_date}}</td>
                                                            <td>{{$deal->closing_date}}</td>
                                                            <td>{{$deal->created_at}}</td>
                                                            <td>{{$deal->probability}}</td>
                                                            <td>
                                                                <p><span class="label {{$deal->status->label}}">{{$deal->status->name}}</span></p>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.deal.show', $deal->id) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Amount</th>
                                                        <th>Starting Date</th>
                                                        <th>Closing Date</th>
                                                        <th>Created</th>
                                                        <th>Probability</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    To Do's    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>To Do's</h5>
                        <div class="ibox-tools">
                            <a data-toggle="modal" data-target="#toDoRegistration" class="btn btn-success btn-round btn-outline"> <span class="fa fa-plus"></span> New</a>
                        </div>
                    </div>
                    <div class="">
                        <ul class="pending-to-do">
                            @foreach($pendingToDos as $pendingToDo)
                                <li>
                                    <div>
                                        <small>{{$pendingToDo->due_date}}</small>
                                        <h4>{{$pendingToDo->name}}</h4>
                                        <p>{{$pendingToDo->notes}}.</p>
                                        @if($pendingToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$pendingToDo->design->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.in.progress',$pendingToDo->id)}}"><i class="fa fa-arrow-circle-o-right "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <ul class="in-progress-to-do">
                            @foreach($inProgressToDos as $inProgressToDo)
                                <li>
                                    <div>
                                        <small>{{$inProgressToDo->due_date}}</small>
                                        <h4>{{$inProgressToDo->name}}</h4>
                                        <p>{{$inProgressToDo->notes}}.</p>
                                        @if($inProgressToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$inProgressToDo->design->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.completed',$inProgressToDo->id)}}"><i class="fa fa-check "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="overdue-to-do">
                            @foreach($overdueToDos as $overdueToDo)
                                <li>
                                    <div>
                                        <small>{{$overdueToDo->due_date}}</small>
                                        <h4>{{$overdueToDo->name}}</h4>
                                        <p>{{$overdueToDo->notes}}.</p>
                                        @if($overdueToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$overdueToDo->design->name}}</span></p>
                                        @endif
                                        @if($overdueToDo->status->name === "Pending")
                                            <a href="{{route('admin.to.do.set.completed',$overdueToDo->id)}}"><i class="fa fa-check-double "></i></a>
                                        @elseif($overdueToDo->status->name === "In progress")
                                            <a href="{{route('admin.to.do.set.completed',$overdueToDo->id)}}"><i class="fa fa-check-double "></i></a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="completed-to-do">
                            @foreach($completedToDos as $completedToDo)
                                <li>
                                    <div>
                                        <small>{{$completedToDo->due_date}}</small>
                                        <h4>{{$completedToDo->name}}</h4>
                                        <p>{{$completedToDo->notes}}.</p>
                                        @if($completedToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$completedToDo->design->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.delete',$completedToDo->id)}}"><i class="fa fa-trash-o "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@include('admin.layouts.modals.organization_to_do')

@section('js')

<!-- Mainly scripts -->
<script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
<script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- ChartJS-->
<script src="{{ asset('inspinia') }}/js/plugins/chartJs/Chart.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>

<!-- Chosen -->
<script src="{{ asset('inspinia') }}/js/plugins/chosen/chosen.jquery.js"></script>

<!-- blueimp gallery -->
<script src="{{ asset('inspinia') }}/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

<!-- DROPZONE -->
<script src="{{ asset('inspinia') }}/js/plugins/dropzone/dropzone.js"></script>

<!-- Switchery -->
<script src="{{ asset('inspinia') }}/js/plugins/switchery/switchery.js"></script>

<!-- Image cropper -->
<script src="{{ asset('inspinia') }}/js/plugins/cropper/cropper.min.js"></script>

<!-- Data picker -->
<script src="{{ asset('inspinia') }}/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Date range use moment.js same as full calendar plugin -->
<script src="{{ asset('inspinia') }}/js/plugins/fullcalendar/moment.min.js"></script>

<!-- Date range picker -->
<script src="{{ asset('inspinia') }}/js/plugins/daterangepicker/daterangepicker.js"></script>

<script src="{{ asset('inspinia') }}/js/plugins/jeditable/jquery.jeditable.js"></script>

<script src="{{ asset('inspinia') }}/js/plugins/dataTables/datatables.min.js"></script>

<!-- JSKnob -->
<script src="{{ asset('inspinia') }}/js/plugins/jsKnob/jquery.knob.js"></script>

<!-- Input Mask-->
<script src="{{ asset('inspinia') }}/js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- NouSlider -->
<script src="{{ asset('inspinia') }}/js/plugins/nouslider/jquery.nouislider.min.js"></script>

<!-- IonRangeSlider -->
<script src="{{ asset('inspinia') }}/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

<!-- iCheck -->
<script src="{{ asset('inspinia') }}/js/plugins/iCheck/icheck.min.js"></script>

<!-- MENU -->
<script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Clock picker -->
<script src="{{ asset('inspinia') }}/js/plugins/clockpicker/clockpicker.js"></script>

<!-- Select2 -->
<script src="{{ asset('inspinia') }}/js/plugins/select2/select2.full.min.js"></script>

<!-- TouchSpin -->
<script src="{{ asset('inspinia') }}/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

<!-- Masonry -->
<script src="{{ asset('inspinia') }}/js/plugins/masonary/masonry.pkgd.min.js"></script>


<style>

    .grid .ibox {
        margin-bottom: 0;
    }

    .grid-item {
        margin-bottom: 25px;
        width: 300px;
    }
</style>

<script>
    $('.updateAlbumSetVisibility').on('click',function(){
        var id = $(this).data('fid')

        //send value by ajax to server
        var xhr = new XMLHttpRequest();
        xhr.open("GET", '{{url('admin/client/proof/set/status/')}}'+'/'+id);
        xhr.setRequestHeader('Content-Type', '');
        xhr.send();
        xhr.onload = function() {
            alert(this.responseText);
        }
    });

</script>

<script>
    $('.updateAlbumSetDownload').on('click',function(){
        var id = $(this).data('fid')

        //send value by ajax to server
        var xhr = new XMLHttpRequest();
        xhr.open("GET", '{{url('admin/client/proof/set/download/status/')}}'+'/'+id);
        xhr.setRequestHeader('Content-Type', '');
        xhr.send();
        xhr.onload = function() {
            alert(this.responseText);
        }
    });

</script>


<script>
    $('.generateAlbumPassword').on('click',function(){
        var id = $(this).data('fid')

        //send value by ajax to server
        var xhr = new XMLHttpRequest();
        xhr.open("GET", '{{url('admin/client/proof/generate/password')}}'+'/'+id);
        xhr.setRequestHeader('Content-Type', '');
        xhr.send();
        xhr.onload = function() {
            document.getElementById("album_password").value = this.responseText;
            alert("Album Password Generated");
        }
    });

</script>

<script>
    $('.generateAlbumPin').on('click',function(){
        var id = $(this).data('fid')

        //send value by ajax to server
        var xhr = new XMLHttpRequest();
        xhr.open("GET", '{{url('admin/client/proof/generate/pin')}}'+'/'+id);
        xhr.setRequestHeader('Content-Type', '');
        xhr.send();
        xhr.onload = function() {
            document.getElementById("download_pin").value = this.responseText;
            alert("Album Pin Generated");
        }
    });

</script>

<script>
    $('.restrictToEmail').on('click',function(){
        var id = $(this).data('fid')
        var email = document.getElementById("email_restriction").value

        //send value by ajax to server
        var xhr = new XMLHttpRequest();
        xhr.open("GET", '{{url('admin/client/proof/restrict/to/specific')}}'+'/'+id +'/email/'+email);
        xhr.setRequestHeader('Content-Type', '');
        xhr.send();
        xhr.onload = function() {
            alert(this.responseText);
        }
        location.reload();
    });

</script>

<script>
    $('.generateClientExclusiveAccessPassword').on('click',function(){
        var id = $(this).data('fid')

        //send value by ajax to server
        var xhr = new XMLHttpRequest();
        xhr.open("GET", '{{url('admin/client/proof/generate/password')}}'+'/'+id);
        xhr.setRequestHeader('Content-Type', '');
        xhr.send();
        xhr.onload = function() {
            document.getElementById("client_exclusive_access_password").value = this.responseText;
            alert("Client Exclusive Access Password Generated");
        }
    });

</script>


<script>
    $(window).load(function() {

        $('.grid').masonry({
            // options
            itemSelector: '.grid-item',
            columnWidth: 300,
            gutter: 25
        });

    });
</script>

<!-- Page-Level Scripts -->
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

        /* Apply the jEditable handlers to the table */
        oTable.$('td').editable( '../example_ajax.php', {
            "callback": function( sValue, y ) {
                var aPos = oTable.fnGetPosition( this );
                oTable.fnUpdate( sValue, aPos[0], aPos[1] );
            },
            "submitdata": function ( value, settings ) {
                return {
                    "row_id": this.parentNode.getAttribute('id'),
                    "column": oTable.fnGetPosition( this )[2]
                };
            },

            "width": "90%",
            "height": "100%"
        } );


    });

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData( [
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row" ] );

    }
</script>

<script>
    $(document).ready(function(){

        var $image = $(".image-crop > img")
        $($image).cropper({
            aspectRatio: 1.618,
            preview: ".img-preview",
            done: function(data) {
                // Output the result data for cropping image.
            }
        });

        $("#zoomIn").click(function() {
            $image.cropper("zoom", 0.1);
        });

        $("#zoomOut").click(function() {
            $image.cropper("zoom", -0.1);
        });

        $("#rotateLeft").click(function() {
            $image.cropper("rotate", 45);
        });

        $("#rotateRight").click(function() {
            $image.cropper("rotate", -45);
        });

        $("#setDrag").click(function() {
            $image.cropper("setDragMode", "crop");
        });

        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $('#data_2 .input-group.date').datepicker({
            startView: 1,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: "dd/mm/yyyy"
        });

        $('#data_3 .input-group.date').datepicker({
            startView: 2,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        $('#data_4 .input-group.date').datepicker({
            minViewMode: 1,
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            todayHighlight: true
        });

        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, { color: '#1AB394' });

        var elem_2 = document.querySelector('.js-switch_2');
        var switchery_2 = new Switchery(elem_2, { color: '#1AB394' });

        var elem_3 = document.querySelector('.js-switch_3');
        var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

        var elem_4 = document.querySelector('.js-switch_4');
        var switchery_4 = new Switchery(elem_4, { color: '#1AB394' });

        var elem_5 = document.querySelector('.js-switch_5');
        var switchery_5 = new Switchery(elem_5, { color: '#1AB394' });

        var elem_6 = document.querySelector('.js-switch_6');
        var switchery_6 = new Switchery(elem_6, { color: '#1AB394' });

        var elem_10 = document.querySelector('.js-switch_10');
        var switchery_10 = new Switchery(elem_10, { color: '#1AB394' });

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        $('.demo1').colorpicker();

        var divStyle = $('.back-change')[0].style;
        $('#demo_apidemo').colorpicker({
            color: divStyle.backgroundColor
        }).on('changeColor', function(ev) {
            divStyle.backgroundColor = ev.color.toHex();
        });

        $('.clockpicker').clockpicker();

        $('input[name="daterange"]').daterangepicker();

        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#reportrange').daterangepicker({
            format: 'MM/DD/YYYY',
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: { days: 60 },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'right',
            drops: 'down',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-primary',
            cancelClass: 'btn-default',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });

        $(".select2_demo_1").select2();
        $(".select2_demo_2").select2();
        $(".select2_demo_3").select2({
            placeholder: "Select a state",
            allowClear: true
        });


        $(".touchspin1").TouchSpin({
            buttondown_class: 'btn btn-white',
            buttonup_class: 'btn btn-white'
        });

        $(".touchspin2").TouchSpin({
            min: 0,
            max: 100,
            step: 0.1,
            decimals: 2,
            boostat: 5,
            maxboostedstep: 10,
            postfix: '%',
            buttondown_class: 'btn btn-white',
            buttonup_class: 'btn btn-white'
        });

        $(".touchspin3").TouchSpin({
            verticalbuttons: true,
            buttondown_class: 'btn btn-white',
            buttonup_class: 'btn btn-white'
        });


    });
    var config = {
        '.chosen-select'           : {},
        '.chosen-select-deselect'  : {allow_single_deselect:true},
        '.chosen-select-no-single' : {disable_search_threshold:10},
        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

    $("#ionrange_1").ionRangeSlider({
        min: 0,
        max: 5000,
        type: 'double',
        prefix: "$",
        maxPostfix: "+",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_2").ionRangeSlider({
        min: 0,
        max: 10,
        type: 'single',
        step: 0.1,
        postfix: " carats",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_3").ionRangeSlider({
        min: -50,
        max: 50,
        from: 0,
        postfix: "°",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_4").ionRangeSlider({
        values: [
            "January", "February", "March",
            "April", "May", "June",
            "July", "August", "September",
            "October", "November", "December"
        ],
        type: 'single',
        hasGrid: true
    });

    $("#ionrange_5").ionRangeSlider({
        min: 10000,
        max: 100000,
        step: 100,
        postfix: " km",
        from: 55000,
        hideMinMax: true,
        hideFromTo: false
    });

    $(".dial").knob();

    $("#basic_slider").noUiSlider({
        start: 40,
        behaviour: 'tap',
        connect: 'upper',
        range: {
            'min':  20,
            'max':  80
        }
    });

    $("#range_slider").noUiSlider({
        start: [ 40, 60 ],
        behaviour: 'drag',
        connect: true,
        range: {
            'min':  20,
            'max':  80
        }
    });

    $("#drag-fixed").noUiSlider({
        start: [ 40, 60 ],
        behaviour: 'drag-fixed',
        connect: true,
        range: {
            'min':  20,
            'max':  80
        }
    });


</script>

<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>


<script>
    $(document).ready(function(){

        Dropzone.options.dropzone =
            {
                maxFilesize: 12,
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time+file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                removedfile: function(file)
                {
                    var name = file.upload.filename;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ url("image/delete") }}',
                        data: {filename: name},
                        success: function (data){
                            console.log("File has been successfully removed!!");
                        },
                        error: function(e) {
                            console.log(e);
                        }});
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                success: function(file, response)
                {
                    console.log(response);
                },
                error: function(file, response)
                {
                    return false;
                }
            };
    });
</script>


@endsection