@extends('admin.layouts.app')

@section('title', 'Asset Action Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Asset Action's</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <a href="{{route('admin.assets')}}">Asset's</a>
                </li>
                <li class="active">
                    <a href="{{route('admin.asset.show',$asset->id)}}">Asset</a>
                </li>
                <li class="active">
                    <strong>Asset Action Create</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="ibox">
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.kit.asset.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <select required="required" name="asset" class="select2_demo_tag form-control input-lg">
                                            <option value="{{$asset->id}}">{{$asset->name}}</option>
                                        </select>
                                        <i>asset</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select required="required" name="kit" class="select2_demo_tag form-control input-lg">
                                            <option >Select Kit</option>
                                            @foreach($kits as $kit)
                                                <option value="{{$kit->id}}">{{$kit->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>kit</i>
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
