@extends('admin.layouts.app')

@section('title', ' Transaction Create')

@section('content')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Account Adjustments</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{route('admin.dashboard')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{route('admin.orders')}}">Orders</a>
                    </li>
                    <li>
                        <a href="{{route('admin.expenses')}}">Account Adjustments</a>
                    </li>
                    <li class="active">
                        <strong>Account Adjustment Create</strong>
                    </li>
                </ol>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">

            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="ibox">
                        <div class="ibox-content">

                            <div class="">
                                <form method="post" action="{{ route('admin.account.adjustment.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                    {{--  accounts  --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="has-warning">
                                                <select name="account" class="select-2 form-control input-lg">
                                                    <option selected disabled>Select Account</option>
                                                    @foreach($accounts as $accountSelected)
                                                        <option @if($accountSelected->id == $account->id) selected @endif value="{{$accountSelected->id}}" >{{$accountSelected->name}}[{{$accountSelected->balance}}]</option>
                                                    @endforeach
                                                </select>
                                                <i> account.</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{--  withdrawal  --}}
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="has-warning">
                                                <input type="checkbox" name="is_withdrawal" class="js-switch_3" checked/>
                                                <br>
                                                <i>is withdrawal</i>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="has-warning">
                                                <select name="withdrawal" class="select-2 form-control input-lg">
                                                    <option value="{{$withdrawal->id}}" >{{$withdrawal->reference}}[{{$withdrawal->amount}}]</option>
                                                </select>
                                                <i> withdrawal.</i>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  amount  --}}
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="has-warning">
                                                <input type="number" name="amount" id="amount" class="form-control input-lg" required>
                                                <i> amount ({{$withdrawal->amount}}).</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="has-warning" id="data_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" name="date" id="date" class="form-control input-lg" required>
                                                </div>
                                                <i> adjustment date.</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="has-warning">
                                                <textarea name="notes" placeholder="Notes" class="form-control" rows="7"></textarea>
                                                <i> notes.</i>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-block btn-outline btn-lg mt-4">{{ __('SAVE') }}</button>
                                    </div>

                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </div>

@endsection
