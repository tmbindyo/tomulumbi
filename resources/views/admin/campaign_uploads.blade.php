@extends('admin.layouts.app')

@section('title', 'Campaign Uploads')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-8">
            <h2>Campaigns</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>CRM</strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.campaigns')}}">Campaigns</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.campaign.show',$campaign->id)}}">Campaign</a></strong>
                </li>
                <li class="active">
                    <strong>Campaign Create</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content">

        {{--  Upload form  --}}
        <div class="row">
            <div class="ibox float-e-margins">
                <div class="tab-content">
                    <div class="panel-body">
                        <form id="my-awesome-dropzone" class="dropzone" action="{{route('admin.campaign.upload.store',$campaign->id)}}">
                            @csrf
                            <div class="dropzone-previews"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{--  Uploads  --}}
        <div class="row">
            <div class="col-lg-12 animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">

                        @foreach ($campaign->campaign_uploads as $upload)

                        <div class="file-box">
                            <a href="#">
                                <div class="file">
                                    <span class="corner"></span>

                                    <div class="icon">
                                        @if($upload->file_type == "image")
                                            <img alt="image" class="img-responsive" src="{{ asset('') }}{{ $upload->name }}">
                                        @elseif($upload->file_type == "document")
                                            <i class="fa fa-bar-chart-o"></i>
                                        @elseif($upload->file_type == "video")
                                            <i class="img-responsive fa fa-film"></i>
                                        @elseif($upload->file_type == "audio")
                                            <i class="fa fa-music"></i>
                                        @elseif($upload->file_type == "pdf")
                                            <i class="fa fa-file"></i>
                                        @elseif($upload->file_type == "unknown")
                                            <i class="fa fa-file"></i>
                                        @endif
                                    </div>
                                    <div class="file-name">
                                        {{$upload->name}}
                                        <br/>
                                        <small>Added: {{$upload->created_at}}</small>
                                        <a href="{{route('admin.campaign.upload.download',$upload->id)}}" class="btn btn-xs btn-primary btn-block">Download</a>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
