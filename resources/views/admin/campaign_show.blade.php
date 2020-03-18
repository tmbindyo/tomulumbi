@extends('admin.layouts.app')

@section('title', 'Campaign Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-5">
            <h2>Campaigns</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>CRM</strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.campaigns')}}">Campaigns</a></strong>
                </li>
                <li class="active">
                    <strong>Campaign Create</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-7">
            <div class="title-action">
                @if($campaign->campaign_id)
                    <a href="{{route('admin.campaign.show',$campaign->campaign_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Campaign </a>
                @endif
                <a href="{{route('admin.campaign.contact.create',$campaign->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Contact </a>
                <a href="{{route('admin.campaign.deal.create',$campaign->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Deal </a>
                <a href="{{route('admin.campaign.expense.create',$campaign->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Expense </a>
                <a href="{{route('admin.campaign.lead.create',$campaign->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Lead </a>
                <a href="{{route('admin.campaign.organization.create',$campaign->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Organization </a>
                <a href="{{route('admin.campaign.uploads',$campaign->id)}}" class="btn btn-success btn-outline"><i class="fa fa-eye"></i> Uploads</a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        <div class="row">
            <div class="col-lg-8">
                <div class="ibox">
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.campaign.update',$campaign->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                        <input type="text" name="name" required="required" value="{{$campaign->name}}" class="form-control input-lg">
                                        <i>name</i>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning" id="data_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" required="required" name="start_date" class="form-control input-lg" value="{{$campaign->start_date}}">
                                                </div>
                                                <i>What is the start date of the event?</i>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning" id="data_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" required="required" name="end_date" class="form-control input-lg" value="{{$campaign->end_date}}">
                                                </div>
                                                <i>What is the end date of the event?</i>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="number" id="actual_cost" name="actual_cost" required="required" value="{{$campaign->actual_cost}}" class="form-control input-lg" readonly>
                                                <i>actual cost</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="number" id="budgeted_cost" name="budgeted_cost" required="required" value="{{$campaign->budgeted_cost}}" class="form-control input-lg">
                                                <i>budgeted cost</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="number" id="expected_revenue" name="expected_revenue" required="required" value="{{$campaign->expected_revenue}}" class="form-control input-lg">
                                                <i>expected revenue</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <input type="number" id="expected_response" name="expected_response" required="required" value="{{$campaign->expected_response}}" class="form-control input-lg">
                                                <i>expected response</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="type" class="select2_demo_campaign_type form-control input-lg">
                                            <option></option>
                                            @foreach ($campaignTypes as $campaignType)
                                                <option @if($campaign->campaign_type_id == $campaignType->id) selected @endif value="{{$campaignType->id}}">{{$campaignType->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>campaign type</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="status" class="select2_demo_status form-control input-lg" required>
                                            <option></option>
                                            @foreach ($campaignStatus as $status)
                                                <option @if($campaign->status_id == $status->id) selected @endif value="{{$status->id}}">{{$status->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>status</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select name="campaign" class="select2_demo_campaign form-control input-lg">
                                            <option></option>
                                            @foreach ($campaigns as $campaignValue)
                                                <option @if($campaign->campaign_id == $campaignValue->id) selected @endif value="{{$campaignValue->id}}">{{$campaignValue->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>campaign</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <textarea rows="5" id="description" name="description" required="required" class="form-control input-lg">{{$campaign->description}}</textarea>
                                        <i>description</i>
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
            <div class="col-lg-4">
                <div class="row">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5>Income</h5>
                            <h1 class="no-margins">886,200</h1>
                            <div class="stat-percent font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                            <small>Total income</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5>Income last month</h5>
                            <h1 class="no-margins">1 738,200</h1>
                            <div class="stat-percent font-bold text-navy">98% <i class="fa fa-bolt"></i></div>
                            <small>Total income</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5>Income last day</h5>
                            <h1 class="no-margins">-200,100</h1>
                            <div class="stat-percent font-bold text-danger">12% <i class="fa fa-level-down"></i></div>
                            <small>Total income</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5>Usage</h5>
                            <h2>65%</h2>
                            <div class="progress progress-mini">
                                <div style="width: 68%;" class="progress-bar"></div>
                            </div>

                            <div class="m-t-sm small">Server down since 4:32 pm.</div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5 class="m-b-md">Server status Q12</h5>

                            <h2 class="text-navy">
                                <i class="fa fa-play fa-rotate-270"></i> Up
                            </h2>

                            {{--  <h2 class="text-danger">
                                <i class="fa fa-play fa-rotate-90"></i> Down
                            </h2>  --}}

                            <small>Last down 42 days ago</small>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="ibox">
                        <div class="ibox-content">
                            <h5>Visits in last 24h</h5>
                            <h2>198 009</h2>
                            <div id="sparkline1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  children  --}}
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
                                                <h3 class="font-bold">{{$campaign->user->name}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget style1 {{$campaign->status->label}}">
                                        <div class="row vertical-align">
                                            <div class="col-xs-3">
                                                <i class="fa fa-ellipsis-v fa-3x"></i>
                                            </div>
                                            <div class="col-xs-9 text-right">
                                                <h3 class="font-bold">{{$campaign->status->name}}</h3>
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
                                                <h3 class="font-bold">{{$campaign->created_at}}</h3>
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
                                                <h3 class="font-bold">{{$campaign->updated_at}}</h3>
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
                                            <li class="active"><a href="#campaigns" data-toggle="tab">Campaigns</a></li>
                                            <li class=""><a href="#contacts" data-toggle="tab">Contacts</a></li>
                                            <li class=""><a href="#deals" data-toggle="tab">Deal</a></li>
                                            <li class=""><a href="#expenses" data-toggle="tab">Expenses</a></li>
                                            <li class=""><a href="#leads" data-toggle="tab">Leads</a></li>
                                            <li class=""><a href="#organizations" data-toggle="tab">Organizations</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="campaigns">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Type</th>
                                                            <th>Expected Revenue</th>
                                                            <th>Budgeted Cost</th>
                                                            <th>Actual Cost</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($campaign->campaigns as $campaignCampaign)
                                                            <tr class="gradeX">
                                                                <td>{{$campaignCampaign->name}}</td>
                                                                <td>{{$campaignCampaign->campaign_type->name}}</td>
                                                                <td>{{$campaignCampaign->expected_revenue}}</td>
                                                                <td>{{$campaignCampaign->budgeted_cost}}</td>
                                                                <td>{{$campaignCampaign->actual_cost}}</td>
                                                                <td>{{$campaignCampaign->start_date}}</td>
                                                                <td>{{$campaignCampaign->end_date}}</td>
                                                                <td>{{$campaignCampaign->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$campaignCampaign->status->label}}">{{$campaignCampaign->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.campaign.show', $campaignCampaign->id) }}" class="btn-white btn btn-xs">View</a>
                                                                        @if($campaignCampaign->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.campaign.restore', $campaignCampaign->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.campaign.delete', $campaignCampaign->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Type</th>
                                                            <th>Expected Revenue</th>
                                                            <th>Budgeted Cost</th>
                                                            <th>Actual Cost</th>
                                                            <th>Start Date</th>
                                                            <th>End Date</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="contacts">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th width="9em">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($campaign->contacts as $contact)
                                                            <tr class="gradeX">
                                                                <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                                                                <td>{{$contact->email}}</td>
                                                                <td>{{$contact->phone_number}}</td>
                                                                <td>{{$contact->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$contact->status->label}}">{{$contact->status->name}}</span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.contact.show', $contact->id) }}" class="btn-white btn btn-xs">View</a>
                                                                        @if($contact->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.contact.restore', $contact->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.contact.delete', $contact->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="deals">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Amount</th>
                                                        <th>Starting Date</th>
                                                        <th>Closing Date</th>
                                                        <th>Probability</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($campaign->deals as $deal)
                                                        <tr class="gradeX">
                                                            <td>{{$deal->reference}}</td>
                                                            <td>{{$deal->amount}}</td>
                                                            <td>{{$deal->starting_date}}</td>
                                                            <td>{{$deal->closing_date}}</td>
                                                            <td>{{$deal->probability}}</td>
                                                            <td>
                                                                <span class="label {{$deal->status->label}}">{{$deal->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.deal.show', $deal->id) }}" class="btn-white btn btn-xs">View</a>
                                                                    @if($deal->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                        <a href="{{ route('admin.deal.restore', $deal->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                                    @else
                                                                        <a href="{{ route('admin.deal.delete', $deal->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Amount</th>
                                                        <th>Starting Date</th>
                                                        <th>Closing Date</th>
                                                        <th>Probability</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="expenses">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Recurring</th>
                                                        <th>Expense #</th>
                                                        <th>Date</th>
                                                        <th>Created</th>
                                                        <th>Expense Account</th>
                                                        <th>Total</th>
                                                        <th>Paid</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($campaign->expenses as $expense)
                                                        <tr class="gradeA">
                                                            <td>
                                                                @if($expense->is_recurring == 1)
                                                                    <p><span class="badge badge-success">True</span></p>
                                                                @else
                                                                    <p><span class="badge badge-success">False</span></p>
                                                                @endif
                                                            </td>
                                                            <td>{{$expense->reference}}</td>
                                                            <td>{{$expense->date}}</td>
                                                            <td>{{$expense->created_at}}</td>
                                                            <td>{{$expense->expense_account->name}}</td>
                                                            <td>{{$expense->total}}</td>
                                                            <td>{{$expense->paid}}</td>
                                                            <td>
                                                                <p><span class="label {{$expense->status->label}}">{{$expense->status->name}}</span></p>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.expense.show', $expense->id) }}" class="btn-success btn-outline btn btn-xs">View</a>
                                                                    @if($expense->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                        <a href="{{ route('admin.expense.restore', $expense->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                                    @else
                                                                        <a href="{{ route('admin.expense.delete', $expense->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Recurring</th>
                                                        <th>Expense #</th>
                                                        <th>Date</th>
                                                        <th>Created</th>
                                                        <th>Expense Account</th>
                                                        <th>Total</th>
                                                        <th>Paid</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="leads">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($campaign->leads as $lead)
                                                            <tr class="gradeX">
                                                                <td>{{$lead->first_name}} {{$lead->last_name}}</td>
                                                                <td>{{$lead->email}}</td>
                                                                <td>{{$lead->phone_number}}</td>
                                                                <td>{{$lead->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$lead->status->label}}">{{$lead->status->name}}</span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.contact.show', $lead->id) }}" class="btn-white btn btn-xs">View</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-pane" id="organizations">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($campaign->organizations as $organization)
                                                            <tr class="gradeX">
                                                                <td>{{$organization->name}}</td>
                                                                <td>{{$organization->email}}</td>
                                                                <td>{{$organization->phone_number}}</td>
                                                                <td>{{$organization->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$organization->status->label}}">{{$organization->status->name}}</span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.organization.show', $organization->id) }}" class="btn-white btn btn-xs">View</a>
                                                                        @if($organization->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.organization.restore', $organization->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.organization.delete', $organization->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone Number</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
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


        {{--    To Dos    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-danger m-r-sm">{{$campaign->pending_to_dos_count}}</button>
                            Pending
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary m-r-sm">{{$campaign->in_progress_to_dos_count}}</button>
                            In Progress
                        </td>
                        <td>
                            <button type="button" class="btn btn-info m-r-sm">{{$campaign->completed_to_dos_count}}</button>
                           Overdue
                        </td>
                        <td>
                            <button type="button" class="btn btn-info m-r-sm">{{$campaign->overdue_to_dos_count}}</button>
                            Completed
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>To Dos</h5>
                        <div class="ibox-tools">
                            <a data-toggle="modal" data-target="#toDoRegistration" class="btn btn-success btn-round btn-outline"> <span class="fa fa-plus"></span> New</a>
                        </div>
                    </div>
                    <div class="">
                        <ul class="pending-to-do">
                            @foreach($campaign->pending_to_dos as $pendingToDo)
                                <li>
                                    <div>
                                        <small>{{$pendingToDo->due_date}}</small>
                                        <h4>{{$pendingToDo->name}}</h4>
                                        <p>{{$pendingToDo->notes}}.</p>
                                        @if($pendingToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$pendingToDo->design->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.in.progress',$pendingToDo->id)}}"><i class="fa fa-arrow-circle-o-right "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <ul class="in-progress-to-do">
                            @foreach($campaign->in_progress_to_dos as $inProgressToDo)
                                <li>
                                    <div>
                                        <small>{{$inProgressToDo->due_date}}</small>
                                        <h4>{{$inProgressToDo->name}}</h4>
                                        <p>{{$inProgressToDo->notes}}.</p>
                                        @if($inProgressToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$inProgressToDo->design->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.completed',$inProgressToDo->id)}}"><i class="fa fa-check "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="overdue-to-do">
                            @foreach($campaign->completed_to_dos as $overdueToDo)
                                <li>
                                    <div>
                                        <small>{{$overdueToDo->due_date}}</small>
                                        <h4>{{$overdueToDo->name}}</h4>
                                        <p>{{$overdueToDo->notes}}.</p>
                                        @if($overdueToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$overdueToDo->design->name}}</span></p>
                                        @endif
                                        @if($overdueToDo->status->name === "Pending")
                                            <a href="{{route('admin.to.do.set.completed',$overdueToDo->id)}}"><i class="fa fa-check-double "></i></a>
                                        @elseif($overdueToDo->status->name === "In progress")
                                            <a href="{{route('admin.to.do.set.completed',$overdueToDo->id)}}"><i class="fa fa-check-double "></i></a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="completed-to-do">
                            @foreach($campaign->overdue_to_dos as $completedToDo)
                                <li>
                                    <div>
                                        <small>{{$completedToDo->due_date}}</small>
                                        <h4>{{$completedToDo->name}}</h4>
                                        <p>{{$completedToDo->notes}}.</p>
                                        @if($completedToDo->is_design === 1)
                                            <p><span class="badge badge-primary">{{$completedToDo->design->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.delete',$completedToDo->id)}}"><i class="fa fa-trash-o "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@include('admin.layouts.modals.campaign_to_do')

@section('js')

<script>
    $(document).ready(function() {

        var sparklineCharts = function(){
             $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
                 type: 'line',
                 width: '100%',
                 height: '60',
                 lineColor: '#1ab394',
                 fillColor: "#ffffff"
             });

        };

        var sparkResize;

        $(window).resize(function(e) {
            clearTimeout(sparkResize);
            sparkResize = setTimeout(sparklineCharts, 500);
        });

        sparklineCharts();


    });
</script>

@endsection
