@extends('admin.layouts.app')

@section('title', 'Payment Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Payments</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>CRM</strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.payments')}}">Payments</a></strong>
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
                                        <input type="number" id="amount" name="amount" required="required" placeholder="Paid" class="form-control input-lg">
                                        <i>amount</i>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="date_acquired" id="date_acquired" class="form-control input-lg">
                                        </div>
                                        <i>Date paid</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="account" class="select2_demo_tag form-control input-lg">
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
                                        <div class="col-md-2">
                                            <div class="has-warning">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <input name="is_asset_action" type="checkbox" class="js-switch" />
                                                    <br>
                                                    <i>check if asset action.</i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="has-warning">
                                                <select name="asset_action" class="select2_demo_tag form-control input-lg">
                                                    <option selected disabled >Select Asset Action</option>
                                                    @foreach ($assetActions as $assetAction)
                                                        <option value="{{$assetAction->id}}">{{$assetAction->reference}} [{{$assetAction->amount}}]</option>
                                                    @endforeach
                                                </select>
                                                <i>asset action</i>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="has-warning">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <input name="is_loan" type="checkbox" class="js-switch_2" />
                                                    <br>
                                                    <i>check if loan.</i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="has-warning">
                                                <select name="loan" class="select2_demo_tag form-control input-lg">
                                                    <option selected disabled >Select Loan</option>
                                                    @foreach ($loans as $loan)
                                                        <option value="{{$loan->id}}">{{$loan->reference}} [{{$loan->amount}}]</option>
                                                    @endforeach
                                                </select>
                                                <i>loan</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="has-warning">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <input name="is_order" type="checkbox" class="js-switch_3" />
                                                    <br>
                                                    <i>check if order.</i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="has-warning">
                                                <select name="order" class="select2_demo_tag form-control input-lg">
                                                    <option selected disabled >Select Order</option>
                                                    @foreach ($orders as $order)
                                                        <option value="{{$order->id}}">{{$order->order_number}} [{{$order->total}}]</option>
                                                    @endforeach
                                                </select>
                                                <i>order</i>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="has-warning">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <input name="is_quote" type="checkbox" class="js-switch_4" />
                                                    <br>
                                                    <i>check if quote.</i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="has-warning">
                                                <select name="quote" class="select2_demo_tag form-control input-lg">
                                                    <option selected disabled >Select Quote</option>
                                                    @foreach ($quotes as $quote)
                                                        <option value="{{$quote->id}}">{{$quote->reference}} [{{$quote->total}}]</option>
                                                    @endforeach
                                                </select>
                                                <i>quote</i>
                                            </div>
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
