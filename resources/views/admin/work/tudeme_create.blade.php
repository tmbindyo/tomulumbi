@extends('admin.layouts.app')

@section('title', 'Tudeme Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Tudemes</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.tudeme')}}">Tudemes</a></strong>
                </li>
                <li class="active">
                    <strong>Tudeme Create</strong>
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
                                <form method="post" action="{{ route('admin.tudeme.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <input type="text" id="name" name="name" required="required" placeholder="Name" class="form-control input-lg">
                                        <i>name</i>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="number" id="prep_time" name="prep_time" required="required" placeholder="Prep time" class="form-control input-lg">
                                                <i>prep time</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="number" id="cook_time" name="cook_time" required="required" placeholder="Cook time" class="form-control input-lg">
                                                <i>cook time</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="number" id="yield" name="yield" required="required" placeholder="Yield" class="form-control input-lg">
                                                <i>yield</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="number" id="serves" name="serves" required="required" placeholder="Serves" class="form-control input-lg">
                                                <i>serves</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <select required="required" name="tudeme_types[]" class="select2_demo_tudeme_types form-control input-lg" multiple>
                                                    <option></option>
                                                    @foreach($tudemeTypes as $tudemeType)
                                                        <option value="{{$tudemeType->id}}">{{$tudemeType->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>tudeme types</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <select required="required" name="tudeme_tags[]" class="select2_demo_tudeme_tags form-control input-lg" multiple>
                                                    <option></option>
                                                    @foreach($tudemeTags as $tudemeTag)
                                                        <option value="{{$tudemeTag->id}}">{{$tudemeTag->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i>tudeme tags</i>
                                            </div>
                                        </div>
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
                                    <div class="has-warning">
                                        <textarea rows="5" id="description" name="description" required="required" placeholder="Brief description" class="form-control input-lg"></textarea>
                                        <i>Give a brief description on what the tudeme is about</i>
                                    </div>
                                    <br>
                                    <textarea name="body"  class="summernote">
                                        <h3>Lorem Ipsum is simply</h3>
                                        dummy text of the printing and typesetting industry. <strong>Lorem Ipsum has been the industrys</strong> standard dummy text ever since the 1500s,
                                        when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                                        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                                        <br/>
                                        <br/>
                                        <ul>
                                            <li>Remaining essentially unchanged</li>
                                            <li>Make a type specimen book</li>
                                            <li>Unknown printer</li>
                                        </ul>
                                    </textarea>

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
