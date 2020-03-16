@extends('admin.layouts.app')

@section('title', 'Transfers')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Transfers</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    Settings
                </li>
                <li class="active">
                    <strong>Transfers</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.transfer.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Transfer </a>
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
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Source Account</th>
                                        <th>Destination Account</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transfers as $transfer)
                                        <tr class="gradeX">
                                            <td>
                                                {{$transfer->reference}}
                                                <span><i data-toggle="tooltip" data-placement="right" title="{{$transfer->notes}}." class="fa fa-facebook-messenger"></i></span>
                                            </td>
                                            <td>{{$transfer->amount}}</td>
                                            <td>{{$transfer->date}}</td>
                                            <td>

                                                <span class="label label-success"> {{$transfer->source_account->name}}</span>
                                                <span class="badge badge-success"> {{$transfer->source_initial_amount}} -> {{$transfer->source_subsequent_amount}}</span>
                                            </td>
                                            <td>

                                                <span class="label label-success"> {{$transfer->destination_account->name}}</span>
                                                <span class="badge badge-success"> {{$transfer->destination_initial_amount}} -> {{$transfer->destination_subsequent_amount}}</span>
                                            </td>
                                            <td>{{$transfer->user->name}}</td>
                                            <td>
                                                <span class="label {{$transfer->status->label}}">{{$transfer->status->name}}</span>
                                            </td>

                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.transfer.show', $transfer->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @if($transfer->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                        <a href="{{ route('admin.transfer.restore', $transfer->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                    @else
                                                        <a href="{{ route('admin.transfer.delete', $transfer->id) }}" class="btn-danger btn btn-xs">Delete</a>
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
                                        <th>Date</th>
                                        <th>Source Account</th>
                                        <th>Destination Account</th>
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
