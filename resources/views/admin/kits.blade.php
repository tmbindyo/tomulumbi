@extends('admin.layouts.app')

@section('title', 'Kits')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Kits</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>Settings</strong>
                </li>
                <li class="active">
                    <strong>Kits</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.kit.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Kit </a>
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
                                    <th>Name</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kits as $kit)
                                    <tr class="gradeX">
                                        <td>{{$kit->reference}}</td>
                                        <td>{{$kit->name}}</td>
                                        <td>{{$kit->user->name}}</td>
                                        <td>
                                            <span class="label {{$kit->status->label}}">{{$kit->status->name}}</span>
                                        </td>

                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.kit.show', $kit->id) }}" class="btn-white btn btn-xs">View</a>
                                                @if($kit->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                    <a href="{{ route('admin.kit.restore', $kit->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                @else
                                                    <a href="{{ route('admin.kit.delete', $kit->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Reference</th>
                                    <th>Name</th>
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
