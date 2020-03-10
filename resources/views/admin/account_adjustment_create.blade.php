@extends('admin.layouts.app')

@section('title', ' Account Adjustment Create')

@section('content')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Account Adjustments</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{route('admin.dashboard')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{route('admin.account.show',$account->id)}}">Account</a>
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
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <div class="row">
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

                                    <div class="col-md-12">
                                        <br>
                                        {{--  accounts  --}}
                                        <div class="has-warning">
                                            <select name="account" class="select-2 form-control input-lg">
                                                <option selected disabled>Select Account</option>
                                                @foreach($accounts as $accountSelected)
                                                    <option @if($accountSelected->id == $account->id) selected @endif value="{{$accountSelected->id}}" >{{$accountSelected->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>

                                        {{--  amount  --}}
                                        <div class="has-warning">
                                            <input type="number" name="amount" id="amount" value="{{$account->balance}}" class="form-control input-lg" required>
                                            <i> amount.</i>
                                        </div>
                                        <br>

                                        {{-- adjustment date --}}
                                        <div class="has-warning" id="data_1">
                                            <div class="input-group date">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                <input type="text" name="date" id="date" class="form-control input-lg" required >
                                            </div>
                                            <i> adjustment date.</i>
                                        </div>
                                        <br>

                                        {{-- notes --}}
                                        <div class="has-warning">
                                            <textarea name="notes" placeholder="Reason" class="form-control" rows="7"></textarea>
                                        </div>

                                        <hr>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success btn-block btn-outline btn-lg mt-4">{{ __('Save') }}</button>
                                        </div>
                                    </div>

                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </div>

@endsection

