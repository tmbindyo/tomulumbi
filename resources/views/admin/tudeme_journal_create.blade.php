@extends('admin.layouts.app')

@section('title', 'Journal Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Journals</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.tudeme')}}">Tudeme</a></strong>
                </li>
                <li class="active">
                    <strong>Tudeme Journal Create</strong>
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
                                <form method="post" action="{{ route('admin.journal.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                    <div class="has-warning">
                                        <select required="required" name="labels[]" class="select2_demo_label form-control input-lg" multiple="multiple">
                                            <option></option>
                                            @foreach($labels as $label)
                                                <option value="{{$label->id}}">{{$label->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>Labels: What kind of collection is this? Separate your tags with a comma. e.g. wedding, outdoor, summer</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="text" name="color" class="form-control demo1  input-lg" value="#5367ce" />
                                        <i>Background color of text</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea rows="5" id="description" name="description" required="required" placeholder="Brief description" class="form-control input-lg"></textarea>
                                        <i>Give a brief description on what the journal is about</i>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="checkbox" name="is_tudeme" class="js-switch_3" checked/>
                                            <i>is tudeme</i>
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
