@extends('admin.layouts.app')

@section('title', 'Lead Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Leads</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>
                <li class="active">
                    <a href="{{route('admin.contacts')}}">Leads</a>
                </li>
                <li class="active">
                    <strong>Lead Create</strong>
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
                                        <input type="checkbox" name="is_lead" class="js-switch_3" checked/>
                                        <i>contact</i>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="has-warning">
                                            <select required="required" name="title" class="select2_demo_title form-control input-lg">
                                                <option></option>
                                                @foreach($titles as $title)
                                                    <option value="{{$title->id}}">{{$title->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>title</i>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="has-warning">
                                            <input type="text" id="first_name" name="first_name" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" placeholder="First Name">
                                            <i>test</i>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="has-warning">
                                            <input type="text" id="last_name" name="last_name" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" placeholder="Last Name">
                                            <i>test</i>
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
                                            <i>test</i>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="organization" class="select2_demo_organization form-control input-lg">
                                            <option></option>
                                            @foreach($organizations as $organization)
                                                <option value="{{$organization->id}}">{{$organization->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>organization</i>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="has-warning">
                                            <select required="required" name="contact_types[]" class="select2_demo_contact_types form-control input-lg" multiple>
                                                <option></option>
                                                @foreach($contactTypes as $contactType)
                                                    <option value="{{$contactType->id}}">{{$contactType->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>contact type</i>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select required="required" name="lead_source" class="select2_demo_lead_source form-control input-lg">
                                            <option></option>
                                            @foreach($leadSources as $leadSource)
                                                <option value="{{$leadSource->id}}">{{$leadSource->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>lead source</i>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="has-warning">
                                            <select name="campaign" class="select2_demo_campaign form-control input-lg">
                                                <option></option>
                                                @foreach($campaigns as $campaign)
                                                    <option value="{{$campaign->id}}">{{$campaign->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>campaign</i>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="has-warning">
                                            <textarea id="about" rows="5" name="about" class="resizable_textarea form-control input-lg" required="required" placeholder="About..."></textarea>
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
