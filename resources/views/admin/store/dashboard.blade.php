@extends('admin.components.main')

@section('title', 'Store Dashboard')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-graph icon-gradient bg-ripe-malin"></i>
                </div>
                <div>CRM Dashboard
                    <div class="page-title-subheading">Examples of just how powerful ArchitectUI really is!</div>
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
            </div>
        </div>
    </div>


    <div class="tabs-animation">
        <div class="row">
            <div class="col-lg-6 col-xl-4">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                            <i class="header-icon lnr-shirt mr-3 text-muted opacity-6"> </i>
                            Top Sellers
                        </div>
                        <div class="btn-actions-pane-right actions-icon-btn">
                            <div class="btn-group dropdown">
                                <button type="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" class="btn-icon btn-icon-only btn btn-link">
                                    <i class="pe-7s-menu btn-icon-wrapper"></i>
                                </button>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                    class="dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu">
                                    <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                    <button type="button" tabindex="0" class="dropdown-item">
                                        <i class="dropdown-icon lnr-inbox"> </i><span>Menus</span>
                                    </button>
                                    <button type="button" tabindex="0" class="dropdown-item">
                                        <i class="dropdown-icon lnr-file-empty"> </i><span>Settings</span>
                                    </button>
                                    <button type="button" tabindex="0" class="dropdown-item">
                                        <i class="dropdown-icon lnr-book"> </i><span>Actions</span>
                                    </button>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <div class="p-1 text-right">
                                        <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                        <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-chart widget-chart2 text-left p-0">
                        <div class="widget-chat-wrapper-outer">
                            <div class="widget-chart-content widget-chart-content-lg">
                                <div class="widget-chart-flex">
                                    <div class="widget-title opacity-5 text-muted text-uppercase">New accounts since 2018</div>
                                </div>
                                <div class="widget-numbers">
                                    <div class="widget-chart-flex">
                                        <div>
                                            <span class="opacity-10 text-success pr-2">
                                                <i class="fa fa-angle-up"></i>
                                            </span>
                                            <span>9</span>
                                            <small class="opacity-5 pl-1">%</small>
                                        </div>
                                        <div class="widget-title ml-2 font-size-lg font-weight-normal text-muted">
                                            <span class="text-danger pl-2">+14% failed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-chart-wrapper widget-chart-wrapper-xlg opacity-10 m-0">
                                <div id="dashboard-sparkline-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2 pb-0 card-body">
                        <h6 class="text-muted text-uppercase font-size-md opacity-9 mb-2 font-weight-normal">Authors</h6>
                        <div class="scroll-area-md shadow-overflow">
                            <div class="scrollbar-container">
                                <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <img width="38" class="rounded-circle" src="assets/images/avatars/1.jpg" alt="">
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Viktor Martin</div>
                                                    <div class="widget-subheading mt-1 opacity-10">
                                                        <div class="badge badge-pill badge-dark">$152</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="fsize-1 text-focus">
                                                        <small class="opacity-5 pr-1">$</small>
                                                        <span>752</span>
                                                        <small class="text-warning pl-2">
                                                            <i class="fa fa-angle-down"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <img width="38" class="rounded-circle" src="assets/images/avatars/2.jpg" alt="">
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Denis Delgado</div>
                                                    <div class="widget-subheading mt-1 opacity-10">
                                                        <div class="badge badge-pill badge-dark">$53</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="fsize-1 text-focus">
                                                        <small class="opacity-5 pr-1">$</small>
                                                        <span>587</span>
                                                        <small class="text-danger pl-2">
                                                            <i class="fa fa-angle-up"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <img width="38" class="rounded-circle" src="assets/images/avatars/3.jpg" alt="">
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Shawn Galloway</div>
                                                    <div class="widget-subheading mt-1 opacity-10">
                                                        <div class="badge badge-pill badge-dark">$239</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="fsize-1 text-focus">
                                                        <small class="opacity-5 pr-1">$</small>
                                                        <span>163</span>
                                                        <small class="text-muted pl-2">
                                                            <i class="fa fa-angle-down"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <img width="38" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Latisha Allison</div>
                                                    <div class="widget-subheading mt-1 opacity-10">
                                                        <div class="badge badge-pill badge-dark">$21</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="fsize-1 text-focus">
                                                        <small class="opacity-5 pr-1">$</small>
                                                        653
                                                        <small class="text-primary pl-2">
                                                            <i class="fa fa-angle-up"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <img width="38" class="rounded-circle" src="assets/images/avatars/5.jpg" alt="">
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Lilly-Mae White</div>
                                                    <div class="widget-subheading mt-1 opacity-10">
                                                        <div class="badge badge-pill badge-dark">$381</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="fsize-1 text-focus">
                                                        <small class="opacity-5 pr-1">$</small> 629
                                                        <small class="text-muted pl-2">
                                                            <i class="fa fa-angle-up"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <img width="38" class="rounded-circle" src="assets/images/avatars/8.jpg" alt="">
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Julie Prosser</div>
                                                    <div class="widget-subheading mt-1 opacity-10">
                                                        <div class="badge badge-pill badge-dark">$74</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="fsize-1 text-focus">
                                                        <small class="opacity-5 pr-1">$</small>462
                                                        <small class="text-muted pl-2">
                                                            <i class="fa fa-angle-down"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="border-bottom-0 list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <img width="38" class="rounded-circle" src="assets/images/avatars/8.jpg" alt="">
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Amin Hamer</div>
                                                    <div class="widget-subheading mt-1 opacity-10">
                                                        <div class="badge badge-pill badge-dark">$7</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="fsize-1 text-focus">
                                                        <small class="opacity-5 pr-1">$</small>
                                                        956
                                                        <small class="text-success pl-2">
                                                            <i class="fa fa-angle-up"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-block text-center rm-border card-footer">
                        <button class="btn btn-primary">
                            View complete report
                            <span class="text-white pl-2 opacity-3">
                                <i class="fa fa-arrow-right"></i>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-4">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                            <i class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Best Selling Products
                        </div>
                        <div class="btn-actions-pane-right actions-icon-btn">
                            <div class="btn-group dropdown">
                                <button data-toggle="dropdown" type="button" aria-haspopup="true"
                                    aria-expanded="false" class="btn-icon btn-icon-only btn btn-link">
                                    <i class="pe-7s-menu btn-icon-wrapper"></i></button>
                                <div tabindex="-1" role="menu" aria-hidden="true"
                                    class="dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu">
                                    <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                    <button type="button" tabindex="0" class="dropdown-item">
                                        <i class="dropdown-icon lnr-inbox"> </i><span>Menus</span>
                                    </button>
                                    <button type="button" tabindex="0" class="dropdown-item">
                                        <i class="dropdown-icon lnr-file-empty"> </i><span>Settings</span>
                                    </button>
                                    <button type="button" tabindex="0" class="dropdown-item">
                                        <i class="dropdown-icon lnr-book"> </i><span>Actions</span>
                                    </button>
                                    <div tabindex="-1" class="dropdown-divider"></div>
                                    <div class="p-1 text-right">
                                        <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                        <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-chart widget-chart2 text-left p-0">
                        <div class="widget-chat-wrapper-outer">
                            <div class="widget-chart-content widget-chart-content-lg">
                                <div class="widget-chart-flex">
                                    <div class="widget-title opacity-5 text-muted text-uppercase">Toshiba Laptops
                                    </div>
                                </div>
                                <div class="widget-numbers">
                                    <div class="widget-chart-flex">
                                        <div>
                                            <span class="opacity-10 text-warning pr-2">
                                                <i class="fa fa-dot-circle"></i>
                                            </span>
                                            <span>$984</span>
                                        </div>
                                        <div class="widget-title ml-2 font-size-lg font-weight-normal text-muted">
                                            <span class="text-success pl-2">+14</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget-chart-wrapper widget-chart-wrapper-xlg opacity-10 m-0">
                                <div id="dashboard-sparkline-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2 pb-0 card-body">
                        <h6 class="text-muted text-uppercase font-size-md opacity-9 mb-2 font-weight-normal">Top
                            Performing</h6>
                        <div class="scroll-area-md shadow-overflow">
                            <div class="scrollbar-container">
                                <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="icon-wrapper m-0">
                                                        <div class="progress-circle-wrapper">
                                                            <div class="progress-circle-wrapper">
                                                                <div class="circle-progress circle-progress-gradient">
                                                                    <small></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Asus Laptop</div>
                                                    <div class="widget-subheading mt-1 opacity-10">
                                                        <div class="badge badge-pill badge-dark">$152</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="fsize-1 text-focus">
                                                        <small class="opacity-5 pr-1">$</small>
                                                        <span>752</span>
                                                        <small class="text-warning pl-2">
                                                            <i class="fa fa-angle-down"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="icon-wrapper m-0">
                                                        <div class="progress-circle-wrapper">
                                                            <div class="progress-circle-wrapper">
                                                                <div class="circle-progress circle-progress-danger">
                                                                    <small></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Dell Inspire</div>
                                                    <div class="widget-subheading mt-1 opacity-10">
                                                        <div class="badge badge-pill badge-dark">$53</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="fsize-1 text-focus">
                                                        <small class="opacity-5 pr-1">$</small>
                                                        <span>587</span>
                                                        <small class="text-danger pl-2">
                                                            <i class="fa fa-angle-up"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="icon-wrapper m-0">
                                                        <div class="progress-circle-wrapper">
                                                            <div class="progress-circle-wrapper">
                                                                <div class="circle-progress circle-progress-primary">
                                                                    <small></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Lenovo IdeaPad</div>
                                                    <div class="widget-subheading mt-1 opacity-10">
                                                        <div class="badge badge-pill badge-dark">$239</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="fsize-1 text-focus">
                                                        <small class="opacity-5 pr-1">$</small>
                                                        <span>163</span>
                                                        <small class="text-muted pl-2">
                                                            <i class="fa fa-angle-down"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="icon-wrapper m-0">
                                                        <div class="progress-circle-wrapper">
                                                            <div class="progress-circle-wrapper">
                                                                <div class="circle-progress circle-progress-info">
                                                                    <small></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Asus Vivobook</div>
                                                    <div class="widget-subheading mt-1 opacity-10">
                                                        <div class="badge badge-pill badge-dark">$21</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="fsize-1 text-focus">
                                                        <small class="opacity-5 pr-1">$</small>
                                                        653
                                                        <small class="text-primary pl-2">
                                                            <i class="fa fa-angle-up"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="icon-wrapper m-0">
                                                        <div class="progress-circle-wrapper">
                                                            <div class="progress-circle-wrapper">
                                                                <div class="circle-progress circle-progress-warning">
                                                                    <small></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Apple Macbook</div>
                                                    <div class="widget-subheading mt-1 opacity-10">
                                                        <div class="badge badge-pill badge-dark">$381</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="fsize-1 text-focus">
                                                        <small class="opacity-5 pr-1">$</small>
                                                        629
                                                        <small class="text-muted pl-2">
                                                            <i class="fa fa-angle-up"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="icon-wrapper m-0">
                                                        <div class="progress-circle-wrapper">
                                                            <div class="progress-circle-wrapper">
                                                                <div class="circle-progress circle-progress-dark">
                                                                    <small></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">HP Envy 13"</div>
                                                    <div class="widget-subheading mt-1 opacity-10">
                                                        <div class="badge badge-pill badge-dark">$74</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="fsize-1 text-focus">
                                                        <small class="opacity-5 pr-1">$</small>
                                                        462
                                                        <small class="text-muted pl-2">
                                                            <i class="fa fa-angle-down"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="border-bottom-0 list-group-item">
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="icon-wrapper m-0">
                                                        <div class="progress-circle-wrapper">
                                                            <div class="progress-circle-wrapper">
                                                                <div class="circle-progress circle-progress-alternate">
                                                                    <small></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-left">
                                                    <div class="widget-heading">Gaming Laptop HP</div>
                                                    <div class="widget-subheading mt-1 opacity-10">
                                                        <div class="badge badge-pill badge-dark">$7</div>
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="fsize-1 text-focus">
                                                        <small class="opacity-5 pr-1">$</small>
                                                        956
                                                        <small class="text-success pl-2">
                                                            <i class="fa fa-angle-up"></i>
                                                        </small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-block text-center rm-border card-footer">
                        <button class="btn btn-primary">
                            View all participants
                            <span class="text-white pl-2 opacity-3">
                                <i class="fa fa-arrow-right"></i>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-4">
                <div class="mb-3 card">
                    <div class="rm-border pb-0 responsive-center card-header">
                        <div>
                            <h5 class="menu-header-title text-capitalize">Portfolio Performance</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-xl-12">
                            <div class="no-shadow rm-border bg-transparent widget-chart text-left card">
                                <div class="progress-circle-wrapper">
                                    <div class="circle-progress circle-progress-gradient-lg">
                                        <small></small>
                                    </div>
                                </div>
                                <div class="widget-chart-content">
                                    <div class="widget-subheading">Capital Gains</div>
                                    <div class="widget-numbers text-success"><span>$563</span></div>
                                    <div class="widget-description text-focus">
                                        Increased by
                                        <span class="text-warning pl-1">
                                            <i class="fa fa-angle-up"></i>
                                            <span class="pl-1">7.35%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-12">
                            <div class="card no-shadow rm-border bg-transparent widget-chart text-left mt-2">
                                <div class="progress-circle-wrapper">
                                    <div class="circle-progress circle-progress-gradient-alt-lg">
                                        <small></small>
                                    </div>
                                </div>
                                <div class="widget-chart-content">
                                    <div class="widget-subheading">Withdrawals</div>
                                    <div class="widget-numbers text-danger"><span>$194</span></div>
                                    <div class="widget-description opacity-8 text-focus">
                                        Down by
                                        <span class="text-success pl-1 pr-1">
                                            <i class="fa fa-angle-down"></i>
                                            <span class="pl-1">21.8%</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mx-auto mt-3">
                        <div role="group" class="btn-group-sm btn-group nav">
                            <a class="btn-shadow pl-3 pr-3 active btn btn-primary" data-toggle="tab" href="#sales-tab-1">Income</a>
                            <a class="btn-shadow pr-3 pl-3  btn btn-primary" data-toggle="tab" href="#sales-tab-2">Expenses</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="sales-tab-1">
                                <div class="text-center">
                                    <h5 class="menu-header-title">Target Sales</h5>
                                    <h6 class="menu-header-subtitle opacity-6">Total performance for this month</h6>
                                </div>
                                <div id="dashboard-sparklines-primary"></div>
                            </div>
                            <div class="tab-pane fade" id="sales-tab-2">
                                <div class="text-center">
                                    <h5 class="menu-header-title">Tabbed Content</h5>
                                    <h6 class="menu-header-subtitle opacity-6">Example of various options built with ArchitectUI</h6>
                                </div>
                                <div
                                    class="card-hover-shadow-2x widget-chart widget-chart2 bg-premium-dark text-left mt-3 card">
                                    <div class="widget-chart-content text-white">
                                        <div class="widget-chart-flex">
                                            <div class="widget-title">Sales</div>
                                            <div class="widget-subtitle opacity-7">Monthly Goals</div>
                                        </div>
                                        <div class="widget-chart-flex">
                                            <div class="widget-numbers text-success">
                                                <small>$</small>
                                                <span>976</span>
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
                                <div class="text-center mt-3">
                                    <button class="btn-pill btn-shadow btn-wide fsize-1 btn btn-success btn-lg">
                                        <span class="mr-2 opacity-7">
                                            <i class="icon icon-anim-pulse ion-ios-analytics-outline"></i>
                                        </span>
                                        <span class="mr-1">View Complete Report</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-xl-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Income Report</h5>
                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                            <div style="height: 227px;">
                                <canvas id="line-chart"></canvas>
                            </div>
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
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 65%;">
                                                </div>
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
            </div>
            <div class="col-lg-12 col-xl-6">
                <div class="main-card mb-3 card">
                    <div class="grid-menu grid-menu-2col">
                        <div class="no-gutters row">
                            <div class="col-sm-6">
                                <div class="widget-chart widget-chart-hover">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg bg-primary"></div>
                                        <i class="lnr-cog text-primary"></i>
                                    </div>
                                    <div class="widget-numbers">45.8k</div>
                                    <div class="widget-subheading">Total Views</div>
                                    <div class="widget-description text-success">
                                        <i class="fa fa-angle-up"></i>
                                        <span class="pl-1">175.5%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="widget-chart widget-chart-hover">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg bg-info"></div>
                                        <i class="lnr-graduation-hat text-info"></i>
                                    </div>
                                    <div class="widget-numbers">63.2k</div>
                                    <div class="widget-subheading">Bugs Fixed</div>
                                    <div class="widget-description text-info">
                                        <i class="fa fa-arrow-right"></i>
                                        <span class="pl-1">175.5%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="widget-chart widget-chart-hover">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg bg-danger"></div>
                                        <i class="lnr-laptop-phone text-danger"></i>
                                    </div>
                                    <div class="widget-numbers">5.82k</div>
                                    <div class="widget-subheading">Reports Submitted</div>
                                    <div class="widget-description text-primary">
                                        <span class="pr-1">54.1%</span>
                                        <i class="fa fa-angle-up"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="widget-chart widget-chart-hover br-br">
                                    <div class="icon-wrapper rounded-circle">
                                        <div class="icon-wrapper-bg bg-success"></div>
                                        <i class="lnr-screen"></i>
                                    </div>
                                    <div class="widget-numbers">17.2k</div>
                                    <div class="widget-subheading">Profiles</div>
                                    <div class="widget-description text-warning">
                                        <span class="pr-1">175.5%</span>
                                        <i class="fa fa-arrow-left"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Active Users
                        <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                                <button class="active btn btn-focus">Last Week</button>
                                <button class="btn btn-focus">All Month</button>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Name</th>
                                    <th class="text-center">City</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Sales</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center text-muted">#345</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img width="40" class="rounded-circle" src="assets/images/avatars/4.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">John Doe</div>
                                                    <div class="widget-subheading opacity-7">Web Developer</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">Madrid</td>
                                    <td class="text-center">
                                        <div class="badge badge-warning">Pending</div>
                                    </td>
                                    <td class="text-center" style="width: 150px;">
                                        <div class="pie-sparkline">2,4,6,9,4</div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center text-muted">#347</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img width="40" class="rounded-circle" src="assets/images/avatars/3.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Ruben Tillman</div>
                                                    <div class="widget-subheading opacity-7">Etiam sit amet orci eget</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">Berlin</td>
                                    <td class="text-center">
                                        <div class="badge badge-success">Completed</div>
                                    </td>
                                    <td class="text-center" style="width: 150px;">
                                        <div id="sparkline-chart4"></div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="PopoverCustomT-2" class="btn btn-primary btn-sm">Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center text-muted">#321</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img width="40" class="rounded-circle" src="assets/images/avatars/2.jpg" alt="">
                                                    </div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Elliot Huber</div>
                                                    <div class="widget-subheading opacity-7">Lorem ipsum dolor sic
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">London</td>
                                    <td class="text-center">
                                        <div class="badge badge-danger">In Progress</div>
                                    </td>
                                    <td class="text-center" style="width: 150px;">
                                        <div id="sparkline-chart8"></div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="PopoverCustomT-3" class="btn btn-primary btn-sm">Details</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center text-muted">#55</td>
                                    <td>
                                        <div class="widget-content p-0">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left mr-3">
                                                    <div class="widget-content-left">
                                                        <img width="40" class="rounded-circle" src="assets/images/avatars/1.jpg" alt=""></div>
                                                </div>
                                                <div class="widget-content-left flex2">
                                                    <div class="widget-heading">Vinnie Wagstaff</div>
                                                    <div class="widget-subheading opacity-7">UI Designer</div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">Amsterdam</td>
                                    <td class="text-center">
                                        <div class="badge badge-info">On Hold</div>
                                    </td>
                                    <td class="text-center" style="width: 150px;">
                                        <div id="sparkline-chart9"></div>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" id="PopoverCustomT-4" class="btn btn-primary btn-sm">Details</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-block text-center card-footer">
                        <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger">
                            <i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                        <button class="btn-wide btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mb-3">
            <h5 class="menu-header-title text-capitalize mb-3 fsize-3">Top Sellers Cards</h5>
            <div role="group" class="mb-3 btn-group-lg btn-group">
                <button type="button" class="btn-shadow active btn btn-primary">Hour</button>
                <button type="button" class="btn-shadow  btn btn-primary">Day</button>
                <button type="button" class="btn-shadow  btn btn-primary">Week</button>
                <button type="button" class="btn-shadow  btn btn-primary">Month</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-6 col-xl-4">
                <div class="mb-3 profile-responsive card">
                    <div class="dropdown-menu-header">
                        <div class="dropdown-menu-header-inner bg-dark">
                            <div class="menu-header-image opacity-2"
                                style="background-image: url('assets/images/dropdown-header/abstract2.jpg');"></div>
                            <div class="menu-header-content btn-pane-right">
                                <div class="avatar-icon-wrapper mr-3 avatar-icon-xl btn-hover-shine">
                                    <div class="avatar-icon rounded">
                                        <img src="assets/images/avatars/3.jpg" alt="Avatar 5">
                                    </div>
                                </div>
                                <div>
                                    <h5 class="menu-header-title">Jeff Walberg</h5>
                                    <h6 class="menu-header-subtitle">Lead UX Developer</h6>
                                </div>
                                <div class="menu-header-btn-pane">
                                    <button class="btn btn-success">View Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="widget-content pt-1 pl-0 pr-0">
                                <div class="text-center">
                                    <h5 class="widget-heading opacity-4 mb-0">Month Totals</h5>
                                    <h6 class="mt-3 mb-3">
                                        <span class="pr-2">
                                            <b class="text-danger">12</b> new leads,
                                        </span>
                                        <span><b class="text-success">$56.24</b> in sales</span>
                                    </h6>
                                    <button class="btn-wide btn-pill btn btn-outline-primary">Full Report</button>
                                </div>
                            </div>
                        </li>
                        <li class="p-0 list-group-item">
                            <div class="grid-menu grid-menu-2col">
                                <div class="no-gutters row">
                                    <div class="col-sm-6">
                                        <button class="btn-icon-vertical btn-square btn-transition br-bl btn btn-outline-link">
                                            <i class="lnr-license btn-icon-wrapper btn-icon-lg mb-3"> </i> View Profile
                                        </button>
                                    </div>
                                    <div class="col-sm-6">
                                        <button class="btn-icon-vertical btn-square btn-transition br-br btn btn-outline-link">
                                            <i class="lnr-music-note btn-icon-wrapper btn-icon-lg mb-3"> </i> Leads Generated
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-lg-6 col-xl-4">
                <div class="mb-3 profile-responsive card">
                    <div class="dropdown-menu-header">
                        <div class="dropdown-menu-header-inner bg-dark">
                            <div class="menu-header-image opacity-4"
                                style="background-image: url('assets/images/dropdown-header/city1.jpg');"></div>
                            <div class="menu-header-content btn-pane-right">
                                <div class="avatar-icon-wrapper mr-3 avatar-icon-xl btn-hover-shine">
                                    <div class="avatar-icon rounded">
                                        <img src="assets/images/avatars/8.jpg" alt="Avatar 5">
                                    </div>
                                </div>
                                <div>
                                    <h5 class="menu-header-title">John Rosenberg</h5>
                                    <h6 class="menu-header-subtitle">Short profile description</h6>
                                </div>
                                <div class="menu-header-btn-pane">
                                    <button type="button" class="btn-wide btn-shadow btn-pill btn btn-warning">Refresh</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="p-0 list-group-item">
                            <div class="widget-content">
                                <div class="text-center">
                                    <canvas id="doughnut-chart-2"></canvas>
                                </div>
                            </div>
                        </li>
                        <li class="p-0 list-group-item">
                            <div class="grid-menu grid-menu-2col">
                                <div class="no-gutters row">
                                    <div class="col-sm-6">
                                        <div class="p-1">
                                            <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-focus">
                                                <i class="lnr-sun text-primary opacity-7 btn-icon-wrapper mb-2"> </i> View Profile
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="p-1">
                                            <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-focus">
                                                <i class="lnr-magic-wand text-primary opacity-7 btn-icon-wrapper mb-2"> </i> View Leads
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-lg-12 col-xl-4">
                <div class="mb-3 profile-responsive card">
                    <div class="dropdown-menu-header">
                        <div class="dropdown-menu-header-inner bg-dark">
                            <div class="menu-header-image opacity-1"
                                style="background-image: url('assets/images/dropdown-header/abstract3.jpg');"></div>
                            <div class="menu-header-content btn-pane-right">
                                <div class="avatar-icon-wrapper mr-3 avatar-icon-xl btn-hover-shine">
                                    <div class="avatar-icon rounded">
                                        <img src="assets/images/avatars/1.jpg" alt="Avatar 5"></div>
                                </div>
                                <div>
                                    <h5 class="menu-header-title">Ruben Tillman</h5>
                                    <h6 class="menu-header-subtitle">Etiam sit amet orci eget</h6>
                                </div>
                                <div class="menu-header-btn-pane">
                                    <button class="btn btn-success">View Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="widget-content pt-4 pb-4 pr-1 pl-1">
                                <div class="text-center">
                                    <h5 class="mb-0">
                                        <span class="pr-1">
                                            <b class="text-danger">12</b> new leads,
                                        </span>
                                        <span><b class="text-success">$56.24</b> in sales</span>
                                    </h5>
                                </div>
                            </div>
                        </li>
                        <li class="p-0 list-group-item">
                            <div class="grid-menu grid-menu-2col">
                                <div class="no-gutters row">
                                    <div class="col-sm-6">
                                        <div class="p-1">
                                            <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-dark">
                                                <i class="lnr-lighter text-dark opacity-7 btn-icon-wrapper mb-2"></i> Automation
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="p-1">
                                            <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                <i class="lnr-construction text-danger opacity-7 btn-icon-wrapper mb-2"></i> Reports
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="p-1">
                                            <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success">
                                                <i class="lnr-bus text-success opacity-7 btn-icon-wrapper mb-2"></i> Activity
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="p-1">
                                            <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-focus">
                                                <i class="lnr-gift text-focus opacity-7 btn-icon-wrapper mb-2"> </i>Settings
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection
