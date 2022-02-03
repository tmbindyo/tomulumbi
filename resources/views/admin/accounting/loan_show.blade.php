@extends('admin.components.main')

@section('title', 'Loan '.$loan->reference)

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
                            Loans
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
                    <a href="{{route('admin.contact.show',$loan->contact_id)}}" class="btn btn-success btn-lg"><i class="fa fa-eye"></i> Contact </a>
                </div>
            </div>
        </div>



        {{-- action types --}}
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Loan</h5>
                        <form method="post" action="{{ route('admin.loan.update',$loan->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="principal" class="">
                                            Principal
                                        </label>
                                        <input required name="principal" id="principal" type="number" class="form-control" oninput="getPercentAmount();" required="required" value="{{$loan->principal}}"/>
                                        <i>principal.</i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="paid" class="">
                                            Paid
                                        </label>
                                        <input required name="paid" id="paid" type="number" class="form-control" required="required" value="{{$loan->paid}}"/>
                                        <i>paid.</i>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="interest" class="">
                                            Interest Percentage
                                        </label>
                                        <input required name="interest" id="interest" type="number" class="form-control" oninput="getPercentAmount();" required="required" value="{{$loan->paid}}"/>
                                        <i>interest percentage.</i>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="interest_amount" class="">
                                            Interest amount
                                        </label>
                                        <input required name="interest_amount" id="interest_amount" type="number" class="form-control" oninput="getPercentFromAmount();" required="required" value="{{$loan->interest}}"/>
                                        <i>interest amount.</i>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="position-relative form-group">
                                        <label for="total" class="">
                                            Total
                                        </label>
                                        <input required name="total" id="total" type="number" readonly class="form-control" required="required" value="{{$loan->total}}"/>
                                        <i>total.</i>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="date" class="">
                                            Date
                                        </label>
                                        <input required name="date" id="date" type="text" class="form-control" data-toggle="datepicker"/>
                                        <i>date.</i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="due_date" class="">
                                            Due Date
                                        </label>
                                        <input required name="due_date" id="due_date" type="text" class="form-control" data-toggle="datepicker"/>
                                        <i>due date.</i>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="account" class="">
                                            Account
                                        </label>
                                        <select required="required" style="width: 100%" {{ $errors->has('account') ? ' is-invalid' : '' }} name="account" id="account" class="loan-account-select form-control input-lg">
                                            <option selected disabled>Select Account</option>
                                            @foreach ($accounts as $account)
                                                <option @if($loan->account_id == $account->id) selected @endif value="{{$account->id}}">{{$account->name}} [{{$account->balance}}]</option>
                                            @endforeach
                                        </select>
                                        <i>account</i>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="position-relative form-group">
                                        <label for="contact" class="">
                                            Contact
                                        </label>
                                        <select required="required" style="width: 100%" {{ $errors->has('contact') ? ' is-invalid' : '' }} name="contact" id="contact" class="loan-contact-select form-control input-lg">
                                            <option selected disabled>Select Contact</option>
                                            @foreach ($contacts as $contact)
                                                <option @if($loan->contact_id == $contact->id) selected @endif value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} @if($contact->organization)[{{$contact->organization->name}}]@endif</option>
                                            @endforeach
                                        </select>
                                        <i>contact</i>
                                    </div>
                                </div>
                            </div>

                            <div class="position-relative form-group">
                                <label for="about" class="">
                                    About
                                </label>
                                <textarea name="about" id="about" class="form-control" required="required">{{$loan->about}}</textarea>
                                <i>about.</i>
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
                                    <div class="widget-subheading">{{$loan->user->name}}</div>
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
                                    <div class="widget-subheading">{{$loan->status->name}}</div>
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
                                    <div class="widget-subheading">{{$loan->created_at}}</div>
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
                                    <div class="widget-subheading">{{$loan->updated_at}}</div>
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
                                    <a role="tab" class="nav-link active" id="tab-c-1" data-toggle="tab" href="#payments">
                                        <span>Payments ({{$loan->payments->count()}})</span>
                                    </a>
                                </li>
                            </ul>

                            <div class="tab-content">

                                <div class="tab-pane active" id="payments" role="tabpanel">
                                    <div class="card-hover-shadow card-border mb-3 card">
                                        <div class="card-header">
                                            <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                            Payments
                                            <div class="btn-actions-pane-right">
                                                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addLoanPayment"><i class="fa fa-plus"></i> Payment</button>
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="col-lg-12">
                                                <div class="main-card mb-3 card">
                                                    <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                        <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Date</th>
                                                                    <th>Reference #</th>
                                                                    <th>Account</th>
                                                                    <th>Amount</th>
                                                                    <th>Status</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($loan->payments as $payment)
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
                                                                        @if($transaction->status_id == '04f83a7c-9c4e-47ff-8e26-41b3b83b03d0')
                                                                            <td class="text-right">
                                                                                @if($transaction->is_billed == False)
                                                                                    <div class="btn-group">
                                                                                        <a href="{{ route('admin.expense.show', $expense->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                                    </div>
                                                                                @else
                                                                                    <label class="label label-primary">Marked Billed</label>
                                                                                @endif
                                                                            </td>
                                                                        @else
                                                                            <td class="text-right">
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

                    <div class="card-footer">Footer</div>
                </div>
            </div>
        </div>
        {{-- action types --}}

    </div>

@endsection

@include('admin.components.modals.add_loan_payment')

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

            // {!! json_encode($loan->date) !!};
            let date_set = {!! json_encode($loan->date) !!};
            let substrings = date_set.split('-');
            var set_date = substrings[1] + '/' + substrings[2] + '/' + substrings[0];

            if(document.getElementById("date")){
                document.getElementById("date").value = set_date;
            }
            if(document.getElementById("loan_payment_date")){
                document.getElementById("loan_payment_date").value = date;
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

            let due_date_set = {!! json_encode($loan->due_date) !!};
            let start_repeat_substrings = due_date_set.split('-');
            var set_due_date = start_repeat_substrings[1] + '/' + start_repeat_substrings[2] + '/' + start_repeat_substrings[0];
            if(set_due_date){
                document.getElementById("due_date").value = set_due_date;
            }else{
                if(document.getElementById("due_date")){
                    document.getElementById("due_date").value = due_date;
                }
            }

        });

    </script>

    {{--  loan and loan calculate interest  --}}
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


    </script>
@endsection
