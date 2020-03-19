@extends('admin.layouts.app')

@section('title', 'Action Type')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Action Type</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong>Settings</strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.action.types')}}">Action Types</a></strong>
                </li>
                <li class="active">
                    <strong>Action Type</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.action.type.asset.action.create',$actionType->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Asset Action </a>
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
                                <form method="post" action="{{ route('admin.action.type.update',$actionType->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <div class="has-warning">
                                            <input type="name" name="name" value="{{$actionType->name}}" class="form-control input-lg">
                                            <i>name</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <textarea id="description" rows="5" name="description" class="resizable_textarea form-control input-lg" required="required">{{$actionType->description}}</textarea>
                                            <i>description</i>
                                        </div>
                                        <hr>
                                        <div>
                                            <button class="btn btn-primary btn-block btn-lg m-t-n-xs" type="submit"><strong>UPDATE</strong></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--  actions  --}}
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
                                            <h3 class="font-bold">{{$actionType->user->name}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="widget style1 {{$actionType->status->label}}">
                                    <div class="row vertical-align">
                                        <div class="col-xs-3">
                                            <i class="fa fa-ellipsis-v fa-3x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <h3 class="font-bold">{{$actionType->status->name}}</h3>
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
                                            <h3 class="font-bold">{{$actionType->created_at}}</h3>
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
                                            <h3 class="font-bold">{{$actionType->updated_at}}</h3>
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
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Due Date</th>
                                        <th>Contact</th>
                                        <th>Item</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($actionTypeAssetActions as $assetAction)
                                        <tr class="gradeX">
                                            <td>{{$assetAction->reference}}</td>
                                            <td>{{$assetAction->amount}}</td>
                                            <td>{{$assetAction->date}}</td>
                                            <td>{{$assetAction->due_date}}</td>
                                            <td>{{$assetAction->contact->first_name}} {{$assetAction->contact->last_name}}</td>
                                            <td>{{$assetAction->user->name}}</td>
                                            <td>
                                                @if($assetAction->is_asset == 1)
                                                    <span class="label label-primary">{{$assetAction->asset->name}}</span>
                                                @elseif($assetAction->is_kit == 1)
                                                    <span class="label label-primary">{{$assetAction->kit->name}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="label {{$assetAction->status->label}}">{{$assetAction->status->name}}</span>
                                            </td>

                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.asset.action.show', $assetAction->id) }}" class="btn-white btn btn-xs">View</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Due Date</th>
                                        <th>Contact</th>
                                        <th>Item</th>
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
