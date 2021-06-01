@extends('admin.layouts.app')

@section('title', 'Transfer Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-5">
            <h2>Transfers</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>Accounting</strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.transfers')}}">Transfers</a></strong>
                </li>
                <li class="active">
                    <strong>Transfer Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-7">
            <div class="title-action">
                <a href="{{route('admin.transfer.expense.create',$transfer->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Expense </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.transfer.update',$transfer->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <input type="number" id="amount" name="amount" required="required" value="{{$transfer->amount}}" class="form-control input-lg">
                                        <i>amount</i>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="date" class="form-control input-lg" value="{{$transfer->date}}">
                                        </div>
                                        <i>What is the start date of the transfer?</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="source_account" class="select2_demo_tag form-control input-lg">
                                            <option value="{{$transfer->source_account->id}}">{{$transfer->source_account->name}} [{{$transfer->source_account->balance}}]</option>
                                        </select>
                                        <i>source account</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="destination_account" class="select2_demo_tag form-control input-lg">
                                            <option value="{{$transfer->destination_account->id}}">{{$transfer->destination_account->name}} [{{$transfer->destination_account->balance}}]</option>
                                        </select>
                                        <i>destination account</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <div class="has-warning">
                                            <textarea id="notes" rows="5" name="notes" class="resizable_textarea form-control input-lg" required="required">{{$transfer->notes}}</textarea>
                                        </div>
                                    </div>

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
                                <div class="col-lg-3">
                                    <div class="widget style1 navy-bg">
                                        <div class="row vertical-align">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3 class="font-bold">{{$transfer->user->name}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget style1 {{$transfer->status->label}}">
                                        <div class="row vertical-align">
                                            <div class="col-xs-3">
                                                <i class="fa fa-ellipsis-v fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3 class="font-bold">{{$transfer->status->name}}</h3>
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
                                                <h3 class="font-bold">{{$transfer->created_at}}</h3>
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
                                                <h3 class="font-bold">{{$transfer->updated_at}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#expenses" data-toggle="tab">Expenses</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="expenses">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Recurring</th>
                                                        <th>Type</th>
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
                                                    @foreach($transfer->expenses as $expense)
                                                        <tr class="gradeA">
                                                            <td>
                                                                @if($expense->is_recurring == 1)
                                                                    <p><span class="badge badge-success">True</span></p>
                                                                @else
                                                                    <p><span class="badge badge-success">False</span></p>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($expense->is_order == 1)
                                                                    <p><a href="{{route('admin.order.show',$expense->order_id)}}" class="badge badge-success">Order</a></p>
                                                                @elseif($expense->is_album == 1)
                                                                    <p>
                                                                        <a
                                                                        @if ($expense->album->album_type_id == '6fdf4858-01ce-43ff-bbe6-827f09fa1cef')
                                                                            href="{{route('admin.personal.album.show',$expense->album->id)}}"
                                                                        @elseif ($expense->album->album_type_id == 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4')
                                                                            href="{{route('admin.client.proof.show',$expense->album->id)}}"
                                                                         @endif  class="badge badge-primary">Album {{$expense->album->name}}
                                                                        </a>
                                                                    </p>
                                                                @elseif($expense->is_project == 1)
                                                                    <p><a href="{{route('admin.project.show',$expense->project->id)}}" class="badge badge-primary">Project {{$expense->project->name}}</a></p>
                                                                @elseif($expense->is_project == 1)
                                                                    <p><a href="{{route('admin.project.show',$expense->project_id)}}" class="badge badge-primary">Design {{$expense->design->name}}</a></p>
                                                                @elseif($expense->is_liability == 1)
                                                                    <p><a href="{{route('admin.liability.show',$expense->liability_id)}}" class="badge badge-primary">Liability</a></p>
                                                                @elseif($expense->is_transfer == 1)
                                                                    <p><a href="{{route('admin.transfer.show',$expense->transfer_id)}}" class="badge badge-primary">Transfer</a></p>
                                                                @elseif($expense->is_campaign == 1)
                                                                    <p><a href="{{route('admin.campaign.show',$expense->campaign_id)}}" class="badge badge-primary">Campaign</a></p>
                                                                @elseif($expense->is_asset == 1)
                                                                    <p><a href="{{route('admin.asset.show',$expense->asset_id)}}" class="badge badge-primary">Asset</a></p>
                                                                @else
                                                                    <p><span class="badge badge-info">None</span></p>
                                                                @endif
                                                            </td>
                                                            <td>{{$expense->reference}}</td>
                                                            <td>{{$expense->date}}</td>
                                                            <td>{{$expense->created_at}}</td>
                                                            <td>{{$expense->expense_account->name}}</td>
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
                                                        <th>Type</th>
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

    </div>


@endsection