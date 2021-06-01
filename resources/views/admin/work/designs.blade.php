@extends('admin.layouts.app')

@section('title', 'Designs')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Designs</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong>Designs</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.design.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> New </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        {{--  count metrics  --}}
        <div class="row">

            <div class="col-lg-12">
                <div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm">{{$designsStatusCount['previewDesigns']}}</button>
                                Preview
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">{{$designsStatusCount['hiddenDesigns']}}</button>
                                Hidden
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">{{$designsStatusCount['publishedDesigns']}}</button>
                                Published
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
                    <div class="ibox-title">
                        <h5>Designs</h5>
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
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Views</th>
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($designs as $design)
                                    <tr class="gradeX">
                                        <td>{{$design->name}}</td>
                                        <td>{{$design->date}}</td>
                                        <td>{{$design->views}}</td>
                                        <td>{{$design->user->name}}</td>
                                        <td>
                                            <span class="label {{$design->status->label}}">{{$design->status->name}}</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('admin.design.show', $design->id) }}" class="btn-white btn btn-xs">View</a>
                                                @if($design->status->name == "Deleted")
                                                    <a href="{{ route('admin.design.restore', $design->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                @else
                                                    <a href="{{ route('admin.design.delete', $design->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Views</th>
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


