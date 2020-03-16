@extends('admin.layouts.app')

@section('title', 'Client Proof Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Client Proofs</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <a href="{{route('admin.design.show',$design->id)}}">Project</a>
                </li>
                <li class="active">
                    <strong>Project Client Proof Create</strong>
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
                                <form method="post" action="{{ route('admin.client.proof.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <select required="required" name="tags[]" class="select2_demo_tag form-control input-lg" multiple="multiple">
                                            <option>Select Tag</option>
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>Tags: What kind of collection is this? Separate your tags with a comma. e.g. wedding, outdoor, summer</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="contacts[]" class="select2_demo_contact form-control input-lg" multiple="multiple">
                                            <option>Select Contact</option>
                                            @foreach($contacts as $contact)
                                                <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}}</option>
                                            @endforeach
                                        </select>
                                        <i>Client: This is based on your contacts, whoever is selected here is tied to the project as the client.</i>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" name="expiry_date" id="expiry_date" class="form-control input-lg">
                                        </div>
                                        <i>Collection will become Hidden when it reaches 11:59pm on the expiry date.</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="has-warning">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input name="is_auto_expiry" type="checkbox" class="js-switch_3" checked />
                                                <br>
                                                <i>Auto expiry.</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="checkbox" name="is_design" class="js-switch_4" checked/>
                                            <br>
                                            <i>is design</i>
                                        </div>
                                        <div class="col-md-6">
                                            <select required="required" name="design" class="select2_demo_design form-control input-lg">
                                                <option value="{{$design->id}}">{{$design->name}}</option>
                                            </select>
                                            <i>Project: The design that the album belongs to.</i>
                                        </div>
                                    </div>

                                    <br>
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
