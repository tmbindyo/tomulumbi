@extends('admin.layouts.app')

@section('title', 'Typography')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Typographys</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong><a href="#">Settings</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.typographies')}}">Typographies</a></strong>
                </li>
                <li class="active">
                    <strong>Typography Upload</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <form method="post" action="{{ route('admin.typography.update',$typography->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <input type="name" name="name" value="{{$typography->name}}" class="form-control input-lg">
                                        <i>name</i>
                                    </div>
                                    <div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#albums"> <i class="fa fa-cogs"></i> Albums</a></li>
                        <li class=""><a data-toggle="tab" href="#designs"><i class="fa fa-bookmark"></i> Designs</a></li>
                        <li class=""><a data-toggle="tab" href="#projects"><i class="fa fa-bookmark"></i> Projects</a></li>
                        <li class=""><a data-toggle="tab" href="#journals"><i class="fa fa-bookmark"></i> Journals</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="albums" class="tab-pane active">
                            <div class="panel-body">
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
                        <div id="designs" class="tab-pane">
                            <div class="panel-body">
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
                        <div id="projects" class="tab-pane">
                            <div class="panel-body">
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
                        <div id="journals" class="tab-pane">
                            <div class="panel-body">
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
                                        @foreach($journals as $journal)
                                            <tr class="gradeX">
                                                <td>{{$journal->date}}</td>
                                                <td>{{$journal->name}}</td>
                                                <td>{{$journal->views}}</td>
                                                <td>{{$journal->user->name}}</td>
                                                <td>
                                                    <span class="label {{$journal->status->label}}">{{$journal->status->name}}</span>
                                                </td>

                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.journal.show', $journal->id) }}" class="btn-white btn btn-xs">View</a>
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
        </div>

    </div>


@endsection
