@extends('admin.layouts.app')

@section('title', 'Asset Actions')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Asset Actions</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>Settings</strong>
                </li>
                <li class="active">
                    <strong>Asset Actions</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.asset.action.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Asset Action </a>
            </div>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>Paid</th>
                                        <th>Date</th>
                                        <th>Due Date</th>
                                        <th>Action Type</th>
                                        <th>Contact</th>
                                        <th>Item</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($assetActions as $assetAction)
                                        <tr class="gradeX">
                                            <td>{{$assetAction->reference}}</td>
                                            <td>{{$assetAction->amount}}</td>
                                            <td>{{$assetAction->paid}}</td>
                                            <td>{{$assetAction->date}}</td>
                                            <td>{{$assetAction->due_date}}</td>
                                            <td>{{$assetAction->action_type->name}}</td>
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
                                        <th>Paid</th>
                                        <th>Date</th>
                                        <th>Due Date</th>
                                        <th>Action Type</th>
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
