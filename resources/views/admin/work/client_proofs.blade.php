@extends('admin.layouts.app')

@section('title', 'Client Proofs')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Client Proofs</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong>Client Proofs</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.client.proof.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> New </a>
            </div>
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
                                <button type="button" class="btn btn-warning m-r-sm">{{$clientProofsStatusCount['previewClientProofs']}}</button>
                                Preview
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">{{$clientProofsStatusCount['hiddenClientProofs']}}</button>
                                Hidden
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">{{$clientProofsStatusCount['publishedClientProofs']}}</button>
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
                    <div class="ibox-content">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Expiry</th>
                                        <th>Views</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($albums as $album)
                                        <tr class="gradeX">
                                            <td>{{$album->name}}</td>
                                            <td>{{$album->date}}</td>
                                            <td>{{$album->expiry_date}}</td>
                                            <td>{{$album->views}}</td>
                                            <td>{{$album->user->name}}</td>
                                            <td>
                                                <span class="label {{$album->status->label}}">{{$album->status->name}}</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.client.proof.show', $album->id) }}" class="btn-white btn btn-xs">View</a>
                                                    <a href="{{ route('admin.client.proof.delete', $album->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Expiry</th>
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
