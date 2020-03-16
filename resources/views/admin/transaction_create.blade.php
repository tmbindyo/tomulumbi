@extends('admin.layouts.app')

@section('title', ' Transaction Create')

@section('content')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Transactions</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{route('admin.dashboard')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{route('admin.orders')}}">Orders</a>
                    </li>
                    <li>
                        <a href="{{route('admin.expenses')}}">Transactions</a>
                    </li>
                    <li class="active">
                        <strong>Transaction Create</strong>
                    </li>
                </ol>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox">
                        <div class="ibox-content">

                            <div class="row">
                                <form method="post" action="{{ route('admin.transaction.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                    <div class="col-md-12">
                                        {{--  statuses  --}}

                                        <div class="has-warning">
                                            <select name="status" class="select-2 form-control input-lg">
                                                <option selected disabled>Select Statuses</option>
                                                @foreach($transactionStatuses as $status)
                                                    <option value="{{$status->id}}" >{{$status->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <br>
                                        {{--  accounts  --}}

                                        <div class="has-warning">
                                            <select name="account" class="select-2 form-control input-lg">
                                                <option selected disabled>Select Account</option>
                                                @foreach($accounts as $account)
                                                    <option value="{{$account->id}}" >{{$account->name}} [{{$account->balance}}]</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <br>
                                        {{--  amount  --}}

                                        <div class="has-warning">
                                            <input type="number" name="amount" id="amount" class="form-control input-lg" @if($expense) value="{{$expense->total-$expense->paid}}" max="{{$expense->total}}" @endif required>
                                            <i> amount.</i>
                                        </div>

                                        <br>
                                        <div class="has-warning" id="data_1">
                                            <div class="input-group date">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                                <input type="text" name="date" id="date" class="form-control input-lg" value="{{$expense->date}}" required>
                                            </div>
                                            <i> expense date.</i>
                                        </div>

                                        <br>
                                        {{--  text area  --}}
                                        <div class="has-warning">
                                            <textarea name="notes" placeholder="Notes" class="form-control" rows="7"></textarea>
                                        </div>

                                        <br>
                                        {{--  expense  --}}
                                        <div class="has-warning">
                                            <select name="expense" class="select-2 form-control input-lg">
                                                <option selected value="{{$expense->id}}" >{{$expense->reference}}|Ksh. {{$expense->total}}</option>
                                            </select>
                                        </div>

                                        <hr>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success btn-block btn-outline btn-lg mt-4">{{ __('SAVE') }}</button>
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
