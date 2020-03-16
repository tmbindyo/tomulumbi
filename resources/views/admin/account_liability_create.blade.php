@extends('admin.layouts.app')

@section('title', 'Liability Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Liabilitys</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>Accounting</strong>
                </li>
                <li>
                    <strong><a href="{{route('admin.accounts')}}">Accounts</a></strong>
                </li>
                <li>
                    <strong><a href="{{route('admin.account.show',$account->id)}}">Account</a></strong>
                </li>
                <li class="active">
                    <strong>Liability Create</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-8 col-md-offset-2">
                <div class="ibox">

                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.liability.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <i>date</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="due_date" id="due_date" class="form-control input-lg">
                                        </div>
                                        <i>due date</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="account" class="select2_demo_account form-control input-lg">
                                            <option value="{{$account->id}}">{{$account->name}} [{{$account->balance}}]</option>
                                        </select>
                                        <i>account</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="contact" class="select2_demo_contact form-control input-lg">
                                            <option selected disabled >Select Contact</option>
                                            @foreach ($contacts as $contact)
                                                <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} @if($contact->organization)[{{$contact->organization->name}}]@endif</option>
                                            @endforeach
                                        </select>
                                        <i>contact</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea rows="5" id="about" name="about" required="required" placeholder="Brief description" class="form-control input-lg"></textarea>
                                        <i>Give a brief description on what the project is about</i>
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
