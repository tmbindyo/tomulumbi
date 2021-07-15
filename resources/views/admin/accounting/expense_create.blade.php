@extends('admin.components.main')

@section('title','Expense Create')

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
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">

                    <div class="card-header">
                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                        Expense Create
                    </div>

                        <div class="card-body"><h5 class="card-title">Expenses</h5>
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

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="expense_account" class="">
                                                Expense Account
                                            </label>
                                            <select required="required" style="width: 100%" {{ $errors->has('expense_account') ? ' is-invalid' : '' }} name="expense_account" id="expense_account" class="expense-account-select form-control input-lg">
                                                <option selected disabled>Select Expense Account</option>
                                                @foreach($expenseAccounts as $expenseAccount)
                                                    <option value="{{$expenseAccount->id}}">{{$expenseAccount->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>expense account</i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="date" class="">
                                                Date
                                            </label>
                                            <input required name="date" id="date" type="text" class="form-control" data-toggle="datepicker"/>
                                            <i>date.</i>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                {{-- table start --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered" id = "expense_table">
                                            <thead>
                                            <tr>
                                                <th>Item Details</th>
                                                <th width="150em">Quantity</th>
                                                <th width="150em">Rate</th>
                                                <th width="150em">Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <input name="item_details[0][item]" type="text" class="form-control input-lg item-detail">
                                                </td>
                                                <td>
                                                    <input oninput = "changeItemQuantity(this)" name="item_details[0][quantity]" type="number" class="form-control input-lg item-quantity" value = "0" min = "0">
                                                </td>
                                                <td>
                                                    <input oninput = "changeItemRate(this)" name="item_details[0][rate]" type="number" class="form-control input-lg item-rate" placeholder="E.g +10, -10" value = "0" min = "0">
                                                </td>
                                                <td>
                                                    <input oninput = "itemTotalChange()" onchange = "this.oninput()" name="item_details[0][amount]" type="number" class="form-control input-lg item-total" placeholder="E.g +10, -10" value = "0" min = "0">
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <label class="btn btn-small pull-right btn-primary" onclick = "addTableRow()">+ Add Another Line</label>
                                    </div>
                                </div>
                                {{-- table end --}}

                                <hr>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="subtotal" class="">
                                                Subtotal
                                            </label>
                                            <input name="subtotal" id="items-subtotal" readonly value="0" type="number" class="mb-2 form-control" {{ $errors->has('balance') ? ' is-invalid' : '' }} required="required">
                                            <i>subtotal</i>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="adjustment" class="">
                                                Adjustment
                                            </label>
                                            <input name="adjustment" id="adjustment-value" oninput="itemTotalChange()" type="number" class="mb-2 form-control" {{ $errors->has('balance') ? ' is-invalid' : '' }} required="required" value="0">
                                            <i>adjustment</i>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative form-group">
                                            <label for="subtotal" class="">
                                                Total
                                            </label>
                                            <input name="grand_total" id="grand-total" type="number" class="mb-2 form-control" {{ $errors->has('balance') ? ' is-invalid' : '' }} required="required" value="0" readonly>
                                            <i>total</i>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                {{-- Tie expense to something --}}

                                <div class="row">
                                    <div class="col-md-2">
                                        {{--  Customer  --}}
                                        <div class="checkbox checkbox-info">
                                            <input id="is_order" name="is_order" @isset($orderExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_order') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                            <label for="is_order">
                                                Order
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="has-warning">
                                            <div class="has-warning">
                                                <select name="order" class="order-select form-control input-lg">
                                                    <option selected disabled>Select Order</option>
                                                    @foreach($orders as $order)
                                                        <option @isset($orderExists) @if($orderExists->id == $order->id) selected @endif @endisset value="{{$order->id}}" >{{$order->order_number}} [{{$order->total}}] ({{$order->created_at}})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {{--  Customer  --}}
                                        <div class="checkbox checkbox-info">
                                            <input id="is_album" name="is_album" @isset($albumExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_album') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                            <label for="is_album">
                                                Album
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="has-warning">
                                            <div class="has-warning">
                                                <select name="album" class="album-select form-control input-lg">
                                                    <option selected disabled>Select Album</option>
                                                    <optgroup label="Personal">
                                                        @foreach($personalAlbums as $album)
                                                            <option @isset($albumExists) @if($albumExists->id == $album->id) selected @endif @endisset value="{{$album->id}}" >{{$album->name}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                    <optgroup label="Client">
                                                        @foreach($clientProofs as $album)
                                                            <option @isset($albumExists) @if($albumExists->id == $album->id) selected @endif @endisset value="{{$album->id}}" >{{$album->name}}</option>
                                                        @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        {{--  Customer  --}}
                                        <div class="checkbox checkbox-info">
                                            <input id="is_project" name="is_project" @isset($projectExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_project') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                            <label for="is_project">
                                                Project
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="has-warning">
                                            <div class="has-warning">
                                                <select name="project" class="project-select form-control input-lg">
                                                    <option selected disabled>Select Project</option>
                                                    @foreach($projects as $project)
                                                        <option @isset($projectExists) @if($projectExists->id == $project->id) selected @endif @endisset value="{{$project->id}}" >{{$project->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {{--  Customer  --}}
                                        <div class="checkbox checkbox-info">
                                            <input id="is_design" name="is_design" @isset($designExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_design') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                            <label for="is_design">
                                                Design
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="has-warning">
                                            <div class="has-warning">
                                                <select name="design" class="design-select form-control input-lg">
                                                    <option selected disabled>Select Design</option>
                                                    @foreach($designs as $design)
                                                        <option @isset($designExists) @if($designExists->id == $design->id) selected @endif @endisset value="{{$design->id}}" >{{$design->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        {{--  Customer  --}}
                                        <div class="checkbox checkbox-info">
                                            <input id="is_transfer" name="is_transfer" @isset($transferExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_transfer') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                            <label for="is_transfer">
                                                Transfer
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="has-warning">
                                            <div class="has-warning">
                                                <select name="transfer" class="transfer-select form-control input-lg">
                                                    <option selected disabled>Select Transfer</option>
                                                    @foreach($transfers as $transfer)
                                                        <option @isset($transferExists) @if($transferExists->id == $transfer->id) selected @endif @endisset value="{{$transfer->id}}" >{{$transfer->reference}} [{{$transfer->amount}}] ({{$transfer->date}})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {{--  Customer  --}}
                                        <div class="checkbox checkbox-info">
                                            <input id="is_campaign" name="is_campaign" @isset($campaignExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_campaign') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                            <label for="is_campaign">
                                                Campaign
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="has-warning">
                                            <div class="has-warning">
                                                <select name="campaign" class="campaign-select form-control input-lg">
                                                    <option selected disabled>Select Campaign</option>
                                                    @foreach($campaigns as $campaign)
                                                        <option @isset($campaignExists) @if($campaignExists->id == $campaign->id) selected @endif @endisset value="{{$campaign->id}}" >{{$campaign->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-2">
                                        {{--  Customer  --}}
                                        <div class="checkbox checkbox-info">
                                            <input id="is_asset" name="is_asset" @isset($assetExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_asset') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                            <label for="is_asset">
                                                Asset
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="has-warning">
                                            <div class="has-warning">
                                                <select name="asset" class="asset-select form-control input-lg">
                                                    <option selected disabled>Select Asset</option>
                                                    @foreach($assets as $asset)
                                                        <option @isset($assetExists) @if($assetExists->id == $asset->id) selected @endif @endisset value="{{$asset->id}}" >{{$asset->name}} [{{$asset->reference}}]</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        {{--  Customer  --}}
                                        <div class="checkbox checkbox-info">
                                            <input id="is_liability" name="is_liability" @isset($liabilityExists) checked @endisset type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_liability') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                            <label for="is_liability">
                                                Liability
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="has-warning">
                                            <div class="has-warning">
                                                <select name="liability" class="liability-select form-control input-lg">
                                                    <option selected disabled>Select Liability</option>
                                                    @foreach($liabilities as $liability)
                                                        <option @isset($liabilityExists) @if($liabilityExists->id == $liability->id) selected @endif @endisset value="{{$liability->id}}" >{{$liability->reference}} [{{$liability->amount}}] ({{$liability->date}})</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-md-2">
                                        {{--  Customer  --}}
                                        <div class="checkbox checkbox-info">
                                            <label for="is_recurring">
                                                Frequency
                                            </label>
                                            <br>
                                            <input id="is_recurring" name="is_recurring" type="checkbox" data-on="Yes" data-off="No" {{ $errors->has('is_recurring') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="has-warning">
                                            <label for="frequency" class="">
                                                Select Frequency
                                            </label>
                                            <div class="has-warning">
                                                <select name="frequency" class="frequency-select form-control input-lg">
                                                    <option selected disabled>Select frequency</option>
                                                    @foreach($frequencies as $frequency)
                                                        <option value="{{$frequency->id}}" >{{$frequency->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <i>frequency.</i>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="start_date" class="">
                                                Start Date
                                            </label>
                                            <input required name="start_date" id="start_date" type="text" class="form-control" data-toggle="datepicker"/>
                                            <i>start date.</i>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative form-group">
                                            <label for="end_date" class="">
                                                End Date
                                            </label>
                                            <input required name="end_date" id="end_date" type="text" class="form-control" data-toggle="datepicker"/>
                                            <i>end date.</i>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="checkbox checkbox-info">
                                                    <input id="is_contact" name="is_contact" type="checkbox"  data-on="Yes" data-off="No" {{ $errors->has('is_recurring') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                                    <label for="is_contact">
                                                        Contact
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="has-warning">
                                                    <select name="contact" class="contact-select form-control input-lg">
                                                        <option selected disabled>Select contact</option>
                                                        @foreach($contacts as $contact)
                                                            <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} @if($contact->organization) [{{$contact->organization->name}}] @endif </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        {{--  Customer  --}}
                                        <label for="is_draft">
                                            Status
                                        </label>
                                        <div class="has-warning">
                                            <select name="status" class="status-select form-control input-lg" required>
                                                <option selected disabled>Select status</option>
                                                @foreach($expenseStatuses as $status)
                                                    <option value="{{$status->id}}" >{{$status->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>status.</i>
                                        </div>
                                        <br>
                                        {{--  Customer  --}}
                                        <div class="checkbox checkbox-info">
                                            <input id="is_draft" name="is_draft" type="checkbox"  data-on="Yes" data-off="No" {{ $errors->has('is_draft') ? ' is-invalid' : '' }} data-toggle="toggle" data-size="normal">
                                            <label for="is_draft">
                                                Draft
                                             </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="has-warning">
                                            <textarea required name="notes" placeholder="Notes" class="form-control" rows="7"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                        <button type="submit" class="btn btn-outline btn-block btn-success">{{ __('SAVE') }}</button>
                                    </div>
                                </div>


                            </form>
                        </div>

                    <div class="card-footer">Footer</div>
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

    <script>
        var subTotal = [];
        var adjustedValue;
        function itemSelected (e) {
            var selectedItemQuantity = e.options[e.selectedIndex].getAttribute("data-product-quantity");
            var selectItemPrice = e.options[e.selectedIndex].getAttribute("data-product-selling-price");
            var selectedParentTd = e.parentElement;
            var selectedTr = selectedParentTd.parentElement;
            var itemQuantity = selectedTr.getElementsByClassName("item-quantity");
            var itemRate = selectedTr.getElementsByClassName("item-rate");
            // -20 is an arbitrary value set to indicate that an item is a service and so has no limit
            if (selectedItemQuantity === "-20") {
                itemQuantity[0].setAttribute("max", 100000000);
            } else {
                itemQuantity[0].setAttribute("max", selectedItemQuantity);
            };
            itemRate[0].value = selectItemPrice;
        };
        function changeItemQuantity (e) {
            var quantityValue;
            if (e.value.isEmpty) {
                quantityValue = 0;
            } else {
                quantityValue = e.value;
            };
            var selectedParentTd = e.parentElement;
            var selectedTr = selectedParentTd.parentElement;
            var itemRateInputField = selectedTr.getElementsByClassName("item-rate");
            var itemTotalInputField = selectedTr.getElementsByClassName("item-total");
            var itemRate;
            if (itemRateInputField[0].value.isEmpty) {
                itemRate = 0;
            } else {
                itemRate = itemRateInputField[0].value;
            };
            itemTotalInputField[0].value = quantityValue * itemRate;
            itemTotalChange();
        };
        function changeItemRate (e) {
            var itemRate;
            if (e.value.isEmpty) {
                itemRate = 0;
            } else {
                itemRate = e.value;
            };
            var selectedParentTd = e.parentElement;
            var selectedTr = selectedParentTd.parentElement;
            var itemQuantityInputField = selectedTr.getElementsByClassName("item-quantity");
            var itemTotalInputField = selectedTr.getElementsByClassName("item-total");
            var quantityValue;
            if (itemQuantityInputField[0].value.isEmpty) {
                quantityValue = 0;
            } else {
                quantityValue = itemQuantityInputField[0].value;
            };
            itemTotalInputField[0].value = quantityValue * itemRate;
            itemTotalChange();
        };
        var tableValueArrayIndex = 1;
        function addTableRow () {
            var table = document.getElementById("expense_table");
            var row = table.insertRow();
            var firstCell = row.insertCell(0);
            var secondCell = row.insertCell(1);
            var thirdCell = row.insertCell(2);
            var fourthCell = row.insertCell(3);
            var fifthCell = row.insertCell(4);
            firstCell.innerHTML = "<input name='item_details["+tableValueArrayIndex+"][item]' type='text' class='form-control input-lg item-detail'>";
            secondCell.innerHTML = "<input oninput = 'changeItemQuantity(this)' name='item_details["+tableValueArrayIndex+"][quantity]' type='number' class='form-control input-lg item-quantity' value = '0' min = '0'>";
            thirdCell.innerHTML = "<input oninput = 'changeItemRate(this)' name='item_details["+tableValueArrayIndex+"][rate]' type='number' class='form-control input-lg item-rate' placeholder='E.g +10, -10' value = '0' min = '0'>";
            fourthCell.innerHTML = "<input name='item_details["+tableValueArrayIndex+"][amount]' type='number' class='form-control input-lg item-total' placeholder='E.g +10, -10' value = '0' min = '0'>";
            fifthCell.innerHTML = "<span><i onclick = 'removeSelectedRow(this)' class = 'fa fa-minus-circle btn btn-danger'></i></span>";
            fifthCell.setAttribute("style", "width: 1em;")
            tableValueArrayIndex++;
        };
        function removeSelectedRow (e) {
            var selectedParentTd = e.parentElement.parentElement;
            var selectedTr = selectedParentTd.parentElement;
            var selectedTable = selectedTr.parentElement;
            var removed = selectedTr.getElementsByClassName("item-detail")[0].getAttribute("name");
            adjustTableInputFieldsIndex(removed);
            selectedTable.removeChild(selectedTr);
            tableValueArrayIndex--;
            itemTotalChange();
        };
        function adjustTableInputFieldsIndex (removedFieldName) {
            // Fields whose values are submitted are:
            // 1. item_details[][item]
            // 2. item_details[][quantity]
            // 3. item_details[][rate]
            // 4. item_details[][amount]
            var displacement = 0;
            var removedIndex;
            while (displacement < tableValueArrayIndex) {
                if (removedFieldName == "item_details["+displacement+"][item]"){
                    removedIndex = displacement;
                } else {
                    var itemField = document.getElementsByName("item_details["+displacement+"][item]");
                    var quantityField = document.getElementsByName("item_details["+displacement+"][quantity]");
                    var rateField = document.getElementsByName("item_details["+displacement+"][rate]");
                    var amountField = document.getElementsByName("item_details["+displacement+"][amount]");
                    if (removedIndex) {
                        if (displacement > removedIndex) {
                            var newIndex = displacement - 1;
                            itemField[0].setAttribute("name", "item_details["+newIndex+"][item]");
                            quantityField[0].setAttribute("name", "item_details["+newIndex+"][quantity]");
                            rateField[0].setAttribute("name", "item_details["+newIndex+"][rate]");
                            amountField[0].setAttribute("name", "item_details["+newIndex+"][amount]");
                        };
                    };
                };
                displacement++;
            };
        };
        function itemTotalChange () {
            subTotal = [];
            var itemTotals = document.getElementsByClassName("item-total");
            for (singleTotal of itemTotals) {
                subTotal.push(Number(singleTotal.value));
            };
            var itemSubTotal = subTotal.reduce((a, b) => a + b, 0);
            document.getElementById("items-subtotal").value = itemSubTotal;
            document.getElementById("grand-total").innerHTML = itemSubTotal;
            var adjustedValueInputValue = document.getElementById("adjustment-value").value;
            if (adjustedValueInputValue.isEmpty) {
                adjustedValue = 0
            } else {
                adjustedValue = adjustedValueInputValue;
            };
            document.getElementById("adjustment-value").innerHTML = adjustedValue;
            var adjustedTotal = Number(adjustedValue) + Number(itemSubTotal);
            document.getElementById("grand-total").value = adjustedTotal;
        };
    </script>
@endsection
