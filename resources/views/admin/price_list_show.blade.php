@extends('admin.layouts.app')

@section('title', 'Price List Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Price Lists</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.products')}}">Products</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.product.show',$priceList->product_id)}}">Product</a></strong>
                </li>
                <li class="active">
                    <strong>Price List</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">

        {{--  view graphy  --}}
        <div class="row">
            <div class="">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>
                            Orders X Sales
                        </h5>
                    </div>
                    <div class="ibox-content">
                        <div>
                            <canvas id="lineChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--  Edit price list  --}}
        <div class="row">
            <div class="col-lg-6">
                <div class="ibox">
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.price.list.update',$priceList->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                    <div class="">
                                        <div class="has-warning">
                                            <input type="number" id="price" name="price" required="required" value="{{$priceList->price}}" class="form-control input-lg">
                                            <i>Give your price list a price</i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="">
                                        <div class="has-warning">
                                            <textarea class="form-control" rows="5" name="description" >{{$priceList->description}}</textarea>
                                            <i>Give your price list a price</i>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select required="required" name="sub_type" class="select2_demo_sub_types form-control input-lg">
                                        {{--  <select class="select2_demo_sub_type form-control m-b input-lg" name="sub_type">  --}}
                                            <option></option>
                                            @foreach($subTypes as $subType)
                                                <option @if($priceList->sub_type_id = $subType->id)selected @endif value="{{$subType->id}}">[{{$subType->type->name}}]{{$subType->name}}</option>
                                            @endforeach
                                        </select>
                                        <i>You can take the collection online/offline quickly. Hidden collections can only be seen by you.</i>
                                    </div>
                                    <br>
                                    <div class="has-warning">
                                        <select required="required" name="size" class="select2_demo_size form-control input-lg">
                                            @foreach($sizes as $size)
                                                <option @if($priceList->size_id = $size->id)selected @endif value="{{$size->id}}">{{$size->size}}</option>
                                            @endforeach
                                        </select>
                                        <i>You can take the collection online/offline quickly. Hidden collections can only be seen by you.</i>
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
        </div>

        {{--    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12 col-md-12">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#orders"> <i class="fa fa-cogs"></i> Orders</a></li>
                        <li class=""><a data-toggle="tab" href="#sales"><i class="fa fa-bookmark"></i> Sales</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="orders" class="tab-pane active">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                        <tr>
                                            <th>Paid</th>
                                            <th>Reference</th>
                                            <th>Date</th>
                                            <th>Due Date</th>
                                            <th>Contact</th>
                                            <th>Status</th>
                                            <th width="13em">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($orders as $order)
                                            <tr class="gradeX">
                                                <td>
                                                @if($order->is_paid == True)
                                                        <p><span class="badge badge-primary">Paid</span></p>
                                                    @else
                                                        <p><span class="badge badge-info">Un Paid</span></p>
                                                    @endif
                                                </td>
                                                <td>{{$order->order->order_number}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>{{$order->order->due_date}}</td>
                                                <td>{{$order->order->contact->first_name}} {{$order->order->contact->last_name}}</td>
                                                <td>
                                                    <span class="label {{$order->status->label}}">{{$order->status->name}}</span>
                                                </td>
                                                <td class="text-right">
                                                    {{--                                todo check why route is album but id is album type--}}
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.client.proof.show', $order->id) }}" class="btn-white btn btn-xs">View</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Paid</th>
                                            <th>Reference</th>
                                            <th>Date</th>
                                            <th>Due Date</th>
                                            <th>Contact</th>
                                            <th width="17em">Status</th>
                                            <th width="13em">Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div id="sales" class="tab-pane">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                                        <thead>
                                        <tr>
                                            <th>Paid</th>
                                            <th>Reference</th>
                                            <th>Date</th>
                                            <th>Due Date</th>
                                            <th>Contact</th>
                                            <th>Status</th>
                                            <th width="13em">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sales as $order)
                                            <tr class="gradeX">
                                                <td>
                                                @if($order->is_paid == True)
                                                        <p><span class="badge badge-primary">Paid</span></p>
                                                    @else
                                                        <p><span class="badge badge-info">Un Paid</span></p>
                                                    @endif
                                                </td>
                                                <td>{{$order->order->order_number}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>{{$order->order->due_date}}</td>
                                                <td>{{$order->order->contact->first_name}} {{$order->order->contact->last_name}}</td>
                                                <td>
                                                    <span class="label {{$order->status->label}}">{{$order->status->name}}</span>
                                                </td>
                                                <td class="text-right">
                                                    {{--                                todo check why route is album but id is album type--}}
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.client.proof.show', $order->id) }}" class="btn-white btn btn-xs">View</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Paid</th>
                                            <th>Reference</th>
                                            <th>Date</th>
                                            <th>Due Date</th>
                                            <th>Contact</th>
                                            <th width="17em">Status</th>
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
        </div>
    </div>

@endsection

@section('js')

{{-- download x views line chart  --}}
<script>
    $(function () {
        var lineData = {
            labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
            datasets: [
                {
                    label: "Example dataset",
                    fillColor: "rgba(220,220,220,0.5)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [
                        {{$ordersAndSales['orders']['1']}},
                        {{$ordersAndSales['orders']['2']}},
                        {{$ordersAndSales['orders']['3']}},
                        {{$ordersAndSales['orders']['4']}},
                        {{$ordersAndSales['orders']['5']}},
                        {{$ordersAndSales['orders']['6']}},
                        {{$ordersAndSales['orders']['7']}},
                        {{$ordersAndSales['orders']['8']}},
                        {{$ordersAndSales['orders']['9']}},
                        {{$ordersAndSales['orders']['10']}},
                        {{$ordersAndSales['orders']['11']}},
                        {{$ordersAndSales['orders']['12']}}
                    ]
                },
                {
                    label: "Example dataset",
                    fillColor: "rgba(26,179,148,0.5)",
                    strokeColor: "rgba(26,179,148,0.7)",
                    pointColor: "rgba(26,179,148,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(26,179,148,1)",
                    data: [
                        {{$ordersAndSales['sales']['1']}},
                        {{$ordersAndSales['sales']['2']}},
                        {{$ordersAndSales['sales']['3']}},
                        {{$ordersAndSales['sales']['4']}},
                        {{$ordersAndSales['sales']['5']}},
                        {{$ordersAndSales['sales']['6']}},
                        {{$ordersAndSales['sales']['7']}},
                        {{$ordersAndSales['sales']['8']}},
                        {{$ordersAndSales['sales']['9']}},
                        {{$ordersAndSales['sales']['10']}},
                        {{$ordersAndSales['sales']['11']}},
                        {{$ordersAndSales['sales']['12']}}
                    ]
                }
            ]
        };

        var lineOptions = {
            scaleShowGridLines: true,
            scaleGridLineColor: "rgba(0,0,0,.05)",
            scaleGridLineWidth: 1,
            bezierCurve: true,
            bezierCurveTension: 0.4,
            pointDot: true,
            pointDotRadius: 4,
            pointDotStrokeWidth: 1,
            pointHitDetectionRadius: 20,
            datasetStroke: true,
            datasetStrokeWidth: 2,
            datasetFill: true,
            responsive: true,
        };


        var ctx = document.getElementById("lineChart").getContext("2d");
        var myNewChart = new Chart(ctx).Line(lineData, lineOptions);
    });
</script>
@endsection
