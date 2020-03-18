@extends('admin.layouts.app')

@section('title','Order '.$order->order_number)

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-6">
            <h2>Orders</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li>
                    <strong>Settings</strong>
                </li>
                <li class="active">
                    <strong>Order</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-6">
            <div class="title-action">
                <a href="{{route('admin.order.edit',$order->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-pencil"></i> Edit </a>
                <a href="{{route('admin.contact.show',$order->contact_id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Contact </a>
                <a href="{{route('admin.order.print',$order->id)}}" class="btn btn-primary btn-outline"><i class="fa fa-eye"></i> Print </a>
                <a href="{{route('admin.order.payment.create',$order->id)}}" class="btn btn-success btn-outline"><i class="fa fa-plus"></i> Payment </a>
            </div>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeIn">


        {{--  order products  --}}
        <div class="row">
            <div class="col-md-9">

                <div class="ibox">
                    <div class="ibox-title">
                        <span class="pull-right">(<strong>{{$orderArray['orderProductsCount']}}</strong>) items</span>
                        <h5>Items in your cart</h5>
                    </div>
                    @foreach($order->order_products as $item)
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
                                                <a href="{{route('admin.price.list.show',$item->price_list->id)}}" class="text-navy">
                                                    {{$item->product->name}}
                                                </a>
                                            </h3>
                                            <p class="small">
                                                {{$item->product->description}}
                                            </p>
                                            <dl class="small m-b-none">
                                                <dt>Description lists</dt>
                                                <dd>[{{$item->price_list->size->size}} {{$item->price_list->sub_type->name}}] ({{$item->price_list->product->status->name}}).</dd>
                                            </dl>

                                            @if($order->is_client == 0)
                                                <div class="m-t-sm">
                                                    <a href="#" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
                                                </div>
                                            @endif
                                        </td>

                                        <td width="65">
                                            <input type="text" class="form-control" value="{{$item->quantity}}">
                                        </td>
                                        <td>
                                            <h4>
                                                ${{$item->rate}}
                                            </h4>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    @endforeach

                    <div class="ibox-content">

                        <button class="btn btn-primary btn-outline pull-right"><i class="fa fa fa-send-o"></i> Reminder Email</button>
                        <button class="btn btn-warning btn-outline"><i class="fa fa-check"></i> Mark as Sale</button>

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
                            ${{$order->total}}
                        </h2>

                        <hr/>
                        <span class="text-muted small">
                            *For United States, France and Germany applicable sales tax will be applied
                        </span>
                        <div class="m-t-sm">
                            <div class="btn-group">
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Checkout</a>
                                <a href="#" class="btn btn-white btn-sm"> Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Order Status</h5>
                    </div>
                    <div class="ibox-content text-center">
                        <form method="post" action="{{ route('admin.order.update.status',$order->id) }}" autocomplete="off">
                            @csrf
                            <div class="has-warning">
                                <select required="required" name="status" class="form-control input-lg" >
                                    <option>Select Status</option>
                                    @foreach($orderStatuses as $orderStatus)
                                        <option @if($orderStatus->id == $order->status_id)selected @endif value="{{$orderStatus->id}}">{{$orderStatus->name}}</option>
                                    @endforeach
                                </select>
{{--                                <i>Tags: What kind of collection is this? Separate your tags with a comma. e.g. wedding, outdoor, summer</i>--}}
                            </div>
                            <br>
                            <div class="text-center">
                                <button type="submit" class="btn btn-block btn-sm btn-outline btn-success mt-4">{{ __('UPDATE') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Order Promo Code</h5>
                    </div>
                    <div class="ibox-content text-center">



                        <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                        <span class="small">
                            Please contact with us if you have any questions. We are avalible 24h.
                        </span>


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
                                        <dt>Status:</dt> <dd><span class="label {{$order->status->label}}">{{$order->status->name}}</span></dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <dl class="dl-horizontal">

                                        <dt>Client:</dt> <dd>{{$order->contact->first_name}} {{$order->contact->last_name}}</dd>
                                    </dl>
                                </div>
                                <div class="col-lg-7" id="cluster_info">
                                    <dl class="dl-horizontal" >

                                        <dt>Last Updated:</dt> <dd>{{$order->updated_at}}</dd>
                                        <dt>Created:</dt> <dd> {{$order->created_at}} </dd>
                                    </dl>
                                </div>
                            </div>
                            <div class="row m-t-sm">
                                <div class="col-lg-12">
                                <div class="panel blank-panel">
                                <div class="panel-heading">
                                    <div class="panel-options">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#payments" data-toggle="tab">Asset Actions</a></li>
                                            <li class=""><a href="#expenses" data-toggle="tab">Expenses</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="panel-body">

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="payments">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Date</th>
                                                        <th>Initial #</th>
                                                        <th>Paid</th>
                                                        <th>Subsequent</th>
                                                        <th>Account</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($order->payments as $payment)
                                                        <tr class="gradeX">
                                                            <td>
                                                                {{$payment->reference}}
                                                                <span><i data-toggle="tooltip" data-placement="right" title="{{$payment->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                            </td>
                                                            <td>{{$payment->date}}</td>
                                                            <td>{{$payment->initial_balance}}</td>
                                                            <td>{{$payment->amount}}</td>
                                                            <td>{{$payment->current_balance}}</td>
                                                            <td>{{$payment->account->name}}</td>
                                                            <td>
                                                                <p><span class="label {{$payment->status->label}}">{{$payment->status->name}}</span></p>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>Reference</th>
                                                        <th>Date</th>
                                                        <th>Initial #</th>
                                                        <th>Paid</th>
                                                        <th>Subsequent</th>
                                                        <th>Account</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="tab-pane" id="expenses">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                                    <thead>
                                                    <tr>
                                                        <th>Recurring</th>
                                                        <th>Expense #</th>
                                                        <th>Date</th>
                                                        <th>Expense Type</th>
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($order->expenses as $expense)
                                                        <tr class="gradeA">
                                                            <td>
                                                                @if($expense->is_recurring == 1)
                                                                    <p><span class="badge badge-success">True</span></p>
                                                                @else
                                                                    <p><span class="badge badge-success">False</span></p>
                                                                @endif
                                                            </td>
                                                            <td>{{$expense->reference}}</td>
                                                            <td>{{$expense->date}}</td>
                                                            <td>{{$expense->expense_type->name}}</td>
                                                            <td>{{$expense->total}}</td>
                                                            <td>
                                                                <p><span class="label {{$expense->status->label}}">{{$expense->status->name}}</span></p>
                                                            </td>
                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.expense.show', $expense->id) }}" class="btn-success btn-outline btn btn-xs">View</a>
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
                                                        <th>Expense Type</th>
                                                        <th>Amount</th>
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
                    </div>
                </div>
            </div>
        </div>


        <br>
        {{--  to do Counts  --}}
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <button type="button" class="btn btn-warning m-r-sm">{{$orderArray['pendingToDos']}}</button>
                            Pending
                        </td>
                        <td>
                            <button type="button" class="btn btn-info m-r-sm">{{$orderArray['inProgressToDos']}}</button>
                            In progress
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary m-r-sm">{{$orderArray['completedToDos']}}</button>
                            Completed
                        </td>
                        <td>
                            <button type="button" class="btn btn-success m-r-sm">{{$orderArray['overdueToDos']}}</button>
                            Overdue
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{--    To Dos    --}}
        <div class="row m-t-lg">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>To Dos</h5>
                        <div class="ibox-tools">
                            <a data-toggle="modal" data-target="#toDoRegistration" class="btn btn-success btn-round btn-outline"> <span class="fa fa-plus"></span> New</a>
                        </div>
                    </div>
                    <div class="">
                        <ul class="pending-to-do">
                            @foreach($order->pending_to_dos as $pendingToDo)
                                <li>
                                    <div>
                                        <small>{{$pendingToDo->due_date}}</small>
                                        <h4>{{$pendingToDo->name}}</h4>
                                        <p>{{$pendingToDo->notes}}.</p>
                                        @if($pendingToDo->is_order === 1)
                                            <p><span class="badge badge-primary">{{$pendingToDo->order->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.in.progress',$pendingToDo->id)}}"><i class="fa fa-arrow-circle-o-right "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <ul class="in-progress-to-do">
                            @foreach($order->in_progress_to_dos as $inProgressToDo)
                                <li>
                                    <div>
                                        <small>{{$inProgressToDo->due_date}}</small>
                                        <h4>{{$inProgressToDo->name}}</h4>
                                        <p>{{$inProgressToDo->notes}}.</p>
                                        @if($inProgressToDo->is_order === 1)
                                            <p><span class="badge badge-primary">{{$inProgressToDo->order->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.set.completed',$inProgressToDo->id)}}"><i class="fa fa-check "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="overdue-to-do">
                            @foreach($order->overdue_to_dos as $overdueToDo)
                                <li>
                                    <div>
                                        <small>{{$overdueToDo->due_date}}</small>
                                        <h4>{{$overdueToDo->name}}</h4>
                                        <p>{{$overdueToDo->notes}}.</p>
                                        @if($overdueToDo->is_order === 1)
                                            <p><span class="badge badge-primary">{{$overdueToDo->order->name}}</span></p>
                                        @endif
                                        @if($overdueToDo->status->name === "Pending")
                                            <a href="{{route('admin.to.do.set.completed',$overdueToDo->id)}}"><i class="fa fa-check-double "></i></a>
                                        @elseif($overdueToDo->status->name === "In progress")
                                            <a href="{{route('admin.to.do.set.completed',$overdueToDo->id)}}"><i class="fa fa-check-double "></i></a>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <ul class="completed-to-do">
                            @foreach($order->completed_to_dos as $completedToDo)
                                <li>
                                    <div>
                                        <small>{{$completedToDo->due_date}}</small>
                                        <h4>{{$completedToDo->name}}</h4>
                                        <p>{{$completedToDo->notes}}.</p>
                                        @if($completedToDo->is_order === 1)
                                            <p><span class="badge badge-primary">{{$completedToDo->order->name}}</span></p>
                                        @endif
                                        <a href="{{route('admin.to.do.delete',$completedToDo->id)}}"><i class="fa fa-trash-o "></i></a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection

@include('admin.layouts.modals.order_to_do')
@include('admin.layouts.modals.order_expense')
@include('admin.layouts.modals.order_payment')
