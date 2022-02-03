@extends('admin.components.main')

@section('title', $type->name.' Type')

@section('content')

    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>
                        <a href="#">
                            Type
                        </a>
                    </div>
                </div>
                <div class="page-title-actions">
                    <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
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
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-inbox"></i>
                                        <span>
                                            Inbox
                                        </span>
                                        <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span>
                                            Book
                                        </span>
                                        <div class="ml-auto badge badge-pill badge-danger">5</div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-picture"></i>
                                        <span>
                                            Picture
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                        <i class="nav-link-icon lnr-file-empty"></i>
                                        <span>
                                            File Disabled
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- cooking style --}}
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Type</h5>
                        <form method="post" action="{{ route('admin.type.update',$type->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                <label for="name" class="">Name</label>
                                <input name="name" id="name" value="{{$type->name}}" type="text" class="form-control">
                                <i>name</i>
                            </div>

                            <hr>
                            <button type="submit" class="mt-1 btn btn-success btn-lg btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6 col-xl-6">
                        <div class="card mb-3 widget-content bg-midnight-bloom">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Creator</div>
                                    <div class="widget-subheading">{{$type->user->name}}</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span><i class="fa fa-user fa-3x"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card mb-3 widget-content bg-arielle-smile">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Status</div>
                                    <div class="widget-subheading">{{$type->status->name}}</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span><i class="fa fa-ellipsis-v fa-3x"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card mb-3 widget-content bg-grow-early">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Created</div>
                                    <div class="widget-subheading">{{$type->created_at}}</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-white"><span><i class="fa fa-plus-square fa-3x"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-6">
                        <div class="card mb-3 widget-content bg-premium-dark">
                            <div class="widget-content-wrapper text-white">
                                <div class="widget-content-left">
                                    <div class="widget-heading">Last Updated</div>
                                    <div class="widget-subheading">{{$type->updated_at}}</div>
                                </div>
                                <div class="widget-content-right">
                                    <div class="widget-numbers text-warning"><span><i class="fa fa-edit fa-3x"></i></span></div>
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
                                <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab" href="#sub-types">
                                    <span>Sub Types ({{$type->sub_types->count()}})
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#products">
                                    <span>Products ({{$type->products->count()}})</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="sub-types" role="tabpanel">
                                <div class="card-hover-shadow card-border mb-3 card">
                                    <div class="card-header">
                                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                        Sub Types ({{$type->sub_types->count()}})
                                        <div class="btn-actions-pane-right">
                                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addSubType"><i class="fa fa-plus"></i> Sub Type</button>
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
                                                                <th>Description</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th width="13em">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($type->sub_types as $typeSubType)
                                                                <tr>
                                                                    <td>{{$typeSubType->name}}</td>
                                                                    <td>{{$typeSubType->description}}</td>
                                                                    <td>{{$typeSubType->user->name}}</td>

                                                                    <td>
                                                                        <span class="label {{$typeSubType->status->label}}">{{$typeSubType->status->name}}</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <div class="btn-group">
                                                                            <a href="{{ route('admin.sub.type.show', $typeSubType->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Description</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th width="13em">Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane" id="products" role="tabpanel">
                                <div class="card-hover-shadow card-border mb-3 card">
                                    <div class="card-header">
                                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                        Products ({{$type->products->count()}})
                                        <div class="btn-actions-pane-right">
                                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addProduct"><i class="fa fa-plus"></i> Product</button>
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
                                                                <th>Sales</th>
                                                                <th>Views</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($type->products as $product)
                                                            <tr>
                                                                <td>{{$product->name}}</td>
                                                                <td>{{$product->order_products_count}}</td>
                                                                <td>{{$product->views}}</td>
                                                                <td>{{$product->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$product->status->label}}">{{$product->status->name}}</span>
                                                                </td>
                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.product.show', $product->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Sales</th>
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

            </div>
        </div>
        {{-- action types --}}

    </div>

@endsection


@include('admin.components.modals.add_sub_type')
@include('admin.components.modals.add_product')
