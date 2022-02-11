@extends('admin.components.main')

@section('title', $account->name.' Account')

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
                            Accounts
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



        {{-- action types --}}
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Account</h5>
                        <form method="post" action="{{ route('admin.account.update',$account->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                <input name="name" id="name" value="{{$account->name}}" type="text" class="form-control">
                                <i>name</i>
                            </div>

                            <div class="position-relative form-group">
                                <label for="balance" class="">NaBalanceme</label>
                                <input name="balance" id="balance" value="{{$account->balance}}" type="text" class="form-control">
                                <i>balance</i>
                            </div>

                            <div class="position-relative form-group">
                                <label for="notes" class="">Notes</label>
                                <textarea name="notes" id="notes" rows="3" class="form-control">{{$account->notes}}</textarea>
                                <i>notes</i>
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
                                    <div class="widget-subheading">{{$account->user->name}}</div>
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
                                    <div class="widget-subheading">{{$account->status->name}}</div>
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
                                    <div class="widget-subheading">{{$account->created_at}}</div>
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
                                    <div class="widget-subheading">{{$account->updated_at}}</div>
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
                    </div>

                        <div class="card-body">
                            {{-- <h5 class="card-title">Records</h5> --}}
                            <ul class="tabs-animated-shadow tabs-animated nav">
                                <li class="nav-item">
                                    <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab" href="#account-adjustments">
                                        <span>Account Adjustments ({{$account->account_adjustments->count()}})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#deposits">
                                        <span>Deposits ({{$account->deposits->count()}})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#liabilities">
                                        <span>Liabilities ({{$account->liabilities->count()}})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#loans">
                                        <span>Loans ({{$account->loans->count()}})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#payments">
                                        <span>Payments ({{$account->payments->count()}})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#refunds">
                                        <span>Refunds ({{$account->refunds->count()}})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#transactions">
                                        <span>Transactions ({{$account->transactions->count()}})</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#withdrawals">
                                        <span>Withdrawals ({{$account->withdrawals->count()}})</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active" id="account-adjustments" role="tabpanel">
                                    <div class="card-hover-shadow card-border mb-3 card">
                                        <div class="card-header">
                                            <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                            Account Adjustments
                                            <div class="btn-actions-pane-right">
                                                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addAccountAdjustment"><i class="fa fa-plus"></i> Account Adjustment</button>
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
                                                                    <th>Amount</th>
                                                                    <th>Initial</th>
                                                                    <th>Subsequent</th>
                                                                    <th>Date</th>
                                                                    <th>Deposit</th>
                                                                    <th>User</th>
                                                                    <th>Status</th>
                                                                    <th width="13em">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($account->account_adjustments as $adjustments)
                                                                <tr>
                                                                    <td>
                                                                        {{$adjustments->reference}}
                                                                        <span><i data-toggle="tooltip" data-placement="right" title="{{$adjustments->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                                    </td>
                                                                    <td>{{ number_format($adjustments->amount, 2) }}</td>
                                                                    <td>{{ number_format($adjustments->initial_account_amount, 2) }}</td>
                                                                    <td>{{ number_format($adjustments->subsequent_account_amount, 2) }}</td>
                                                                    <td>{{$adjustments->date}}</td>
                                                                    <td>
                                                                        @if($adjustments->is_deposit == 1)
                                                                            <span class="label label-success">Deposit</span>
                                                                        @else
                                                                            <span class="label label-success">Non Deposit</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{$adjustments->user->name}}</td>
                                                                    <td>
                                                                        <span class="label {{$adjustments->status->label}}">{{$adjustments->status->name}}</span>
                                                                    </td>

                                                                    <td class="text-right">
                                                                        <div class="btn-group">
                                                                            {{-- <a href="{{ route('admin.account.adjustment.show', $adjustments->id) }}" class="mb-2 mr-2 btn btn-primary">View</a> --}}
                                                                            @if($adjustments->status_id == "c670f7a2-b6d1-4669-8ab5-9c764a1e403e")
                                                                                <a href="{{ route('admin.account.adjustment.restore', $adjustments->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                            @else
                                                                                <a href="{{ route('admin.account.adjustment.delete', $adjustments->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
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
                                                                    <th>Deposit</th>
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

                                <div class="tab-pane" id="deposits" role="tabpanel">
                                    <div class="card-hover-shadow card-border mb-3 card">
                                        <div class="card-header">
                                            <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                            Deposits
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
                                                                    <th>Reference</th>
                                                                    <th>Amount</th>
                                                                    <th>Initial</th>
                                                                    <th>Subsequent</th>
                                                                    <th>User</th>
                                                                    <th>Status</th>
                                                                    <th width="13em">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($account->deposits as $deposit)
                                                                <tr>
                                                                    <td>
                                                                        {{$deposit->reference}}
                                                                        <span><i data-toggle="tooltip" data-placement="right" title="{{$deposit->about}}." class="fa fa-facebook-messenger"></i></span>
                                                                    </td>
                                                                    <td>{{ number_format($deposit->amount, 2) }}</td>
                                                                    <td>{{ number_format($deposit->initial_amount, 2) }}</td>
                                                                    <td>{{ number_format($deposit->subsequent_amount, 2) }}</td>
                                                                    <td>{{$deposit->user->name}}</td>

                                                                    <td>
                                                                        <span class="label {{$deposit->status->label}}">{{$deposit->status->name}}</span>
                                                                    </td>

                                                                    <td class="text-right">
                                                                        <div class="btn-group">
                                                                            {{-- <a href="{{ route('admin.deposit.show', $deposit->id) }}" class="mb-2 mr-2 btn btn-primary">View</a> --}}
                                                                            @if($deposit->status_id == "c670f7a2-b6d1-4669-8ab5-9c764a1e403e")
                                                                                <a href="{{ route('admin.deposit.restore', $deposit->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                            @else
                                                                                <a href="{{ route('admin.deposit.delete', $deposit->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
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

                                <div class="tab-pane" id="liabilities" role="tabpanel">
                                    <div class="card-hover-shadow card-border mb-3 card">
                                        <div class="card-header">
                                            <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                            Liabilities
                                            <div class="btn-actions-pane-right">
                                                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addLiability"><i class="fa fa-plus"></i> Liability</button>
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
                                                                    <th>Amount</th>
                                                                    <th>Percentage</th>
                                                                    <th>Interest</th>
                                                                    <th>Paid</th>
                                                                    <th>Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Contact</th>
                                                                    <th>User</th>
                                                                    <th>Status</th>
                                                                    <th width="13em">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($account->liabilities as $liability)
                                                                <tr>
                                                                    <td>
                                                                        {{$liability->reference}}
                                                                        <span><i data-toggle="tooltip" data-placement="right" title="{{$liability->about}}." class="fa fa-facebook-messenger"></i></span>
                                                                    </td>
                                                                    <td>{{ number_format($liability->total, 2) }}</td>
                                                                    <td>{{ number_format($liability->interest, 2) }} %</td>
                                                                    <td>{{ number_format($liability->interest_amount, 2) }}</td>
                                                                    <td>{{ number_format($liability->paid, 2) }}</td>
                                                                    <td>{{$liability->date}}</td>
                                                                    <td>{{$liability->due_date}}</td>
                                                                    <td>{{$liability->contact->first_name}} {{$liability->contact->last_name}}</td>
                                                                    <td>{{$liability->user->name}}</td>

                                                                    <td>
                                                                        <span class="label {{$liability->status->label}}">{{$liability->status->name}}</span>
                                                                    </td>

                                                                    <td class="text-right">
                                                                        <div class="btn-group">
                                                                            <a href="{{ route('admin.liability.show', $liability->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                            @if($liability->status_id == "c670f7a2-b6d1-4669-8ab5-9c764a1e403e")
                                                                                <a href="{{ route('admin.liability.restore', $liability->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                            @else
                                                                                <a href="{{ route('admin.liability.delete', $liability->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
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
                                                                    <th>Percentage</th>
                                                                    <th>Interest</th>
                                                                    <th>Paid</th>
                                                                    <th>Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Contact</th>
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

                                <div class="tab-pane" id="loans" role="tabpanel">
                                    <div class="card-hover-shadow card-border mb-3 card">
                                        <div class="card-header">
                                            <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                            Loans
                                            <div class="btn-actions-pane-right">
                                                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addLoan"><i class="fa fa-plus"></i> Loan</button>
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
                                                                    <th>Amount</th>
                                                                    <th>Percentage</th>
                                                                    <th>Interest</th>
                                                                    <th>Paid</th>
                                                                    <th>Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Contact</th>
                                                                    <th>User</th>
                                                                    <th>Status</th>
                                                                    <th width="13em">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($account->loans as $loan)
                                                                <tr>
                                                                    <td>
                                                                        {{$loan->reference}}
                                                                        <span><i data-toggle="tooltip" data-placement="right" title="{{$loan->about}}." class="fa fa-facebook-messenger"></i></span>
                                                                    </td>
                                                                    <td>{{ number_format($loan->total, 2) }}</td>
                                                                    <td>{{ number_format($loan->interest, 2) }} %</td>
                                                                    <td>{{ number_format($loan->interest_amount, 2) }}</td>
                                                                    <td>{{ number_format($loan->paid, 2) }}</td>
                                                                    <td>{{$loan->date}}</td>
                                                                    <td>{{$loan->due_date}}</td>
                                                                    <td>{{$loan->contact->first_name}} {{$loan->contact->last_name}}</td>
                                                                    <td>{{$loan->user->name}}</td>

                                                                    <td>
                                                                        <span class="label {{$loan->status->label}}">{{$loan->status->name}}</span>
                                                                    </td>

                                                                    <td class="text-right">
                                                                        <div class="btn-group">
                                                                            <a href="{{ route('admin.loan.show', $loan->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                            @if($loan->status_id == "c670f7a2-b6d1-4669-8ab5-9c764a1e403e")
                                                                                <a href="{{ route('admin.loan.restore', $loan->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                            @else
                                                                                <a href="{{ route('admin.loan.delete', $loan->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
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
                                                                    <th>Percentage</th>
                                                                    <th>Interest</th>
                                                                    <th>Paid</th>
                                                                    <th>Date</th>
                                                                    <th>Due Date</th>
                                                                    <th>Contact</th>
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

                                <div class="tab-pane" id="payments" role="tabpanel">
                                    <div class="card-hover-shadow card-border mb-3 card">
                                        <div class="card-header">
                                            <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                            Payments
                                            <div class="btn-actions-pane-right">
                                                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addPayment"><i class="fa fa-plus"></i> Payment</button>
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
                                                                    <th>Amount</th>
                                                                    <th>Initial</th>
                                                                    <th>Current</th>
                                                                    <th>Type</th>
                                                                    <th>User</th>
                                                                    <th>Status</th>
                                                                    <th width="13em">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($account->payments as $payment)
                                                                <tr>
                                                                    <td>
                                                                        {{$payment->reference}}
                                                                        <span><i data-toggle="tooltip" data-placement="right" title="{{$payment->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                                    </td>
                                                                    <td>{{$payment->date}}</td>

                                                                    <td>{{ number_format($payment->amount, 2) }}</td>
                                                                    <td>{{ number_format($payment->initial_balance, 2) }}</td>
                                                                    <td>{{ number_format($payment->current_balance, 2) }}</td>

                                                                    <td>{{$payment->user->name}}</td>
                                                                    <td>{{$payment->user->name}}</td>

                                                                    <td>
                                                                        <span class="label {{$payment->status->label}}">{{$payment->status->name}}</span>
                                                                    </td>

                                                                    <td class="text-right">
                                                                        <div class="btn-group">
                                                                            <a href="{{ route('admin.payment.show', $payment->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                            @if($payment->status_id == "c670f7a2-b6d1-4669-8ab5-9c764a1e403e")
                                                                                <a href="{{ route('admin.payment.restore', $payment->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                            @else
                                                                                <a href="{{ route('admin.payment.delete', $payment->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                            @endif
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Reference</th>
                                                                    <th>Date</th>
                                                                    <th>Amount</th>
                                                                    <th>Initial</th>
                                                                    <th>Current</th>
                                                                    <th>Type</th>
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

                                <div class="tab-pane" id="refunds" role="tabpanel">
                                    <div class="card-hover-shadow card-border mb-3 card">
                                        <div class="card-header">
                                            <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                            Refunds
                                            <div class="btn-actions-pane-right">
                                                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addRefund"><i class="fa fa-plus"></i> Refund</button>
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
                                                                    <th>Amount</th>
                                                                    <th>Date</th>
                                                                    <th>User</th>
                                                                    <th>Status</th>
                                                                    <th width="13em">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($account->refunds as $refund)
                                                                <tr>
                                                                    <td>
                                                                        {{$refund->reference}}
                                                                        <span><i data-toggle="tooltip" data-placement="right" title="{{$refund->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                                    </td>
                                                                    <td>{{$refund->amount}}</td>
                                                                    <td>{{$refund->date}}</td>
                                                                    <td>{{$refund->user->name}}</td>

                                                                    <td>
                                                                        <span class="label {{$refund->status->label}}">{{$refund->status->name}}</span>
                                                                    </td>

                                                                    <td class="text-right">
                                                                        <div class="btn-group">
                                                                            {{-- <a href="{{ route('admin.refund.show', $refund->id) }}" class="mb-2 mr-2 btn btn-primary">View</a> --}}
                                                                            @if($refund->status_id == "c670f7a2-b6d1-4669-8ab5-9c764a1e403e")
                                                                                <a href="{{ route('admin.refund.restore', $refund->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                            @else
                                                                                <a href="{{ route('admin.refund.delete', $refund->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
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
                                                                    <th>Date</th>
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

                                <div class="tab-pane" id="transactions" role="tabpanel">
                                    <div class="card-hover-shadow card-border mb-3 card">
                                        <div class="card-header">
                                            <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                            Transactions
                                            <div class="btn-actions-pane-right">
                                                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addTransaction"><i class="fa fa-plus"></i> Transaction</button>
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
                                                                    <th>Amount</th>
                                                                    <th>Initial</th>
                                                                    <th>Subsequent</th>
                                                                    <th>Date</th>
                                                                    <th>User</th>
                                                                    <th>Billed</th>
                                                                    <th>Confirmed</th>
                                                                    <th>Status</th>
                                                                    <th width="13em">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($account->transactions as $transaction)
                                                                <tr>
                                                                    <td>
                                                                        {{$transaction->reference}}
                                                                        <span><i data-toggle="tooltip" data-placement="right" title="{{$transaction->notes}}." class="fa fa-facebook-messenger"></i></span>
                                                                    </td>
                                                                    <td>{{$transaction->amount}}</td>
                                                                    <td>{{$transaction->initial_amount}}</td>
                                                                    <td>{{$transaction->subsequent_amount}}</td>
                                                                    <td>{{$transaction->date}}</td>
                                                                    <td>{{$transaction->user->name}}</td>
                                                                    <td>
                                                                        @if($transaction->is_billed == 1)
                                                                            <span class="label label-success"> Billed </span>
                                                                        @else
                                                                            <span class="label label-warning"> Not Billed </span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($transaction->is_confirmed == 1)
                                                                            <span class="label label-success"> Confirmed </span>
                                                                        @else
                                                                            <span class="label label-warning"> Not Confirmed </span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <span class="label {{$transaction->status->label}}">{{$transaction->status->name}}</span>
                                                                    </td>

                                                                    <td class="text-right">
                                                                        <div class="btn-group">
                                                                            <a href="{{ route('admin.expense.show', $transaction->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
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
                                                                    <th>User</th>
                                                                    <th>Billed</th>
                                                                    <th>Confirmed</th>
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

                                <div class="tab-pane" id="withdrawals" role="tabpanel">
                                    <div class="card-hover-shadow card-border mb-3 card">
                                        <div class="card-header">
                                            <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                            Withdrawals
                                            <div class="btn-actions-pane-right">
                                                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addWithdrawal"><i class="fa fa-plus"></i> Withdrawal</button>
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
                                                                    <th>Amount</th>
                                                                    <th>User</th>
                                                                    <th>Status</th>
                                                                    <th width="13em">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($account->withdrawals as $withdrawal)
                                                                <tr>
                                                                    <td>
                                                                        {{$withdrawal->reference}}
                                                                        <span><i data-toggle="tooltip" data-placement="right" title="{{$withdrawal->about}}." class="fa fa-facebook-messenger"></i></span>
                                                                    </td>
                                                                    <td>{{$withdrawal->amount}}</td>
                                                                    <td>{{$withdrawal->user->name}}</td>
                                                                    <td>
                                                                        <span class="label {{$withdrawal->status->label}}">{{$withdrawal->status->name}}</span>
                                                                    </td>

                                                                    <td class="text-right">
                                                                        <div class="btn-group">
                                                                            {{-- <a href="{{ route('admin.withdrawal.show', $withdrawal->id) }}" class="mb-2 mr-2 btn btn-primary">View</a> --}}
                                                                            @if($withdrawal->status_id == "c670f7a2-b6d1-4669-8ab5-9c764a1e403e")
                                                                                <a href="{{ route('admin.withdrawal.restore', $withdrawal->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                            @else
                                                                                <a href="{{ route('admin.withdrawal.delete', $withdrawal->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
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

                            </div>


                        </div>

                    <div class="card-footer">Footer</div>
                </div>
            </div>
        </div>
        {{-- action types --}}

    </div>

@endsection

@include('admin.components.modals.add_account_adjustment')
@include('admin.components.modals.add_deposit')
@include('admin.components.modals.add_liability')
@include('admin.components.modals.add_loan')
@include('admin.components.modals.add_payment')
@include('admin.components.modals.add_refund')
@include('admin.components.modals.add_transaction')
@include('admin.components.modals.add_withdrawal')

@section('js')

    <script>
        $(document).ready(function() {
            // Set date
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            if (dd < 10){
                dd = '0'+dd;
            }
            if (mm < 10){
                mm = '0'+mm;
            }
            var date = mm + '/' + dd + '/' + yyyy;
            if(document.getElementById("date")){
                document.getElementById("date").value = date;
            }
            if(document.getElementById("deposit_date")){
                document.getElementById("deposit_date").value = date;
            }
            if(document.getElementById("liability_date")){
                document.getElementById("liability_date").value = date;
            }
            if(document.getElementById("loan_date")){
                document.getElementById("loan_date").value = date;
            }
            if(document.getElementById("quote_date")){
                document.getElementById("quote_date").value = date;
            }
            if(document.getElementById("refund_date")){
                document.getElementById("refund_date").value = date;
            }
            if(document.getElementById("transaction_date")){
                document.getElementById("transaction_date").value = date;
            }
            if(document.getElementById("withdrawal_date")){
                document.getElementById("withdrawal_date").value = date;
            }
            if(document.getElementById("adjustment_date")){
                document.getElementById("adjustment_date").value = date;
            }
            if(document.getElementById("start_date")){
                document.getElementById("start_date").value = date;
            }
            if(document.getElementById("date_acquired")){
                document.getElementById("date_acquired").value = date;
            }
            if(document.getElementById("starting_date")){
                document.getElementById("starting_date").value = date;
            }

            // Set due date
            var due = new Date();
            due.setDate(due.getDate() + 14);
            var due_dd = due.getDate();
            var due_mm = due.getMonth()+1;
            var due_yyyy = due.getFullYear();
            if (dd < 10){
                due_dd = '0'+due_dd;
            }
            if (due_mm < 10){
                due_mm = '0'+due_mm;
            }
            var due_date = due_mm + '/' + due_dd + '/' + due_yyyy;
            if(document.getElementById("due_date")){
                document.getElementById("due_date").value = due_date;
            }
            if(document.getElementById("liability_due_date")){
                document.getElementById("liability_due_date").value = due_date;
            }
            if(document.getElementById("loan_due_date")){
                document.getElementById("loan_due_date").value = due_date;
            }
            if(document.getElementById("end_date")){
                document.getElementById("end_date").value = due_date;
            }
            if(document.getElementById("closing_date")){
                document.getElementById("closing_date").value = due_date;
            }
            if(document.getElementById("expiry_date")){
                document.getElementById("expiry_date").value = due_date;
            }

            // set start time
            var h = today.getHours();
            var m = today.getMinutes();
            var time_curr = h + ':' + m;
            if(document.getElementById("start_time")){
                document.getElementById("start_time").value = time_curr;
            }
            if(document.getElementById("end_time")){
                document.getElementById("end_time").value = time_curr;
            }
        });

    </script>

    {{--  liability and loan calculate interest  --}}
    <script>

        function loanGetPercentAmount() {
            var principal = document.getElementById('loan_principal').value;
            var interest = document.getElementById('loan_interest').value;
            {{--  get percentage  --}}
            var percentage = interest /100;
            var interest_amount = parseFloat(principal) * parseFloat(percentage);
            var payback = parseFloat(principal) + parseFloat(interest_amount);
            {{--  set values  --}}
            if(document.getElementById("loan_interest_amount")){
                document.getElementById("loan_interest_amount").value = interest_amount;
            }
            if(document.getElementById("loan_total")){
                document.getElementById("loan_total").value = payback;
            }
        }


        function liabilityGetPercentAmount() {
            var principal = document.getElementById('liability_principal').value;
            var interest = document.getElementById('liability_interest').value;
            {{--  get percentage  --}}
            var percentage = interest /100;
            var interest_amount = parseFloat(principal) * parseFloat(percentage);
            var payback = parseFloat(principal) + parseFloat(interest_amount);
            {{--  set values  --}}
            if(document.getElementById("liability_interest_amount")){
                document.getElementById("liability_interest_amount").value = interest_amount;
            }
            if(document.getElementById("liability_total")){
                document.getElementById("liability_total").value = payback;
            }
        }



        function loanGetPercentFromAmount() {
            var principal = document.getElementById('loan_principal').value;
            var interest_amount = document.getElementById('loan_interest_amount').value;
            {{--  get total  --}}
            var total = parseFloat(principal)+parseFloat(interest_amount)
            {{--  get percentage  --}}
            var percentage = parseFloat(interest_amount)/parseFloat(principal)
            var interestPercentage = parseFloat(percentage)*100;
            {{--  set values  --}}
            if(document.getElementById("loan_interest")){
                document.getElementById("loan_interest").value = interestPercentage.toFixed(5);
            }
            if(document.getElementById("loan_total")){
                document.getElementById("loan_total").value = total;
            }
        }

        function liabilityGetPercentFromAmount() {
            var principal = document.getElementById('liability_principal').value;
            var interest_amount = document.getElementById('liability_interest_amount').value;
            {{--  get total  --}}
            var total = parseFloat(principal)+parseFloat(interest_amount)
            {{--  get percentage  --}}
            var percentage = parseFloat(interest_amount)/parseFloat(principal)
            var interestPercentage = parseFloat(percentage)*100;
            {{--  set values  --}}
            if(document.getElementById("liability_interest")){
                document.getElementById("liability_interest").value = interestPercentage.toFixed(5);
            }
            if(document.getElementById("liability_total")){
                document.getElementById("liability_total").value = total;
            }
        }

    </script>
@endsection
