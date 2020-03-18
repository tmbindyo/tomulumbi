@extends('admin.layouts.app')

@section('title', 'Asset Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-7">
            <h2>Assets</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>CRM</strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.assets')}}">Assets</a></strong>
                </li>
                <li class="active">
                    <strong>Asset Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-5">
            <div class="title-action">
                <a href="{{route('admin.asset.asset.action.create',$asset->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Asset Asset Action </a>
                <a href="{{route('admin.asset.assign.kit',$asset->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Assign To Kit </a>
                <a href="{{route('admin.asset.show',$asset->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Expense </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.asset.update',$asset->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <input type="text" id="name" name="name" required="required" value="{{$asset->name}}" class="form-control input-lg">
                                        <i>name</i>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="date_acquired" class="form-control input-lg" value="{{$asset->date_acquired}}">
                                        </div>
                                        <i>Date acquired?</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="asset_category" class="select2_demo_tag form-control input-lg">
                                            <option selected disabled >Select Category</option>
                                            @foreach ($assetCategories as $assetCategory)
                                                <option @if($assetCategory->id == $asset->asset_category_id)selected @endif value="{{$assetCategory->id}}">{{$assetCategory->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>type</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea rows="5" id="notes" name="notes" required="required" placeholder="Brief description" class="form-control input-lg">{{$asset->notes}}</textarea>
                                        <i>notes</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <label>Insured?</label>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <input name="is_insured" type="checkbox" class="js-switch" @if($asset->is_insured == 1) checked @endif />
                                            <br>
                                            <i>check if insured.</i>
                                        </div>
                                    </div>

                                    <br>
                                    <hr>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-block btn-lg btn-outline btn-success mt-4">{{ __('SAVE') }}</button>
                                    </div>
                                </div>


                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  details  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label {{$asset->status->label}}">{{$asset->status->name}}</span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Created by:</dt> <dd>{{$asset->user->name}}</dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Last Updated:</dt> <dd>{{$asset->updated_at}}</dd>
                                        <dt>Created:</dt> <dd> {{$asset->created_at}} </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#asset-actions" data-toggle="tab">Asset Actions</a></li>
                                            <li class=""><a href="#kits" data-toggle="tab">Kits</a></li>
                                            <li class=""><a href="#expenses" data-toggle="tab">Expenses</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="asset-actions">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Reference</th>
                                                            <th>Amount</th>
                                                            <th>Date</th>
                                                            <th>Due Date</th>
                                                            <th>Action</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($asset->asset_actions as $assetAction)
                                                            <tr class="gradeX">
                                                                <td>{{$assetAction->reference}}</td>
                                                                <td>{{$assetAction->amount}}</td>
                                                                <td>{{$assetAction->date}}</td>
                                                                <td>{{$assetAction->due_date}}</td>
                                                                <td>{{$assetAction->action_type->name}}</td>
                                                                <td>{{$assetAction->user->name}}</td>
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
                                                            <th>Action</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="kits">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($asset->kit_assets as $kitAsset)
                                                        <tr class="gradeX">
                                                            <td>{{$kitAsset->asset->reference}}</td>
                                                            <td>{{$kitAsset->asset->name}}</td>
                                                            <td>
                                                                <span class="label {{$kitAsset->status->label}}">{{$kitAsset->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    @if($kitAsset->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                        <a href="{{ route('admin.kit.asset.restore', $kitAsset->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                                    @else
                                                                        <a href="{{ route('admin.kit.asset.delete', $kitAsset->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Name</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="expenses">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Recurring</th>
                                                        <th>Expense #</th>
                                                        <th>Date</th>
                                                        <th>Created</th>
                                                        <th>Expense Type</th>
                                                        <th>Total</th>
                                                        <th>Paid</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($asset->expenses as $expense)
                                                        <tr class="gradeA">
                                                            <td>
                                                                @if($expense->is_recurring == 1)
                                                                    <p><span class="badge badge-success">True</span></p>
                                                                @else
                                                                    <p><span class="badge badge-success">False</span></p>
                                                                @endif
                                                            </td>
                                                            <td>{{$expense->reference}}</td>
                                                            <td>{{$expense->date}}</td>
                                                            <td>{{$expense->created_at}}</td>
                                                            <td>{{$expense->expense_type->name}}</td>
                                                            <td>{{$expense->total}}</td>
                                                            <td>{{$expense->paid}}</td>
                                                            <td>
                                                                <p><span class="label {{$expense->status->label}}">{{$expense->status->name}}</span></p>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.expense.show', $expense->id) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Recurring</th>
                                                        <th>Expense #</th>
                                                        <th>Date</th>
                                                        <th>Created</th>
                                                        <th>Expense Type</th>
                                                        <th>Total</th>
                                                        <th>Paid</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
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
                    </div>
                </div>
            </div>
        </div>

        {{--    To Dos    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>To Dos</h5>
                        <div class="ibox-tools">
                            <a data-toggle="modal" data-target="#toDoRegistration" class="btn btn-success btn-round btn-outline"> <span class="fa fa-plus"></span> New</a>
                        </div>
                    </div>
                    <div class="">
                        <ul class="pending-to-do">
                            @foreach($asset->pending_to_dos as $pendingToDo)
                                <li>
                                    <div>
                                        <small>{{$pendingToDo->due_date}}</small>
                                        <h4>{{$pendingToDo->name}}</h4>
                                        <p>{{$pendingToDo->notes}}.</p>
                                        @if($pendingToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$pendingToDo->design->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.in.progress',$pendingToDo->id)}}"><i class="fa fa-arrow-circle-o-right "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <ul class="in-progress-to-do">
                            @foreach($asset->in_progress_to_dos as $inProgressToDo)
                                <li>
                                    <div>
                                        <small>{{$inProgressToDo->due_date}}</small>
                                        <h4>{{$inProgressToDo->name}}</h4>
                                        <p>{{$inProgressToDo->notes}}.</p>
                                        @if($inProgressToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$inProgressToDo->design->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.completed',$inProgressToDo->id)}}"><i class="fa fa-check "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="overdue-to-do">
                            @foreach($asset->overdue_to_dos as $overdueToDo)
                                <li>
                                    <div>
                                        <small>{{$overdueToDo->due_date}}</small>
                                        <h4>{{$overdueToDo->name}}</h4>
                                        <p>{{$overdueToDo->notes}}.</p>
                                        @if($overdueToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$overdueToDo->design->name}}</span></p>
                                        @endif
                                        @if($overdueToDo->status->name === "Pending")
                                            <a href="{{route('admin.to.do.set.completed',$overdueToDo->id)}}"><i class="fa fa-check-double "></i></a>
                                        @elseif($overdueToDo->status->name === "In progress")
                                            <a href="{{route('admin.to.do.set.completed',$overdueToDo->id)}}"><i class="fa fa-check-double "></i></a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="completed-to-do">
                            @foreach($asset->completed_to_dos as $completedToDo)
                                <li>
                                    <div>
                                        <small>{{$completedToDo->due_date}}</small>
                                        <h4>{{$completedToDo->name}}</h4>
                                        <p>{{$completedToDo->notes}}.</p>
                                        @if($completedToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$completedToDo->design->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.delete',$completedToDo->id)}}"><i class="fa fa-trash-o "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@include('admin.layouts.modals.asset_to_do')
