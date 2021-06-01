@extends('admin.layouts.app')

@section('title', 'Promo Code Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Promo Codes</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>Store</strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.promo.codes')}}">Promo Codes</a></strong>
                </li>
                <li class="active">
                    <strong>Promo Code Create</strong>
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
                                <form method="post" action="{{ route('admin.promo.code.assignment',$promoCode->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="expiry_date" id="expiry_date" class="form-control input-lg">
                                        </div>
                                        <i>What is the end date of the event?</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="promo_code" class="select2_demo_promo_code form-control input-lg">
                                            <option value="{{$promoCode->id}}">{{$promoCode->reference}} [{{$promoCode->discount}}@if($promoCode->is_percentage == 1)%@endif]</option>
                                        </select>
                                        <i>promo code</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="contact" class="select2_demo_contact form-control input-lg">
                                            <option></option>
                                            @foreach ($contacts as $contact)
                                                <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} [@if($contact->organization) {{$contact->organization->name}} @endif]</option>
                                            @endforeach

                                        </select>
                                        <i>contact</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="number" id="assigned" name="assigned" required="required" placeholder="Assigned" class="form-control input-lg">
                                        <i>assigned</i>
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
