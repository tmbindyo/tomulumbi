@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Products</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong>Products</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.product.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> New </a>
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
                                <button type="button" class="btn btn-warning m-r-sm">{{$productsStatusCount['previewProducts']}}</button>
                                Preview
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">{{$productsStatusCount['unavailableProducts']}}</button>
                                Unavailable
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger m-r-sm">{{$productsStatusCount['backOrderProducts']}}</button>
                                Back Order
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-info m-r-sm">{{$productsStatusCount['archivedProducts']}}</button>
                                Archived
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">{{$productsStatusCount['discontinuedProducts']}}</button>
                                Discontinued
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">{{$productsStatusCount['liveProducts']}}</button>
                                Live
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
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
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
                                    @foreach($products as $product)
                                        <tr class="gradeX">
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->order_products_count}}</td>
                                            <td>{{$product->views}}</td>
                                            <td>{{$product->user->name}}</td>
                                            <td>
                                                <span class="label {{$product->status->label}}">{{$product->status->name}}</span>
                                            </td>
                                            <td class="text-right">
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.product.show', $product->id) }}" class="btn-white btn btn-xs">View</a>
                                                    @if($product->status->name == "Deleted")
                                                        <a href="{{ route('admin.product.restore', $product->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                    @else
                                                        <a href="{{ route('admin.product.delete', $product->id) }}" class="btn-danger btn btn-xs">Delete</a>
                                                    @endif
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


@endsection
