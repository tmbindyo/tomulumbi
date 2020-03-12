@extends('admin.layouts.app')

@section('title', 'Campaign Type')

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Campaign Type's</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('admin.dashboard')}}">Home</a>
            </li>
            <li>
                <a href="#">Settings</a>
            </li>
            <li class="active">
                <a href="{{route('admin.campaign.types')}}">Campaign Type's</a>
            </li>
            <li class="active">
                <strong>Campaign Type</strong>
            </li>
        </ol>
    </div>
    <div class="col-md-3">
        <div class="title-action">
            <a href="{{route('admin.campaign.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Campaign </a>
        </div>
    </div>
</div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-8 col-md-offset-2">
                                    <form method="post" action="{{ route('admin.campaign.type.update',$campaignType->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                            <input type="name" name="name" value="{{$campaignType->name}}" class="form-control input-lg">
                                            <i>name</i>
                                        </div>
                                        <hr>
                                        <div>
                                            <button class="btn btn-lg btn-primary btn-block" type="submit"><strong>UPDATE</strong></button>
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
                                        <th>Type</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($campaignType->campaigns as $campaign)
                                        <tr class="gradeX">
                                            <td>{{$campaign->name}}</td>
                                            <td>{{$campaign->campaign_type->name}}</td>
                                            <td>{{$campaign->start_date}}</td>
                                            <td>{{$campaign->end_date}}</td>
                                            <td>{{$campaign->user->name}}</td>
                                            <td>
                                                <span class="label {{$campaign->status->label}}">{{$campaign->status->name}}</span>
                                            </td>

                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.campaign.show', $campaign->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @if($campaign->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                        <a href="{{ route('admin.campaign.restore', $campaign->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                    @else
                                                        <a href="{{ route('admin.campaign.delete', $campaign->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
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
