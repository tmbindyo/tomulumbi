@extends('admin.layouts.app')

@section('title', 'Liabilities')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Liabilities</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>Settings</strong>
                </li>
                <li class="active">
                    <strong>Liabilities</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.liability.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Liability </a>
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
                                        <th>Paid</th>
                                        <th>Date</th>
                                        <th>Due Date</th>
                                        <th>User</th>
                                        <th>Account</th>
                                        <th>Contact</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($liabilities as $liability)
                                        <tr class="gradeX">
                                            <td>
                                                {{$liability->reference}}
                                                <span><i data-toggle="tooltip" data-placement="right" title="{{$liability->notes}}." class="fa fa-facebook-messenger"></i></span>
                                            </td>
                                            <td>{{$liability->amount}}</td>
                                            <td>{{$liability->paid}}</td>
                                            <td>{{$liability->date}}</td>
                                            <td>{{$liability->due_date}}</td>
                                            <td>{{$liability->user->name}}</td>
                                            <td>{{$liability->account->name}}</td>
                                            <td>{{$liability->contact->first_name}} {{$liability->contact->last_name}}</td>
                                            <td>{{$liability->user->name}}</td>
                                            <td>
                                                <span class="label {{$liability->status->label}}">{{$liability->status->name}}</span>
                                            </td>

                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.liability.show', $liability->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @if($liability->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                        <a href="{{ route('admin.liability.restore', $liability->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                    @else
                                                        <a href="{{ route('admin.liability.delete', $liability->id) }}" class="btn-danger btn btn-xs">Delete</a>
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
