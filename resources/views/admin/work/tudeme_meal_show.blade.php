@extends('admin.components.main')

@section('title','Tudeme Meal Show')

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
                            Tudeme Meal Create
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
                    <a href="{{route('admin.tudeme.show',$tudemeMeal->tudeme->id)}}" class="btn btn-success btn-lg" ><i class="fa fa-eye"></i> Tudeme</a>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
            {{-- <div class="col-lg-10 col-lg-offset-1"> --}}
                <div class="main-card mb-3 card">

                    <div class="card-header">
                        <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                        Tudeme Meal Show
                    </div>

                        <div class="card-body"><h5 class="card-title">Expenses</h5>
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

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="expense_account" class="">
                                                Name
                                            </label>
                                            <input required name="name" id="name" value="{{$tudemeMeal->name}}" type="text" {{ $errors->has('name') ? ' is-invalid' : '' }} class="form-control"/>
                                            <i>name</i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="date" class="">
                                                Cook time
                                            </label>
                                            <input required name="cook_time" id="cook_time" value="{{$tudemeMeal->cook_time}}" type="text" {{ $errors->has('cook_time') ? ' is-invalid' : '' }} class="form-control"/>
                                            <i>cook time.</i>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="cuisine" class="">
                                                Cuisine
                                            </label>
                                            <select required="required" style="width: 100%" {{ $errors->has('cuisine') ? ' is-invalid' : '' }} name="cuisine" id="cuisine" class="cuisine-select form-control input-lg">
                                                <option>Select Cuisine</option>
                                                @foreach($cuisines as $cuisine)
                                                    <option @if($tudemeMeal->cuisine_id == $cuisine->id) selected @endif value="{{$cuisine->id}}">{{$cuisine->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>cuisine</i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="cooking_skill" class="">
                                                Cooking Skills
                                            </label>
                                            <select required="required" style="width: 100%" {{ $errors->has('cooking_skill') ? ' is-invalid' : '' }} name="cooking_skill" id="cooking_skill" class="cooking-skill-select form-control input-lg">
                                                <option>Select Cooking Skills</option>
                                                @foreach($cookingSkills as $cookingSkill)
                                                    <option @if($tudemeMeal->cooking_skill_id == $cookingSkill->id) selected @endif value="{{$cookingSkill->id}}">{{$cookingSkill->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>cooking skill</i>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="cooking_style" class="">
                                                Cooking Style
                                            </label>
                                            <select required="required" style="width: 100%" {{ $errors->has('cooking_style') ? ' is-invalid' : '' }} name="cooking_styles[]" id="cooking_style" class="cooking-style-select form-control input-lg" multiple="multiple">
                                                <option>Select Cooking Style</option>
                                                @foreach($cookingStyles as $cookingStyle)
                                                    <option @foreach($tudemeMeal->meal_cooking_styles as $mealCookingStyle) @if($mealCookingStyle->cooking_style_id == $cookingStyle->id) selected @endif @endforeach value="{{$cookingStyle->id}}">{{$cookingStyle->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>cooking style</i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="dish_type" class="">
                                                Dish Type
                                            </label>
                                            <select required="required" style="width: 100%" {{ $errors->has('dish_type') ? ' is-invalid' : '' }} name="dish_type" id="dish_type" class="dish-type-select form-control input-lg">
                                                <option>Select Dish Type</option>
                                                @foreach($dishTypes as $dishType)
                                                    <option @if($tudemeMeal->dish_type_id == $dishType->id) selected @endif value="{{$dishType->id}}">{{$dishType->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>dish type</i>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="course" class="">
                                                Course
                                            </label>
                                            <select required="required" style="width: 100%" {{ $errors->has('course') ? ' is-invalid' : '' }} name="courses[]" id="course" class="course-select form-control input-lg" multiple="multiple">
                                                <option>Select course</option>
                                                @foreach($courses as $course)
                                                    <option @foreach($tudemeMeal->meal_courses as $mealCourse) @if($mealCourse->course_id == $course->id) selected @endif @endforeach value="{{$course->id}}">{{$course->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>course</i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="position-relative form-group">
                                            <label for="dietary_preferences" class="">
                                                Dietary Preference
                                            </label>
                                            <select required="required" style="width: 100%" {{ $errors->has('dietary_preferences') ? ' is-invalid' : '' }} name="dietary_preferences[]" id="dietary_preference" class="dietary-preference-select form-control input-lg"  multiple="multiple">
                                                <option>Select Dietary Preference</option>
                                                @foreach($dietaryPreferences as $dietaryPreference)
                                                    <option @foreach($tudemeMeal->meal_dietary_preferences as $mealDieraryPreference) @if($mealDieraryPreference->dietary_preference_id == $dietaryPreference->id) selected @endif @endforeach value="{{$dietaryPreference->id}}">{{$dietaryPreference->name}}</option>
                                                @endforeach
                                            </select>
                                            <i>dietary preference</i>
                                        </div>
                                    </div>
                                </div>

                                <hr>

                                {{-- ingredients table start --}}
                                <div class="row">
                                    <div class="col-md-12">
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
                                                            <input name="ingredients[{{$ingredient_index}}][amount]" value="{{$ingredient->details}}" type="text" class="form-control input-lg item-quantity">
                                                        </td>
                                                        <td>
                                                            <select onchange = "returnIngredientDetails(this)" required="required" style="width: 100%" {{ $errors->has('course') ? ' is-invalid' : '' }} name="ingredients[{{$ingredient_index}}][measurment]" id="ingredients[0][measurment]" class="ingredient-measurment-select form-control input-lg select-measurement">
                                                                <option>Select Measurment</option>
                                                                @foreach($measurments as $measurment)
                                                                    <option @if($ingredient->measurment_id == $measurment->id) selected @endif value="{{$measurment->id}}">{{$measurment->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select onchange = "returnIngredientDetails(this)" required="required" style="width: 100%" {{ $errors->has('course') ? ' is-invalid' : '' }} name="ingredients[{{$ingredient_index}}][ingredient]" id="ingredients[{{$ingredient_index}}][ingredient]" class="ingredient-select form-control input-lg select-ingredient">
                                                                <option>Select Ingredient</option>
                                                                @foreach($ingredients as $mealIngredient)
                                                                    <option @if($ingredient->ingredient_id == $mealIngredient->id) selected @endif value="{{$mealIngredient->id}}">{{$mealIngredient->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input name="ingredients[{{$ingredient_index}}][extra]" value="{{$ingredient->extra}}" type="number" class="form-control input-lg item-total-price" >
                                                        </td>
                                                    </tr>
                                                @php
                                                $ingredient_index++
                                                @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <label class="btn btn-small pull-right btn-primary" onclick = "addIngredientTableRow()">+ Add Ingredient</label>
                                    </div>
                                </div>
                                {{-- ingredients table end --}}

                                <hr>

                                {{-- instuctions table start --}}
                                <div class="row">
                                    <div class="col-md-12">
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
                                                            <input name="instructions[{{$instruction_index}}][number]" value="{{$instruction->number}}" type="text" value="{{$instruction_index}}" class="form-control input-lg instruction-number">
                                                        </td>
                                                        <td>
                                                            <textarea rows="5" name="instructions[{{$instruction_index}}][instruction]" type="number" class="form-control input-lg item-total-price" >{{$instruction->instruction}}</textarea>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $instruction_index++
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <label class="btn btn-small pull-right btn-primary" onclick = "addInstructionTableRow()">+ Add Instruction</label>
                                    </div>
                                </div>
                                {{-- instuctions table end --}}

                                <hr>

                                {{-- notes table start --}}
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered" id = "notes_table">
                                            <thead>
                                                <tr>
                                                    <th>Notes</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $note_index = 0
                                                @endphp
                                                @foreach($tudemeMeal->notes as $note)
                                                    <tr>
                                                        <td>
                                                            <textarea rows="5" name="notes[{{$note_index}}][note]" type="number" class="form-control input-lg meal-notes" >{{$note->notes}}</textarea>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $note_index++
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <label class="btn btn-small pull-right btn-primary" onclick = "addNoteTableRow()">+ Add Note</label>
                                    </div>
                                </div>
                                {{-- notes table end --}}

                                <hr>

                                <div class="row">
                                        <button type="submit" class="btn btn-outline btn-block btn-success">{{ __('UPDATE') }}</button>
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
        firstCell.innerHTML = "<input type='text' class='form-control input-lg item-quantity' name = 'ingredients["+tableValueArrayIndex+"][amount]'>";
        secondCell.innerHTML = "<select name = 'ingredients["+tableValueArrayIndex+"][measurment]' class='ingredient-measurment-select form-control input-lg select-measurment'>"+
            "<option>Select Measurment</option>"+
            "@foreach($measurments as $measurment)"+
            "<option value='{{$measurment->id}}' >{{$measurment->name}}</option>"+
            "@endforeach"+
            "</select>";
        thirdCell.innerHTML = "<select name = 'ingredients["+tableValueArrayIndex+"][ingredient]' class='ingredient-select form-control input-lg select-ingredient'>"+
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
        var removed = selectedTr.getElementsByClassName("select-ingredient")[0].getAttribute("name");
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
    var instructionTableValueArrayIndex = {{$tudemeMeal->instructions_count++}};
    var numberArrayIndex = {{$tudemeMeal->instructions_count++}};
    function addInstructionTableRow () {
        var table = document.getElementById("instructions_table");
        var row = table.insertRow();
        var firstCell = row.insertCell(0);
        var secondCell = row.insertCell(1);
        var thirdCell = row.insertCell(2);
        firstCell.innerHTML = "<input type='number' class='form-control input-lg instruction-number' name = 'instructions["+instructionTableValueArrayIndex+"][number]' value = '"+numberArrayIndex+"'>";
        secondCell.innerHTML = "<textarea rows='5' class='form-control input-lg item-total-price' name = 'instructions["+instructionTableValueArrayIndex+"][instruction]'></textarea>";
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
