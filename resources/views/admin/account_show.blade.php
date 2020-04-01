@extends('admin.layouts.app')

@section('title', 'Account')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-5">
            <h2>Account</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>Accounting</strong>
                </li>
                <li class="">
                    <strong><a href="{{route('admin.accounts')}}">Accounts</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.account.show',$account->id)}}">Account</a></strong>
                </li>
            </ol>
        </div>
        <div class="col-md-7">
            <div class="title-action">
                <a href="{{route('admin.account.adjustment.create',$account->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Account Adjustment </a>
                <a href="{{route('admin.account.deposit.create',$account->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Deposit </a>
                <a href="{{route('admin.account.liability.create',$account->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Liability </a>
                <a href="{{route('admin.account.loan.create',$account->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Loan </a>
                <a href="{{route('admin.account.withdrawal.create',$account->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Withdrawal </a>
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
                                <form method="post" action="{{ route('admin.account.update',$account->id) }}" autocomplete="off" class="form-horizontal form-label-left">

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
                                    <div class="col-md-12">
                                        <div class="has-warning">
                                            <input type="name" name="name" value="{{$account->name}}" class="form-control input-lg">
                                            <i>name</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <textarea rows="5" name="notes" class="form-control input-lg" >{{$account->notes}}</textarea>
                                            <i>notes</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <input type="number" name="balance" value="{{$account->balance}}" class="form-control input-lg" readonly>
                                            <i>balance</i>
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
                                                <h3 class="font-bold">{{$account->user->name}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget style1 {{$account->status->label}}">
                                        <div class="row vertical-align">
                                            <div class="col-xs-3">
                                                <i class="fa fa-ellipsis-v fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3 class="font-bold">{{$account->status->name}}</h3>
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
                                                <h3 class="font-bold">{{$account->created_at}}</h3>
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
                                                <h3 class="font-bold">{{$account->updated_at}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="progress progress-striped active m-b-sm">
                                        <div style="width: {{$percentage}}%;" class="progress-bar"></div>
                                    </div>
                                    <p class="pull-right"><small><strong>{{$percentage}}%</strong> to goal.</small></p>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#account-adjustments" data-toggle="tab">Account Adjustments</a></li>
                                            <li class=""><a href="#deposits" data-toggle="tab">Deposits</a></li>
                                            <li class=""><a href="#liabilities" data-toggle="tab">Liabilities</a></li>
                                            <li class=""><a href="#loans" data-toggle="tab">Loans</a></li>
                                            <li class=""><a href="#payments" data-toggle="tab">Payments</a></li>
                                            <li class=""><a href="#refunds" data-toggle="tab">Refunds</a></li>
                                            <li class=""><a href="#transactions" data-toggle="tab">Transactions</a></li>
                                            <li class=""><a href="#withdrawals" data-toggle="tab">Withdrawals</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                    <div class="tab-pane active" id="account-adjustments">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                <tr>
                                                    <th>Reference</th>
                                                    <th>Amount</th>
                                                    <th>Initial</th>
                                                    <th>Subsequent</th>
                                                    <th>Date</th>
                                                    <th>Deposit</th>
                                                    <th>User</th>
                                                    <th>Status</th>
                                                    <th width="13em">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($account->account_adjustments as $adjustments)
                                                        <tr class="gradeX">
                                                            <td>
                                                                {{$adjustments->reference}}
                                                                <span><i data-toggle="tooltip" data-placement="right" title="{{$adjustments->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                            </td>
                                                            <td>{{$adjustments->amount}}</td>
                                                            <td>{{$adjustments->initial_account_amount}}</td>
                                                            <td>{{$adjustments->subsequent_account_amount}}</td>
                                                            <td>{{$adjustments->date}}</td>
                                                            <td>
                                                                @if($adjustments->is_deposit == 1)
                                                                    <span class="label label-success">Deposit</span>
                                                                @else
                                                                    <span class="label label-success">Non Deposit</span>
                                                                @endif
                                                            </td>
                                                            <td>{{$adjustments->user->name}}</td>
                                                            <td>
                                                                <span class="label {{$adjustments->status->label}}">{{$adjustments->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    @if($adjustments->status_id == "c670f7a2-b6d1-4669-8ab5-9c764a1e403e")
                                                                        <a href="{{ route('admin.account.adjustment.delete', $adjustments->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                                    @elseif($adjustments->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                        <a href="{{ route('admin.account.adjustment.restore', $adjustments->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Reference</th>
                                                    <th>Amount</th>
                                                    <th>Initial</th>
                                                    <th>Subsequent</th>
                                                    <th>Date</th>
                                                    <th>Deposit</th>
                                                    <th>User</th>
                                                    <th>Status</th>
                                                    <th width="13em">Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="deposits">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                <tr>
                                                    <th>Reference</th>
                                                    <th>Amount</th>
                                                    <th>User</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($account->deposits as $deposit)
                                                    <tr class="gradeX">
                                                        <td>
                                                            {{$deposit->reference}}
                                                            <span><i data-toggle="tooltip" data-placement="right" title="{{$deposit->about}}." class="fa fa-facebook-messenger"></i></span>
                                                        </td>
                                                        <td>{{$deposit->amount}}</td>
                                                        <td>{{$deposit->user->name}}</td>
                                                        <td>
                                                            <span class="label {{$deposit->status->label}}">{{$deposit->status->name}}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.deposit.show', $deposit->id) }}" class="btn-white btn btn-xs">View</a>
                                                                @if($deposit->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                    <a href="{{ route('admin.deposit.restore', $deposit->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                                @else
                                                                    <a href="{{ route('admin.deposit.delete', $deposit->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Reference</th>
                                                    <th>Amount</th>
                                                    <th>User</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="liabilities">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                <tr>
                                                    <th>Reference</th>
                                                    <th>Amount</th>
                                                    <th>Paid</th>
                                                    <th>Date</th>
                                                    <th>Due Date</th>
                                                    <th>Contact</th>
                                                    <th>User</th>
                                                    <th>Status</th>
                                                    <th width="13em">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($account->liabilities as $liability)
                                                    <tr class="gradeX">
                                                        <td>
                                                            {{$liability->reference}}
                                                            <span><i data-toggle="tooltip" data-placement="right" title="{{$liability->about}}." class="fa fa-facebook-messenger"></i></span>
                                                        </td>
                                                        <td>{{$liability->amount}}</td>
                                                        <td>{{$liability->paid}}</td>
                                                        <td>{{$liability->date}}</td>
                                                        <td>{{$liability->due_date}}</td>
                                                        <td>{{$liability->contact->first_name}} {{$liability->contact->last_name}}</td>
                                                        <td>{{$liability->user->name}}</td>
                                                        <td>
                                                            <span class="label {{$liability->status->label}}">{{$liability->status->name}}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.liability.show', $liability->id) }}" class="btn-white btn btn-xs">View</a>
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
                                                    <th>Contact</th>
                                                    <th>User</th>
                                                    <th>Status</th>
                                                    <th width="13em">Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="loans">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                <tr>
                                                    <th>Reference</th>
                                                    <th>Amount</th>
                                                    <th>Paid</th>
                                                    <th>Date</th>
                                                    <th>Due Date</th>
                                                    <th>Contact</th>
                                                    <th>User</th>
                                                    <th>Status</th>
                                                    <th width="13em">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($account->loans as $loan)
                                                    <tr class="gradeX">
                                                        <td>
                                                            {{$loan->reference}}
                                                            <span><i data-toggle="tooltip" data-placement="right" title="{{$loan->about}}." class="fa fa-facebook-messenger"></i></span>
                                                        </td>
                                                        <td>{{$loan->amount}}</td>
                                                        <td>{{$loan->paid}}</td>
                                                        <td>{{$loan->date}}</td>
                                                        <td>{{$loan->due_date}}</td>
                                                        <td>{{$loan->contact->first_name}} {{$loan->contact->last_name}}</td>
                                                        <td>{{$loan->user->name}}</td>
                                                        <td>
                                                            <span class="label {{$loan->status->label}}">{{$loan->status->name}}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.loan.show', $loan->id) }}" class="btn-white btn btn-xs">View</a>
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
                                                    <th>Contact</th>
                                                    <th>User</th>
                                                    <th>Status</th>
                                                    <th width="13em">Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="payments">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                <tr>
                                                    <th>Reference</th>
                                                    <th>Date</th>
                                                    <th>Initial</th>
                                                    <th>Paid</th>
                                                    <th>Balance</th>
                                                    <th>User</th>
                                                    <th>Status</th>
                                                    <th width="13em">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($account->payments as $payment)
                                                    <tr class="gradeX">
                                                        <td>
                                                            {{$payment->reference}}
                                                            <span><i data-toggle="tooltip" data-placement="right" title="{{$payment->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                        </td>
                                                        <td>{{$payment->date}}</td>
                                                        <td>{{$payment->initial_amount}}</td>
                                                        <td>{{$payment->amount}}</td>
                                                        <td>{{$payment->current_balance}}</td>
                                                        <td>{{$payment->user->name}}</td>
                                                        <td>
                                                            <span class="label {{$payment->status->label}}">{{$payment->status->name}}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            {{--                                todo check why route is album but id is album type--}}
                                                            <div class="btn-group">
                                                                @if($payment->is_order == 1)
                                                                    <a href="{{ route('admin.order.show', $payment->order_id) }}" class="btn-white btn btn-xs">View</a>
                                                                @elseif($payment->is_album == 1)
                                                                    @if($payment->album->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4"))
                                                                        <a href="{{ route('admin.client.proof.show', $payment->album_id) }}" class="btn-white btn btn-xs">View</a>
                                                                    @elseif($payment->album->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef"))
                                                                        <a href="{{ route('admin.personal.album.show', $payment->album_id) }}" class="btn-white btn btn-xs">View</a>
                                                                    @endif
                                                                @elseif($payment->is_design == 1)
                                                                    <a href="{{ route('admin.design.show', $payment->design_id) }}" class="btn-white btn btn-xs">View</a>
                                                                @elseif($payment->is_project == 1)
                                                                    <a href="{{ route('admin.project.show', $payment->project_id) }}" class="btn-white btn btn-xs">View</a>
                                                                @elseif($payment->is_asset_action == 1)
                                                                    <a href="{{ route('admin.asset.action.show', $payment->asset_action_id) }}" class="btn-white btn btn-xs">View</a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Reference</th>
                                                    <th>Date</th>
                                                    <th>Initial</th>
                                                    <th>Paid</th>
                                                    <th>Balance</th>
                                                    <th>User</th>
                                                    <th>Status</th>
                                                    <th width="13em">Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="refunds">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                <tr>
                                                    <th>Reference</th>
                                                    <th>Amount</th>
                                                    <th>Date</th>
                                                    <th>User</th>
                                                    <th>Status</th>
                                                    <th width="13em">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($account->refunds as $refund)
                                                    <tr class="gradeX">
                                                        <td>
                                                            {{$refund->reference}}
                                                            <span><i data-toggle="tooltip" data-placement="right" title="{{$refund->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                        </td>
                                                        <td>{{$refund->amount}}</td>
                                                        <td>{{$refund->date}}</td>
                                                        <td>{{$refund->user->name}}</td>
                                                        <td>
                                                            <span class="label {{$refund->status->label}}">{{$refund->status->name}}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.payment.show', $refund->payment_id) }}" class="btn-white btn btn-xs">View</a>
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
                                                    <th>User</th>
                                                    <th>Status</th>
                                                    <th width="13em">Action</th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="transactions">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Amount</th>
                                                        <th>Initial</th>
                                                        <th>Subsequent</th>
                                                        <th>Date</th>
                                                        <th>User</th>
                                                        <th>Billed</th>
                                                        <th>Confirmed</th>
                                                        <th>Status</th>
                                                        <th width="13em">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($account->transactions as $transaction)
                                                        <tr class="gradeX">
                                                            <td>
                                                                {{$transaction->reference}}
                                                                <span><i data-toggle="tooltip" data-placement="right" title="{{$transaction->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                            </td>
                                                            <td>{{$transaction->amount}}</td>
                                                            <td>{{$transaction->initial_amount}}</td>
                                                            <td>{{$transaction->subsequent_amount}}</td>
                                                            <td>{{$transaction->date}}</td>
                                                            <td>{{$transaction->user->name}}</td>
                                                            <td>
                                                                @if($transaction->is_billed == 1)
                                                                    <span class="label label-success"> Billed </span>
                                                                @else
                                                                    <span class="label label-warning"> Not Billed </span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($transaction->is_confirmed == 1)
                                                                    <span class="label label-success"> Confirmed </span>
                                                                @else
                                                                    <span class="label label-warning"> Not Confirmed </span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span class="label {{$transaction->status->label}}">{{$transaction->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.expense.show', $transaction->expense_id) }}" class="btn-white btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Amount</th>
                                                        <th>Initial</th>
                                                        <th>Subsequent</th>
                                                        <th>Date</th>
                                                        <th>User</th>
                                                        <th>Billed</th>
                                                        <th>Confirmed</th>
                                                        <th>Status</th>
                                                        <th width="13em">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="withdrawals">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                <thead>
                                                <tr>
                                                    <th>Reference</th>
                                                    <th>Amount</th>
                                                    <th>User</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($account->withdrawals as $withdrawal)
                                                    <tr class="gradeX">
                                                        <td>
                                                            {{$withdrawal->reference}}
                                                            <span><i data-toggle="tooltip" data-placement="right" title="{{$withdrawal->about}}." class="fa fa-facebook-messenger"></i></span>
                                                        </td>
                                                        <td>{{$withdrawal->amount}}</td>
                                                        <td>{{$withdrawal->user->name}}</td>
                                                        <td>
                                                            <span class="label {{$withdrawal->status->label}}">{{$withdrawal->status->name}}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.withdrawal.show', $withdrawal->id) }}" class="btn-white btn btn-xs">View</a>
                                                                @if($withdrawal->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                    <a href="{{ route('admin.withdrawal.restore', $withdrawal->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                                @else
                                                                    <a href="{{ route('admin.withdrawal.delete', $withdrawal->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th>Reference</th>
                                                    <th>Amount</th>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{--    To Dos    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-danger m-r-sm">{{$account->pending_to_dos_count}}</button>
                            Pending
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary m-r-sm">{{$account->in_progress_to_dos_count}}</button>
                            In Progress
                        </td>
                        <td>
                            <button type="button" class="btn btn-info m-r-sm">{{$account->completed_to_dos_count}}</button>
                           Overdue
                        </td>
                        <td>
                            <button type="button" class="btn btn-info m-r-sm">{{$account->overdue_to_dos_count}}</button>
                            Completed
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

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
                            @foreach($account->pending_to_dos as $pendingToDo)
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
                            @foreach($account->in_progress_to_dos as $inProgressToDo)
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
                            @foreach($account->completed_to_dos as $overdueToDo)
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
                            @foreach($account->overdue_to_dos as $completedToDo)
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

@include('admin.layouts.modals.account_to_do')