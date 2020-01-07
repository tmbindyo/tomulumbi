@extends('admin.layouts.app')

@section('title', 'Tag')

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
            <h2>Tags</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    Settings
                </li>
                <li class="active">
                    <a href="{{route('admin.tags')}}">
                    <strong>Tags</strong>
                    </a>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Tag <small>edit</small></h5>
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
                            <div class="col-sm-6 b-r">
                                <form method="post" action="{{ route('admin.tag.update',$tag->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                                    <div class="has-warning">
                                        <label>Name</label>
                                        <input type="name" name="name" value="{{$tag->name}}" class="form-control input-lg">
                                    </div>
                                    <br>
                                    <div class="">
                                        <div class="has-warning">
                                            <select required="required" name="thumbnail_size" class="select2_demo_tag form-control input-lg">
                                                <option>Select Thumbnail Size</option>
                                                @foreach($thumbnailSizes as $thumbnailSize)
                                                    <option @if($tag->thumbnail_size_id ==$thumbnailSize->id) selected @endif value="{{$thumbnailSize->id}}">{{$thumbnailSize->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>Size of the thumbnails on the tag page</i>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <button class="btn btn-lg btn-block btn-primary pull-right m-t-n-xs" type="submit"><strong>Update</strong></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-md-12">
                                    <h2 class="text-center">Cover Image</h2>
                                    <button class="btn btn-primary btn-lg btn-outline btn-block" data-toggle="modal" data-target="#tagCoverImageRegistration" aria-expanded="false">Update Cover Image</button>
                                    <hr>
                                </div>
                                <div class="col-md-10 col-md-offset-1">

                                    <div class="center">
                                        <img alt="image" class="img-responsive" @isset($tag->cover_image) src="{{ asset('') }}{{ $tag->cover_image->large_thumbnail }}" @endisset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Tag Albums</h5>
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
                @foreach($tagAlbums as $tagAlbum)
                    <tr class="gradeX">
                        <td>{{$tagAlbum->date}}</td>
                        <td>{{$tagAlbum->name}}</td>
                        <td>{{$tagAlbum->views}}</td>
                        <td>{{$tagAlbum->user->name}}</td>
                        <td>
                            <span class="label {{$tagAlbum->status->label}}">{{$tagAlbum->status->name}}</span>
                        </td>

                        <td class="text-right">
                            <div class="btn-group">
                                {{-- todo check why route is album but id is album type--}}
                                @if($tagAlbum->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                    <a href="{{ route('admin.personal.album.show', $tagAlbum->id) }}" class="btn-white btn btn-xs">View</a>
                                @elseif($tagAlbum->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                    <a href="{{ route('admin.client.proof.show', $tagAlbum->id) }}" class="btn-white btn btn-xs">View</a>
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
    </div>


@endsection

@include('admin.layouts.modals.tag_cover_image')

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
