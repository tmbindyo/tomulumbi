@extends('admin.layouts.app')

@section('title', 'Transfer Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Transfers</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>CRM</strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.transfers')}}">Transfers</a></strong>
                </li>
                <li class="active">
                    <strong>Transfer Create</strong>
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
                                <form method="post" action="{{ route('admin.transfer.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <input type="number" id="amount" name="amount" required="required" placeholder="Amount" class="form-control input-lg">
                                        <i>amount</i>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="date" id="date" class="form-control input-lg">
                                        </div>
                                        <i>What is the start date of the transfer?</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="source_account" class="select2_demo_tag form-control input-lg">
                                            <option selected disabled >Select Source Account</option>
                                            @foreach ($accounts as $sourceAccount)
                                                <option value="{{$sourceAccount->id}}">{{$sourceAccount->name}} [{{$sourceAccount->balance}}]</option>
                                            @endforeach
                                        </select>
                                        <i>source account</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="destination_account" class="select2_demo_tag form-control input-lg">
                                            <option selected disabled >Select Destination Account</option>
                                            @foreach ($accounts as $destinationAccount)
                                                <option value="{{$destinationAccount->id}}">{{$destinationAccount->name}} [{{$destinationAccount->balance}}]</option>
                                            @endforeach
                                        </select>
                                        <i>destination account</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <div class="has-warning">
                                            <textarea id="notes" rows="5" name="notes" class="resizable_textarea form-control input-lg" required="required" placeholder="About..."></textarea>
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
