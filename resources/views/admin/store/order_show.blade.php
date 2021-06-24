@extends('admin.components.main')

@section('title','Order '. $order->order_number)

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
                    <a href="{{route('admin.order.edit',$order->id)}}" class="btn btn-warning btn-outline"><i class="fa fa-pencil"></i> Edit </a>
                    <a href="{{route('admin.contact.show',$order->contact_id)}}" class="btn btn-warning btn-outline"><i class="fa fa-eye"></i> Contact </a>
                    <a href="{{route('admin.order.print',$order->id)}}" class="btn btn-warning btn-outline"><i class="fa fa-print"></i> Print </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-xl-3">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Creator</div>
                            <div class="widget-subheading">
                                {{-- {{$order->user->name}} --}}
                            </div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><i class="fa fa-user fa-3x"></i></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xl-3">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Status</div>
                            <div class="widget-subheading">{{$order->status->name}}</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><i class="fa fa-ellipsis-v fa-3x"></i></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xl-3">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Created</div>
                            <div class="widget-subheading">{{$order->created_at}}</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white"><span><i class="fa fa-plus-square fa-3x"></i></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xl-3">
                <div class="card mb-3 widget-content bg-premium-dark">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Last Updated</div>
                            <div class="widget-subheading">{{$order->updated_at}}</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-warning"><span><i class="fa fa-edit fa-3x"></i></span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="main-card mb-3 card">

                    <div class="card-header">
                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                        Order Items
                        <div class="btn-actions-pane-right">
                            {{-- <a href="{{route('admin.order.create')}}" type="button" class="btn btn-success btn-lg" ><i class="fa fa-plus"></i> Order</a> --}}
                        </div>
                    </div>

                        <div class="card-body"><h5 class="card-title">Order Items (<strong>{{$order->order_items_count}}</strong>)</h5>
                            <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Item Details</th>
                                        <th>Quantity</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->order_products as $order_item)
                                        <tr>
                                            <td>
                                                <a href="{{route('admin.price.list.show',$order_item->price_list->id)}}" class="btn btn-success">
                                                    {{$order_item->product->name}}
                                                </a>
                                            </td>
                                            <td>{{ number_format($order_item->quantity, 2) }}</td>
                                            <td>{{ number_format($order_item->rate, 2) }}</td>
                                            <td>{{ number_format($order_item->amount, 2) }}</td>
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
                                        <th>Item Details</th>
                                        <th>Quantity</th>
                                        <th>Rate</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th class="text-right" width="35px" data-sort-ignore="true">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    <div class="card-footer">Footer</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="main-card mb-3 card">

                    <div class="card-header">
                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                        Order Summary
                        <div class="btn-actions-pane-right">
                        </div>
                    </div>
                    <div class="card-body">

                        <ul class="list-group list-group-flush">
                            <li class="p-0 list-group-item">
                                <div class="grid-menu grid-menu-2col">
                                    <div class="no-gutters row">
                                        <div class="d-block col-sm-6">
                                            <div class="p-1">
                                                <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-dark">
                                                    <i class="text-dark opacity-7 btn-icon-wrapper mb-2">{{$order->total}}</i>
                                                    Total
                                                </button>
                                            </div>
                                        </div>
                                        <div class="d-block col-sm-6">
                                            <div class="p-1">
                                                <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                    <i class="text-danger opacity-7 btn-icon-wrapper mb-2">{{$order->sub_total}}</i>
                                                    Sub Total
                                                </button>
                                            </div>
                                        </div>
                                        <div class="d-md-none d-lg-block col-sm-6">
                                            <div class="p-1">
                                                <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success">
                                                    <i class="text-success opacity-7 btn-icon-wrapper mb-2">{{$order->adjustment}}</i>
                                                    Discount
                                                </button>
                                            </div>
                                        </div>
                                        <div class="d-md-none d-lg-block col-sm-6">
                                            <div class="p-1">
                                                <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-focus">
                                                    <i class="text-focus opacity-7 btn-icon-wrapper mb-2">{{$order->paid}}</i>
                                                    Paid
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <br>
                        <div class="text-right">
                            @if($order->is_contact)
                                @if($order->contact->organization)
                                    <span>To:</span>
                                    <address>
                                        <strong>{{$order->contact->organization->name}}</strong><br>
                                        <strong>{{$order->contact->first_name}} {{$order->contact->last_name}} </strong><br>
                                        {{$order->contact->organization->street}}<br>
                                        {{$order->contact->organization->city}}<br>
                                        <abbr title="Phone">P:</abbr> {{$order->contact->phone_number}}<br>
                                        <abbr title="Email">E:</abbr> {{$order->contact->email}}
                                    </address>
                                    @else
                                    <span>To:</span>
                                    <address>
                                        <strong>{{$order->contact->first_name}} {{$order->contact->last_name}} </strong><br>
                                        {{$order->contact->street}}<br>
                                        {{$order->contact->city}}, {{$order->contact->postal_code}}<br>
                                        <abbr title="Phone">P:</abbr> {{$order->contact->phone_number}}<br>
                                        <abbr title="Email">E:</abbr> {{$order->contact->email}}
                                    </address>
                                @endif
                            @endif


                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="row">
            <div class="col-md-9">
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
                                <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab" href="#asset-actions">
                                    <span>Payments ({{$order->payments->count()}})
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#expenses">
                                    <span>Expenses ({{$order->expenses->count()}})</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="asset-actions" role="tabpanel">
                                <div class="card-hover-shadow card-border mb-3 card">
                                    <div class="card-header">
                                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                        Payments
                                        <div class="btn-actions-pane-right">
                                            <a href="{{route('admin.order.payment.create',$order->id)}}" class="btn btn-success btn-lg" ><i class="fa fa-plus"></i> Payment</a>
                                        </div>
                                    </div>

                                    <div class="card-body">
                                        <div class="col-lg-12">
                                            <div class="main-card mb-3 card">
                                                <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
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
                                                            <tr>
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
                                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addDeposit"><i class="fa fa-plus"></i> Deposit</button>
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
                                                            @foreach($order->expenses as $expense)
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
                        </div>


                    </div>

                    <div class="card-footer">Footer</div>

                </div>
            </div>

            <div class="col-md-3">

                <div class="main-card mb-3 card">
                    <div class="card-header">
                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                        Orders Status
                    </div>

                    <div class="card-body"><h5 class="card-title text-center">Order Relationships</h5>
                        <form method="post" action="{{ route('admin.order.update.status',$order->id) }}" autocomplete="off">
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

                            <div class="has-warning">
                                <select name="status" class="status-select form-control input-lg" required>
                                    <option selected disabled>Select status</option>
                                    @foreach($orderStatuses as $orderStatus)
                                        <option @if($orderStatus->id == $order->status_id)selected @endif value="{{$orderStatus->id}}">{{$orderStatus->name}}</option>
                                    @endforeach
                                </select><br>
                                <i>status.</i>
                            </div>

                            <hr>

                            <div class="row">
                                    <button type="submit" class="btn btn-outline btn-block btn-lg btn-success">{{ __('SAVE') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection
