@extends('admin.components.main')

@section('title','Order Create')

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
                            Orders
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
                        Order Create
                    </div>

                        <div class="card-body"><h5 class="card-title">Orders</h5>
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

                                <div class="position-relative form-group">
                                    <label for="contact" class="">
                                        Contact
                                    </label>
                                    <select required="required" style="width: 100%" {{ $errors->has('contact') ? ' is-invalid' : '' }} name="contact" id="contact" class="contact-select form-control input-lg">
                                        <option selected disabled>Select Contact</option>
                                        @foreach($contacts as $contact)
                                            <option value="{{$contact->id}}">{{$contact->first_name}} {{$contact->last_name}} @if($contact->organization) [{{$contact->organization->name}}] @endif</option>
                                        @endforeach
                                    </select>
                                    <i>expense account</i>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="date" class="">
                                                Due Date
                                            </label>
                                            <input required name="due_date" id="due_date" type="text" class="form-control" data-toggle="datepicker"/>
                                            <i>due .</i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="due_date" class="">
                                                Expiry Date
                                            </label>
                                            <input required name="expiry_date" id="expiry_date" type="text" class="form-control" data-toggle="datepicker"/>
                                            <i>expiry date.</i>
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
                                                    <select onchange = "itemSelected(this)" data-placement="Select" name="item_details[0][item]" required="required" style="width: 100%" {{ $errors->has('price_list') ? ' is-invalid' : '' }} id="price_list" class="price-list-select form-control input-lg">
                                                        <option>Select Price List</option>
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

                                <div class="has-warning">
                                    <textarea required name="customer_notes" placeholder="Notes" class="form-control" rows="7"></textarea>
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


            // Set expiry date
            var expiry = new Date();
            expiry.setDate(expiry.getDate() + 14);
            var expiry_dd = expiry.getDate();
            var expiry_mm = expiry.getMonth()+1;
            var expiry_yyyy = expiry.getFullYear();
            if (dd < 10){
                expiry_dd = '0'+expiry_dd;
            }
            if (expiry_mm < 10){
                expiry_mm = '0'+expiry_mm;
            }
            var expiry_date = expiry_mm + '/' + expiry_dd + '/' + expiry_yyyy;
            if(document.getElementById("expiry_date")){
                document.getElementById("expiry_date").value = expiry_date;
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
            firstCell.innerHTML = "<select onchange = 'itemSelected(this)' data-placement='Select' name='item_details["+tableValueArrayIndex+"][item]' class='price-list-select-"+tableValueArrayIndex+"' form-control input-lg'>"+
                                "<option>Select Price List</option>"+
                                "@foreach($priceLists as $priceList)"+
                                "<option value='{{$priceList->id}}' data-product-quantity = '-20' data-product-selling-price = '{{$priceList->price}}'>{{$priceList->product->name}} [{{$priceList->size->size}} {{$priceList->sub_type->name}}] ({{$priceList->product->status->name}})</option>"+
                                "@endforeach"+
                                "</select>";
            secondCell.innerHTML = "<input oninput = 'changeItemQuantity(this)' name='item_details["+tableValueArrayIndex+"][quantity]' type='number' class='form-control input-lg item-quantity' value = '0' min = '0'>";
            thirdCell.innerHTML = "<input oninput = 'changeItemRate(this)' name='item_details["+tableValueArrayIndex+"][rate]' type='number' class='form-control input-lg item-rate' placeholder='E.g +10, -10' value = '0' min = '0'>";
            fourthCell.innerHTML = "<input name='item_details["+tableValueArrayIndex+"][amount]' type='number' class='form-control input-lg item-total' placeholder='E.g +10, -10' value = '0' min = '0'>";
            fifthCell.innerHTML = "<span><i onclick = 'removeSelectedRow(this)' class = 'fa fa-minus-circle btn btn-danger'></i></span>";
            fifthCell.setAttribute("style", "width: 1em;")

            $(document).ready(function() {
                $('.price-list-select-'+tableValueArrayIndex+'').select2();
            });

            // $(".select-product-["+tableValueArrayIndex+"]").select2();

            tableValueArrayIndex++;

            // {{--  select 2  --}}
            // $(document).ready(function() {
            //     $('.select-2-["+tableValueArrayIndex+"]').select2();
            // });

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
