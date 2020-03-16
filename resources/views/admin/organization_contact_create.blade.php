@extends('admin.layouts.app')

@section('title', 'Contact Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Contacts</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong><a href="#">Settings</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.contacts')}}">Contacts</a></strong>
                </li>
                <li class="active">
                    <strong>Contact Create</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.contact.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                    <div class="col-md-6">
                                        <input type="checkbox" name="is_lead" class="js-switch_3" />
                                        <i>lead</i>
                                    </div>
                                    <div class="col-md-6">
                                        <select required="required" name="title" class="select2_demo_tag form-control input-lg">
                                            <option>Select Title</option>
                                            @foreach($titles as $title)
                                                <option value="{{$title->id}}">{{$title->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>title</i>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="has-warning">
                                            <input type="text" id="first_name" name="first_name" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" placeholder="First Name">
                                            <i>first name</i>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="has-warning">
                                            <input type="text" id="last_name" name="last_name" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" placeholder="Last Name">
                                            <i>last name</i>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="has-warning">
                                            <input type="text" id="phone_number" name="phone_number" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" placeholder="Phone number">
                                            <i>phone number</i>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="has-warning">
                                            <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" placeholder="Email">
                                            <i>email</i>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select required="required" name="organization" class="select2_demo_tag form-control input-lg">
                                            <option value="{{$organization->id}}">{{$organization->name}}</option>
                                        </select>
                                        <i>organization</i>
                                    </div>

                                    <div class="col-md-6">
                                        <select name="contact_types[]" class="select2_demo_tag form-control input-lg" multiple>
                                            <option>Select Contact Types</option>
                                            @foreach($contactTypes as $contactType)
                                                <option value="{{$contactType->id}}">{{$contactType->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>contact types</i>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select required="required" name="lead_source" class="select2_demo_tag form-control input-lg">
                                            <option>Select Lead Source</option>
                                            @foreach($leadSources as $leadSource)
                                                <option value="{{$leadSource->id}}">{{$leadSource->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>lead source</i>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="has-warning">
                                            <select required="required" name="campaign" class="select2_demo_tag form-control input-lg">
                                                <option>Select Campaign</option>
                                                @foreach($campaigns as $campaign)
                                                    <option value="{{$campaign->id}}">{{$campaign->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>campaign</i>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="has-warning">
                                            <textarea id="about" rows="5" name="about" class="resizable_textarea form-control input-lg" required="required" placeholder="About..."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
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
