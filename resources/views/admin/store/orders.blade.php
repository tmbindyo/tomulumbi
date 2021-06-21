@extends('admin.components.main')

@section('title','Orders')

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
                            Orders
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
                    {{-- <a href="{{route('admin.order.create')}}" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Order</a> --}}
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-header">
                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                        Orders ({{$orders->count()}})
                        <div class="btn-actions-pane-right">
                            <a href="{{route('admin.order.create')}}" class="btn btn-success btn-lg"><i class="fa fa-plus"></i> Order</a>
                        </div>
                    </div>

                    <div class="card-body"><h5 class="card-title">Orders</h5>
                        <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Reference</th>
                                    <th>Created</th>
                                    <th>Total</th>
                                    <th>Paid</th>
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
                                        <td>{{ number_format($order->total, 2) }}</td>
                                        <td>{{ number_format($order->paid, 2) }}</td>
                                        <td>{{ number_format($order->discount, 2) }}</td>
                                        <td>{{ number_format($order->refund, 2) }}</td>
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
                                    <th>Paid</th>
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

                    <div class="card-footer">Footer</div>
                </div>
            </div>
        </div>
        {{-- action types --}}

    </div>

@endsection
