@extends('admin.components.main')

@section('title', 'Contact '.$contact->name)

@section('css')
    <link href="{{ asset('inspinia') }}/css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/plugins/dropzone/dropzone.css" rel="stylesheet">
@endsection

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-graph icon-gradient bg-ripe-malin"></i>
                </div>
                <div>Contact {{$contact->name}}
                    {{-- <div class="page-title-subheading">Examples of just how powerful ArchitectUI really is!</div> --}}
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                    class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>
                <div class="d-inline-block dropdown">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buttons
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span> Inbox</span>
                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-book"></i>
                                    <span> Book</span>
                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-picture"></i>
                                    <span> Picture</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a disabled class="nav-link disabled">
                                    <i class="nav-link-icon lnr-file-empty"></i>
                                    <span> File Disabled</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".editContact"><i class="fa fa-paint-brush"></i> Contact</button>

                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".addAssetAction"><i class="fa fa-plus"></i> Asset Action</button>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".addPromoCode"><i class="fa fa-plus"></i> Promo Code</button>
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".addClientProof"><i class="fa fa-plus"></i> Client Proof</button>

                {{-- <a href="{{route('admin.contact.promo.code.assign',$contact->id)}}" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Assign Promo Code </a> --}}
                {{-- <a href="{{route('admin.contact.client.proof.create',$contact->id)}}" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Client Proof </a> --}}
                <a href="{{route('admin.contact.deal.create',$contact->id)}}" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Deal </a>
                <a href="{{route('admin.contact.design.create',$contact->id)}}" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Design </a>
                <a href="{{route('admin.contact.liability.create',$contact->id)}}" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Liability </a>
                <a href="{{route('admin.contact.loan.create',$contact->id)}}" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Loan </a>
                <a href="{{route('admin.contact.order.create',$contact->id)}}" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Order </a>
                <a href="{{route('admin.contact.project.create',$contact->id)}}" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Project </a>
                @if($contact->campaign_id)
                    <a href="{{route('admin.campaign.show',$contact->campaign_id)}}" class="btn btn-success btn-lg"><i class="fa fa-eye"></i> Campaign </a>
                @endif
                @if($contact->organization_id)
                    <a href="{{route('admin.organization.show',$contact->organization_id)}}" class="btn btn-success btn-lg"><i class="fa fa-eye"></i> Organization </a>
                @endif

            </div>
        </div>
    </div>


    <div class="tabs-animation">

        {{--  to do Counts  --}}
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-warning m-r-sm">{{$contact->pending_to_dos_count}}</button>
                            Pending
                        </td>
                        <td>
                            <button type="button" class="btn btn-info m-r-sm">{{$contact->in_progress_to_dos_count}}</button>
                            In progress
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary m-r-sm">{{$contact->completed_to_dos_count}}</button>
                            Completed
                        </td>
                        <td>
                            <button type="button" class="btn btn-success m-r-sm">{{$contact->overdue_to_dos_count}}</button>
                            Overdue
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mb-3 card">
            <div class="tabs-lg-alternate card-header">
                <ul class="nav nav-justified">
                    <li class="nav-item">
                        <a href="#tab-minimal-1" data-toggle="tab" class="nav-link minimal-tab-btn-1">
                            <div class="widget-number"><span>$15,065</span></div>
                            <div class="tab-subheading">
                                <span class="pr-2 opactiy-6">
                                    <i class="fa fa-comment-dots"></i>
                                </span>
                                Totals
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-minimal-2" data-toggle="tab" class="nav-link active minimal-tab-btn-2">
                            <div class="widget-number">
                                <span class="pr-2 text-success">
                                    <i class="fa fa-angle-up"></i>
                                </span>
                                <span>4531</span>
                            </div>
                            <div class="tab-subheading">Contacts</div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#tab-minimal-3" data-toggle="tab" class="nav-link minimal-tab-btn-3">
                            <div class="widget-number text-danger">
                                <span>$6,784.0</span>
                            </div>
                            <div class="tab-subheading">
                                <span class="pr-2 opactiy-6">
                                    <i class="fa fa-bullhorn"></i>
                                </span>
                                Income
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane" id="tab-minimal-1">
                    <div class="card-body">
                        <div id="chart-combined-tab"></div>
                    </div>
                </div>
                <div class="tab-pane fade active show" id="tab-minimal-2">
                    <div class="card-body">
                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                            <div id="chart-apex-negative"></div>
                        </div>
                        <h5 class="card-title">Target Sales</h5>
                        <div class="mt-3 row">
                            <div class="col-sm-12 col-md-4">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-numbers text-dark">65%</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper mt-1">
                                            <div class="progress-bar-xs progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="65"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 65%;"></div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left font-size-md">Sales</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-numbers text-dark">22%</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper mt-1">
                                            <div class="progress-bar-xs progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-warning" role="progressbar"
                                                    aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 22%;">
                                                </div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left font-size-md">Profiles</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="widget-content p-0">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-numbers text-dark">83%</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper mt-1">
                                            <div class="progress-bar-xs progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    aria-valuenow="83" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 83%;">
                                                </div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left font-size-md">Tickets</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-minimal-3">
                    <div class="rm-border card-header">
                        <div>
                            <h5 class="menu-header-title text-capitalize text-primary">Income Report</h5>
                        </div>
                        <div class="btn-actions-pane-right text-capitalize">
                            <div class="btn-group dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    class="btn-wide mr-1 dropdown-toggle btn btn-outline-focus btn-sm">Options
                                </button>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                    class="dropdown-menu-lg rm-pointers dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-menu-header">
                                        <div class="dropdown-menu-header-inner bg-primary">
                                            <div class="menu-header-image"
                                                style="background-image: url('assets/images/dropdown-header/abstract2.jpg');">
                                            </div>
                                            <div class="menu-header-content">
                                                <div>
                                                    <h5 class="menu-header-title">Settings</h5>
                                                    <h6 class="menu-header-subtitle">Example Dropdown Menu</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="scroll-area-xs">
                                        <div class="scrollbar-container">
                                            <ul class="nav flex-column">
                                                <li class="nav-item-header nav-item">Activity</li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Chat
                                                        <div class="ml-auto badge badge-pill badge-info">8</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Recover Password</a>
                                                </li>
                                                <li class="nav-item-header nav-item">My Account</li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Settings
                                                        <div class="ml-auto badge badge-success">New</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Messages
                                                        <div class="ml-auto badge badge-warning">512</div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="javascript:void(0);" class="nav-link">Logs</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-2">
                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                            <div style="height: 274px;">
                                <div id="chart-combined-tab-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="border-top bg-light card-header">
                        <div class="actions-icon-btn mx-auto">
                            <div>
                                <div role="group" class="btn-group-lg btn-group nav">
                                    <button type="button" data-toggle="tab" href="#tab-content-income"
                                        class="btn-pill pl-3 active btn btn-focus">Income</button>
                                    <button type="button" data-toggle="tab" href="#tab-content-expenses"
                                        class="btn-pill pr-3  btn btn-focus">Expenses</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active fade show" id="tab-content-income" role="tabpanel">
                                <h5 class="menu-header-title">Target Sales</h5>
                                <h6 class="menu-header-subtitle opacity-6">Total performance for this month</h6>
                                <div class="mt-3 row">
                                    <div class="col-sm-12 col-md-6">
                                        <div class="card-border mb-sm-3 mb-md-0 border-light no-shadow card">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">Orders</div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="widget-numbers line-height-1 text-primary">
                                                                <span>366</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-progress-wrapper mt-1">
                                                        <div class="progress-bar-xs progress">
                                                            <div class="progress-bar bg-success" role="progressbar"
                                                                aria-valuenow="76" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 76%;">
                                                            </div>
                                                        </div>
                                                        <div class="progress-sub-label">
                                                            <div class="sub-label-left">Monthly Target</div>
                                                            <div class="sub-label-right">100%</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div class="card-border border-light no-shadow card">
                                            <div class="widget-content">
                                                <div class="widget-content-outer">
                                                    <div class="widget-content-wrapper">
                                                        <div class="widget-content-left">
                                                            <div class="widget-heading">Income</div>
                                                        </div>
                                                        <div class="widget-content-right">
                                                            <div class="widget-numbers line-height-1 text-success">
                                                                <span>$2797</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="widget-progress-wrapper mt-1">
                                                        <div class="progress-bar-xs progress-bar-animated progress">
                                                            <div class="progress-bar bg-danger" role="progressbar"
                                                                aria-valuenow="23" aria-valuemin="0" aria-valuemax="100"
                                                                style="width: 23%;">
                                                            </div>
                                                        </div>
                                                        <div class="progress-sub-label">
                                                            <div class="sub-label-left">Monthly Target</div>
                                                            <div class="sub-label-right">100%</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-content-expenses" role="tabpanel">
                                <h5 class="menu-header-title">Tabbed Content</h5>
                                <h6 class="menu-header-subtitle opacity-6">Example of various options built with
                                    ArchitectUI</h6>
                                <div class="mt-3 row">
                                    <div class="col-sm-12 col-md-6">
                                        <div
                                            class="card-hover-shadow-2x mb-sm-3 mb-md-0 widget-chart widget-chart2 bg-premium-dark text-left card">
                                            <div class="widget-chart-content text-white">
                                                <div class="widget-chart-flex">
                                                    <div class="widget-title">Sales</div>
                                                    <div class="widget-subtitle opacity-7">Monthly Goals</div>
                                                </div>
                                                <div class="widget-chart-flex">
                                                    <div class="widget-numbers text-success">
                                                        <small>$</small>
                                                        976
                                                        <small class="opacity-8 pl-2">
                                                            <i class="fa fa-angle-up"></i>
                                                        </small>
                                                    </div>
                                                    <div class="widget-description ml-auto opacity-7">
                                                        <i class="fa fa-angle-up"></i>
                                                        <span class="pl-1">175%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div
                                            class="card-hover-shadow-2x widget-chart widget-chart2 bg-premium-dark text-left card">
                                            <div class="widget-chart-content text-white">
                                                <div class="widget-chart-flex">
                                                    <div class="widget-title">Clients</div>
                                                    <div class="widget-subtitle text-warning">Returning</div>
                                                </div>
                                                <div class="widget-chart-flex">
                                                    <div class="widget-numbers text-warning">84
                                                        <small>%</small>
                                                        <small class="opacity-8 pl-2">
                                                            <i class="fa fa-angle-down"></i>
                                                        </small>
                                                    </div>
                                                    <div class="widget-description ml-auto text-warning">
                                                        <span class="pr-1">45</span>
                                                        <i class="fa fa-angle-up"></i>
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


        <div class="main-card mb-3 card">

            <div class="card-header">
                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                Children Records
                {{-- <div class="btn-actions-pane-right">
                    <a href="{{route('admin.transaction.create',$order->id)}}" type="button" class="btn btn-success btn-lg" ><i class="fa fa-plus"></i> Make Payment</a>
                </div> --}}
            </div>

            <div class="card-body">
                <ul class="tabs-animated-shadow tabs-animated nav">
                    <li class="nav-item">
                        <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab" href="#asset-actions">
                            <span>Asset Actions ({{$contact->asset_actions->count()}})
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#assigned-promo-codes">
                            <span>Assigned Promo Codes ({{$contact->promo_code_assignments->count()}})</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#client-proofs">
                            <span>Client Proofs ({{$albumContacts->count()}})</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#deals">
                            <span>Deals ({{$deals->count()}})</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#designs">
                            <span>Designs ({{$designContacts->count()}})</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#liabilities">
                            <span>Liabilities ({{$contact->liabilities->count()}})</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#loans">
                            <span>Loans ({{$contact->loans->count()}})</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#orders">
                            <span>Orders ({{$contact->orders->count()}})</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#projects">
                            <span>Projects ({{$projectContacts->count()}})</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="asset-actions" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Asset Actions
                                <div class="btn-actions-pane-right">
                                    {{-- <a href="{{route('admin.order.payment.create',$order->id)}}" class="btn btn-success btn-lg" ><i class="fa fa-plus"></i> Payment</a> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Table striped</h5>
                                            <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Amount</th>
                                                        <th>Paid</th>
                                                        <th>Date</th>
                                                        <th>Due Date</th>
                                                        <th>Action Type</th>
                                                        <th>Contact</th>
                                                        <th>Item</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($assetActions as $assetAction)
                                                        <tr>
                                                            <td>{{$assetAction->reference}}</td>
                                                            <td>{{$assetAction->amount}}</td>
                                                            <td>{{$assetAction->paid}}</td>
                                                            <td>{{$assetAction->date}}</td>
                                                            <td>{{$assetAction->due_date}}</td>
                                                            <td>{{$assetAction->action_type->name}}</td>
                                                            <td>{{$assetAction->contact->first_name}} {{$assetAction->contact->last_name}}</td>
                                                            <td>{{$assetAction->user->name}}</td>
                                                            <td>
                                                                @if($assetAction->is_asset == 1)
                                                                    <span class="label label-primary">{{$assetAction->asset->name}}</span>
                                                                @elseif($assetAction->is_kit == 1)
                                                                    <span class="label label-primary">{{$assetAction->kit->name}}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <span class="label {{$assetAction->status->label}}">{{$assetAction->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.asset.action.show', $assetAction->id) }}" class="mb-2 mr-2 btn btn-success">View</a>
                                                                    @if($assetAction->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                        <a href="{{ route('admin.asset.action.restore', $assetAction->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                    @else
                                                                        <a href="{{ route('admin.asset.action.delete', $assetAction->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
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
                                                        <th>Paid</th>
                                                        <th>Date</th>
                                                        <th>Due Date</th>
                                                        <th>Action Type</th>
                                                        <th>Contact</th>
                                                        <th>Item</th>
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

                    <div class="tab-pane" id="assigned-promo-codes" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Assigned Promo Code
                                <div class="btn-actions-pane-right">
                                    {{-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addDeposit"><i class="fa fa-plus"></i> Deposit</button> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Table striped</h5>
                                            <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Assigned</th>
                                                        <th>Discount</th>
                                                        <th>Expiry</th>
                                                        <th>Used</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($assignedPromoCodes as $promoCode)
                                                    <tr>
                                                        <td>{{$promoCode->reference}}</td>
                                                        <td>{{$promoCode->assigned}}</td>
                                                        <td>{{$promoCode->promo_code->discount}}</td>
                                                        <td>{{$promoCode->promo_code->expiry_date}}</td>
                                                        <td>
                                                            @if ($promoCode->is_used == True)
                                                                <span class="label label-danger">Used</span>
                                                            @else
                                                                <span class="label label-warning">Pending</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span class="label {{$promoCode->status->label}}">{{$promoCode->status->name}}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.promo.code.show', $promoCode->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Assigned</th>
                                                        <th>Discount</th>
                                                        <th>Expiry</th>
                                                        <th>Used</th>
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

                    <div class="tab-pane" id="client-proofs" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Client Proofs
                                <div class="btn-actions-pane-right">
                                    {{-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addDeposit"><i class="fa fa-plus"></i> Deposit</button> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Table striped</h5>
                                            <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Views</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($albumContacts as $albumContact)
                                                    <tr>
                                                        <td>{{$albumContact->album->date}}</td>
                                                        <td>{{$albumContact->album->name}}</td>
                                                        <td>{{$albumContact->album->views}}</td>
                                                        <td>{{$albumContact->album->user->name}}</td>

                                                        <td>
                                                            <span class="label {{$albumContact->album->status->label}}">{{$albumContact->album->status->name}}</span>
                                                        </td>

                                                        <td class="text-right">
                                                            <div class="btn-group">
                                                                @if($albumContact->album->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                                                    <a href="{{ route('admin.personal.album.show', $albumContact->album->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                @elseif($albumContact->album->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                                                    <a href="{{ route('admin.client.proof.show', $albumContact->album->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                @endif
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Views</th>
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

                    <div class="tab-pane" id="deals" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Deals
                                <div class="btn-actions-pane-right">
                                    {{-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addDeposit"><i class="fa fa-plus"></i> Deposit</button> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Table striped</h5>
                                            <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Probability</th>
                                                        <th>Amount</th>
                                                        <th>Start</th>
                                                        <th>End</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($deals as $deal)
                                                    <tr>
                                                        <td>{{$deal->name}}</td>
                                                        <td>{{$deal->probability}}</td>
                                                        <td>{{$deal->amount}}</td>
                                                        <td>{{$deal->starting_date}}</td>
                                                        <td>{{$deal->closing_date}}</td>
                                                        <td>
                                                            <span class="label {{$deal->status->label}}">{{$deal->status->name}}</span>
                                                        </td>

                                                        <td class="text-right">
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.deal.show', $deal->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Probability</th>
                                                        <th>Amount</th>
                                                        <th>Start</th>
                                                        <th>End</th>
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

                    <div class="tab-pane" id="designs" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Designs
                                <div class="btn-actions-pane-right">
                                    {{-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addDeposit"><i class="fa fa-plus"></i> Deposit</button> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Table striped</h5>
                                            <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th>Views</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($designContacts as $designContact)
                                                    <tr>
                                                        <td>{{$designContact->design->name}}</td>
                                                        <td>{{$designContact->design->date}}</td>
                                                        <td>{{$designContact->design->views}}</td>
                                                        <td>{{$designContact->design->user->name}}</td>
                                                        <td>
                                                            <span class="label {{$designContact->design->status->label}}">{{$designContact->design->status->name}}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.design.show', $designContact->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th>Views</th>
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

                    <div class="tab-pane" id="liabilities" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Liabilities
                                <div class="btn-actions-pane-right">
                                    {{-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addDeposit"><i class="fa fa-plus"></i> Deposit</button> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Table striped</h5>
                                            <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Amount</th>
                                                        <th>Paid</th>
                                                        <th>Date</th>
                                                        <th>Due Date</th>
                                                        <th>Account</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($liabilities as $liability)
                                                    <tr>
                                                        <td>{{$liability->reference}}</td>
                                                        <td>{{$liability->amount}}</td>
                                                        <td>{{$liability->paid}}</td>
                                                        <td>{{$liability->date}}</td>
                                                        <td>{{$liability->due_date}}</td>
                                                        <td>{{$liability->account->name}}</td>
                                                        <td>
                                                            <span class="label {{$liability->status->label}}">{{$liability->status->name}}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.liability.show', $liability->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Amount</th>
                                                        <th>Paid</th>
                                                        <th>Date</th>
                                                        <th>Due Date</th>
                                                        <th>Account</th>
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

                    <div class="tab-pane" id="loans" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Loans
                                <div class="btn-actions-pane-right">
                                    {{-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addDeposit"><i class="fa fa-plus"></i> Deposit</button> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Table striped</h5>
                                            <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Amount</th>
                                                        <th>Paid</th>
                                                        <th>Date</th>
                                                        <th>Due Date</th>
                                                        <th>User</th>
                                                        <th>Account</th>
                                                        <th>Contact</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($loans as $loan)
                                                    <tr>
                                                        <td>
                                                            {{$loan->reference}}
                                                            <span><i data-toggle="tooltip" data-placement="right" title="{{$loan->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                        </td>
                                                        <td>{{$loan->amount}}</td>
                                                        <td>{{$loan->paid}}</td>
                                                        <td>{{$loan->date}}</td>
                                                        <td>{{$loan->due_date}}</td>
                                                        <td>{{$loan->user->name}}</td>
                                                        <td>{{$loan->account->name}}</td>
                                                        <td>{{$loan->contact->first_name}} {{$loan->contact->last_name}}</td>
                                                        <td>{{$loan->user->name}}</td>
                                                        <td>
                                                            <span class="label {{$loan->status->label}}">{{$loan->status->name}}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.loan.show', $loan->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Amount</th>
                                                        <th>Paid</th>
                                                        <th>Date</th>
                                                        <th>Due Date</th>
                                                        <th>User</th>
                                                        <th>Account</th>
                                                        <th>Contact</th>
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

                    <div class="tab-pane" id="orders" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Order
                                <div class="btn-actions-pane-right">
                                    {{-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addDeposit"><i class="fa fa-plus"></i> Deposit</button> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Table striped</h5>
                                            <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Created</th>
                                                        <th>Total</th>
                                                        <th>Discount</th>
                                                        <th>Refunded</th>
                                                        <th>Products</th>
                                                        <th>State</th>
                                                        <th>Client</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders as $order)
                                                    <tr>
                                                        <td>
                                                            {{$order->order_number}}
                                                            <span><i data-toggle="tooltip" data-placement="right" title="{{$order->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                        </td>
                                                        <td>{{$order->created_at}}</td>
                                                        <td>{{$order->total}}</td>
                                                        <td>{{$order->discount}}</td>
                                                        <td>{{$order->refund}}</td>
                                                        <td>{{$order->order_products_count}}</td>

                                                        <td>
                                                            @if($order->is_returned == 1 )
                                                                <span class="label label-warning">Returned</span>
                                                            @endif
                                                            @if($order->is_refunded == 1 )
                                                                <span class="label label-danger">Refunded</span>
                                                            @endif
                                                            @if($order->is_delivery == 1 )
                                                                <span class="label label-success">Delivered</span>
                                                            @endif
                                                            @if($order->is_paid == 1 )
                                                                <span class="label label-success">Paid</span>
                                                            @endif
                                                            @if($order->is_client == 1 )
                                                                <span class="label label-primary">Client</span>
                                                            @else
                                                                <span class="label label-primary">User</span>
                                                            @endif
                                                            @if($order->is_draft == 1 )
                                                                <span class="label label-info">Draft</span>
                                                            @endif
                                                        </td>

                                                        <td>{{$order->contact->first_name}} {{$order->contact->last_name}} @if($order->contact->organization) [{{$order->contact->organization->name}}]@endif</td>
                                                        <td>
                                                            <span class="label {{$order->status->label}}">{{$order->status->name}}</span>
                                                        </td>

                                                        <td class="text-right">
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.order.show', $order->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Created</th>
                                                        <th>Total</th>
                                                        <th>Discount</th>
                                                        <th>Refunded</th>
                                                        <th>Products</th>
                                                        <th>State</th>
                                                        <th>Client</th>
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

                    <div class="tab-pane" id="projects" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Projects
                                <div class="btn-actions-pane-right">
                                    {{-- <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addDeposit"><i class="fa fa-plus"></i> Deposit</button> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Table striped</h5>
                                            <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Views</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($projectContacts as $projectContact)
                                                    <tr>
                                                        <td>{{$projectContact->project->date}}</td>
                                                        <td>{{$projectContact->project->name}}</td>
                                                        <td>{{$projectContact->project->views}}</td>
                                                        <td>{{$projectContact->project->user->name}}</td>
                                                        <td>
                                                            <span class="label {{$projectContact->project->status->label}}">{{$projectContact->project->status->name}}</span>
                                                        </td>

                                                        <td class="text-right">
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.project.show', $project->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Name</th>
                                                        <th>Views</th>
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

            <div class="card-footer">Footer</div>

        </div>




    </div>

</div>


@endsection

@include('admin.components.modals.edit_contact')
@include('admin.components.modals.add_asset_action')
@include('admin.components.modals.add_promo_code')
@include('admin.components.modals.add_client_proof')

{{-- @include('admin.components.modals.add_client_proof')
@include('admin.components.modals.add_personal_album') --}}
{{-- @include('admin.components.modals.edit_campaign_cover_image') --}}
{{-- @include('admin.components.modals.edit_client_proof')
@include('admin.components.modals.edit_client_proof_cover_image')
@include('admin.components.modals.edit_client_proof_download_settings')
@include('admin.components.modals.add_client_proof_email_restriction') --}}

@section('js')

    {{-- promo codes --}}
    <script>
        $(document).ready(function() {
            // Set due date
            var due = new Date();
            due.setDate(due.getDate() + 14);
            var due_dd = due.getDate();
            var due_mm = due.getMonth()+1;
            var due_yyyy = due.getFullYear();
            if (due_dd < 10){
                due_dd = '0'+due_dd;
            }
            if (due_mm < 10){
                due_mm = '0'+due_mm;
            }
            var due_date = due_mm + '/' + due_dd + '/' + due_yyyy;
            if(document.getElementById("promo_code_expiry_date")){
                document.getElementById("promo_code_expiry_date").value = due_date;
            }
        });
    </script>


    {{-- asset action --}}
    <script>
        $(document).ready(function() {
            // Set date
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            if (dd < 10){
                dd = '0'+dd;
            }
            if (mm < 10){
                mm = '0'+mm;
            }
            var date = mm + '/' + dd + '/' + yyyy;
            if(document.getElementById("asset_action_date")){
                document.getElementById("asset_action_date").value = date;
            }


            // Set due date
            var due = new Date();
            due.setDate(due.getDate() + 14);
            var due_dd = due.getDate();
            var due_mm = due.getMonth()+1;
            var due_yyyy = due.getFullYear();
            if (dd < 10){
                due_dd = '0'+due_dd;
            }
            if (due_mm < 10){
                due_mm = '0'+due_mm;
            }
            var due_date = due_mm + '/' + due_dd + '/' + due_yyyy;
            if(document.getElementById("asset_action_due_date")){
                document.getElementById("asset_action_due_date").value = due_date;
            }
        });

    </script>



    <!-- DROPZONE -->
    <script src="{{ asset('inspinia') }}/js/plugins/dropzone/dropzone.js"></script>
    {{--  dropzone  --}}
    <script>
        $(document).ready(function() {
            // Set date
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            if (dd < 10){
                dd = '0'+dd;
            }
            if (mm < 10){
                mm = '0'+mm;
            }
            var date = mm + '/' + dd + '/' + yyyy;
            if(document.getElementById("client_proof_date")){
                document.getElementById("client_proof_date").value = date;
            }
            if(document.getElementById("personal_album_date")){
                document.getElementById("personal_album_date").value = date;
            }

            // Set due date
            var due = new Date();
            due.setDate(due.getDate() + 14);
            var due_dd = due.getDate();
            var due_mm = due.getMonth()+1;
            var due_yyyy = due.getFullYear();
            if (dd < 10){
                due_dd = '0'+due_dd;
            }
            if (due_mm < 10){
                due_mm = '0'+due_mm;
            }
            var due_date = due_mm + '/' + due_dd + '/' + due_yyyy;
            if(document.getElementById("client_proof_expiry_date")){
                document.getElementById("client_proof_expiry_date").value = due_date;
            }
            if(document.getElementById("personal_album_expiry_date")){
                document.getElementById("personal_album_expiry_date").value = due_date;
            }
        });

    </script>

    {{--  dropzone  --}}
    <script>
        $(document).ready(function(){

            Dropzone.options.dropzone =
                {
                    maxFilesize: 12,
                    renameFile: function(file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return time+file.name;
                    },
                    addRemoveLinks: true,
                    timeout: 50000,
                    removedfile: function(file)
                    {
                        var name = file.upload.filename;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                            type: 'POST',
                            url: '{{ url("image/delete") }}',
                            data: {filename: name},
                            success: function (data){
                                console.log("File has been successfully removed!!");
                            },
                            error: function(e) {
                                console.log(e);
                            }});
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },

                    success: function(file, response)
                    {
                        console.log(response);
                    },
                    error: function(file, response)
                    {
                        return false;
                    }
                };
        });
    </script>
@endsection
