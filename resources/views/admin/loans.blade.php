@extends('admin.layouts.app')

@section('title', 'Loans')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Loans</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    Settings
                </li>
                <li class="active">
                    <strong>Loans</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.loan.create')}}" class="btn btn-success btn-outline"><i class="fa fa-plus"></i> Loan </a>
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
                                        <th>Paid</th>
                                        <th>Date</th>
                                        <th>Due Date</th>
                                        <th>User</th>
                                        <th>Account</th>
                                        <th>Contact</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($loans as $loan)
                                        <tr class="gradeX">
                                            <td>
                                                {{$loan->reference}}
                                                <span><i data-toggle="tooltip" data-placement="right" title="{{$loan->notes}}." class="fa fa-facebook-messenger"></i></span>
                                            </td>
                                            <td>{{$loan->amount}}</td>
                                            <td>{{$loan->paid}}</td>
                                            <td>{{$loan->date}}</td>
                                            <td>{{$loan->due_date}}</td>
                                            <td>{{$loan->user->name}}</td>
                                            <td>{{$loan->account->name}}</td>
                                            <td>{{$loan->contact->first_name}} {{$loan->contact->last_name}}</td>
                                            <td>
                                                <span class="label {{$loan->status->label}}">{{$loan->status->name}}</span>
                                            </td>

                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.loan.show', $loan->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @if($loan->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                        <a href="{{ route('admin.loan.restore', $loan->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                    @else
                                                        <a href="{{ route('admin.loan.delete', $loan->id) }}" class="btn-danger btn btn-xs">Delete</a>
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
                                        <th>Paid</th>
                                        <th>Date</th>
                                        <th>Due Date</th>
                                        <th>User</th>
                                        <th>Account</th>
                                        <th>Contact</th>
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
