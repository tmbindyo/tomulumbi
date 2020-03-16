@extends('admin.layouts.app')

@section('title', 'Album Type')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Album Type</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a><strong>
                </li>
                <li class="active">
                    <strong>Settingss</strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.album.types')}}">Album Types</a></strong>
                </li>
                <li class="active">
                    <strong>Album Type</strong>
                </li>
            </ol>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.album.type.update',$albumType->id) }}" autocomplete="off" class="form-horizontal form-label-left">
                                    @csrf

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="col-md-12">
                                        <br>
                                        <div class="has-warning">
                                            <input type="name" name="name" value="{{$albumType->name}}" class="form-control input-lg">
                                            <i>name</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <textarea id="description" rows="5" name="description" class="resizable_textarea form-control input-lg" required="required">{{$albumType->description}}</textarea>
                                            <i>description</i>
                                        </div>
                                        <hr>
                                        <div>
                                            <button class="btn btn-primary btn-block btn-lg m-t-n-xs" type="submit"><strong>UPDATE</strong></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  albums  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Albums ({{$albumType->albums_count}})</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Views</th>
                                        <th>Status</th>
                                        <th width="13em">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($albumTypeAlbums as $albumTypeAlbum)
                                        <tr class="gradeX">
                                            <td>{{$albumTypeAlbum->name}}</td>
                                            <td>{{$albumTypeAlbum->date}}</td>
                                            <td>{{$albumTypeAlbum->user->name}}</td>
                                            <td>{{$albumTypeAlbum->album_views_count}}</td>
                                            <td>
                                                <span class="label {{$albumTypeAlbum->status->label}}">{{$albumTypeAlbum->status->name}}</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    @if($albumType->id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                                        <a href="{{ route('admin.client.proof.show', $albumTypeAlbum->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @elseif($albumType->id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                                        <a href="{{ route('admin.personal.album.show', $albumTypeAlbum->id) }}" class="btn-white btn btn-xs">View</a>
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
                                        <th>User</th>
                                        <th>Views</th>
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
