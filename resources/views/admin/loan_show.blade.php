@extends('admin.layouts.app')

@section('title', 'Loan')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-7">
            <h2>Loans</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.loans')}}">Loans</a></strong>
                </li>
                <li class="active">
                    <strong>Loan</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-5">
            <div class="title-action">
                <a href="{{route('admin.account.show',$loan->account_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Account </a>
                <a href="{{route('admin.contact.show',$loan->contact_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Contact </a>
                <a href="{{route('admin.loan.payment.create',$loan->id)}}" class="btn btn-success btn-outline"><i class="fa fa-plus"></i> Payment </a>
            </div>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm">  </button>
                                Albums
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">  </button>
                                Projects
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">  </button>
                                Designs
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">  </button>
                                Quotes
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div>

                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.loan.update',$loan->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                    <div class="has-warning">
                                        <input type="number" id="amount" name="amount" required="required" value="{{$loan->amount}}" class="form-control input-lg">
                                        <i>amount</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <input type="number" id="paid" name="paid" required="required" value="{{$loan->paid}}" class="form-control input-lg" readonly>
                                        <i>paid</i>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="date" class="form-control input-lg" value="{{$loan->date}}">
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
                                            <input type="text" required="required" name="due_date" class="form-control input-lg" value="{{$loan->due_date}}">
                                        </div>
                                        <i>due date</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="account" class="select2_demo_tag form-control input-lg" disabled>
                                            <option selected value="{{$loan->account->id}}">{{$loan->account->name}} [{{$loan->account->balance}}]</option>
                                        </select>
                                        <i>account</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="contact" class="select2_demo_tag form-control input-lg" disabled>
                                            <option selected value="{{$loan->contact->id}}">{{$loan->contact->first_name}} {{$loan->contact->last_name}} @if($loan->contact->organization)[{{$loan->contact->organization->name}}]@endif</option>
                                        </select>
                                        <i>contact</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea rows="5" id="about" name="about" required="required" class="form-control input-lg">{{$loan->about}}</textarea>
                                        <i>Give a brief description on what the project is about</i>
                                    </div>

                                    <hr>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-block btn-lg btn-outline btn-success mt-4">{{ __('SAVE') }}</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        {{--  details  --}}
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content animated fadeInUp">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="m-b-md">
                                    </div>
                                    <dl class="dl-horizontal">
                                        <dt>Status:</dt> <dd><span class="label {{$loan->status->label}}">{{$loan->status->name}}</span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">
                                        <dt>Created by:</dt> <dd>{{$loan->user->name}}</dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Last Updated:</dt> <dd>{{$loan->updated_at}}</dd>
                                        <dt>Created:</dt> <dd> {{$loan->created_at}} </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                    <div class="panel blank-panel">
                                        <div class="panel-heading">
                                            <div class="panel-options">
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#payments" data-toggle="tab">Payments</a></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="panel-body">

                                            <div class="tab-content">
                                                <div class="tab-pane active" id="payments">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Reference</th>
                                                                    <th>Date</th>
                                                                    <th>Initial #</th>
                                                                    <th>Paid</th>
                                                                    <th>Subsequent</th>
                                                                    <th>Account</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($loan->payments as $payment)
                                                                    <tr class="gradeA">
                                                                        <td>
                                                                            {{$payment->reference}}
                                                                            <span><i data-toggle="tooltip" data-placement="right" title="{{$payment->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                                        </td>
                                                                        <td>{{$payment->date}}</td>
                                                                        <td>{{$payment->initial_balance}}</td>
                                                                        <td>{{$payment->amount}}</td>
                                                                        <td>{{$payment->current_balance}}</td>
                                                                        <td>{{$payment->account->name}}</td>
                                                                        <td>
                                                                            <p><span class="label {{$payment->status->label}}">{{$payment->status->name}}</span></p>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Reference</th>
                                                                    <th>Date</th>
                                                                    <th>Initial #</th>
                                                                    <th>Paid</th>
                                                                    <th>Subsequent</th>
                                                                    <th>Account</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
