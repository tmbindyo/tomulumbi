@extends('admin.layouts.app')

@section('title', 'Project Type')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Asset Categories</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.dashboard')}}">Home</a>
            </li>
            <li>
                Settings
            </li>
            <li class="active">
                <a href="{{route('admin.project.types')}}">Project Types</a>
            </li>
            <li class="active">
                <a href="{{route('admin.project.type.show',$projectType->id)}}">Project Type</a>
            </li>
        </ol>
    </div>
    <div class="col-md-3">
        <div class="title-action">
            <a href="{{route('admin.project.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Project </a>
        </div>
    </div>
</div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="post" action="{{ route('admin.project.type.update',$projectType->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <br>
                                        <div class="has-warning">
                                            <input type="name" name="name" value="{{$projectType->name}}" class="form-control input-lg">
                                            <i>name</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <textarea id="description" name="description" class="resizable_textarea form-control" rows="5" required="required">{{$projectType->description}}</textarea>
                                            <i>Description</i>
                                        </div>
                                        <hr>
                                        <div>
                                            <button class="btn btn-block btn-lg btn-primary" type="submit"><strong>UPDATE</strong></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <br>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($projectTypeProjects as $projectTypeProject)
                                            <tr class="gradeX">
                                                <td>{{$projectTypeProject->name}}</td>
                                                <td>{{$projectTypeProject->description}}</td>
                                                <td>{{$projectTypeProject->user->name}}</td>
                                                <td>
                                                    <span class="label {{$projectTypeProject->status->label}}">{{$projectTypeProject->status->name}}</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.project', $projectTypeProject->id) }}" class="btn-white btn btn-xs">View</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
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
