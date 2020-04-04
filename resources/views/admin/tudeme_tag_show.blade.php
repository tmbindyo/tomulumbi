@extends('admin.layouts.app')

@section('title', 'Tudeme Tag')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Tudeme Tag</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong>Settings</strong>
                </li>
                <li class="active">
                   <strong><a href="{{route('admin.tudeme.tags')}}">Tudeme Tags</a></strong>
                </li>
                <li class="active">
                    <strong>Tudeme Tag</strong>
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
                                <form method="post" action="{{ route('admin.tudeme.tag.update',$tudemeTag->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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


                                    <div class="">
                                        <div class="has-warning">
                                            <input type="name" name="name" value="{{$tudemeTag->name}}" class="form-control input-lg">
                                        </div>
                                        <i>name</i>
                                    </div>


                                    <hr>

                                    <div>
                                        <button class="btn btn-primary btn-block btn-lg m-t-n-xs" type="submit"><strong>UPDATE</strong></button>
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
                    <div class="ibox-title">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="widget style1 navy-bg">
                                    <div class="row vertical-align">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-3x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <h3 class="font-bold">{{$tudemeTag->user->name}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="widget style1 {{$tudemeTag->status->label}}">
                                    <div class="row vertical-align">
                                        <div class="col-xs-3">
                                            <i class="fa fa-ellipsis-v fa-3x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <h3 class="font-bold">{{$tudemeTag->status->name}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="widget style1 navy-bg">
                                    <div class="row vertical-align">
                                        <div class="col-xs-3">
                                            <i class="fa fa-plus-square fa-3x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <h3 class="font-bold">{{$tudemeTag->created_at}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="widget style1 navy-bg">
                                    <div class="row vertical-align">
                                        <div class="col-xs-3">
                                            <i class="fa fa-scissors fa-3x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <h3 class="font-bold">{{$tudemeTag->updated_at}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Tudeme</th>
                                        <th>Description</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th width="13em">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tudemeTudemeTags as $tudeme)
                                        <tr class="gradeX">
                                            <td>{{$tudeme->name}}</td>
                                            <td>{{$tudeme->tudeme->name}}</td>
                                            <td>{{$tudeme->description}}</td>
                                            <td>{{$tudeme->user->name}}</td>
                                            <td>
                                                <span class="label {{$tudeme->status->label}}">{{$tudeme->status->name}}</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.tudeme.show', $tudeme->id) }}" class="btn-white btn btn-xs">View</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Tudeme</th>
                                        <th>Description</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th width="13em">Action</th>
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
