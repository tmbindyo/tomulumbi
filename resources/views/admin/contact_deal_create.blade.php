@extends('admin.layouts.app')

@section('title', 'Contact Deal Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Deals</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    <a href="#">Settings</a>
                </li>
                <li class="active">
                    <a href="{{route('admin.deals')}}">Deals</a>
                </li>
                <li class="active">
                    <strong>Deal Create</strong>
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
                                <form method="post" action="{{ route('admin.deal.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <div class="has-warning">
                                            <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" placeholder="Name">
                                            <i>name</i>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="has-warning">
                                            <input type="number" id="amount" name="amount" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" placeholder="Amount">
                                            <i>amount</i>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="has-warning" id="data_1">
                                            <div class="input-group date">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                <input type="text" id="starting_date" name="starting_date" class="form-control input-lg">
                                            </div>
                                            <i>start date for the deal.</i>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="has-warning" id="data_1">
                                            <div class="input-group date">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                <input type="text" id="closing_date" name="closing_date" class="form-control input-lg">
                                            </div>
                                            <i>closing date for the deal.</i>
                                            <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select name="deal_stage" class="select2_demo_deal_stage form-control input-lg">
                                            <option>Select Deal Stage</option>
                                            @foreach($dealStages as $dealStage)
                                                <option value="{{$dealStage->id}}">{{$dealStage->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>deal stage</i>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="has-warning">
                                            <input type="number" id="probability" name="probability" required="required" class="form-control col-md-7 col-xs-12 input-lg" required="required" placeholder="Probability">
                                            <i>probability</i>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select required="required" name="organization" class="select2_demo_organization form-control input-lg">
                                            <option>Select Organization</option>
                                            @foreach($organizations as $organization)
                                                <option value="{{$organization->id}}">{{$organization->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>organization</i>
                                    </div>
                                    <div class="col-md-6">
                                        <select required="required" name="contact" class="select2_demo_contact form-control input-lg">
                                            <option>Select Contact</option>
                                            @foreach($contacts as $contact)
                                                <option @if($dealContact->id == $contact->id) selected @endif value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}}</option>
                                            @endforeach
                                        </select>
                                        <i>contact</i>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select required="required" name="lead_source" class="select2_demo_lead_source form-control input-lg">
                                            <option>Select Lead Source</option>
                                            @foreach($leadSources as $leadSource)
                                                <option value="{{$leadSource->id}}">{{$leadSource->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>lead source</i>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="has-warning">
                                            <select required="required" name="campaign" class="select2_demo_campaign form-control input-lg">
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
