@extends('admin.layouts.app')

@section('title', 'Emails')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Emails</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Emails</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm">{{$emailStatusCount['unreadEmails']}}</button>
                                Unread
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">{{$emailStatusCount['seenEmails']}}</button>
                                Seen
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">{{$emailStatusCount['readEmails']}}</button>
                                Read
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">{{$emailStatusCount['repliedEmails']}}</button>
                                Replied
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger m-r-sm">{{$emailStatusCount['flaggedEmails']}}</button>
                                Flagged
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Date/Time</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($emails as $email)
                                    <tr class="gradeX">
                                        <td>{{$email->created_at}}</td>
                                        <td>{{$email->name}}</td>
                                        <td>{{$email->email}}</td>
                                        <td>
                                            <span class="label {{$email->status->label}}">{{$email->status->name}}</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.email.show', $email->id) }}" class="btn-white btn btn-xs">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Date/Time</th>
                                    <th>Name</th>
                                    <th>Email</th>
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
