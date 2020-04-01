@extends('admin.layouts.app')

@section('title', 'Project Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Projects</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.client.proofs')}}">Projects</a></strong>
                </li>
                <li class="active">
                    <strong>Project Create</strong>
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
                                <form method="post" action="{{ route('admin.project.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <input type="text" id="name" name="name" required="required" placeholder="Collection Name" class="form-control input-lg">
                                        <i>Give your collection a name</i>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="date" id="date" class="form-control input-lg">
                                        </div>
                                        <i>What is the date of the event?</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    {{--  Album client  --}}
                                    <div class="has-warning">
                                        <select name="contacts[]" class="select2_demo_client form-control input-lg" multiple="multiple">
                                            <option></option>
                                            @foreach($contacts as $contact)
                                                <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}}</option>
                                            @endforeach
                                        </select>
                                        <i>Select Client.</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="project_type" class="select2_demo_project_types form-control input-lg">
                                            <option></option>
                                            @foreach($projectTypes as $projectType)
                                                <option value="{{$projectType->id}}">{{$projectType->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>Project type: What kind of project is this?</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea rows="5" id="description" name="description" required="required" placeholder="Brief description" class="form-control input-lg"></textarea>
                                        <i>description</i>
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
