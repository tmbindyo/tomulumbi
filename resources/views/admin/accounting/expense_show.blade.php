@extends('admin.components.main')

@section('title','Expense '. $expense->reference)

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
                            Expenses
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
                    <a href="{{route('admin.expense.edit',$expense->id)}}" class="btn btn-warning btn-outline"><i class="fa fa-pencil"></i> Edit </a>
                    <a href="{{route('admin.expense.print',$expense->id)}}" class="btn btn-warning btn-outline"><i class="fa fa-print"></i> Print </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 col-xl-3">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Creator</div>
                            <div class="widget-subheading">{{$expense->user->name}}</div>
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
                            <div class="widget-subheading">{{$expense->status->name}}</div>
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
                            <div class="widget-subheading">{{$expense->created_at}}</div>
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
                            <div class="widget-subheading">{{$expense->updated_at}}</div>
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
                        Expense Items
                        <div class="btn-actions-pane-right">
                            {{-- <a href="{{route('admin.expense.create')}}" type="button" class="btn btn-success btn-lg" ><i class="fa fa-plus"></i> Expense</a> --}}
                        </div>
                    </div>

                        <div class="card-body"><h5 class="card-title">Expense Items (<strong>{{$expense->expense_items_count}}</strong>)</h5>
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
                                    @foreach($expense->expense_items as $expense_item)
                                        <tr>
                                            <td>{{ $expense_item->name }}</td>
                                            <td>{{ number_format($expense_item->quantity, 2) }}</td>
                                            <td>{{ number_format($expense_item->rate, 2) }}</td>
                                            <td>{{ number_format($expense_item->amount, 2) }}</td>
                                            <td>
                                                <span class="label {{$expense->status->label}}">{{$expense->status->name}}</span>
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
                        Expense Summary
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
                                                    <i class="text-dark opacity-7 btn-icon-wrapper mb-2">{{$expense->total}}</i>
                                                    Total
                                                </button>
                                            </div>
                                        </div>
                                        <div class="d-block col-sm-6">
                                            <div class="p-1">
                                                <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-danger">
                                                    <i class="text-danger opacity-7 btn-icon-wrapper mb-2">{{$expense->sub_total}}</i>
                                                    Sub Total
                                                </button>
                                            </div>
                                        </div>
                                        <div class="d-md-none d-lg-block col-sm-6">
                                            <div class="p-1">
                                                <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-success">
                                                    <i class="text-success opacity-7 btn-icon-wrapper mb-2">{{$expense->adjustment}}</i>
                                                    Discount
                                                </button>
                                            </div>
                                        </div>
                                        <div class="d-md-none d-lg-block col-sm-6">
                                            <div class="p-1">
                                                <button class="btn-icon-vertical btn-transition-text btn-transition btn-transition-alt pt-2 pb-2 btn btn-outline-focus">
                                                    <i class="text-focus opacity-7 btn-icon-wrapper mb-2">{{$expense->paid}}</i>
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
                            @if($expense->is_contact)
                                @if($expense->contact->organization)
                                    <span>To:</span>
                                    <address>
                                        <strong>{{$expense->contact->organization->name}}</strong><br>
                                        <strong>{{$expense->contact->first_name}} {{$expense->contact->last_name}} </strong><br>
                                        {{$expense->contact->organization->street}}<br>
                                        {{$expense->contact->organization->city}}<br>
                                        <abbr title="Phone">P:</abbr> {{$expense->contact->phone_number}}<br>
                                        <abbr title="Email">E:</abbr> {{$expense->contact->email}}
                                    </address>
                                    @else
                                    <span>To:</span>
                                    <address>
                                        <strong>{{$expense->contact->first_name}} {{$expense->contact->last_name}} </strong><br>
                                        {{$expense->contact->street}}<br>
                                        {{$expense->contact->city}}, {{$expense->contact->postal_code}}<br>
                                        <abbr title="Phone">P:</abbr> {{$expense->contact->phone_number}}<br>
                                        <abbr title="Email">E:</abbr> {{$expense->contact->email}}
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
                        Expenses Payments
                        <div class="btn-actions-pane-right">
                            <a href="{{route('admin.transaction.create',$expense->id)}}" type="button" class="btn btn-success btn-lg" ><i class="fa fa-plus"></i> Make Payment</a>
                        </div>
                    </div>

                    <div class="card-body"><h5 class="card-title">Expenses</h5>
                        <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Reference #</th>
                                    <th>Account</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    @if($expense->status_id == '04f83a7c-9c4e-47ff-8e26-41b3b83b03d0')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $transaction)
                                    <tr>
                                        <td>{{$transaction->date}}</td>
                                        <td>{{$transaction->reference}}</td>
                                        <td>
                                            {{$transaction->account->name}}
                                        </td>
                                        <td>{{$transaction->amount}}</td>
                                        <td>
                                            <p><span class="label {{$transaction->status->label}}">{{$transaction->status->name}}</span></p>
                                        </td>
                                        @if($expense->status_id == '04f83a7c-9c4e-47ff-8e26-41b3b83b03d0')
                                            <td class="text-right">
                                                @if($transaction->is_billed == False)
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.expense.show', $expense->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                    </div>
                                                @else
                                                    <label class="label label-primary">Marked Billed</label>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Reference #</th>
                                    <th>Account</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    @if($expense->status_id == '04f83a7c-9c4e-47ff-8e26-41b3b83b03d0')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="card-footer">Footer</div>

                </div>
            </div>

            <div class="col-md-3">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                        Expenses Details
                    </div>

                    <li class="list-group-item">
                        <div class="widget-content pt-4 pb-4 pr-1 pl-1">
                            <div class="text-left">
                                <span class="pr-1">
                                    <span class="text-danger">Notes:</span>
                                    <span>{{$expense->notes}}</span>
                                </span>
                                    <br>
                                    <span class="pr-3">
                                        <span class="text-danger">Expenst Type:</span>
                                        <span>{{$expense->expense_account->name}}</span>
                                    </span>
                                    <br>
                                    <span class="pr-3">
                                        <span class="text-danger">Date:</span>
                                        <span>{{$expense->date}}</span>
                                    </span>
                                @if($expense->is_recurring == 1)
                                    <br>
                                    <span class="pr-3">
                                        <span class="text-danger">End Date:</span>
                                        <span>{{$expense->end_date}}</span>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </li>

                    <div class="card-body"><h5 class="card-title text-center">Expense Relationships</h5>
                        @if($expense->is_recurring == 1)
                            <button class="mb-2 mr-2 btn btn-shadow btn-dashed btn-outline-link">
                                <i class="fa fa-repeat"></i>
                                Recurring
                            </button>
                        @endif

                        @if($expense->is_album == 1)
                            <button class="mb-2 mr-2 btn btn-shadow btn-dashed btn-outline-success">
                                @if($expense->album->album_type_id = "ca64a5e0-d39b-4f2c-a136-9c523d935ea4")
                                    <a href="{{route('admin.client.proof.show',$expense->album->id)}}">
                                        <i class="fa fa-camera"></i> {{$expense->album->name}}
                                    </a>
                                @elseif($expense->album->album_type_id = "6fdf4858-01ce-43ff-bbe6-827f09fa1cef")
                                    <a href="{{route('admin.personal.album.show',$expense->album->id)}}">
                                        <i class="fa fa-camera"></i> {{$expense->album->name}}
                                    </a>
                                @endif
                            </button>
                        @endif

                        @if($expense->is_asset == 1)
                            <button class="mb-2 mr-2 btn btn-shadow btn-dashed btn-outline-secondary">
                                <a href="{{route('admin.asset.show',$expense->asset->id)}}">
                                    <i class="fa fa-camera-retro"></i> {{$expense->asset->name}}
                                </a>
                            </button>
                        @endif

                        @if($expense->is_campaign == 1)
                            <button class="mb-2 mr-2 btn btn-shadow btn-dashed btn-outline-focus">
                                <a href="{{route('admin.campaign.show',$expense->campaign->id)}}">
                                    <i class="fa fa-users"></i> {{$expense->campaign->name}}
                                </a>
                            </button>
                        @endif

                        @if($expense->is_design == 1)
                            <button class="mb-2 mr-2 btn btn-shadow btn-dashed btn-outline-warning">
                                <a href="{{route('admin.design.show',$expense->design->id)}}">
                                    <i class="fa fa-paint-brush"></i> {{$expense->design->name}}
                                </a>
                            </button>
                        @endif

                        @if($expense->is_liability == 1)
                            <button class="mb-2 mr-2 btn btn-shadow btn-dashed btn-outline-light">
                                <a href="{{route('admin.liability.show',$expense->liability->id)}}">
                                    <i class="fa fa-credit-card"></i> {{$expense->liability->name}}
                                </a>
                            </button>
                        @endif

                        @if($expense->is_order == 1)
                            <button class="mb-2 mr-2 btn btn-shadow btn-dashed btn-outline-alternate">
                                <a href="{{route('admin.order.show',$expense->order->id)}}">
                                    <i class="fa fa-shopping-cart"></i> {{$expense->order->reference}}
                                </a>
                            </button>
                        @endif

                        @if($expense->is_project == 1)
                            <button class="mb-2 mr-2 btn btn-shadow btn-dashed btn-outline-info">
                                <a href="{{route('admin.project.show',$expense->project->id)}}">
                                    <i class="fa fa-trello"></i> {{$expense->project->name}}
                                </a>
                            </button>
                        @endif

                        @if($expense->is_transaction == 1)
                            <button class="mb-2 mr-2 btn btn-shadow btn-dashed btn-outline-dark">
                                <a href="#">
                                    <i class="fa fa-bank"></i> {{$expense->transaction->reference}}
                                </a>
                            </button>
                        @endif

                        @if($expense->is_transfer == 1)
                            <button class="mb-2 mr-2 btn btn-shadow btn-dashed btn-outline-danger">
                                <a href="{{route('admin.transfer.show',$expense->transfer->id)}}">
                                    <i class="fa fa-share"></i> {{$expense->transfer->name}}
                                </a>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
