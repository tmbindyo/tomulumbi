@extends('admin.layouts.app')

@section('title', ' Contact Promo Code Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Promo Codes</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    Store
                </li>
                <li class="active">
                    <a href="{{route('admin.contact.show',$contact->id)}}">Contacts</a>
                </li>
                <li class="active">
                    <strong>Promo Code Create</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Promo Code Registration <small>Form</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.promo.code.assignment',$contact->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                                <div class="col-md-10 col-md-offset-1">
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
                                        <select name="promo_code" class="select2_demo_tag form-control input-lg">
                                            <option selected disabled >Select Promo Code</option>
                                            @foreach ($promoCodes as $promoCode)
                                                <option value="{{$promoCode->id}}">{{$promoCode->reference}} [{{$promoCode->discount}}@if($promoCode->is_percentage == 1)%@endif]</option>
                                            @endforeach
                                        </select>
                                        <i>type</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="contact" class="select2_demo_tag form-control input-lg">
                                            <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} [@if($contact->organization) {{$contact->organization->name}} @endif]</option>
                                        </select>
                                        <i>type</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="number" id="assigned" name="assigned" required="required" placeholder="Assigned" class="form-control input-lg">
                                        <i>assigned</i>
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
