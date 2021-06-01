@extends('admin.layouts.app')

@section('title', 'Deals')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Deals</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong>Deals</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.deal.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> New </a>
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
                                    <th>Starting Date</th>
                                    <th>Closing Date</th>
                                    <th>Probability</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($deals as $deal)
                                    <tr class="gradeX">
                                        <td>{{$deal->reference}}</td>
                                        <td>{{$deal->amount}}</td>
                                        <td>{{$deal->starting_date}}</td>
                                        <td>{{$deal->closing_date}}</td>
                                        <td>{{$deal->probability}}</td>
                                        <td>
                                            <span class="label {{$deal->status->label}}">{{$deal->status->name}}</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.deal.show', $deal->id) }}" class="btn-white btn btn-xs">View</a>
                                                @if($deal->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                    <a href="{{ route('admin.deal.restore', $deal->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                @else
                                                    <a href="{{ route('admin.deal.delete', $deal->id) }}" class="btn-danger btn btn-xs">Delete</a>
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
                                    <th>Starting Date</th>
                                    <th>Closing Date</th>
                                    <th>Probability</th>
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
