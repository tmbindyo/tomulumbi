@extends('admin.components.main')

@section('title', 'Tudeme '.$tudeme->name)

@section('css')
    <link href="{{ asset('inspinia') }}/css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/plugins/dropzone/dropzone.css" rel="stylesheet">
    <!-- lightgallery -->
    <link type="text/css" rel="stylesheet" href="{{ asset('inspinia') }}/lightgallery/dist/css/lightgallery.css" />
    <!-- lightgallery plugins -->
    <link type="text/css" rel="stylesheet" href="{{ asset('inspinia') }}/lightgallery/dist/css/lg-zoom.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset('inspinia') }}/lightgallery/dist/css/lg-thumbnail.css" />
    <link type="text/css" rel="stylesheet" href="{{ asset('inspinia') }}/lightgallery/dist/css/lg-fullscreen.css" />
@endsection

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-graph icon-gradient bg-ripe-malin"></i>
                </div>
                <div>Tudeme {{$tudeme->name}}
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

                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addClientProof"><i class="fa fa-plus"></i> Client Proof</button>
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addPersonalAlbum"><i class="fa fa-plus"></i> Personal Album</button>

                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".editTudeme"><i class="fa fa-paint-brush"></i> Tudeme</button>

                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".editTudemeCoverImage"><i class="fa fa-paint-brush"></i> Cover Image</button>
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".editTudemeSpread"><i class="fa fa-paint-brush"></i> Spread</button>
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".editTudemeIcon"><i class="fa fa-paint-brush"></i> Icon</button>

                <a href="{{route('admin.tudeme.meal.create',$tudeme->id)}}" class="btn btn-success btn-lg" ><i class="fa fa-plus"></i> Tudeme Meal</a>
                <a href="{{route('admin.tudeme.text.show',$tudeme->id)}}" class="btn btn-success btn-lg" ><i class="fa fa-plus"></i> Text</a>

                @if($tudeme->project_id)
                    <a href="{{route('admin.project.show',$tudeme->project_id)}}" class="btn btn-success btn-lg" ><i class="fa fa-eye"></i> Project</a>
                @endif
                @if($tudeme->design_id)
                    <a href="{{route('admin.design.show',$tudeme->design_id)}}" class="btn btn-success btn-lg" ><i class="fa fa-eye"></i> Design</a>
                @endif
                @if($tudeme->album_id)
                    @if($tudeme->album->album_type_id == "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                        <a href="{{route('admin.client.proof.show', $tudeme->album_id)}}" class="btn btn-success btn-lg" ><i class="fa fa-eye"></i> Album</a>
                    @elseif($tudeme->album->album_type_id == "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                        <a href="{{route('admin.personal.album.show', $tudeme->album_id)}}" class="btn btn-success btn-lg" ><i class="fa fa-eye"></i> Album</a>
                    @endif
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
                            <button type="button" class="btn btn-warning m-r-sm">{{$tudemeArray['pendingToDos']}}</button>
                            Pending
                        </td>
                        <td>
                            <button type="button" class="btn btn-info m-r-sm">{{$tudemeArray['inProgressToDos']}}</button>
                            In progress
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary m-r-sm">{{$tudemeArray['completedToDos']}}</button>
                            Completed
                        </td>
                        <td>
                            <button type="button" class="btn btn-success m-r-sm">{{$tudemeArray['overdueToDos']}}</button>
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
                            <div class="tab-subheading">Designs</div>
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
            <div class="card-body">
                <h5 class="card-title"> Tudeme Gallery </h5>
                <ul class="nav nav-pills">
                    <li class="nav-item active"><a data-toggle="tab" href="#tudeme_gallery" class="nav-link"> Tudeme Gallery </a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tudeme_gallery" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Gallery
                                <div class="btn-actions-pane-right">
                                    {{-- <a href="{{route('admin.order.payment.create',$order->id)}}" class="btn btn-success btn-lg" ><i class="fa fa-plus"></i> Payment</a> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Table striped</h5>
                                            <form id="my-awesome-dropzone" class="dropzone" action="{{route('admin.tudeme.gallery.image.upload',$tudeme->id)}}">
                                                @csrf
                                                <div class="dropzone-previews"></div>
                                            </form>

                                            <br>

                                            @isset($tudemeGallery)
                                                <div id="lightgallery">
                                                    @foreach($tudemeGallery as $tudemeGalleryImage)
                                                        {{-- {{$albumSetImage}} --}}
                                                        <a href="{{Minio::getAdminFileUrl( $tudemeGalleryImage->upload->pixels1500 )}}" data-lg-size="1600-2400">
                                                            <img alt="{{ $tudemeGalleryImage->upload->name }}" src="{{Minio::getAdminFileUrl( $tudemeGalleryImage->upload->pixels100 )}}" />
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @endisset
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
                        <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab" href="#journals">
                            <span>Journals ({{$journals->count()}})
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#meals">
                            <span>Meals ({{$meals->count()}})</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="journals" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Journals
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
                                                        <th>Number</th>
                                                        <th>Name</th>
                                                        <th>Cook Time</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($journals as $journal)
                                                        <tr>
                                                            <td>{{$journal->number}}</td>
                                                            <td>{{$journal->name}}</td>
                                                            <td>{{$journal->cook_time}}</td>
                                                            <td>
                                                                <span class="label {{$journal->status->label}}">{{$journal->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.journal.show', $journal->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Number</th>
                                                        <th>Name</th>
                                                        <th>Cook Time</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane" id="meals" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Meal
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
                                                        <th>Number</th>
                                                        <th>Name</th>
                                                        <th>Cook Time</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($meals as $meal)
                                                        <tr>
                                                            <td>{{$meal->number}}</td>
                                                            <td>{{$meal->name}}</td>
                                                            <td>{{$meal->cook_time}}</td>
                                                            <td>
                                                                <span class="label {{$meal->status->label}}">{{$meal->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.tudeme.meal.show', $meal->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Number</th>
                                                        <th>Name</th>
                                                        <th>Cook Time</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
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

@include('admin.components.modals.add_client_proof')
@include('admin.components.modals.add_personal_album')

@include('admin.components.modals.edit_tudeme')
@include('admin.components.modals.edit_tudeme_cover_image')
@include('admin.components.modals.edit_tudeme_spread')
@include('admin.components.modals.edit_tudeme_icon')



@section('js')

    <script src="{{ asset('inspinia') }}/lightgallery/dist/lightgallery.umd.js"></script>
    <!-- Or use the minified version -->
    {{-- <script src="{{ asset('inspinia') }}/lightgallery/dist/lightgallery.min.js"></script> --}}

    <!-- lightgallery plugins -->
    <script src="{{ asset('inspinia') }}/lightgallery/dist/plugins/thumbnail/lg-thumbnail.umd.js"></script>
    <script src="{{ asset('inspinia') }}/lightgallery/dist/plugins/zoom/lg-zoom.umd.js"></script>
    <script src="{{ asset('inspinia') }}/lightgallery/dist/plugins/fullscreen/lg-fullscreen.umd.js"></script>
    <script type="text/javascript">
        lightGallery(document.getElementById('lightgallery'), {
            plugins: [lgZoom, lgThumbnail, lgFullscreen],
            speed: 500,
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

            // Set date
            let date_set = {!! json_encode($tudeme->date) !!};
            let substrings = date_set.split('-');
            var set_date = substrings[1] + '/' + substrings[2] + '/' + substrings[0];

            if(document.getElementById("date")){
                document.getElementById("date").value = set_date;
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
