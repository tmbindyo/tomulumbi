@extends('admin.layouts.app')

@section('title', 'Meal Create')

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>Meal's</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <a href="{{route('admin.tudeme.show',$tudeme->id)}}">Tudeme</a>
                </li>
                <li class="active">
                    <strong>Meal Create</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Meal Registration <small>Form</small></h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{ route('admin.tudeme.meal.store',$tudeme->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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
                                            <input type="text" id="name" value="{{old('name')}}"  name="name" required="required" placeholder="Name" class="form-control input-lg">
                                            <i>name</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <input type="number" id="cook_time" name="cook_time" required="required" placeholder="Cook time" class="form-control input-lg">
                                            <i>cook time</i>
                                        </div>
                                        <br>
                                        <div class="has-warning">
                                            <textarea rows="9" id="description" name="description" required="required" placeholder="Brief description" class="form-control input-lg"></textarea>
                                            <i>description</i>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="has-warning">
                                                    <select required="required" name="cuisine" class="select2_demo_cuisine form-control input-lg">
                                                        <option></option>
                                                        @foreach($cuisines as $cuisine)
                                                            <option value="{{$cuisine->id}}">{{$cuisine->name}}</option>
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
                                                            <option value="{{$cookingSkill->id}}">{{$cookingSkill->name}}</option>
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
                                                            <option value="{{$cookingStyle->id}}">{{$cookingStyle->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>cooking style</i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="has-warning">
                                                    <select required="required" name="meal_type" class="select2_demo_meal_type form-control input-lg">
                                                        <option></option>
                                                        @foreach($mealTypes as $mealType)
                                                            <option value="{{$mealType->id}}">{{$mealType->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>meal type</i>
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
                                                            <option value="{{$course->id}}">{{$course->name}}</option>
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
                                                            <option value="{{$dietaryPreference->id}}">{{$dietaryPreference->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>dietary preference</i>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="has-warning">
                                                    <select required="required" name="dish_type" class="select2_demo_dish_type form-control input-lg">
                                                        <option></option>
                                                        @foreach($dishTypes as $dishType)
                                                            <option value="{{$dishType->id}}">{{$dishType->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>dish type</i>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="has-warning">
                                                    <select required="required" name="food_type" class="select2_demo_food_type form-control input-lg">
                                                        <option></option>
                                                        @foreach($foodTypes as $foodType)
                                                            <option value="{{$foodType->id}}">{{$foodType->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <i>food type</i>
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
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control input-lg item-quantity" name = "ingredients[0][amount]">
                                                </td>

                                                <td>
                                                    <select onchange = "returnIngredientDetails(this)" name = "ingredients[0][measurment]" class="select2_demo_measurment form-control input-lg select-measurement">
                                                        <option>Select Measurment</option>
                                                        @foreach($measurments as $measurment)
                                                            <option value="{{$measurment->id}}">{{$measurment->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td>
                                                    <select onchange = "returnIngredientDetails(this)" name = "ingredients[0][ingredient]" class="select2_demo_ingredient form-control input-lg select-ingredient">
                                                        <option>Select Ingredient</option>
                                                        @foreach($ingredients as $ingredient)
                                                            <option value="{{$ingredient->id}}">{{$ingredient->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td>
                                                    <input type="text" class="form-control input-lg item-total-price" name = "ingredients[0][extra]">
                                                </td>
                                            </tr>
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
                                            <tr>
                                                <td>
                                                    <input type="number" class="form-control input-lg instruction-number" value="1" name = "instructions[0][number]">
                                                </td>

                                                <td>
                                                    <textarea rows="5" class="form-control input-lg item-total-price" name = "instructions[0][instruction]"></textarea>
                                                </td>
                                            </tr>
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
                                            <tr>
                                                <td>
                                                    <textarea rows="5" class="form-control input-lg meal-notes" name = "notes[0][note]"></textarea>
                                                </td>
                                            </tr>
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



    </div>

@endsection

@section('js')

<!-- Mainly scripts -->
<script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
<script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Chosen -->
<script src="{{ asset('inspinia') }}/js/plugins/chosen/chosen.jquery.js"></script>

<!-- Input Mask-->
<script src="{{ asset('inspinia') }}/js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- Data picker -->
<script src="{{ asset('inspinia') }}/js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Switchery -->
<script src="{{ asset('inspinia') }}/js/plugins/switchery/switchery.js"></script>

<!-- iCheck -->
<script src="{{ asset('inspinia') }}/js/plugins/iCheck/icheck.min.js"></script>

<!-- MENU -->
<script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Color picker -->
<script src="{{ asset('inspinia') }}/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

<!-- Clock picker -->
<script src="{{ asset('inspinia') }}/js/plugins/clockpicker/clockpicker.js"></script>

<!-- Image cropper -->
<script src="{{ asset('inspinia') }}/js/plugins/cropper/cropper.min.js"></script>

<!-- Date range use moment.js same as full calendar plugin -->
<script src="{{ asset('inspinia') }}/js/plugins/fullcalendar/moment.min.js"></script>

<!-- Date range picker -->
<script src="{{ asset('inspinia') }}/js/plugins/daterangepicker/daterangepicker.js"></script>

<!-- Select2 -->
<script src="{{ asset('inspinia') }}/js/plugins/select2/select2.full.min.js"></script>

<script>
    $(document).ready(function(){

        var $image = $(".image-crop > img")
        $($image).cropper({
            aspectRatio: 1.618,
            preview: ".img-preview",
            done: function(data) {
                // Output the result data for cropping image.
            }
        });

        var $inputImage = $("#inputImage");
        if (window.FileReader) {
            $inputImage.change(function() {
                var fileReader = new FileReader(),
                    files = this.files,
                    file;

                if (!files.length) {
                    return;
                }

                file = files[0];

                if (/^image\/\w+$/.test(file.type)) {
                    fileReader.readAsDataURL(file);
                    fileReader.onload = function () {
                        $inputImage.val("");
                        $image.cropper("reset", true).cropper("replace", this.result);
                    };
                } else {
                    showMessage("Please choose an image file.");
                }
            });
        } else {
            $inputImage.addClass("hide");
        }

        $("#download").click(function() {
            window.open($image.cropper("getDataURL"));
        });

        $("#zoomIn").click(function() {
            $image.cropper("zoom", 0.1);
        });

        $("#zoomOut").click(function() {
            $image.cropper("zoom", -0.1);
        });

        $("#rotateLeft").click(function() {
            $image.cropper("rotate", 45);
        });

        $("#rotateRight").click(function() {
            $image.cropper("rotate", -45);
        });

        $("#setDrag").click(function() {
            $image.cropper("setDragMode", "crop");
        });

        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $('#data_2 .input-group.date').datepicker({
            startView: 1,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: "dd/mm/yyyy"
        });

        $('#data_3 .input-group.date').datepicker({
            startView: 2,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        $('#data_4 .input-group.date').datepicker({
            minViewMode: 1,
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            todayHighlight: true
        });

        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, { color: '#1AB394' });

        var elem_2 = document.querySelector('.js-switch_2');
        var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

        var elem_3 = document.querySelector('.js-switch_3');
        var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });

        $('.demo1').colorpicker();


        $('.clockpicker').clockpicker();

        $('input[name="daterange"]').daterangepicker();

        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

        $('#reportrange').daterangepicker({
            format: 'MM/DD/YYYY',
            startDate: moment().subtract(29, 'days'),
            endDate: moment(),
            minDate: '01/01/2012',
            maxDate: '12/31/2015',
            dateLimit: { days: 60 },
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            opens: 'right',
            drops: 'down',
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-primary',
            cancelClass: 'btn-default',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                cancelLabel: 'Cancel',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr','Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        }, function(start, end, label) {
            console.log(start.toISOString(), end.toISOString(), label);
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        });

        $(".select2_demo_1").select2();
        $(".select2_demo_2").select2();
        $(".select2_demo_cuisine").select2({
            placeholder: "Select Cuisine",
            allowClear: true
        });
        $(".select2_demo_cooking_skill").select2({
            placeholder: "Select Cooking Skill",
            allowClear: true
        });
        $(".select2_demo_cooking_style").select2({
            placeholder: "Select Cooking Style",
            allowClear: true
        });
        $(".select2_demo_course").select2({
            placeholder: "Select Course",
            allowClear: true
        });
        $(".select2_demo_dietary_preference").select2({
            placeholder: "Select Dietary Preference",
            allowClear: true
        });
        $(".select2_demo_dish_type").select2({
            placeholder: "Select Dish Type",
            allowClear: true
        });
        $(".select2_demo_food_type").select2({
            placeholder: "Select Food Type",
            allowClear: true
        });
        $(".select2_demo_meal_type").select2({
            placeholder: "Select Meal Type",
            allowClear: true
        });
        $(".select2_demo_ingredient").select2({
            placeholder: "Select Ingredients",
            allowClear: true
        });
        $(".select2_demo_measurment").select2({
            placeholder: "Select Measurment",
            allowClear: true
        });
        $(".select2_demo_category").select2({
            placeholder: "Select Categories",
            allowClear: true
        });


    });
    var config = {
        '.chosen-select'           : {},
        '.chosen-select-deselect'  : {allow_single_deselect:true},
        '.chosen-select-no-single' : {disable_search_threshold:10},
        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

    $(".dial").knob();

    $("#basic_slider").noUiSlider({
        start: 40,
        behaviour: 'tap',
        connect: 'upper',
        range: {
            'min':  20,
            'max':  80
        }
    });

    $("#range_slider").noUiSlider({
        start: [ 40, 60 ],
        behaviour: 'drag',
        connect: true,
        range: {
            'min':  20,
            'max':  80
        }
    });

    $("#drag-fixed").noUiSlider({
        start: [ 40, 60 ],
        behaviour: 'drag-fixed',
        connect: true,
        range: {
            'min':  20,
            'max':  80
        }
    });


</script>


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
    var tableValueArrayIndex = 1;
    function addIngredientTableRow () {
        var table = document.getElementById("ingredients_table");
        var row = table.insertRow();
        var firstCell = row.insertCell(0);
        var secondCell = row.insertCell(1);
        var thirdCell = row.insertCell(2);
        var fourthCell = row.insertCell(3);
        var fifthCell = row.insertCell(4);
        firstCell.innerHTML = "<input type='text' class='form-control input-lg item-quantity' name = 'ingredients["+tableValueArrayIndex+"][amount]'>";
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
    var notesTableValueArrayIndex = 1;
    var notesNumberArrayIndex = 2;
    function addInstructionTableRow () {
        var table = document.getElementById("instructions_table");
        var row = table.insertRow();
        var firstCell = row.insertCell(0);
        var secondCell = row.insertCell(1);
        var thirdCell = row.insertCell(2);
        firstCell.innerHTML = "<input type='number' class='form-control input-lg instruction-number' name = 'instructions["+notesTableValueArrayIndex+"][number]' value = '"+notesNumberArrayIndex+"'>";
        secondCell.innerHTML = "<textarea rows='5' class='form-control input-lg item-total-price' name = 'instructions["+notesTableValueArrayIndex+"][instruction]'></textarea>";
        thirdCell.innerHTML = "<span><i onclick = 'removeSelectedInstructionRow(this)' class = 'fa fa-minus-circle btn btn-danger'></i></span>";
        thirdCell.setAttribute("style", "width: 1em;");
        notesTableValueArrayIndex++;
        notesNumberArrayIndex++;
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
    var notesTableValueArrayIndex = 1;
    var notesNumberArrayIndex = 2;
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
