@extends('admin.layouts.app')

@section('title', 'Campaign Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
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
                    <strong>Campaign Create</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-10 col-md-offset-1">
                <div class="ibox">
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.campaign.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                            <div class="has-warning" id="data_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" required="required" name="start_date" id="start_date" class="form-control input-lg">
                                                </div>
                                                <i>What is the start date of the campaign?</i>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning" id="data_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" required="required" name="end_date" id="end_date" class="form-control input-lg">
                                                </div>
                                                <i>What is the end date of the campaign?</i>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="number" id="expected_revenue" name="expected_revenue" required="required" placeholder="Expected Revenue" class="form-control input-lg">
                                        <i>expected revenue</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="number" id="budgeted_cost" name="budgeted_cost" required="required" placeholder="Budgeted Cost" class="form-control input-lg">
                                        <i>budgeted cost</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="type" class="select2_demo_campaign_type form-control input-lg" required>
                                            <option></option>
                                            @foreach ($campaignTypes as $campaignType)
                                                <option value="{{$campaignType->id}}">{{$campaignType->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>campaign type</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea rows="5" id="description" name="description" required="required" placeholder="Brief description" class="form-control input-lg"></textarea>
                                        <i>Give a brief description on what the project is about</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea rows="5" id="expected_response" name="expected_response" required="required" placeholder="Expected response" class="form-control input-lg"></textarea>
                                        <i>Give a the expected response</i>
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
