@extends('admin.layouts.app')

@section('title', "To Do's")

@section('css')

    <link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/chosen/chosen.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/cropper/cropper.min.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/switchery/switchery.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">


@endsection

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>To Do's</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <strong>To Do's</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="#" data-toggle="modal" data-target="#toDoRegistration" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> New </a>
            </div>
        </div>
    </div>


    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">

            <div class="col-lg-12">
                <div>
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning m-r-sm">{{$toDoStatusCount['pendingToDos']}}</button>
                                Pending
                            </td>
                            <td>
                                <button type="button" class="btn btn-info m-r-sm">{{$toDoStatusCount['inProgressToDos']}}</button>
                                In progress
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary m-r-sm">{{$toDoStatusCount['completedToDos']}}</button>
                                Completed
                            </td>
                            <td>
                                <button type="button" class="btn btn-success m-r-sm">{{$toDoStatusCount['overdueToDos']}}</button>
                                Overdue
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div>

                </div>
            </div>

        </div>

        <ul class="pending-to-do">
            @foreach($pendingToDos as $pendingToDo)
                <li>
                    <div>
                        <small>{{$pendingToDo->due_date}}</small>
                        <h4>{{$pendingToDo->name}}</h4>
                        <p>{{$pendingToDo->notes}}.</p>
                        @if($pendingToDo->is_album === 1)
                            <p><span class="badge badge-primary">{{$pendingToDo->album->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_design === 1)
                            <p><span class="badge badge-primary">{{$pendingToDo->design->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_journal === 1)
                            <p><span class="badge badge-primary">{{$pendingToDo->journal->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_project === 1)
                            <p><span class="badge badge-primary">{{$pendingToDo->project->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_product === 1)
                            <p><span class="badge badge-primary">{{$pendingToDo->product->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_email === 1)
                            <p><span class="badge badge-primary">Email:{{$pendingToDo->email->name}}</span></p>
                        @endif
                        <a href="{{route('admin.to.do.set.in.progress',$pendingToDo->id)}}"><i class="fa fa-arrow-circle-o-right "></i></a>
                    </div>
                </li>
            @endforeach
        </ul>
        <ul class="in-progress-to-do">
            @foreach($inProgressToDos as $inProgressToDo)
                <li>
                    <div>
                        <small>{{$inProgressToDo->due_date}}</small>
                        <h4>{{$inProgressToDo->name}}</h4>
                        <p>{{$inProgressToDo->notes}}.</p>
                        @if($inProgressToDo->is_album === 1)
                            <p><span class="badge badge-primary">{{$inProgressToDo->album->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_design === 1)
                            <p><span class="badge badge-primary">{{$inProgressToDo->design->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_journal === 1)
                            <p><span class="badge badge-primary">{{$inProgressToDo->journal->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_project === 1)
                            <p><span class="badge badge-primary">{{$inProgressToDo->project->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_product === 1)
                            <p><span class="badge badge-primary">{{$inProgressToDo->product->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_email === 1)
                            <p><span class="badge badge-primary">Email:{{$inProgressToDo->email->name}}</span></p>
                        @endif
                        <a href="{{route('admin.to.do.set.completed',$inProgressToDo->id)}}"><i class="fa fa-check "></i></a>
                    </div>
                </li>
            @endforeach
        </ul>
        <ul class="overdue-to-do">
            @foreach($overdueToDos as $overdueToDo)
                <li>
                    <div>
                        <small>{{$overdueToDo->due_date}}</small>
                        <h4>{{$overdueToDo->name}}</h4>
                        <p>{{$overdueToDo->notes}}.</p>
                        @if($overdueToDo->is_album === 1)
                            <p><span class="badge badge-primary">{{$overdueToDo->album->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_design === 1)
                            <p><span class="badge badge-primary">{{$inProgressToDo->design->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_journal === 1)
                            <p><span class="badge badge-primary">{{$inProgressToDo->journal->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_project === 1)
                            <p><span class="badge badge-primary">{{$inProgressToDo->project->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_product === 1)
                            <p><span class="badge badge-primary">{{$inProgressToDo->product->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_email === 1)
                            <p><span class="badge badge-primary">Email:{{$inProgressToDo->email->subject}}</span></p>
                        @endif
                        @if($overdueToDo->status->name === "Pending")
                            <a href="{{route('admin.to.do.set.completed',$overdueToDo->id)}}"><i class="fa fa-check-double "></i></a>
                        @elseif($overdueToDo->status->name === "In progress")
                            <a href="{{route('admin.to.do.set.completed',$overdueToDo->id)}}"><i class="fa fa-check-double "></i></a>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>
        <ul class="completed-to-do">
            @foreach($completedToDos as $completedToDo)
                <li>
                    <div>
                        <small>{{$completedToDo->due_date}}</small>
                        <h4>{{$completedToDo->name}}</h4>
                        <p>{{$completedToDo->notes}}.</p>
                        @if($completedToDo->is_album === 1)
                            <p><span class="badge badge-primary">{{$completedToDo->album->name}}</span></p>
                        @endif
                        @if($completedToDo->is_design === 1)
                            <p><span class="badge badge-primary">{{$inProgressToDo->design->name}}</span></p>
                        @endif
                        @if($completedToDo->is_journal === 1)
                            <p><span class="badge badge-primary">{{$inProgressToDo->journal->name}}</span></p>
                        @endif
                        @if($completedToDo->is_project === 1)
                            <p><span class="badge badge-primary">{{$inProgressToDo->project->name}}</span></p>
                        @endif
                        @if($completedToDo->is_product === 1)
                            <p><span class="badge badge-primary">{{$inProgressToDo->product->name}}</span></p>
                        @endif
                        @if($completedToDo->is_email === 1)
                            <p><span class="badge badge-primary">{{$inProgressToDo->email->name}}</span></p>
                        @endif
                        <a href="{{route('admin.to.do.delete',$completedToDo->id)}}"><i class="fa fa-trash-o "></i></a>
                    </div>
                </li>
            @endforeach
        </ul>

    </div>

@endsection

@include('admin.layouts.modals.to_do')

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

    <!-- JSKnob -->
    <script src="{{ asset('inspinia') }}/js/plugins/jsKnob/jquery.knob.js"></script>

    <!-- Input Mask-->
    <script src="{{ asset('inspinia') }}/js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <!-- Data picker -->
    <script src="{{ asset('inspinia') }}/js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- NouSlider -->
    <script src="{{ asset('inspinia') }}/js/plugins/nouslider/jquery.nouislider.min.js"></script>

    <!-- Switchery -->
    <script src="{{ asset('inspinia') }}/js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="{{ asset('inspinia') }}/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

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

    <!-- TouchSpin -->
    <script src="{{ asset('inspinia') }}/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    {{--  Get due date to populate   --}}
    <script>
        $(document).ready(function() {
            // Set date
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth();
            var yyyy = today.getFullYear();
            if (dd < 10){
                dd = '0'+dd;
            }
            if (mm < 10){
                mm = '0'+mm;
            }
            var date_today = mm + '/' + dd + '/' + yyyy;
            console.log(date_today);
            document.getElementById("due_date").value = date_today;

            // Set time
        });

    </script>
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

            var elem_4 = document.querySelector('.js-switch_4');
            var switchery_4 = new Switchery(elem_4, { color: '#1AB394' });

            var elem_5 = document.querySelector('.js-switch_5');
            var switchery_5 = new Switchery(elem_5, { color: '#1AB394' });

            var elem_6 = document.querySelector('.js-switch_6');
            var switchery_6 = new Switchery(elem_6, { color: '#1AB394' });

            var elem_7 = document.querySelector('.js-switch_7');
            var switchery_7 = new Switchery(elem_7, { color: '#1AB394' });

            var elem_8 = document.querySelector('.js-switch_8');
            var switchery_8 = new Switchery(elem_8, { color: '#1AB394' });

            var elem_9 = document.querySelector('.js-switch_9');
            var switchery_9 = new Switchery(elem_9, { color: '#1AB394' });

            var elem_10 = document.querySelector('.js-switch_10');
            var switchery_10 = new Switchery(elem_10, { color: '#1AB394' });

            var elem_11 = document.querySelector('.js-switch_11');
            var switchery_11 = new Switchery(elem_11, { color: '#1AB394' });

            var elem_12 = document.querySelector('.js-switch_12');
            var switchery_12 = new Switchery(elem_12, { color: '#1AB394' });

            var elem_13 = document.querySelector('.js-switch_13');
            var switchery_13 = new Switchery(elem_13, { color: '#1AB394' });

            var elem_14 = document.querySelector('.js-switch_14');
            var switchery_14 = new Switchery(elem_14, { color: '#1AB394' });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            $('.demo1').colorpicker();

            var divStyle = $('.back-change')[0].style;
            $('#demo_apidemo').colorpicker({
                color: divStyle.backgroundColor
            }).on('changeColor', function(ev) {
                divStyle.backgroundColor = ev.color.toHex();
            });

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
            $(".select2_demo_tag").select2({
                placeholder: "Select Tags",
                allowClear: true
            });


            $(".touchspin1").TouchSpin({
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $(".touchspin2").TouchSpin({
                min: 0,
                max: 100,
                step: 0.1,
                decimals: 2,
                boostat: 5,
                maxboostedstep: 10,
                postfix: '%',
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
            });

            $(".touchspin3").TouchSpin({
                verticalbuttons: true,
                buttondown_class: 'btn btn-white',
                buttonup_class: 'btn btn-white'
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

        $("#ionrange_1").ionRangeSlider({
            min: 0,
            max: 5000,
            type: 'double',
            prefix: "$",
            maxPostfix: "+",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_2").ionRangeSlider({
            min: 0,
            max: 10,
            type: 'single',
            step: 0.1,
            postfix: " carats",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_3").ionRangeSlider({
            min: -50,
            max: 50,
            from: 0,
            postfix: "°",
            prettify: false,
            hasGrid: true
        });

        $("#ionrange_4").ionRangeSlider({
            values: [
                "January", "February", "March",
                "April", "May", "June",
                "July", "August", "September",
                "October", "November", "December"
            ],
            type: 'single',
            hasGrid: true
        });

        $("#ionrange_5").ionRangeSlider({
            min: 10000,
            max: 100000,
            step: 100,
            postfix: " km",
            from: 55000,
            hideMinMax: true,
            hideFromTo: false
        });

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

@endsection
