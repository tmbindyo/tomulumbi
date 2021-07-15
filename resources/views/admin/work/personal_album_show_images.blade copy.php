@extends('admin.layouts.app')

@section('title', $album->name.' Album')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Personal Album</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.personal.albums')}}">Personal Albums</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.personal.album.show',$album->id)}}">Personal Album</a></strong>
                </li>
                <li class="active">
                    <strong>Personal Album Images</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">

        {{--    Personal album images    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        @foreach($albumSets as $albumSet)
                            <li @if($loop->iteration == 1) class="active" @endif><a data-toggle="tab" href="#{{$albumSet->id}}"><i class="fa fa-desktop"> {{$albumSet->name}}</i></a></li>
                        @endforeach
                    </ul>
                    <div class="row">
                        <div class="tab-content">

                            @foreach($albumSets as $albumSet)
                                <div id="{{$albumSet->id}}" class="tab-pane @if($loop->iteration == 1) active @endif">
                                    <div class="panel-body">
                                        <a href="{{route('admin.personal.album.set.show',$albumSet->id)}}" class="btn btn-primary btn-outline btn-block btn-lg">View Album Set</a>
                                        <br>

                                        <form id="my-awesome-dropzone" class="dropzone" action="{{route('admin.personal.album.set.image.upload',$albumSet->id)}}">
                                            @csrf
                                            <div class="dropzone-previews"></div>
                                        </form>

                                        <br>

                                        <div class="lightBoxGallery">

                                            @isset($albumSet->album_images)
                                                @foreach($albumSet->album_images as $albumSetImage)
                                                    <a data-toggle="modal" data-target="#{{$albumSetImage->upload->id}}"><img class="img-lg" src="{{Minio::getAdminFileUrl( $albumSetImage->upload->pixels100 )}}"></a>
                                                    <div class="modal inmodal" id="{{$albumSetImage->upload->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content animated bounceInRight">

                                                                <div class="modal-body">
                                                                    <form method="post" action="{{ route('admin.personal.album.image.update.print.status',$albumSetImage->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                                                                        <br>

                                                                        <div class="row">
                                                                            <img width="550em" src="{{Minio::getAdminFileUrl( $albumSetImage->upload->pixels750 )}}">
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-2">
                                                                                <div class="checkbox checkbox-primary">
                                                                                    {{$albumSetImage->status_id}}
                                                                                    <input class="updateImageStatus" data-id="{{$albumSetImage->id}}" id="{{$albumSetImage->id}}" type="checkbox" @if($albumSetImage->status_id=='be8843ac-07ab-4373-83d9-0a3e02cd4ff5') checked="true" @endif >
                                                                                    <label for="{{$albumSetImage->id}}">
                                                                                        Status
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-warning btn-block btn-lg" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endisset
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                    <div class="row">



                    </div>
                </div>
            </div>
        </div>

    </div>
    <br>

@endsection

@include('admin.layouts.modals.client_proof_set')

@section('js')

    <script>
        $('.generateAlbumPin').on('click',function(){
            var id = $(this).data('fid')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('admin/personal/album/image/status')}}'+'/'+id);
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                document.getElementById("download_pin").value = this.responseText;
                alert("Album Pin Generated");
            }
        });

    </script>

    {{--  generate album set visibility  --}}
    <script>
        $('.updateImageStatus').on('click',function(){
            var id = $(this).data('id')

            //send value by ajax to server
            var xhr = new XMLHttpRequest();
            xhr.open("GET", '{{url('admin/personal/album/image/status')}}'+'/'+id);
            {{--xhr.open("GET", '{{url('business')}}'+'/'+portal+'/role/update/'+role_id+'/permission/'+permission_id);--}}
            xhr.setRequestHeader('Content-Type', '');
            xhr.send();
            xhr.onload = function() {
                alert("Image status updated!");
            }
        });

    </script>

@endsection
