@extends('admin.layouts.app')

@section('title', 'Contacts')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Contacts</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong>Contacts</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.contact.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> New </a>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        @foreach($contacts as $contact)
                                            <tr class="gradeX">
                                                <td>@if($contact->title){{$contact->title->name}}.@endif {{$contact->first_name}} {{$contact->last_name}}</td>
                                                <td>{{$contact->email}}</td>
                                                <td>{{$contact->phone_number}}</td>
                                                <td>
                                                    <span class="label {{$contact->status->label}}">{{$contact->status->name}}</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.contact.show', $contact->id) }}" class="btn-white btn btn-xs">View</a>
                                                        @if($contact->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                            <a href="{{ route('admin.contact.restore', $contact->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                        @else
                                                            <a href="{{ route('admin.contact.delete', $contact->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
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
