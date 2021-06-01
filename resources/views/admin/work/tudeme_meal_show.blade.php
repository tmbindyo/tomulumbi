@extends('admin.layouts.app')

@section('title', 'Meal Show')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Meals</h2>
            <ol class="breadcrumb">
                <li>
                    <strong><a href="{{route('admin.dashboard')}}">Home</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.tudeme')}}">Tudeme</a></strong>
                </li>
                <li class="active">
                    <strong><a href="{{route('admin.tudeme.show',$tudemeMeal->tudeme_id)}}">Tudeme</a></strong>
                </li>
                <li class="active">
                    <strong>Meal Show</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="ibox">

                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.tudeme.meal.update',$tudemeMeal->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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

                                {{--  meal details  --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="has-warning">
                                            <input type="text" id="name"  name="name" required="required"  value="{{$tudemeMeal->name}}" class="form-control input-lg">
                                            <i>name</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <input type="number" id="cook_time" name="cook_time" required="required" value="{{$tudemeMeal->cook_time}}" class="form-control input-lg">
                                            <i>cook time</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <textarea rows="9" id="description" name="description" required="required" placeholder="Brief description" class="form-control input-lg">{{$tudemeMeal->description}}</textarea>
                                            <i>description</i>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="has-warning">
                                                    <select required="required" name="cuisine" class="select2_demo_cuisine form-control input-lg">
                                                        <option></option>
                                                        @foreach($cuisines as $cuisine)
                                                            <option @if($tudemeMeal->cuisine_id == $cuisine->id) selected @endif value="{{$cuisine->id}}">{{$cuisine->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>cuisine</i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="has-warning">
                                                    <select required="required" name="cooking_skill" class="select2_demo_cooking_skill form-control input-lg">
                                                        <option></option>
                                                        @foreach($cookingSkills as $cookingSkill)
                                                            <option @if($tudemeMeal->cooking_skill_id == $cookingSkill->id) selected @endif value="{{$cookingSkill->id}}">{{$cookingSkill->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>cooking skill</i>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="has-warning">
                                                    <select required="required" name="cooking_styles[]" class="select2_demo_cooking_style form-control input-lg" multiple="multiple">
                                                        <option></option>
                                                        @foreach($cookingStyles as $cookingStyle)
                                                            <option @foreach($tudemeMeal->meal_cooking_styles as $mealCookingStyle) @if($mealCookingStyle->cooking_style_id == $cookingStyle->id) selected @endif @endforeach value="{{$cookingStyle->id}}">{{$cookingStyle->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>cooking style</i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="has-warning">
                                                    <select required="required" name="dish_type" class="select2_demo_dish_type form-control input-lg">
                                                        <option></option>
                                                        @foreach($dishTypes as $dishType)
                                                            <option @if($tudemeMeal->dish_type_id == $dishType->id) selected @endif value="{{$dishType->id}}">{{$dishType->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>dish type</i>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="has-warning">
                                                    <select required="required" name="course[]" class="select2_demo_course form-control input-lg" multiple="multiple">
                                                        <option></option>
                                                        @foreach($courses as $course)
                                                            <option @foreach($tudemeMeal->meal_courses as $mealCourse) @if($mealCourse->course_id == $course->id) selected @endif @endforeach value="{{$course->id}}">{{$course->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>course</i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="has-warning">
                                                    <select required="required" name="dietary_preferences[]" class="select2_demo_dietary_preference form-control input-lg" multiple="multiple">
                                                        <option></option>
                                                        @foreach($dietaryPreferences as $dietaryPreference)
                                                            <option @foreach($tudemeMeal->meal_dietary_preferences as $mealDieraryPreference) @if($mealDieraryPreference->dietary_preference_id == $dietaryPreference->id) selected @endif @endforeach value="{{$dietaryPreference->id}}">{{$dietaryPreference->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>dietary preference</i>
                                                </div>
                                            </div>
                                        </div>
                                        <br>


                                    </div>
                                </div>

                                {{--  meal ingredients  --}}
                                <br>
                                <h1 class="text-center">Ingredients</h1>
                                <div class="row">
                                    {{--  <div class="ibox-title">
                                        <h5>Ingredients</h5>
                                    </div>  --}}
                                    <div class="ibox-content">

                                        <table class="table table-bordered" id = "ingredients_table">
                                            <thead>
                                            <tr>
                                                <th>Amount</th>
                                                <th>Measurment</th>
                                                <th>Ingredient</th>
                                                <th>Extra</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $ingredient_index = 0
                                            @endphp
                                            @foreach($tudemeMeal->meal_ingredients as $ingredient)
                                                <tr>
                                                    <td>
                                                        <input type="text" class="form-control input-lg ingredient-details" value="{{$ingredient->details}}" name = "ingredients[{{$ingredient_index}}][amount]">
                                                    </td>

                                                    <td>
                                                        <select onchange = "returnIngredientDetails(this)" name = "ingredients[{{$ingredient_index}}][measurment]" class="select2_demo_measurment form-control input-lg select-measurement">
                                                            <option>Select Measurment</option>
                                                            @foreach($measurments as $measurment)
                                                                <option @if($ingredient->measurment_id == $measurment->id) selected @endif value="{{$measurment->id}}">{{$measurment->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>

                                                    <td>
                                                        <select onchange = "returnIngredientDetails(this)" name = "ingredients[{{$ingredient_index}}][ingredient]" class="select2_demo_ingredient form-control input-lg select-ingredient">
                                                            <option>Select Ingredient</option>
                                                            @foreach($ingredients as $mealIngredient)
                                                                <option @if($ingredient->ingredient_id == $mealIngredient->id) selected @endif value="{{$mealIngredient->id}}">{{$mealIngredient->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>

                                                    <td>
                                                        <input type="text" class="form-control input-lg item-total-price" value = "{{$ingredient->extra}}" name = "ingredients[{{$ingredient_index}}][extra]">
                                                    </td>
                                                </tr>
                                                @php
                                                    $ingredient_index++
                                                @endphp
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <label class="btn btn-small btn-primary" onclick = "addIngredientTableRow()">+ Add Ingredient</label>
                                    </div>
                                </div>

                                {{--  meal instructions  --}}
                                <br>
                                <h1 class="text-center">Instructions</h1>
                                <div class="row">
                                    {{--  <div class="ibox-title">
                                        <h5>Ingredients</h5>
                                    </div>  --}}
                                    <div class="ibox-content">

                                        <table class="table table-bordered" id = "instructions_table">
                                            <thead>
                                            <tr>
                                                <th width="100px">Number</th>
                                                <th>Instruction</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $instruction_index = 0
                                            @endphp
                                            @foreach($tudemeMeal->instructions as $instruction)
                                                <tr>
                                                    <td>
                                                        <input type="number" class="form-control input-lg instruction-number" value="{{$instruction->number}}" name = "instructions[{{$instruction->number}}][number]">
                                                    </td>

                                                    <td>
                                                        <textarea rows="5" class="form-control input-lg item-total-price" name = "instructions[{{$instruction->number}}][instruction]">{{$instruction->instruction}}</textarea>
                                                    </td>
                                                </tr>
                                                @php
                                                    $instruction_index++
                                                @endphp
                                            @endforeach

                                            </tbody>
                                        </table>
                                        <label class="btn btn-small btn-primary" onclick = "addInstructionTableRow()">+ Add Instruction</label>
                                    </div>
                                </div>

                                {{--  meal notes  --}}
                                <br>
                                <h1 class="text-center">Notes</h1>
                                <div class="row">
                                    {{--  <div class="ibox-title">
                                        <h5>Ingredients</h5>
                                    </div>  --}}
                                    <div class="ibox-content">

                                        <table class="table table-bordered" id = "notes_table">
                                            <thead>
                                            <tr>
                                                <th>Note</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $note_index = 0
                                            @endphp
                                            @foreach($tudemeMeal->notes as $note)
                                                <tr>
                                                    <td>
                                                        <textarea rows="5" class="form-control input-lg meal-notes" name = "notes[{{$note_index}}][note]">{{$note->notes}}</textarea>
                                                    </td>
                                                </tr>
                                                @php
                                                    $note_index++
                                                @endphp
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <label class="btn btn-small btn-primary" onclick = "addNoteTableRow()">+ Add Note</label>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-block btn-lg btn-outline btn-success mt-4">{{ __('SAVE') }}</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$tudemeMeal->user->name}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 {{$tudemeMeal->status->label}}">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-ellipsis-v fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$tudemeMeal->status->name}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-plus-square fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$tudemeMeal->created_at}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row vertical-align">
                        <div class="col-xs-3">
                            <i class="fa fa-scissors fa-3x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h3 class="font-bold">{{$tudemeMeal->updated_at}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')



<script>
    function returnIngredientDetails (e) {
        var selectedParentTd = e.parentElement;
        var selectedTr = selectedParentTd.parentElement;
        var quantityInputField = selectedTr.getElementsByClassName("item-quantity");
        var quantityValue;
        if (quantityInputField[0].value.isEmpty) {
            quantityValue = 0;
        } else {
            quantityValue = quantityInputField[0].value;
        }
        var unitPriceInputField = selectedTr.getElementsByClassName("item-unit-price");
        unitPriceInputField[0].value = unitPrice;
        var totalPriceInputField = selectedTr.getElementsByClassName("item-total-price");
        totalPriceInputField[0].value = quantityValue * unitPrice;
    };
    var tableValueArrayIndex = {{$ingredient_index}};
    function addIngredientTableRow () {
        var table = document.getElementById("ingredients_table");
        var row = table.insertRow();
        var firstCell = row.insertCell(0);
        var secondCell = row.insertCell(1);
        var thirdCell = row.insertCell(2);
        var fourthCell = row.insertCell(3);
        var fifthCell = row.insertCell(4);
        firstCell.innerHTML = "<input type='number' class='form-control input-lg ingredient-details' name = 'ingredients["+tableValueArrayIndex+"][amount]'>";
        secondCell.innerHTML = "<select name = 'ingredients["+tableValueArrayIndex+"][measurment]' class='chosen-select form-control input-lg select-measurment'>"+
            "<option>Select Measurment</option>"+
            "@foreach($measurments as $measurment)"+
            "<option value='{{$measurment->id}}' >{{$measurment->name}}</option>"+
            "@endforeach"+
            "</select>";
        thirdCell.innerHTML = "<select name = 'ingredients["+tableValueArrayIndex+"][ingredient]' class='chosen-select form-control input-lg select-ingredient'>"+
                "<option>Select Ingredient</option>"+
                "@foreach($ingredients as $ingredient)"+
                "<option value='{{$ingredient->id}}' >{{$ingredient->name}}</option>"+
                "@endforeach"+
                "</select>";
        fourthCell.innerHTML = "<input type='text' class='form-control input-lg item-total-price' name = 'ingredients["+tableValueArrayIndex+"][extra]'>";
        fifthCell.innerHTML = "<span><i onclick = 'removeSelectedIngredientRow(this)' class = 'fa fa-minus-circle btn btn-danger'></i></span>";
        fifthCell.setAttribute("style", "width: 1em;");
        $(".chosen-select").chosen(
            {allow_single_deselect:true},
            {disable_search_threshold:10},
            {no_results_text:'Oops, nothing found!'},
            {width:"95%"}
        );
        tableValueArrayIndex++;
    };
    function removeSelectedIngredientRow (e) {
        var selectedParentTd = e.parentElement.parentElement;
        var selectedTr = selectedParentTd.parentElement;
        var selectedTable = selectedTr.parentElement;
        var removed = selectedTr.getElementsByClassName("ingredient-details")[0].getAttribute("name");
        adjustTableInputFieldsIndex(removed);
        selectedTable.removeChild(selectedTr);
        tableValueArrayIndex--;
    };
    function adjustTableInputFieldsIndex (removedFieldName) {
        // Fields whose values are submitted are:
        // 1. item_details[][details]
        // 2. item_details[][quantity]
        // 3. item_details[][unit_price]
        // 4. item_details[][total_price]
        var displacement = 0;
        var removedIndex;
        while (displacement < tableValueArrayIndex) {
            if (removedFieldName == "instructions["+displacement+"][amount]"){
                removedIndex = displacement;
            } else {
                var detailsField = document.getElementsByName("instructions["+displacement+"][amount]");
                var quantityField = document.getElementsByName("instructions["+displacement+"][measurment]");
                var unitPriceField = document.getElementsByName("instructions["+displacement+"][ingredient]");
                var totalPriceField = document.getElementsByName("instructions["+displacement+"][extra]");
                if (removedIndex) {
                    if (displacement > removedIndex) {
                        var newIndex = displacement - 1;
                        detailsField[0].setAttribute("name", "instructions["+newIndex+"][amount]");
                        quantityField[0].setAttribute("name", "instructions["+newIndex+"][measurment]");
                        unitPriceField[0].setAttribute("name", "instructions["+newIndex+"][ingredient]");
                        totalPriceField[0].setAttribute("name", "instructions["+newIndex+"][extra]");
                    };
                };
            };
            displacement++;
        };
    };
</script>


<script>
    function returnInstructionDetails (e) {
        var selectedParentTd = e.parentElement;
        var selectedTr = selectedParentTd.parentElement;
        var quantityInputField = selectedTr.getElementsByClassName("item-quantity");
        var quantityValue;
        if (quantityInputField[0].value.isEmpty) {
            quantityValue = 0;
        } else {
            quantityValue = quantityInputField[0].value;
        }
        var unitPriceInputField = selectedTr.getElementsByClassName("item-unit-price");
        unitPriceInputField[0].value = unitPrice;
        var totalPriceInputField = selectedTr.getElementsByClassName("item-total-price");
        totalPriceInputField[0].value = quantityValue * unitPrice;
    };
    var tableValueArrayIndex = {{$tudemeMeal->instructions_count++}};
    var numberArrayIndex = {{$tudemeMeal->instructions_count++}};
    function addInstructionTableRow () {
        var table = document.getElementById("instructions_table");
        var row = table.insertRow();
        var firstCell = row.insertCell(0);
        var secondCell = row.insertCell(1);
        var thirdCell = row.insertCell(2);
        firstCell.innerHTML = "<input type='number' class='form-control input-lg instruction-number' name = 'instructions["+tableValueArrayIndex+"][amount]' value = '"+numberArrayIndex+"'>";
        secondCell.innerHTML = "<textarea rows='5' class='form-control input-lg item-total-price' name = 'instructions["+tableValueArrayIndex+"][instruction]'></textarea>";
        thirdCell.innerHTML = "<span><i onclick = 'removeSelectedInstructionRow(this)' class = 'fa fa-minus-circle btn btn-danger'></i></span>";
        thirdCell.setAttribute("style", "width: 1em;");
        tableValueArrayIndex++;
        numberArrayIndex++;
    };
    function removeSelectedInstructionRow (e) {
        var selectedParentTd = e.parentElement.parentElement;
        var selectedTr = selectedParentTd.parentElement;
        var selectedTable = selectedTr.parentElement;
        var removed = selectedTr.getElementsByClassName("instruction-number")[0].getAttribute("name");
        adjustTableInputFieldsIndex(removed);
        selectedTable.removeChild(selectedTr);
        tableValueArrayIndex--;
    };
    function adjustTableInputFieldsIndex (removedFieldName) {
        // Fields whose values are submitted are:
        // 1. item_details[][details]
        // 2. item_details[][quantity]
        // 3. item_details[][unit_price]
        // 4. item_details[][total_price]
        var displacement = 0;
        var removedIndex;
        while (displacement < tableValueArrayIndex) {
            if (removedFieldName == "item_details["+displacement+"][details]"){
                removedIndex = displacement;
            } else {
                var numberField = document.getElementsByName("instruction["+displacement+"][number]");
                var instructionField = document.getElementsByName("instruction["+displacement+"][instruction]");
                if (removedIndex) {
                    if (displacement > removedIndex) {
                        var newIndex = displacement - 1;
                        numberField[0].setAttribute("name", "instruction["+newIndex+"][number]");
                        instructionField[0].setAttribute("name", "instruction["+newIndex+"][instruction]");
                    };
                };
            };
            displacement++;
        };
    };
</script>


<script>
    function returnNoteDetails (e) {
        var selectedParentTd = e.parentElement;
        var selectedTr = selectedParentTd.parentElement;
        var quantityInputField = selectedTr.getElementsByClassName("item-quantity");
        var quantityValue;
        if (quantityInputField[0].value.isEmpty) {
            quantityValue = 0;
        } else {
            quantityValue = quantityInputField[0].value;
        }
        var unitPriceInputField = selectedTr.getElementsByClassName("item-unit-price");
        unitPriceInputField[0].value = unitPrice;
        var totalPriceInputField = selectedTr.getElementsByClassName("item-total-price");
        totalPriceInputField[0].value = quantityValue * unitPrice;
    };
    var notesTableValueArrayIndex = {{$note_index}};
    var notesNumberArrayIndex = {{$note_index}} + 1;
    function addNoteTableRow () {
        var table = document.getElementById("notes_table");
        var row = table.insertRow();
        var firstCell = row.insertCell(0);
        var secondCell = row.insertCell(1);
        firstCell.innerHTML = "<textarea rows='5' class='form-control input-lg meal-notes' name = 'notes["+notesTableValueArrayIndex+"][note]'></textarea>";
        secondCell.innerHTML = "<span><i onclick = 'removeSelectedNoteRow(this)' class = 'fa fa-minus-circle btn btn-danger'></i></span>";
        secondCell.setAttribute("style", "width: 1em;");
        notesTableValueArrayIndex++;
        notesNumberArrayIndex++;
    };
    function removeSelectedNoteRow (e) {
        var selectedParentTd = e.parentElement.parentElement;
        var selectedTr = selectedParentTd.parentElement;
        var selectedTable = selectedTr.parentElement;
        var removed = selectedTr.getElementsByClassName("meal-notes")[0].getAttribute("name");
        adjustTableInputFieldsIndex(removed);
        selectedTable.removeChild(selectedTr);
        notesTableValueArrayIndex--;
    };
    function adjustTableInputFieldsIndex (removedFieldName) {
        // Fields whose values are submitted are:
        // 1. item_details[][details]
        // 2. item_details[][quantity]
        // 3. item_details[][unit_price]
        // 4. item_details[][total_price]
        var displacement = 0;
        var removedIndex;
        while (displacement < notesTableValueArrayIndex) {
            if (removedFieldName == "item_details["+displacement+"][details]"){
                removedIndex = displacement;
            } else {
                var noteField = document.getElementsByName("note["+displacement+"][note]");
                if (removedIndex) {
                    if (displacement > removedIndex) {
                        var newIndex = displacement - 1;
                        noteField[0].setAttribute("name", "note["+newIndex+"][note]");
                    };
                };
            };
            displacement++;
        };
    };
</script>


@endsection
