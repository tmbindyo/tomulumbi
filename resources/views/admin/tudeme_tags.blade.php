@extends('admin.layouts.app')

@section('title', 'Tudeme Tags')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Tudeme Tags</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>Settings</strong>
                </li>
                <li class="active">
                    <strong>Tudeme Tags</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.tudeme.tag.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Tudeme Tag </a>
            </div>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
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
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tudemeTags as $tudemeTag)
                                        <tr class="gradeX">
                                            <td>{{$tudemeTag->name}}</td>
                                            <td>{{$tudemeTag->user->name}}</td>
                                            <td>
                                                <span class="label {{$tudemeTag->status->label}}">{{$tudemeTag->status->name}}</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.tudeme.tag.show', $tudemeTag->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @if($tudemeTag->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                        <a href="{{ route('admin.tudeme.tag.restore', $tudemeTag->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                    @else
                                                        <a href="{{ route('admin.tudeme.tag.delete', $tudemeTag->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
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
