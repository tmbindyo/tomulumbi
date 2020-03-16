@extends('admin.layouts.app')

@section('title', 'Frequencies')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Frequencies</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>Settings</strong>
                </li>
                <li class="active">
                    <strong>Frequencies</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.frequency.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Frequency  </a>
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
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Frequency</th>
                                        <th>User</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($frequencies as $frequency)
                                        <tr class="gradeX">
                                            <td>{{$frequency->name}}</td>
                                            <td>{{$frequency->type}}</td>
                                            <td>{{$frequency->frequency}}</td>
                                            <td>{{$frequency->user->name}}</td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.frequency.show', $frequency->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @if($frequency->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                        <a href="{{ route('admin.frequency.restore', $frequency->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                    @else
                                                        <a href="{{ route('admin.frequency.delete', $frequency->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Frequency</th>
                                        <th>User</th>
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
