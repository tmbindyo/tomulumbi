@extends('admin.layouts.app')

@section('title', 'Payment Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Payment's</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <a href="{{route('admin.asset.actions')}}">Asset actions</a>
                </li>
                <li class="active">
                    <a href="{{route('admin.asset.action.show',$assetAction->id)}}">Asset action</a>
                </li>
                <li class="active">
                    <a href="{{route('admin.payments')}}">Payments</a>
                </li>
                <li class="active">
                    <strong>Payment Create</strong>
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
                                <form method="post" action="{{ route('admin.payment.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <input type="number" id="amount" name="amount" required="required" value="{{$assetAction->amount}}" class="form-control input-lg">
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
                                        <i>Date paid</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="account" class="select2_demo_account form-control input-lg">
                                            <option selected disabled >Select Account</option>
                                            @foreach ($accounts as $account)
                                                <option value="{{$account->id}}">{{$account->name}} [{{$account->balance}}]</option>
                                            @endforeach
                                        </select>
                                        <i>account</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea rows="5" id="notes" name="notes" required="required" placeholder="Brief description" class="form-control input-lg"></textarea>
                                        <i>notes</i>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="has-warning">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <input name="is_asset_action" type="checkbox" class="js-switch" checked />
                                                    <br>
                                                    <i>check if asset action.</i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="has-warning">
                                                <select name="asset_action" class="select2_demo_tag form-control input-lg">
                                                    <option value="{{$assetAction->id}}">{{$assetAction->reference}} [{{$assetAction->amount}}]</option>
                                                </select>
                                                <i>asset action</i>
                                            </div>
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
