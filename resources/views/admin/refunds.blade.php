@extends('admin.layouts.app')

@section('title', 'Refunds')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Refunds</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    Settings
                </li>
                <li class="active">
                    <strong>Refunds</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                {{--  <a href="{{route('admin.refund.create')}}" class="btn btn-success btn-outline"><i class="fa fa-plus"></i> Refund </a>  --}}
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
                                        <th>Initial</th>
                                        <th>Subsequent</th>
                                        <th>Date</th>
                                        <th>Account</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($refunds as $refund)
                                        <tr class="gradeX">
                                            <td>
                                                {{$refund->reference}}
                                                <span><i data-toggle="tooltip" data-placement="right" title="{{$refund->notes}}." class="fa fa-facebook-messenger"></i></span>
                                            </td>
                                            <td>{{$refund->amount}}</td>
                                            <td>{{$refund->initial_amount}}</td>
                                            <td>{{$refund->subsequent_amount}}</td>
                                            <td>{{$refund->date}}</td>
                                            <td>{{$refund->account->name}}</td>
                                            <td>{{$refund->user->name}}</td>
                                            <td>
                                                <span class="label {{$refund->status->label}}">{{$refund->status->name}}</span>
                                            </td>

                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.refund.show', $refund->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @if($refund->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                        <a href="{{ route('admin.refund.restore', $refund->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                    @else
                                                        <a href="{{ route('admin.refund.delete', $refund->id) }}" class="btn-danger btn btn-xs">Delete</a>
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
