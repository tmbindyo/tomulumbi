@extends('admin.layouts.app')

@section('title', 'Account')

@section('css')

    <link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">

@endsection



@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Account</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Accounting's</strong>
                </li>
                <li class="active">
                   <a href="{{route('admin.accounts')}}"><strong>Account's</strong></a>
                </li>
                <li class="active">
                    <strong>Account</strong>
                </li>
            </ol>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Account <small>edit</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-8 col-md-offset-2">
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


                                    <div class="row">
                                        <div class="has-warning">
                                            <input type="name" name="name" value="{{$account->name}}" class="form-control input-lg">
                                        </div>
                                        <i>Account name</i>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="has-warning">
                                            <input type="number" name="balance" value="{{$account->balance}}" class="form-control input-lg" readonly>
                                        </div>
                                        <i>Account balance</i>
                                    </div>
                                    <br>

                                    <div>
                                        <button class="btn btn-primary btn-block btn-lg m-t-n-xs" type="submit"><strong>Update</strong></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--  account adjustments(correct)  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Adjustments</h5>
                        <div class="ibox-tools">
                            <a href="{{route('admin.account.adjustment.create',$account->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> New </a>
                        </div>
                    </div>
                    <div class="ibox-content">

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
                </div>
            </div>
        </div>


        {{--  credit(correct)  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Credit</h5>
                        <div class="ibox-tools">
                            <a href="{{route('admin.account.deposit',$account->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> New </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Amount</th>
                                    <th>Source</th>
                                    <th>Date</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th width="13em">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($account->destination_account as $transaction)
                                    <tr class="gradeX">
                                        <td>
                                            {{$transaction->reference}}
                                            <span><i data-toggle="tooltip" data-placement="right" title="{{$transaction->notes}}." class="fa fa-facebook-messenger"></i></span>
                                        </td>
                                        <td>{{$transaction->amount}}</td>
                                        <td>{{$transaction->source_account->name}}</td>
                                        <td>{{$transaction->date}}</td>
                                        <td>{{$transaction->user->name}}</td>
                                        <td>
                                            <span class="label {{$transaction->status->label}}">{{$transaction->status->name}}</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                @if($transaction->id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                                    <a href="{{ route('admin.client.proof.show', $transaction->id) }}" class="btn-white btn btn-xs">View</a>
                                                @elseif($transaction->id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                                    <a href="{{ route('admin.personal.album.show', $transaction->id) }}" class="btn-white btn btn-xs">View</a>
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
                                    <th>Source</th>
                                    <th>Date</th>
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


        {{--  debit(correct)  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Debit</h5>
                        <div class="ibox-tools">
                            <a href="{{route('admin.account.withdrawal',$account->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> New </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>Destination</th>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th width="13em">Action</th>
                                    </tr>
                                </thead>
                            <tbody>
                            @foreach($account->source_account as $transaction)
                                <tr class="gradeX">
                                    <td>
                                        {{$transaction->reference}}
                                        <span><i data-toggle="tooltip" data-placement="right" title="{{$transaction->notes}}." class="fa fa-facebook-messenger"></i></span>
                                    </td>
                                    <td>{{$transaction->amount}}</td>
                                    <td>{{$transaction->destination_account->name}}</td>
                                    <td>{{$transaction->date}}</td>
                                    <td>{{$transaction->user->name}}</td>
                                    <td>
                                        <span class="label {{$transaction->status->label}}">{{$transaction->status->name}}</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            @if($transaction->id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                                <a href="{{ route('admin.client.proof.show', $transaction->id) }}" class="btn-white btn btn-xs">View</a>
                                            @elseif($transaction->id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                                <a href="{{ route('admin.personal.album.show', $transaction->id) }}" class="btn-white btn btn-xs">View</a>
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
                                <th>Destination</th>
                                <th>Date</th>
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


        {{--  deposits(correct)  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Deposits</h5>
                        <div class="ibox-tools">
                            <a href="{{route('admin.deposit.create',$account->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Deposit </a>
                        </div>
                    </div>
                    <div class="ibox-content">

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
                </div>
            </div>
        </div>


        {{--  liabilities(correct)  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Liabilities</h5>
                        <div class="ibox-tools">
                            <a href="{{route('admin.account.deposit',$account->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> Liability </a>
                        </div>
                    </div>
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
                                        <td>{{$liability->contact->name}}</td>
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
                </div>
            </div>
        </div>


        {{--  payments(correct)  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Payments</h5>
                    </div>
                    <div class="ibox-content">

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
                                        <td>{{$payment->paid}}</td>
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
                </div>
            </div>
        </div>


        {{--  refunds  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Refunds</h5>
                    </div>
                    <div class="ibox-content">

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
                </div>
            </div>
        </div>


        {{--  transaction  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Transactions</h5>
                        <div class="ibox-tools">
                            <a href="{{route('admin.account.withdrawal',$account->id)}}" class="btn btn-primary"><i class="fa fa-plus"></i> New </a>
                        </div>
                    </div>
                    <div class="ibox-content">

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
                </div>
            </div>
        </div>





    </div>


@endsection

@section('js')


    <!-- Mainly scripts -->
    <script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
    <script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="{{ asset('inspinia') }}/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

    </script>

@endsection
