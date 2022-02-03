@extends('admin.components.main')

@section('title', 'Design '.$design->name)

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
                <div>Design {{$design->name}}
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

                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addDesignGallery"><i class="fa fa-plus"></i> Design Gallery</button>
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addClientProof"><i class="fa fa-plus"></i> Client Proof</button>
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addPersonalAlbum"><i class="fa fa-plus"></i> Personal Album</button>
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".editDesign"><i class="fa fa-paint-brush"></i> Design</button>
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".editDesignCoverImage"><i class="fa fa-paint-brush"></i> Cover Image</button>

                <a href="{{route('admin.design.journal.create',$design->id)}}" class="btn btn-success btn-lg" ><i class="fa fa-plus"></i> Journal</a>

                @if($design->project_id)
                    <a href="{{route('admin.project.show',$design->project_id)}}" class="btn btn-success btn-lg" ><i class="fa fa-eye"></i> Project</a>
                @endif
                @if($design->contact_id)
                    <a href="{{route('admin.contact.show',$design->contact_id)}}" class="btn btn-success btn-lg" ><i class="fa fa-eye"></i> Contact</a>
                @endif
                @if($design->deal_id)
                    <a href="{{route('admin.deal.show',$design->deal_id)}}" class="btn btn-success btn-lg" ><i class="fa fa-eye"></i> Design</a>
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
                            <button type="button" class="btn btn-warning m-r-sm">{{$designArray['pendingToDos']}}</button>
                            Pending
                        </td>
                        <td>
                            <button type="button" class="btn btn-info m-r-sm">{{$designArray['inProgressToDos']}}</button>
                            In progress
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary m-r-sm">{{$designArray['completedToDos']}}</button>
                            Completed
                        </td>
                        <td>
                            <button type="button" class="btn btn-success m-r-sm">{{$designArray['overdueToDos']}}</button>
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
                <h5 class="card-title">Design </h5>
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab" href="#design_gallery">
                            <span>Design Gallery ({{$designGallery->count()}})
                            </span>
                        </a>
                    </li>

                    @foreach($designWork as $work)
                        <li class="nav-item"><a data-toggle="tab" href="#tab-eg13-{{$loop->index}}" class="nav-link">{{$work->name}} </a></li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="design_gallery" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Albums
                                <div class="btn-actions-pane-right">
                                    {{-- <a href="{{route('admin.order.payment.create',$order->id)}}" class="btn btn-success btn-lg" ><i class="fa fa-plus"></i> Payment</a> --}}
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="col-lg-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"><h5 class="card-title">Table striped</h5>
                                            <form id="my-awesome-dropzone" class="dropzone" action="{{route('admin.design.gallery.image.upload',$design->id)}}">
                                                @csrf
                                                <div class="dropzone-previews"></div>
                                            </form>

                                            <br>

                                            @isset($designGallery)
                                                <div id="lightgallery">
                                                    @foreach($designGallery as $designGalleryImage)
                                                        {{-- {{$albumSetImage}} --}}
                                                        <a href="{{Minio::getAdminFileUrl( $designGalleryImage->upload->pixels1500 )}}" data-lg-size="1600-2400">
                                                            <img alt="{{ $designGalleryImage->upload->name }}" src="{{Minio::getAdminFileUrl( $designGalleryImage->upload->pixels100 )}}" />
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

                    @foreach($designWork as $work)
                        <div class="tab-pane" id="tab-eg13-{{$loop->index}}" role="tabpanel">

                            <div class="row">
                                <div class="col-lg-6">

                                    <form method="post" action="{{ route('admin.design.work.update',$work->id) }}" autocomplete="off" enctype = "multipart/form-data">
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

                                        <div class="position-relative form-group">
                                            <label for="name" class="">
                                                Name
                                            </label>
                                            <input name="name" id="name-{{$loop->index}}" value="{{$work->name}}" type="text" class="form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                                            <i>name</i>
                                        </div>

                                        <div class="position-relative form-group">
                                            <label for="description" class="">
                                                Description
                                            </label>
                                            <textarea id="description-{{$loop->index}}" name="description" class="mb-2 form-control {{ $errors->has('description') ? ' is-invalid' : '' }}">{{$work->description}}</textarea>
                                            <i>description</i>
                                        </div>

                                        <div class="custom-file">
                                            <input type="file" name="design_work" id="cover_image-{{$loop->index}}" class="custom-file-input" id="validatedCustomFile" required>
                                            <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                                        </div>

                                        <div class="ln_solid"></div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-block btn-success mt-4">{{ __('SAVE') }}</button>
                                        </div>

                                    </form>

                                </div>

                                <div class="col-lg-6">

                                    @isset($work->upload)
                                        <img alt="image" width="850em" class="img-responsive" @isset($work->upload) src="{{Minio::getAdminFileUrl( $work->upload->pixels750 )}}" @endisset>
                                    @endisset

                                </div>

                            </div>
                        </div>
                    @endforeach
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
                        <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab" href="#albums">
                            <span>Albums ({{$design->albums->count()}})
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#clients">
                            <span>Client ({{$designContacts->count()}})</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#expenses">
                            <span>Expenses ({{$design->expenses->count()}})</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#journals">
                            <span>Journals ({{$design->journals->count()}})</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active" id="albums" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Albums
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
                                                        <th>Name</th>
                                                        <th>Date</th>
                                                        <th>Views</th>
                                                        <th>User</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($design->albums as $album)
                                                        <tr>
                                                            <td>{{$album->name}}</td>
                                                            <td>{{$album->date}}</td>
                                                            <td>{{$album->views}}</td>
                                                            <td>{{$album->user->name}}</td>
                                                            <td>
                                                                <span class="label {{$album->status->label}}">{{$album->status->name}}</span>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    @if($album->album_type == '6fdf4858-01ce-43ff-bbe6-827f09fa1cef')
                                                                        <a href="{{ route('admin.personal.album.show', $album->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                    @else
                                                                        <a href="{{ route('admin.client.proof.show', $album->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                    @endif
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

                    <div class="tab-pane" id="clients" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Clients
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
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($designContacts as $designContact)
                                                    <tr>
                                                        <td>@if($designContact->contact->title){{$designContact->contact->title->name}}.@endif {{$designContact->contact->first_name}} {{$designContact->contact->last_name}}</td>
                                                        <td>{{$designContact->contact->email}}</td>
                                                        <td>{{$designContact->contact->phone_number}}</td>
                                                        <td>
                                                            <span class="label {{$designContact->contact->status->label}}">{{$designContact->contact->status->name}}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <div class="btn-group">
                                                                <a href="{{ route('admin.contact.show', $designContact->contact->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                @if($designContact->contact->status->name == "Deleted")
                                                                    <a href=""{{ route('admin.contact.restore', $designContact->contact->id) }}" class="mb-2 mr-2 btn btn-warning">Restore</a>
                                                                @else
                                                                    <a href=""{{ route('admin.contact.delete', $designContact->contact->id) }}" class="mb-2 mr-2 btn btn-danger">Delete</a>
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

                    <div class="tab-pane" id="expenses" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Expenses
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
                                                    @foreach($design->expenses as $expense)
                                                    <tr>
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
                                                                <a href="{{ route('admin.expense.show', $expense->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
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
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane" id="journals" role="tabpanel">
                        <div class="card-hover-shadow card-border mb-3 card">
                            <div class="card-header">
                                <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                Journals
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
                                                    @foreach($design->journals as $journal)
                                                    <tr>
                                                        <td>{{$journal->name}}</td>
                                                        <td>{{$journal->date}}</td>
                                                        <td>{{$journal->views}}</td>
                                                        <td>{{$journal->user->name}}</td>

                                                        <td>
                                                            <p><span class="label {{$journal->status->label}}">{{$journal->status->name}}</span></p>
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
                </div>


            </div>

            <div class="card-footer">Footer</div>

        </div>




    </div>

</div>


@endsection

@include('admin.components.modals.add_client_proof')
@include('admin.components.modals.add_personal_album')
@include('admin.components.modals.edit_design')
@include('admin.components.modals.edit_design_cover_image')
@include('admin.components.modals.add_design_gallery')
{{-- @include('admin.components.modals.edit_client_proof')
@include('admin.components.modals.edit_client_proof_cover_image')
@include('admin.components.modals.edit_client_proof_download_settings')
@include('admin.components.modals.add_client_proof_email_restriction') --}}

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
            let date_set = {!! json_encode($design->date) !!};
            let substrings = date_set.split('-');
            var set_date = substrings[1] + '/' + substrings[2] + '/' + substrings[0];

            if(document.getElementById("design_date")){
                document.getElementById("design_date").value = set_date;
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
