@extends('admin.layouts.app')

@section('title', 'Asset Action Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-5">
            <h2>Asset Action's</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    CRM
                </li>
                <li class="active">
                    <a href="{{route('admin.asset.actions')}}">Asset actions</a>
                </li>
                <li class="active">
                    <strong>Asset Action Show</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-7">
            <div class="title-action">
                @if($assetAction->is_asset == 1)
                    <a href="{{route('admin.asset.show',$assetAction->asset_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Asset </a>
                @elseif($assetAction->is_kit == 1)
                    <a href="{{route('admin.kit.show',$assetAction->kit_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Kit </a>
                @endif
                <a href="{{route('admin.contact.show',$assetAction->contact_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Contact </a>
                <a href="{{route('admin.action.type.show',$assetAction->action_type_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Action Type </a>
                <a href="{{route('admin.asset.action.payment.create',$assetAction->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Payment </a>
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
                                <form method="post" action="{{ route('admin.asset.action.update',$assetAction->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <input type="number" id="amount" name="amount" required="required" value="{{$assetAction->amount}}" class="form-control input-lg">
                                        <i>amount</i>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="date" class="form-control input-lg" value="{{$assetAction->date}}">
                                        </div>
                                        <i>date</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="start_date" class="form-control input-lg" value="{{$assetAction->due_date}}">
                                        </div>
                                        <i>due date</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea id="notes" rows="5" name="notes" class="resizable_textarea form-control input-lg" required="required">{{$assetAction->notes}}</textarea>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select required="required" name="action_type" class="select2_demo_tag form-control input-lg">
                                            <option selected value="{{$assetAction->action_type->id}}">{{$assetAction->action_type->name}}</option>
                                        </select>
                                        <i>action type</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select required="required" name="contact" class="select2_demo_tag form-control input-lg">
                                            <option selected value="{{$assetAction->contact->id}}">{{$assetAction->contact->first_name}} {{$assetAction->contact->last_name}}</option>
                                        </select>
                                        <i>contact</i>
                                    </div>
                                    <br>
                                    @if($assetAction->is_asset == 1)
                                        <div class="has-warning">
                                            <select required="required" name="asset" class="select2_demo_tag form-control input-lg">
                                                <option value="{{$assetAction->asset->id}}">{{$assetAction->asset->name}}</option>
                                            </select>
                                            <i>asset</i>
                                        </div>
                                    @elseif($assetAction->is_kit == 1)
                                        <div class="has-warning">
                                            <select required="required" name="kit" class="select2_demo_tag form-control input-lg">
                                                <option value="{{$assetAction->kit->id}}">{{$assetAction->kit->name}}</option>
                                            </select>
                                            <i>asset</i>
                                        </div>
                                    @endif
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
                                        <dt>Status:</dt> <dd><span class="label {{$assetAction->status->label}}">{{$assetAction->status->name}}</span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Created by:</dt> <dd>{{$assetAction->user->name}}</dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Last Updated:</dt> <dd>{{$assetAction->updated_at}}</dd>
                                        <dt>Created:</dt> <dd> {{$assetAction->created_at}} </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#payments" data-toggle="tab">Payments</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="payments">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Reference #</th>
                                                        <th>Initial Balance</th>
                                                        <th>Paid</th>
                                                        <th>Current Balance</th>
                                                        <th>Account</th>
                                                        <th>Created</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($assetAction->payments as $payment)
                                                        <tr class="gradeA">
                                                            <td>{{$payment->reference}}</td>
                                                            <td>{{$payment->initial_balance}}</td>
                                                            <td>{{$payment->amount}}</td>
                                                            <td>{{$payment->current_balance}}</td>
                                                            <td>{{$payment->account->name}}</td>
                                                            <td>{{$payment->created_at}}</td>
                                                            <td>
                                                                <p><span class="label {{$payment->status->label}}">{{$payment->status->name}}</span></p>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Reference #</th>
                                                        <th>Initial Balance</th>
                                                        <th>Paid</th>
                                                        <th>Current Balance</th>
                                                        <th>Account</th>
                                                        <th>Created</th>
                                                        <th>Status</th>
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

        {{--    To Do's    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>To Do's</h5>
                        <div class="ibox-tools">
                            <a data-toggle="modal" data-target="#toDoRegistration" class="btn btn-success btn-round btn-outline"> <span class="fa fa-plus"></span> New</a>
                        </div>
                    </div>
                    <div class="">
                        <ul class="pending-to-do">
                            @foreach($pendingToDos as $pendingToDo)
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
                            @foreach($inProgressToDos as $inProgressToDo)
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
                            @foreach($overdueToDos as $overdueToDo)
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
                            @foreach($completedToDos as $completedToDo)
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

@include('admin.layouts.modals.asset_action_to_do')
