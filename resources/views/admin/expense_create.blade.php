@extends('admin.layouts.app')

@section('title', ' Expense Create')

@section('content')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Expenses</h2>
                <ol class="breadcrumb">
                    <li>
                        <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                    </li>
                    <li>
                        <strong><a href="{{route('admin.orders')}}">Orders</a></strong>
                    </li>
                    <li>
                        <strong><a href="{{route('admin.expenses')}}">Expenses</a></strong>
                    </li>
                    <li class="active">
                        <strong>Expense Create</strong>
                    </li>
                </ol>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">

                            <div class="">
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

                                    <br>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <select name="expense_account" class="select-2 form-control input-lg">
                                                    <option selected disabled>Select Expense Account</option>
                                                    @foreach($expenseAccounts as $expenseAccount)
                                                        <option value="{{$expenseAccount->id}}">{{$expenseAccount->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning" id="data_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" name="date" id="date" class="form-control input-lg" required>
                                                </div>
                                                <i> expense date.</i>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    {{--table--}}
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
                                    <hr>
                                    {{--sub totals--}}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input name="subtotal" type = "number" class="pull-right input-lg form-control" id = "items-subtotal" readonly value="0">
                                            <i>subtotal.</i>
                                        </div>
                                        <div class="col-md-4">
                                            <input name="adjustment" oninput = "itemTotalChange()" type="number" class="form-control input-lg" id = "adjustment-value" value = "0">
                                            <i>adjustment.</i>
                                        </div>
                                        <div class="col-md-4">
                                            <input type = "number" name = "grand_total" id = "grand-total" class="pull-right input-lg form-control" value = "0" readonly>
                                            <i>total.</i>
                                        </div>
                                    </div>
                                    <hr>
                                    {{--  Tie expense to something  --}}
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2">
                                            {{--  Customer  --}}
                                            <div class="checkbox checkbox-info">
                                                <input id="is_order" name="is_order" type="checkbox">
                                                <label for="is_order">
                                                    Order
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="has-warning">
                                                <div class="has-warning">
                                                    <select name="order" class="select-2 form-control input-lg">
                                                        <option selected disabled>Select Order</option>
                                                        @foreach($orders as $order)
                                                            <option value="{{$order->id}}" >{{$order->order_number}} [{{$order->total}}] ({{$order->created_at}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            {{--  Customer  --}}
                                            <div class="checkbox checkbox-info">
                                                <input id="is_album" name="is_album" type="checkbox">
                                                <label for="is_album">
                                                    Album
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="has-warning">
                                                <div class="has-warning">
                                                    <select name="album" class="select-2 form-control input-lg">
                                                        <option selected disabled>Select Album</option>
                                                        <optgroup label="Personal">
                                                            @foreach($personalAlbums as $album)
                                                                <option value="{{$album->id}}" >{{$album->name}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                        <optgroup label="Client">
                                                            @foreach($clientProofs as $album)
                                                                <option value="{{$album->id}}" >{{$album->name}}</option>
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
                                                <input id="is_project" name="is_project" type="checkbox">
                                                <label for="is_project">
                                                    Project
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="has-warning">
                                                <div class="has-warning">
                                                    <select name="project" class="select-2 form-control input-lg">
                                                        <option selected disabled>Select Project</option>
                                                        @foreach($projects as $project)
                                                            <option value="{{$project->id}}" >{{$project->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            {{--  Customer  --}}
                                            <div class="checkbox checkbox-info">
                                                <input id="is_design" name="is_design" type="checkbox">
                                                <label for="is_design">
                                                    Design
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="has-warning">
                                                <div class="has-warning">
                                                    <select name="design" class="select-2 form-control input-lg">
                                                        <option selected disabled>Select Design</option>
                                                        @foreach($designs as $design)
                                                            <option value="{{$design->id}}" >{{$design->name}}</option>
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
                                                <input id="is_transfer" name="is_transfer" type="checkbox">
                                                <label for="is_transfer">
                                                    Transfer
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="has-warning">
                                                <div class="has-warning">
                                                    <select name="transfer" class="select-2 form-control input-lg">
                                                        <option selected disabled>Select Transfer</option>
                                                        @foreach($transfers as $transfer)
                                                            <option value="{{$transfer->id}}" >{{$transfer->reference}} [{{$transfer->amount}}] ({{$transfer->date}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            {{--  Customer  --}}
                                            <div class="checkbox checkbox-info">
                                                <input id="is_campaign" name="is_campaign" type="checkbox">
                                                <label for="is_campaign">
                                                    Campaign
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="has-warning">
                                                <div class="has-warning">
                                                    <select name="campaign" class="select-2 form-control input-lg">
                                                        <option selected disabled>Select Campaign</option>
                                                        @foreach($campaigns as $campaign)
                                                            <option value="{{$campaign->id}}" >{{$campaign->name}}</option>
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
                                                <input id="is_asset" name="is_asset" type="checkbox">
                                                <label for="is_asset">
                                                    Asset
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="has-warning">
                                                <div class="has-warning">
                                                    <select name="asset" class="select-2 form-control input-lg">
                                                        <option selected disabled>Select Asset</option>
                                                        @foreach($assets as $asset)
                                                            <option value="{{$asset->id}}" >{{$asset->name}} [{{$asset->reference}}]</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            {{--  Customer  --}}
                                            <div class="checkbox checkbox-info">
                                                <input id="is_liability" name="is_liability" type="checkbox">
                                                <label for="is_liability">
                                                    Liability
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="has-warning">
                                                <div class="has-warning">
                                                    <select name="liability" class="select-2 form-control input-lg">
                                                        <option selected disabled>Select Liability</option>
                                                        @foreach($liabilities as $liability)
                                                            <option value="{{$liability->id}}" >{{$liability->reference}} [{{$liability->amount}}] ({{$liability->date}})</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>


                                    {{--attachments--}}
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="checkbox checkbox-info">
                                                <input id="is_recurring" name="is_recurring" type="checkbox">
                                                <label for="is_recurring">
                                                    Recurring
                                                </label>
                                                <span><i data-toggle="tooltip" data-placement="right" title="Check this option if you want to save this as a draft for further editing." class="fa fa-2x fa-question-circle"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="has-warning">
                                                <select name="frequency" class="select-2 form-control input-lg">
                                                    <option selected disabled>Select frequency</option>
                                                    @foreach($frequencies as $frequency)
                                                        <option value="{{$frequency->id}}" >{{$frequency->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="has-warning" id="data_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" name="start_date" id="start_date" class="form-control input-lg" required>
                                                </div>
                                                <i> start date.</i>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="has-warning" id="data_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" name="end_date" id="end_date" class="form-control input-lg" required>
                                                </div>
                                                <i> end date (leave blank if no end date)</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="checkbox checkbox-info">
                                                        <input id="is_contact" name="is_contact" type="checkbox">
                                                        <label for="is_contact">
                                                            Contact
                                                        </label>
                                                        <span><i data-toggle="tooltip" data-placement="right" title="Check this option if it is a contact linked expense." class="fa fa-2x fa-question-circle"></i></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="has-warning">
                                                        <select name="contact" class="select-2 form-control input-lg">
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
                                            <div class="has-warning">
                                                <select name="status" class="select-2 form-control input-lg" required>
                                                    <option selected disabled>Select status</option>
                                                    @foreach($expenseStatuses as $status)
                                                        <option value="{{$status->id}}" >{{$status->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            {{--  Customer  --}}
                                            <div class="checkbox checkbox-info">
                                                <input id="is_draft" name="is_draft" type="checkbox">
                                                <label for="is_draft">
                                                    Save As Draft
                                                </label>
                                                <span><i data-toggle="tooltip" data-placement="right" title="Check this option if you want to save this as a draft for further editing." class="fa fa-2x fa-question-circle"></i></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <textarea name="notes" placeholder="Notes" class="form-control" rows="7"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-block btn-outline btn-lg mt-4">{{ __('SAVE') }}</button>
                                    </div>

                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>


        </div>

@endsection

@section('js')




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
