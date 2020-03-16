@extends('admin.layouts.app')

@section('title', ' Contact Order Create')

@section('content')

        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Orders</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{route('admin.dashboard')}}">Home</a>
                    </li>
                    {{--  <li>
                        <a href="{{route('business.sales')}}">Sales</a>
                    </li>  --}}
                    <li>
                        <a href="{{route('admin.orders')}}">Orders</a>
                    </li>
                    <li class="active">
                        <strong>Order Create</strong>
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
                                <form method="post" action="{{ route('admin.order.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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


                                    {{--  Product  --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <br>
                                            <div class="has-warning">
                                                <select name="contact" class="select2_demo_tag form-control input-lg">
                                                    <option selected value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} @if($contact->organization) [{{$contact->organization->name}}] @endif</option>
                                                </select>
                                                <i>contact</i>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="has-warning" id="data_1">
                                                        <div class="input-group date">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <input type="text" required="required" name="expiry_date" id="expiry_date" class="form-control input-lg">
                                                        </div>
                                                        <i>expiry date</i>
                                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="has-warning" id="data_1">
                                                        <div class="input-group date">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <input type="text" required="required" name="due_date" id="due_date" class="form-control input-lg">
                                                        </div>
                                                        <i>due date</i>
                                                        <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    {{--table--}}
                                    <div class="row">
                                        <table class="table table-bordered" id = "estimate_table">
                                            <thead>
                                            <tr>
                                                <th>Item Details</th>
                                                <th>Quantity</th>
                                                <th>Rate</th>
                                                <th>Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <select onchange = "itemSelected(this)" data-placement="Select" name="item_details[0][item]" class="select2_demo_tag form-control input-lg item-select">
                                                        <option selected disabled>Select Item</option>
                                                        @foreach($priceLists as $priceList)
                                                            <option value="{{$priceList->id}}" data-product-quantity = "-20" data-product-selling-price = "{{$priceList->price}}">{{$priceList->product->name}} [{{$priceList->size->size}} {{$priceList->sub_type->name}}] ({{$priceList->product->status->name}})</option>
                                                        @endforeach
                                                    </select>
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
                                        <label class="btn btn-small btn-primary pull-right" onclick = "addTableRow()">+ Add Another Line</label>
                                    </div>

                                    <hr>
                                    {{--sub totals--}}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input name="subtotal" type = "number" class="pull-right form-control input-lg" id = "items-subtotal" readonly value="0">
                                            <i>subtotal.</i>
                                        </div>
                                        <div class="col-md-4">
                                            <input name="discount" oninput = "itemTotalChange()" type="number" class="form-control input-lg" id = "adjustment-value" value = "0">
                                            <i>adjustment.</i>
                                        </div>
                                        <div class="col-md-4">
                                            <input type = "number" name = "grand_total" id = "grand-total" class="pull-right form-control input-lg" value = "0" readonly>
                                            <i>total.</i>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    {{--attachments--}}
                                    <div class="row">
                                        <div class="has-warning">
                                            <div class="col-md-12">
                                                <div class="has-warning">
                                                    <textarea id="customer_notes" rows="5" name="customer_notes" class="resizable_textarea form-control input-lg" required="required" placeholder="Customer notes..."></textarea>
                                                </div>
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
    function itemSelected (e) {
        var selectedItemQuantity = e.options[e.selectedIndex].getAttribute("data-product-quantity");
        var selectItemPrice = e.options[e.selectedIndex].getAttribute("data-product-selling-price");
        var selectedParentTd = e.parentElement;
        var selectedTr = selectedParentTd.parentElement;
        var itemQuantity = selectedTr.getElementsByClassName("item-quantity");
        var itemRate = selectedTr.getElementsByClassName("item-rate");
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
        var subTotal = [];
        var adjustedValue;
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
        var table = document.getElementById("estimate_table");
        var row = table.insertRow();
        var firstCell = row.insertCell(0);
        var secondCell = row.insertCell(1);
        var thirdCell = row.insertCell(2);
        var fourthCell = row.insertCell(3);
        var fifthCell = row.insertCell(4);
        firstCell.innerHTML = "<select onchange = 'itemSelected(this)' data-placement='Select' name='item_details["+tableValueArrayIndex+"][item]' class='select2_demo_tag form-control input-lg item-select'>"+
                                "<option selected disabled>Select Item</option>"+
                                "@foreach($priceLists as $priceList)"+
                                "<option value='{{$priceList->id}}' data-product-quantity = '-20' data-product-selling-price = '{{$priceList->price}}'>{{$priceList->product->name}} [{{$priceList->size->size}} {{$priceList->sub_type->name}}] ({{$priceList->product->status->name}})</option>"+
                                "@endforeach"+
                                "</select>";
        secondCell.innerHTML = "<input oninput = 'changeItemQuantity(this)' name='item_details["+tableValueArrayIndex+"][quantity]' type='number' class='form-control input-lg item-quantity' value = '0' min = '0'>";
        thirdCell.innerHTML = "<input oninput = 'changeItemRate(this)' name='item_details["+tableValueArrayIndex+"][rate]' type='number' class='form-control input-lg item-rate' placeholder='E.g +10, -10' value = '0' min = '0'>";
        fourthCell.innerHTML = "<input name='item_details["+tableValueArrayIndex+"][amount]' type='number' class='form-control input-lg item-total' placeholder='E.g +10, -10' value = '0' min = '0'>";
        fifthCell.innerHTML = "<span><i onclick = 'removeSelectedRow(this)' class = 'fa fa-minus-circle btn btn-danger'></i></span>";
        fifthCell.setAttribute("style", "width: 1em;");
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
        var displacement = 0;
        var removedIndex;
        while (displacement < tableValueArrayIndex) {
            if (removedFieldName == "item_details["+displacement+"][item]"){
                removedIndex = displacement;
            } else {
                var itemField = document.getElementsByName("item_details["+displacement+"][item]");
                var quantityField = document.getElementsByName("item_details["+displacement+"][quantity]");
                var rateField = document.getElementsByName("item_details["+displacement+"][rate]");
                if (removedIndex) {
                    if (displacement > removedIndex) {
                        var newIndex = displacement - 1;
                        itemField[0].setAttribute("name", "item_details["+newIndex+"][item]");
                        quantityField[0].setAttribute("name", "item_details["+newIndex+"][quantity]");
                        rateField[0].setAttribute("name", "item_details["+newIndex+"][rate]");
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
