@extends('admin.layouts.app')

@section('title', 'Tag')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Tags</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>Settings</strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.tags')}}">Tags</a></strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        {{--    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tag"> <i class="fa fa-cogs"></i> Tag</a></li>
                        <li class=""><a data-toggle="tab" href="#cover-image"><i class="fa fa-bookmark"></i> Cover Image</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tag" class="tab-pane active">
                            <div class="panel-body">
                                <div class="col-md-8 col-md-offset-2">

                                    <form method="post" action="{{ route('admin.tag.update',$tag->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                                        <div class="has-warning">
                                            <label>Name</label>
                                            <input type="name" name="name" value="{{$tag->name}}" class="form-control input-lg">
                                        </div>
                                        <br>
                                        <div class="">
                                            <div class="has-warning">
                                                <select required="required" name="thumbnail_size" class="select2_demo_thumbnail_size form-control input-lg">
                                                    <option>Select Thumbnail Size</option>
                                                    @foreach($thumbnailSizes as $thumbnailSize)
                                                        <option @if($tag->thumbnail_size_id ==$thumbnailSize->id) selected @endif value="{{$thumbnailSize->id}}">{{$thumbnailSize->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>Size of the thumbnails on the tag page</i>
                                            </div>
                                        </div>
                                        <hr>
                                        <div>
                                            <button class="btn btn-lg btn-block btn-primary pull-right m-t-n-xs" type="submit"><strong>UPDATE</strong></button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div id="cover-image" class="tab-pane">
                            <div class="panel-body">
                                <div class="row m-t-lg">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button class="btn btn-primary btn-lg btn-outline btn-block" data-toggle="modal" data-target="#tagCoverImageRegistration" aria-expanded="false">Update Cover Image</button>
                                        <hr>
                                    </div>
                                    <div class="col-md-6 col-md-offset-3">

                                        <div class="center">
                                            <img alt="image" width="470em" class="img-responsive" @isset($tag->cover_image) src="{{ asset('') }}{{ $tag->cover_image->large_thumbnail }}" @endisset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        {{--    --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Views</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tagAlbums as $tagAlbum)
                                        <tr class="gradeX">
                                            <td>{{$tagAlbum->date}}</td>
                                            <td>{{$tagAlbum->name}}</td>
                                            <td>{{$tagAlbum->views}}</td>
                                            <td>{{$tagAlbum->user->name}}</td>
                                            <td>
                                                <span class="label {{$tagAlbum->status->label}}">{{$tagAlbum->status->name}}</span>
                                            </td>

                                            <td class="text-right">
                                                <div class="btn-group">
                                                    {{-- todo check why route is album but id is album type--}}
                                                    @if($tagAlbum->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                                        <a href="{{ route('admin.personal.album.show', $tagAlbum->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @elseif($tagAlbum->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                                        <a href="{{ route('admin.client.proof.show', $tagAlbum->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Name</th>
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

@include('admin.layouts.modals.tag_cover_image')
