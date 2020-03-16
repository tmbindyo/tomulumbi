@extends('admin.layouts.app')

@section('title', ' Quote')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-5">
            <h2>Quote</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li>
                    <a href="#">CRM</a>
                </li>
                <li>
                    <a href="{{route('admin.quotes')}}">Quotes</a>
                </li>
                <li class="active">
                    <strong>Quote</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-7">
            <div class="title-action">
                <a href="{{route('admin.quote.edit',$quote->id)}}" class="btn btn-warning btn-outline"><i class="fa fa-pencil"></i> Edit </a>
                <a href="{{route('admin.quote.print',$quote->id)}}" class="btn btn-warning btn-outline"><i class="fa fa-print"></i> Print </a>
                @if($quote->deal_id)
                    <a href="{{route('admin.deal.show',$quote->deal_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Deal </a>
                @endif
                @if($quote->is_draft == 1)
                    <a href="{{route('admin.quote.edit',$quote->id)}}" class="btn btn-success btn-outline"><i class="fa fa-pencil"></i> Accepted </a>
                    <a href="{{route('admin.quote.edit',$quote->id)}}" class="btn btn-warning btn-outline"><i class="fa fa-pencil"></i> Rejected </a>
                    <a href="{{route('admin.quote.edit',$quote->id)}}" class="btn btn-danger btn-outline"><i class="fa fa-pencil"></i> Cancelled </a>
                    <a href="{{route('admin.quote.send',$quote->id)}}" class="btn btn-info btn-outline"><i class="fa fa-mail-forward"></i> Send</a>
                    <a href="{{route('admin.quote.print',$quote->id)}}" target="_blank" class="btn btn-success btn-outline"><i class="fa fa-print"></i> Print </a>
                @endif
                <a href="{{route('admin.quote.payment.create',$quote->id)}}" class="btn btn-success btn-outline"><i class="fa fa-plus"></i> Payment </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">



        <div class="row">
            <div class="col-md-9">

                <div class="ibox">
                    <div class="ibox-title">
                        <span class="pull-right">(<strong>{{$quote->quote_items_count}}</strong>) items</span>
                        <h5>Items</h5>
                    </div>
                    @foreach($quote->quote_items as $product)
                        <div class="ibox-content">


                        <div class="table-responsive">
                            <table class="table shoping-cart-table">

                                <tbody>
                                <tr>
                                    <td width="90">
                                        <div class="cart-product-imitation">
                                        </div>
                                    </td>
                                    <td class="desc">
                                        <h3>
                                            <a href="#"> {{$product->product}} </a>

                                        </h3>
                                    </td>

                                    <td>
                                        <h4>
                                            {{$product->rate}}
                                        </h4>
                                    </td>
                                    <td width="65">
                                        <input type="text" class="form-control" value="{{$product->quantity}}" readonly>
                                    </td>
                                    <td>
                                        <h4>
                                            {{$product->amount}}
                                        </h4>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    @endforeach
                    <div class="ibox-content">


                    </div>
                </div>

            </div>
            <div class="col-md-3">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Cart Summary</h5>
                    </div>
                    <div class="ibox-content">
                        <span>
                            Total
                        </span>
                        <h2 class="font-bold">
                            Ksh. {{$quote->total}}
                        </h2>

                        <hr/>
                        <span>
                            Tax
                        </span>
                        <h2 class="font-bold">
                            Ksh. {{$quote->tax}}
                        </h2>

                        <hr/>
                        <span>
                            Discount
                        </span>
                        <h2 class="font-bold">
                            Ksh. {{$quote->discount}}
                        </h2>

                        <hr/>
                        <span class="text-muted small">
                            @if($quote->deal->organization)
                                {{--  if organization  --}}
                                <address>
                                    <strong>{{$quote->deal->organization->name}}</strong><br>
                                    112 Street Avenu, 1080<br>
                                    Miami, CT 445611<br>
                                    <abbr title="Phone">P:</abbr> {{$quote->deal->organization->phone_number}}<br>
                                    <abbr title="Email">E:</abbr> {{$quote->deal->organization->email}}
                                </address>
                            @elseif($quote->deal->contact->organization_id == 1)
                                <address>
                                    <strong>{{$quote->deal->contact->name}}</strong><br>
                                    112 Street Avenu, 1080<br>
                                    Miami, CT 445611<br>
                                    <abbr title="Phone">P:</abbr> {{$quote->deal->contact->phone_number}}<br>
                                    <abbr title="Email">E:</abbr> {{$quote->deal->contact->email}}
                                </address>
                            @else
                                {{--  if not organization  --}}
                                <address>
                                    <strong>{{$quote->deal->contact->first_name}} {{$quote->deal->contact->last_name}}</strong><br>
                                    112 Street Avenu, 1080<br>
                                    Miami, CT 445611<br>
                                    <abbr title="Phone">P:</abbr> {{$quote->deal->contact->phone_number}}<br>
                                    <abbr title="Email">E:</abbr> {{$quote->deal->contact->email}}
                                </address>
                            @endif
                        </span>
                        <div class="m-t-sm">
                            <div class="btn-group">

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>




    </div>

    {{--  details  --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInUp">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="m-b-md">
                                </div>
                                <dl class="dl-horizontal">
                                    <dt>Status:</dt> <dd><span class="label {{$quote->status->label}}">{{$quote->status->name}}</span></dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <dl class="dl-horizontal">

                                    <dt>Created by:</dt> <dd>{{$quote->user->name}}</dd>
                                </dl>
                            </div>
                            <div class="col-lg-7" id="cluster_info">
                                <dl class="dl-horizontal" >

                                    <dt>Last Updated:</dt> <dd>{{$quote->updated_at}}</dd>
                                    <dt>Created:</dt> <dd> {{$quote->created_at}} </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="row m-t-sm">
                            <div class="col-lg-12">
                            <div class="panel blank-panel">
                            <div class="panel-heading">
                                <div class="panel-options">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#payments" data-toggle="tab">Payments</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body">

                                <div class="tab-content">
                                    <div class="tab-pane active" id="payments">
                                        <div class="table-responsive">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Reference</th>
                                                            <th>Amount</th>
                                                            <th>Initial</th>
                                                            <th>Subsequent</th>
                                                            <th>Date</th>
                                                            <th>Account</th>
                                                            <th>For</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($payments as $payment)
                                                            <tr class="gradeX">
                                                                <td>
                                                                    {{$payment->reference}}
                                                                    <span><i data-toggle="tooltip" data-placement="right" title="{{$payment->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                                </td>
                                                                <td>{{$payment->amount}}</td>
                                                                <td>{{$payment->initial_balance}}</td>
                                                                <td>{{$payment->current_balance}}</td>
                                                                <td>{{$payment->date}}</td>
                                                                <td>{{$payment->account->name}}</td>
                                                                <td>
                                                                    @if($payment->is_order == 1)
                                                                        <span class="label label-success">Order: {{$payment->order->reference}}</span>
                                                                    @elseif($payment->is_quote == 1)
                                                                        <span class="label label-success">Quote: {{$payment->quote->reference}}</span>
                                                                    @elseif($payment->is_asset_action == 1)
                                                                        <span class="label label-success">Asset Action: {{$payment->asset_action->reference}}</span>
                                                                    @elseif($payment->is_loan == 1)
                                                                        <span class="label label-success">Loan: {{$payment->loan->reference}}</span>
                                                                    @endif
                                                                </td>
                                                                <td>{{$payment->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$payment->status->label}}">{{$payment->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.payment.show', $payment->id) }}" class="btn-default btn btn-xs">Show</a>
                                                                        @if($payment->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.payment.restore', $payment->id) }}" class="btn-warning btn btn-xs">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.payment.delete', $payment->id) }}" class="btn-danger btn btn-xs">Delete</a>
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
                                                            <th>Initial</th>
                                                            <th>Subsequent</th>
                                                            <th>Date</th>
                                                            <th>Account</th>
                                                            <th>For</th>
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
@endsection
