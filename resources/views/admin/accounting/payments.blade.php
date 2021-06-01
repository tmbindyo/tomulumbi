@extends('admin.components.main')

@section('title','Payments')

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
                            Payments
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
                    <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addPayment"><i class="fa fa-plus"></i> Payment</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-header">
                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                        Payments ({{$payments->count()}})
                        <div class="btn-actions-pane-right">
                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addPayment"><i class="fa fa-plus"></i> Payment</button>
                        </div>
                    </div>

                    <div class="card-body"><h5 class="card-title">Payments</h5>
                        <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
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
                                    <tr>
                                        <td>
                                            {{$payment->reference}}
                                            <span><i data-toggle="tooltip" data-placement="right" title="{{$payment->notes}}." class="fa fa-facebook-messenger"></i></span>
                                        </td>
                                        <td>{{ number_format($payment->amount, 2) }}</td>
                                        <td>{{ number_format($payment->initial_balance, 2) }}</td>
                                        <td>{{ number_format($payment->current_balance, 2) }}</td>
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
                                                <a href="{{ route('admin.payment.show', $payment->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                @if($payment->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                    <a href="{{ route('admin.payment.restore', $payment->id) }}" class="mb-2 mr-2 btn btn-primary">Restore</a>
                                                @else
                                                    <a href="{{ route('admin.payment.delete', $payment->id) }}" class="mb-2 mr-2 btn btn-danger">Delete</a>
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

                    <div class="card-footer">Footer</div>
                </div>
            </div>
        </div>
        {{-- action types --}}

    </div>

@endsection

@include('admin.components.modals.add_payment')

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
            if(document.getElementById("quote_date")){
                document.getElementById("quote_date").value = date;
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
        });

    </script>


@endsection
