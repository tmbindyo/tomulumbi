@extends('admin.layouts.app')

@section('title', 'Tudeme')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Tudemes</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong>Tudemes</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.tudeme.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Tudeme </a>
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
                                <button type="button" class="btn btn-warning m-r-sm">{{$tudemeStatusCount['previewTudeme']}}</button>
                                Preview
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">{{$tudemeStatusCount['hiddenTudeme']}}</button>
                                Hidden
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">{{$tudemeStatusCount['publishedTudeme']}}</button>
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

        {{-- tudeme --}}
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
                                        <th>Date</th>
                                        <th>Views</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tudemes as $tudeme)
                                        <tr class="gradeX">
                                            <td>{{$tudeme->name}}</td>
                                            <td>{{$tudeme->date}}</td>
                                            <td>{{$tudeme->views}}</td>
                                            <td>{{$tudeme->user->name}}</td>
                                            <td>
                                                <span class="label {{$tudeme->status->label}}">{{$tudeme->status->name}}</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.tudeme.show', $tudeme->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @if($tudeme->status->name == "Deleted")
                                                        <a href="{{ route('admin.tudeme.restore', $tudeme->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                    @else
                                                        <a href="{{ route('admin.tudeme.delete', $tudeme->id) }}" class="btn-danger btn btn-xs">Delete</a>
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
