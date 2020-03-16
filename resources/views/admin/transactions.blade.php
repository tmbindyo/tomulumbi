@extends('admin.layouts.app')

@section('title', ' Transactions')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Transaction</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong><a href="{{route('admin.transactions')}}">Transactions</a></strong>
                </li>
                <li class="active">
                    <strong>Transaction</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div class="title-action">
                <a href="{{route('admin.expenses')}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Expenses </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Transaction #</th>
                                    <th>Date</th>
                                    <th>Created</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactions as $transaction)
                                    <tr class="gradeA">
                                        <td>
                                            @if($transaction->is_transfer == 1)
                                                <p><span class="badge badge-success">Transfer</span> {{$transaction->source_account->name}} -> {{$transaction->destination_account->name}}</p>
                                            @else
                                                <p><span class="badge badge-success">Payment</span></p>
                                            @endif
                                        </td>

                                        <td>{{$transaction->reference}}</td>
                                        <td>{{$transaction->date}}</td>
                                        <td>{{$transaction->created_at}}</td>
                                        <td>{{$transaction->amount}}</td>
                                        <td>
                                            <p><span class="label {{$transaction->status->label}}">{{$transaction->status->name}}</span></p>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Type</th>
                                    <th>Transaction #</th>
                                    <th>Date</th>
                                    <th>Created</th>
                                    <th>Amount</th>
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
@endsection
