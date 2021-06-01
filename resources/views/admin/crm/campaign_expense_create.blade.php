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
                        <strong>CRM</strong>
                    </li>
                    <li class="active">
                        <strong><a href="{{route('admin.campaigns')}}">Campaigns</a></strong>
                    </li>
                    <li class="active">
                        <strong><a href="{{route('admin.campaign.show',$campaign->id)}}">Campaign</a></strong>
                    </li>
                    <li class="active">
                        <strong>Campaign Expense Create</strong>
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
                                            {{--  expense type  --}}
                                            <div class="has-warning">
                                                <select name="expense_account" class="select-2 form-control input-lg">
                                                    <option selected disabled>Select Expense Account</option>
                                                    @foreach($expenseAccounts as $expenseAccount)
                                                        <option value="{{$expenseAccount->id}}">{{$expenseAccount->name}}</option>
                                                    @endforeach
                                                </select>
                                                <i> expense account.</i>
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
                                    <br>
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
                                    {{--  <br>  --}}
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
                                    <br>
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
                                                <i> end date</i>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
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
                                            <div class="row">
                                                <div class="col-md-3">
                                                    {{--  Customer  --}}
                                                    <div class="checkbox checkbox-info">
                                                        <input id="is_campaign" name="is_campaign" type="checkbox" checked>
                                                        <label for="is_campaign">
                                                            Campaign
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="has-warning">
                                                        <div class="has-warning">
                                                            <select name="campaign" class="select-2 form-control input-lg">
                                                                <option value="{{$campaign->id}}" >{{$campaign->name}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            {{--  draft  --}}
                                            <div class="has-warning">
                                                <div class="checkbox checkbox-info">
                                                    <input id="is_draft" name="is_draft" type="checkbox">
                                                    <label for="is_draft">
                                                        Save As Draft
                                                    </label>
                                                    <span><i data-toggle="tooltip" data-placement="right" title="Check this option if you want to save this as a draft for further editing." class="fa fa-2x fa-question-circle"></i></span>
                                                </div>
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
