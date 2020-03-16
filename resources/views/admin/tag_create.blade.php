@extends('admin.layouts.app')

@section('title', 'Tag Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Tags</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>
                <li class="active">
                    <a href="{{route('admin.tags')}}">Tags</a>
                </li>
                <li class="active">
                    <strong>Tag Create</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="ibox">
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.tag.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                    <div class="form-group">
                                        <div class="has-warning">
                                            <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" placeholder="Name">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="has-warning">
                                            <select required="required" name="thumbnail_size" class="select2_demo_tag form-control input-lg">
                                                <option>Select Thumbnail Size</option>
                                                @foreach($thumbnailSizes as $thumbnailSize)
                                                    <option value="{{$thumbnailSize->id}}">{{$thumbnailSize->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>Size of the thumbnails on the tag page</i>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-block btn-lg btn-outline btn-success mt-4">{{ __('SAVE') }}</button>
                                    </div>
                                </div>


                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>

@endsection
