@extends('admin.layouts.app')

@section('title', $album->name.' Album')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Client Proof</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.client.proofs')}}">Client Proofs</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.client.proof.show',$album->id)}}">Client Proof</a></strong>
                </li>
                <li class="active">
                    <strong>Client Proof Images</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-4">
            <div class="title-action">
                <a href="{{route('admin.client.proof.show',$album->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Client Proof </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">


        {{--    Client proof images    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        @foreach($albumSets as $albumSet)
                            <li @if($loop->iteration == 1) class="active" @endif><a data-toggle="tab" href="#{{$albumSet->id}}"><i class="fa fa-desktop"> {{$albumSet->name}}</i></a></li>
                        @endforeach
                        <li class=""><a  data-toggle="modal" data-target="#albumSetRegistration" aria-expanded="false"><i class="fa fa-plus"></i></a></li>
                    </ul>
                    <div class="row">
                        <div class="tab-content">
                            @foreach($albumSets as $albumSet)
                                <div id="{{$albumSet->id}}" class="tab-pane @if($loop->iteration == 1) active @endif">
                                    <div class="panel-body">

                                        {{--  Viewing album images --}}
                                        <br>
                                        <a href="{{route('admin.client.proof.set.show',$albumSet->id)}}" class="btn btn-primary btn-outline btn-block btn-lg">View Album Set</a>
                                        <br>

                                        <form id="my-awesome-dropzone" class="dropzone" action="{{route('admin.client.proof.set.image.upload',$albumSet->id)}}">
                                            @csrf
                                            <div class="dropzone-previews"></div>
                                        </form>

                                        <br>

                                        <div class="lightBoxGallery">

                                            @isset($albumSet->album_images)
                                                @foreach($albumSet->album_images as $albumSetImage)
                                                    <a href="{{ asset('') }}{{ $albumSetImage->upload->pixels750 }}" title="{{ $albumSetImage->upload->name }}" data-fid="{{$albumSetImage->id}}" data-gallery="" ><img src="{{ asset('') }}{{ $albumSetImage->upload->pixels100 }}"></a>
                                                @endforeach
                                            @endisset
                                            <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                                            <div id="blueimp-gallery" class="blueimp-gallery">
                                                <div class="slides"></div>
                                                <h3 class="title"></h3>
                                                <a class="prev">‹</a>
                                                <a class="next">›</a>
                                                <a class="close">×</a>
                                                <a class="play-pause"></a>
                                                <ol class="indicator"></ol>
                                            </div>

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
        <br>

    </div>

@endsection

@include('admin.layouts.modals.client_proof_set')
@include('admin.layouts.modals.client_proof_cover_image')
