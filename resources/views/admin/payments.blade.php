@extends('admin.layouts.app')

@section('title', 'Payments')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Payments</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    Settings
                </li>
                <li class="active">
                    <strong>Payments</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.payment.create')}}" class="btn btn-success btn-outline"><i class="fa fa-plus"></i> Payment </a>
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
                                        <th>Initial</th>
                                        <th>Subsequent</th>
                                        <th>Date</th>
                                        <th>Account</th>
                                        <th>For</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                        <tr class="gradeX">
                                            <td>
                                                {{$payment->reference}}
                                                <span><i data-toggle="tooltip" data-placement="right" title="{{$payment->notes}}." class="fa fa-facebook-messenger"></i></span>
                                            </td>
                                            <td>{{$payment->amount}}</td>
                                            <td>{{$payment->initial_balance}}</td>
                                            <td>{{$payment->current_balance}}</td>
                                            <td>{{$payment->date}}</td>
                                            <td>{{$payment->account->name}}</td>
                                            <td>
                                                @if($payment->is_order == 1)
                                                    <span class="label label-success">Order: {{$payment->order->reference}}</span>
                                                @elseif($payment->is_quote == 1)
                                                    <span class="label label-success">Quote: {{$payment->quote->reference}}</span>
                                                @elseif($payment->is_asset_action == 1)
                                                    <span class="label label-success">Asset Action: {{$payment->asset_action->reference}}</span>
                                                @elseif($payment->is_loan == 1)
                                                    <span class="label label-success">Loan: {{$payment->loan->reference}}</span>
                                                @endif
                                            </td>
                                            <td>{{$payment->user->name}}</td>
                                            <td>
                                                <span class="label {{$payment->status->label}}">{{$payment->status->name}}</span>
                                            </td>

                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.payment.show', $payment->id) }}" class="btn-default btn btn-xs">Show</a>
                                                    @if($payment->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                        <a href="{{ route('admin.payment.restore', $payment->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                    @else
                                                        <a href="{{ route('admin.payment.delete', $payment->id) }}" class="btn-danger btn btn-xs">Delete</a>
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
                                        <th>Account</th>
                                        <th>For</th>
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
