@extends('admin.layouts.app')

@section('title', 'Liability')

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Liabilitys</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.liabilities')}}">Liabilitys</a></strong>
                </li>
                <li class="active">
                    <strong>Liability</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.account.show',$liability->account_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Account </a>
                <a href="{{route('admin.contact.show',$liability->contact_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Contact </a>
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
                                <form method="post" action="{{ route('admin.liability.update',$liability->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <input type="number" id="principal" name="principal" oninput="getPercentAmount();" required="required" value="{{$liability->principal}}" class="form-control input-lg">
                                        <i>principal</i>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="has-warning">
                                                <input type="number" id="interest" name="interest" oninput="getPercentAmount();" required="required" value="{{$liability->interest}}" max="100" step="0.00001" class="form-control input-lg">
                                                <i>key in interest in percentage</i>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="has-warning">
                                                <input type="number" id="interest_amount" name="interest_amount" oninput="getPercentFromAmount();" required="required" value="{{$liability->interest_amount}}" class="form-control input-lg">
                                                <i>key in interest amount</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="number" id="total" name="total" required="required" readonly value="{{$liability->total}}" class="form-control input-lg">
                                                <i>total</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="has-warning" id="data_1">
                                        <div class="input-group date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </span>
                                            <input type="text" required="required" name="date" class="form-control input-lg" value="{{$liability->date}}">
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
                                            <input type="text" required="required" name="due_date" class="form-control input-lg" value="{{$liability->due_date}}">
                                        </div>
                                        <i>due date</i>
                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="account" class="select2_demo_account form-control input-lg" disabled>
                                            <option selected value="{{$liability->account->id}}">{{$liability->account->name}} [{{$liability->account->balance}}]</option>
                                        </select>
                                        <i>account</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="contact" class="select2_demo_contact form-control input-lg" disabled>
                                            <option selected value="{{$liability->contact->id}}">{{$liability->contact->first_name}} {{$liability->contact->last_name}} @if($liability->contact->organization)[{{$liability->contact->organization->name}}]@endif</option>
                                        </select>
                                        <i>contact</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea rows="5" id="about" name="about" required="required" class="form-control input-lg">{{$liability->about}}</textarea>
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

                                <div class="col-lg-3">
                                    <div class="widget style1 navy-bg">
                                        <div class="row vertical-align">
                                            <div class="col-xs-3">
                                                <i class="fa fa-user fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3 class="font-bold">{{$liability->user->name}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget style1 {{$liability->status->label}}">
                                        <div class="row vertical-align">
                                            <div class="col-xs-3">
                                                <i class="fa fa-ellipsis-v fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3 class="font-bold">{{$liability->status->name}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget style1 navy-bg">
                                        <div class="row vertical-align">
                                            <div class="col-xs-3">
                                                <i class="fa fa-plus-square fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3 class="font-bold">{{$liability->created_at}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget style1 navy-bg">
                                        <div class="row vertical-align">
                                            <div class="col-xs-3">
                                                <i class="fa fa-scissors fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3 class="font-bold">{{$liability->updated_at}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#expenses" data-toggle="tab">Expenses</a></li>
                                            <li class=""><a href="#payments" data-toggle="tab">Payments</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="expenses">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Recurring</th>
                                                        <th>Type</th>
                                                        <th>Expense #</th>
                                                        <th>Date</th>
                                                        <th>Created</th>
                                                        <th>Expense Type</th>
                                                        <th>Total</th>
                                                        <th>Paid</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($liability->expenses as $expense)
                                                        <tr class="gradeA">
                                                            <td>
                                                                @if($expense->is_recurring == 1)
                                                                    <p><span class="badge badge-success">True</span></p>
                                                                @else
                                                                    <p><span class="badge badge-success">False</span></p>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if($expense->is_order == 1)
                                                                    <p><a href="{{route('admin.order.show',$expense->order_id)}}" class="badge badge-success">Order</a></p>
                                                                @elseif($expense->is_album == 1)
                                                                    <p>
                                                                        <a
                                                                        @if ($expense->album->album_type_id == '6fdf4858-01ce-43ff-bbe6-827f09fa1cef')
                                                                            href="{{route('admin.personal.album.show',$expense->album->id)}}"
                                                                        @elseif ($expense->album->album_type_id == 'ca64a5e0-d39b-4f2c-a136-9c523d935ea4')
                                                                            href="{{route('admin.client.proof.show',$expense->album->id)}}"
                                                                         @endif  class="badge badge-primary">Album {{$expense->album->name}}
                                                                        </a>
                                                                    </p>
                                                                @elseif($expense->is_project == 1)
                                                                    <p><a href="{{route('admin.project.show',$expense->project->id)}}" class="badge badge-primary">Project {{$expense->project->name}}</a></p>
                                                                @elseif($expense->is_project == 1)
                                                                    <p><a href="{{route('admin.project.show',$expense->project_id)}}" class="badge badge-primary">Design {{$expense->design->name}}</a></p>
                                                                @elseif($expense->is_liability == 1)
                                                                    <p><a href="{{route('admin.liability.show',$expense->liability_id)}}" class="badge badge-primary">Liability</a></p>
                                                                @elseif($expense->is_transfer == 1)
                                                                    <p><a href="{{route('admin.transfer.show',$expense->transfer_id)}}" class="badge badge-primary">Transfer</a></p>
                                                                @elseif($expense->is_campaign == 1)
                                                                    <p><a href="{{route('admin.campaign.show',$expense->campaign_id)}}" class="badge badge-primary">Campaign</a></p>
                                                                @elseif($expense->is_asset == 1)
                                                                    <p><a href="{{route('admin.asset.show',$expense->asset_id)}}" class="badge badge-primary">Asset</a></p>
                                                                @else
                                                                    <p><span class="badge badge-info">None</span></p>
                                                                @endif
                                                            </td>
                                                            <td>{{$expense->reference}}</td>
                                                            <td>{{$expense->date}}</td>
                                                            <td>{{$expense->created_at}}</td>
                                                            <td>{{$expense->expense_type->name}}</td>
                                                            <td>{{$expense->total}}</td>
                                                            <td>{{$expense->paid}}</td>
                                                            <td>
                                                                <p><span class="label {{$expense->status->label}}">{{$expense->status->name}}</span></p>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.expense.show', $expense->id) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Recurring</th>
                                                        <th>Type</th>
                                                        <th>Expense #</th>
                                                        <th>Date</th>
                                                        <th>Created</th>
                                                        <th>Expense Type</th>
                                                        <th>Total</th>
                                                        <th>Paid</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="payments">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Transaction #</th>
                                                        <th>Date</th>
                                                        <th>Created</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($liability->expenses as $expense)
                                                        @if($expense->transactions)
                                                        @foreach($expense->transactions as $transaction)
                                                            <tr class="gradeA">
                                                                <td>
                                                                    @if($transaction->is_transfer == 1)
                                                                        <p><span class="badge badge-success">Transfer</span> {{$transaction->source_account->name}} -> {{$transaction->destination_account->name}}</p>
                                                                    @else
                                                                        <p><span class="badge badge-success">Payment</span></p>
                                                                    @endif
                                                                </td>

                                                                <td>{{$transaction->reference}}</td>
                                                                <td>{{$transaction->date}}</td>
                                                                <td>{{$transaction->created_at}}</td>
                                                                <td>{{$transaction->amount}}</td>
                                                                <td>
                                                                    <p><span class="label {{$transaction->status->label}}">{{$transaction->status->name}}</span></p>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Type</th>
                                                        <th>Transaction #</th>
                                                        <th>Date</th>
                                                        <th>Created</th>
                                                        <th>Amount</th>
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
