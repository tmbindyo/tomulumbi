@extends('admin.layouts.app')

@section('title', 'Orders')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Orders</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <strong>Orders</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="{{route('admin.order.create')}}" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> Order </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        {{--  count metrics  --}}
        <div class="row">

            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            Pending Orders
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2 class="font-bold">{{$ordersStatusCount['pendingOrders']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            Awaiting Payment
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2 class="font-bold">{{$ordersStatusCount['awaitingPaymentOrders']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            Awaiting Fulfillment
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2 class="font-bold">{{$ordersStatusCount['awaitingFulfillmentOrders']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            Awaiting Shipment
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2 class="font-bold">{{$ordersStatusCount['awaitingShipmentOrders']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            Awaiting Pickup
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2 class="font-bold">{{$ordersStatusCount['awaitingPickupOrders']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            Partially Shipped
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2 class="font-bold">{{$ordersStatusCount['partiallyShippedOrders']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            Completed
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2 class="font-bold">{{$ordersStatusCount['completedOrders']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            Shipped
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2 class="font-bold">{{$ordersStatusCount['shippedOrders']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            Cancelled
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2 class="font-bold">{{$ordersStatusCount['cancelledOrders']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            Declined
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2 class="font-bold">{{$ordersStatusCount['declinedOrders']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            Refunded
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2 class="font-bold">{{$ordersStatusCount['refundedOrders']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            Disputed
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2 class="font-bold">{{$ordersStatusCount['disputedOrders']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            Manual Verification Required
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2 class="font-bold">{{$ordersStatusCount['manualVerificationRequiredOrders']}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            Partially Refunded
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2 class="font-bold">{{$ordersStatusCount['partiallyRefundedOrders']}}</h2>
                        </div>
                    </div>
                </div>
            </div>



        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Orders</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
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
                                    <tr class="gradeX">
                                        <td>
                                            {{$order->order_number}}
                                            <span><i data-toggle="tooltip" data-placement="right" title="{{$order->notes}}." class="fa fa-facebook-messenger"></i></span>
                                        </td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->total}}</td>
                                        <td>{{$order->paid}}</td>
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
                                                <a href="{{ route('admin.order.show', $order->id) }}" class="btn-white btn btn-xs">View</a>
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

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('js')


    <!-- Mainly scripts -->
    <script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
    <script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="{{ asset('inspinia') }}/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Color picker -->
    <script src="{{ asset('inspinia') }}/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('inspinia') }}/js/plugins/select2/select2.full.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){





            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                        customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );






        });

    </script>
    <script>
        $('.demo1').colorpicker();

        var divStyle = $('.back-change')[0].style;
        $('#demo_apidemo').colorpicker({
            color: divStyle.backgroundColor
        }).on('changeColor', function(ev) {
            divStyle.backgroundColor = ev.color.toHex();
        });
    </script>

@endsection




