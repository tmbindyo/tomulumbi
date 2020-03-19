@extends('admin.layouts.app')

@section('title', 'Label')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Labels</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.labels')}}">Labels</a></strong>
                </li>
                <li class="active">
                    <strong>Label Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.journal.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Journal </a>
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
                                <form method="post" action="{{ route('admin.label.update',$label->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <input type="name" name="name" value="{{$label->name}}" class="form-control input-lg">
                                        <i>name</i>
                                    </div>
                                    <hr>
                                    <div>
                                        <button class="btn btn-lg btn-primary btn-block btn-outline m-t-n-xs" type="submit"><strong>UPDATE</strong></button>
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
                <div class="ibox-title">
                    <div class="row">

                        <div class="col-lg-3">
                            <div class="widget style1 navy-bg">
                                <div class="row vertical-align">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <h3 class="font-bold">{{$label->user->name}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="widget style1 {{$label->status->label}}">
                                <div class="row vertical-align">
                                    <div class="col-xs-3">
                                        <i class="fa fa-ellipsis-v fa-3x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <h3 class="font-bold">{{$label->status->name}}</h3>
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
                                        <h3 class="font-bold">{{$label->created_at}}</h3>
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
                                        <h3 class="font-bold">{{$label->updated_at}}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ibox float-e-margins">
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
                                    @foreach($label->journal_labels as $labelJournal)
                                        <tr class="gradeX">
                                            <td>{{$labelJournal->journal->name}}</td>
                                            <td>{{$labelJournal->journal->date}}</td>
                                            <td>{{$labelJournal->journal->views}}</td>
                                            <td>{{$labelJournal->journal->user->name}}</td>
                                            <td>
                                                <span class="label {{$labelJournal->journal->status->label}}">{{$labelJournal->journal->status->name}}</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.journal.show', $labelJournal->journal->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @if($labelJournal->journal->status->name == "Deleted")
                                                        <a href="{{ route('admin.journal.restore', $labelJournal->journal->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                    @else
                                                        <a href="{{ route('admin.journal.delete', $labelJournal->journal->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                    @endif
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
