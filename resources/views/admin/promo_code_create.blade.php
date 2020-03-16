@extends('admin.layouts.app')

@section('title', 'Promo Code Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Promo Codes</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    CRM
                </li>
                <li class="active">
                    <a href="{{route('admin.promo.codes')}}">Promo Codes</a>
                </li>
                <li class="active">
                    <strong>Promo Code Create</strong>
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
                                <form method="post" action="{{ route('admin.promo.code.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <input type="checkbox" name="is_percentage" class="js-switch_3" </>
                                        <i>is percentage</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="number" id="limit" name="limit" required="required" placeholder="Limit" class="form-control input-lg">
                                        <i>limit</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="number" id="discount" name="discount" required="required" placeholder="Discount" class="form-control input-lg">
                                        <i>discount</i>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="expiry_date" id="expiry_date" class="form-control input-lg">
                                        </div>
                                        <i>What is the start date of the event?</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea rows="5" id="terms_and_conditions" name="terms_and_conditions" required="required" placeholder="Terms and conditions" class="form-control input-lg"></textarea>
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
