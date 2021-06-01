@extends('admin.layouts.app')

@section('title', 'Quotes')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Quotes</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong>Quotes</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.quote.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> New </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Quotes</h5>
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
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Balance</th>
                                    <th>State</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($quotes as $quote)
                                    <tr class="gradeX">
                                        <td>{{$quote->reference}}</td>
                                        <td>{{$quote->total}}</td>
                                        <td>{{$quote->paid}}</td>
                                        <td>{{$quote->balance}}</td>
                                        <td>
                                            @if($quote->is_draft == 1)
                                                <span class="label label-info"> Draft </span>
                                            @endif
                                            @if($quote->is_accepted == 1)
                                                <span class="label label-primary"> Accepted </span>
                                            @endif
                                            @if($quote->is_rejected == 1)
                                                <span class="label label-warning"> Rejected </span>
                                            @endif
                                            @if($quote->is_cancelled == 1)
                                                <span class="label label-danger"> Cancelled </span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="label {{$quote->status->label}}">{{$quote->status->name}}</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.quote.show', $quote->id) }}" class="btn-white btn btn-xs">View</a>
                                                @if($quote->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                    <a href="{{ route('admin.quote.restore', $quote->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                @else
                                                    <a href="{{ route('admin.quote.delete', $quote->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Reference</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Balance</th>
                                    <th>State</th>
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
