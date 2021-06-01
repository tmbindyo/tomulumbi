@extends('admin.components.main')

@section('title','Liability Create')

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
                            Liability Create
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


        <div class="row">
            <div class="col-md-8">
                <div class="main-card mb-3 card">

                    <div class="card-header">
                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                        Liability Create
                    </div>

                        <div class="card-body"><h5 class="card-title">Liabilitys</h5>
                            <form method="post" action="{{ route('admin.expense.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                    <label for="principal" class="">
                                        Principal
                                    </label>
                                    <input required name="principal" id="principal" type="number" class="form-control" oninput="getPercentAmount();" required="required" value="0"/>
                                    <i>principal.</i>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="interest" class="">
                                                Interest Percentage
                                            </label>
                                            <input required name="interest" id="interest" type="number" class="form-control" oninput="getPercentAmount();" required="required" value="0"/>
                                            <i>interest percentage.</i>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="interest_amount" class="">
                                                Interest amount
                                            </label>
                                            <input required name="interest_amount" id="interest_amount" type="number" class="form-control" oninput="getPercentFromAmount();" required="required" value="0"/>
                                            <i>interest amount.</i>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="total" class="">
                                                Total
                                            </label>
                                            <input required name="total" id="total" type="number" readonly class="form-control" required="required" value="0"/>
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
                                            <select required="required" style="width: 100%" {{ $errors->has('account') ? ' is-invalid' : '' }} name="account" id="account" class="account-select form-control input-lg">
                                                <option selected disabled>Select Account</option>
                                                @foreach ($accounts as $account)
                                                    <option value="{{$account->id}}">{{$account->name}} [{{$account->balance}}]</option>
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
                                            <select required="required" style="width: 100%" {{ $errors->has('contact') ? ' is-invalid' : '' }} name="contact" id="contact" class="contact-select form-control input-lg">
                                                <option selected disabled>Select Contact</option>
                                                @foreach ($contacts as $contact)
                                                    <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} @if($contact->organization)[{{$contact->organization->name}}]@endif</option>
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
                                    <textarea name="about" id="about" class="form-control" required="required"> </textarea>
                                    <i>about.</i>
                                </div>

                                <hr>

                                <div class="row">
                                        <button type="submit" class="btn btn-outline btn-block btn-success">{{ __('SAVE') }}</button>
                                    </div>
                                </div>


                            </form>
                        </div>

                </div>
            </div>
        </div>
        {{-- action types --}}

    </div>

@endsection


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

    {{--  liability and loan calculate interest  --}}
    <script>

        function getPercentAmount() {
            var principal = document.getElementById('principal').value;
            var interest = document.getElementById('interest').value;
            {{--  get percentage  --}}
            var percentage = interest /100;
            var interest_amount = parseFloat(principal) * parseFloat(percentage);
            var payback = parseFloat(principal) + parseFloat(interest_amount);
            {{--  set values  --}}
            document.getElementById("interest_amount").value = interest_amount;
            document.getElementById("total").value = payback;

        }

        function getPercentFromAmount() {
            var principal = document.getElementById('principal').value;
            var interest_amount = document.getElementById('interest_amount').value;
            {{--  get total  --}}
            var total = parseFloat(principal)+parseFloat(interest_amount)
            {{--  get percentage  --}}
            var percentage = parseFloat(interest_amount)/parseFloat(principal)
            var interestPercentage = parseFloat(percentage)*100;
            {{--  set values  --}}
            document.getElementById("interest").value = interestPercentage.toFixed(5);
            document.getElementById("total").value = total;

        }
    </script>


@endsection
