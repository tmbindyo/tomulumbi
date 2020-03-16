@extends('admin.layouts.app')

@section('title', ' Quote Create')

@section('content')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Quotes</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{route('admin.dashboard')}}">Home</a>
                    </li>
                    <li>
                        <a href="#">CRM</a>
                    </li>
                    <li>
                        <a href="{{route('admin.quotes')}}">Quotes</a>
                    </li>
                    <li>
                        <a href="{{route('admin.quote.show',$quote->id)}}">Quote</a>
                    </li>
                    <li class="active">
                        <strong>Quote Edit</strong>
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
                                <form method="post" action="{{ route('admin.quote.update',$quote->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                    {{--  Product  --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            {{--  Customer  --}}
                                            <div class="has-warning">
                                                <select name="deal" class="select2_demo_deal form-control input-lg" required>
                                                    <option></option>
                                                    @foreach($deals as $deal)
                                                        <option @if($deal->id == $quote->deal_id) selected @endif value="{{$deal->id}}">{{$deal->reference}} [{{$deal->amount}}]</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            {{--  taxes  --}}
                                            <div class="has-warning">
                                                <select name="taxes[]" class="select2_demo_taxes form-control input-lg" multiple>
                                                    @foreach($taxes as $tax)
                                                        <option @foreach($quote->quote_taxes as $quote_tax) @if($quote_tax->tax_id == $tax->id) selected @endif @endforeach value="{{$tax->id}}">{{$tax->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning" id="data_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" name="date" class="form-control input-lg" value="{{$quote->date}}">
                                                </div>
                                                <i>closing date for the deal.</i>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning" id="data_1">
                                                <div class="input-group date">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                    <input type="text" name="closing_date" class="form-control input-lg" value="{{$quote->due_date}}">
                                                </div>
                                                <i>due date for the quote.</i>
                                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    {{--table--}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-bordered" id = "quote_table">
                                                <thead>
                                                <tr>
                                                    <th>Item Details</th>
                                                    <th width="190em">Quantity</th>
                                                    <th width="190em">Rate</th>
                                                    <th width="190em">Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $product_index = 0
                                                @endphp
                                                @foreach($quote->quote_items as $quoteItems)
                                                    <tr>
                                                        <td>
                                                            <input name="item_details[0][item]" type="text" class="form-control input-lg item-select" value = "{{$quoteItems->product}}">
                                                        </td>
                                                        <td>
                                                            <input oninput = "changeItemQuantity(this)" name="item_details[{{$product_index}}][quantity]" type="number" class="form-control input-lg item-quantity" value = "{{$quoteItems->quantity}}" min = "0">
                                                        </td>
                                                        <td>
                                                            <input oninput = "changeItemRate(this)" name="item_details[{{$product_index}}][rate]" type="number" class="form-control input-lg item-rate" placeholder="E.g +10, -10" value = "{{$quoteItems->rate}}" min = "0">
                                                        </td>
                                                        <td>
                                                            <input oninput = "itemTotalChange()" onchange = "this.oninput()" name="item_details[{{$product_index}}][amount]" type="number" class="form-control input-lg item-total" placeholder="E.g +10, -10" value = "{{$quoteItems->amount}}" min = "0">
                                                        </td>
                                                        <td style = "width: 1em;">
                                                            <span><i onclick = "removeSelectedRow(this)" class = "fa fa-minus-circle btn btn-danger"></i></span>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $product_index++
                                                    @endphp
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <label class="btn btn-small btn-primary pull-right" onclick = "addTableRow()">+ Add Another Line</label>
                                        </div>
                                    </div>
                                    <hr>
                                    {{--sub totals--}}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input name="subtotal" type = "number" class="pull-right form-control input-lg" id = "items-subtotal" readonly value="{{$quote->subtotal}}">
                                            <i>Sub Total</i>
                                        </div>
                                        <div class="col-md-4">
                                            <input name="discount" oninput = "itemTotalChange()" type="number" class="form-control input-lg" id = "adjustment-value" value = "{{$quote->discount}}">
                                            <i>discount</i>
                                        </div>
                                        <div class="col-md-4">
                                            <input type = "number" name = "grand_total" id = "grand-total" class="pull-right form-control input-lg" value = "{{$quote->total}}" readonly>
                                            <i>discount</i>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    {{--attachments--}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <textarea rows="5" id="customer_notes" name="customer_notes" required="required" class="form-control input-lg">{{$quote->customer_notes}}</textarea>
                                                <i>customer notes</i>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="has-warning">
                                                <textarea rows="5" id="terms_and_conditions" name="terms_and_conditions" required="required" class="form-control input-lg">{{$quote->terms_and_conditions}}</textarea>
                                                <i>terms and conditions</i>
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
        var table = document.getElementById("quote_table");
        var row = table.insertRow();
        var firstCell = row.insertCell(0);
        var secondCell = row.insertCell(1);
        var thirdCell = row.insertCell(2);
        var fourthCell = row.insertCell(3);
        var fifthCell = row.insertCell(4);
        firstCell.innerHTML = "<input name='item_details["+tableValueArrayIndex+"][item]' type='text' class='form-control input-lg item-name'>";
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
        var removed = selectedTr.getElementsByClassName("item-select")[0].getAttribute("name");
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
