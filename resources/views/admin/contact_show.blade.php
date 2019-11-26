@extends('admin.layouts.app')

@section('title', 'Contact')

@section('css')

    <link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">

@endsection



@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Contact's</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <a href="{{route('admin.contacts')}}">Contact's</a>
                </li>
                <li class="active">
                    <strong>Contact</strong>
                </li>
            </ol>
        </div>
    </div>


        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">

                <div class="col-lg-12">
                    <div>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-warning m-r-sm">{{$contactWorkCount['contactAlbums']}}</button>
                                    Albums
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info m-r-sm">{{$contactWorkCount['contactProjects']}}</button>
                                    Projects
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary m-r-sm">{{$contactWorkCount['contactDesigns']}}</button>
                                    Designs
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div>

                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Contact <small>edit</small></h5>
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
                                <div class="col-sm-8 col-md-offset-2">
                                    <form method="post" action="{{ route('admin.contact.update',$contact->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                                        <div class="form-group">
                                            <div class="has-warning">
                                                <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" value="{{$contact->name}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="has-warning">
                                                <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" value="{{$contact->email}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="has-warning">
                                                <input type="email" id="phone_number" name="phone_number" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" value="{{$contact->phone_number}}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="has-warning">
                                                <select required="required" name="contact_type" class="select2_demo_tag form-control input-lg">
                                                    <option>Select Contact Type</option>
                                                    @foreach($contactTypes as $contactType)
                                                        <option @if($contact->contact_type_id==$contactType->id) selected @endif value="{{$contactType->id}}">{{$contactType->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>Tags: What kind of collection is this? Separate your tags with a comma. e.g. wedding, outdoor, summer</i>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="has-warning">
                                                <textarea id="about" rows="5" name="about" class="resizable_textarea form-control input-lg" required="required" placeholder="About...">{{$contact->about}}</textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <div>
                                            <button class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit"><strong>Update</strong></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- albums--}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Albums</h5>
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
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Views</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($albums as $album)
                                        <tr class="gradeX">
                                            <td>{{$album->date}}</td>
                                            <td>{{$album->name}}</td>
                                            <td>{{$album->views}}</td>
                                            <td>{{$album->user->name}}</td>
                                            <td>
                                                <span class="label {{$album->status->label}}">{{$album->status->name}}</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    @if($album->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                                        <a href="{{ route('admin.personal.album.show', $album->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @elseif($album->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                                        <a href="{{ route('admin.client.proof.show', $album->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Views</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- projects--}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Projects</h5>
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
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Views</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($projects as $project)
                                        <tr class="gradeX">
                                            <td>{{$project->date}}</td>
                                            <td>{{$project->name}}</td>
                                            <td>{{$project->views}}</td>
                                            <td>{{$project->user->name}}</td>
                                            <td>
                                                <span class="label {{$project->status->label}}">{{$project->status->name}}</span>
                                            </td>

                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.project.show', $project->id) }}" class="btn-white btn btn-xs">View</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Views</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- designs--}}
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Designs</h5>
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
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Views</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($designs as $design)
                                    <tr class="gradeX">
                                        <td>{{$design->name}}</td>
                                        <td>{{$design->date}}</td>
                                        <td>{{$design->views}}</td>
                                        <td>{{$design->user->name}}</td>
                                        <td>
                                            <span class="label {{$design->status->label}}">{{$design->status->name}}</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.design.show', $design->id) }}" class="btn-white btn btn-xs">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Views</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

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

    <script src="{{ asset('inspinia') }}/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>

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

    </script>

@endsection
