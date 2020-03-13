@extends('admin.layouts.app')

@section('title', "To Do's")

@section('content')

    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-9">
            <h2>To Dos</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{route('admin.dashboard')}}">Home</a>
                </li>
                <li class="active">
                    <strong>To Dos</strong>
                </li>
            </ol>
        </div>
        <div class="col-md-3">
            <div class="title-action">
                <a href="#" data-toggle="modal" data-target="#toDoRegistration" class="btn btn-primary btn-outline"><i class="fa fa-plus"></i> To Do </a>
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
                            <p><span class="badge badge-primary">Album:{{$pendingToDo->album->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_design === 1)
                            <p><span class="badge badge-primary">Design:{{$pendingToDo->design->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_journal === 1)
                            <p><span class="badge badge-primary">Journal:{{$pendingToDo->journal->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_project === 1)
                            <p><span class="badge badge-primary">Project:{{$pendingToDo->project->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_product === 1)
                            <p><span class="badge badge-primary">Product:{{$pendingToDo->product->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_order === 1)
                            <p><span class="badge badge-primary">Order:{{$pendingToDo->order->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_email === 1)
                            <p><span class="badge badge-primary">Email:{{$pendingToDo->email->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_contact === 1)
                            <p><span class="badge badge-primary">Contact:{{$pendingToDo->contact->first_name}} {{$pendingToDo->contact->last_name}}</span></p>
                        @endif
                        @if($pendingToDo->is_organization === 1)
                            <p><span class="badge badge-primary">Organization:{{$pendingToDo->organization->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_deal === 1)
                            <p><span class="badge badge-primary">Deal:{{$pendingToDo->deal->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_campaign === 1)
                            <p><span class="badge badge-primary">Campaign:{{$pendingToDo->campaign->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_asset === 1)
                            <p><span class="badge badge-primary">Campaign:{{$pendingToDo->asset->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_kit === 1)
                            <p><span class="badge badge-primary">Campaign:{{$pendingToDo->kit->name}}</span></p>
                        @endif
                        @if($pendingToDo->is_asset_action === 1)
                            <p><span class="badge badge-primary">Campaign:{{$pendingToDo->asset_action->name}}</span></p>
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
                            <p><span class="badge badge-primary">Album:{{$inProgressToDo->album->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_design === 1)
                            <p><span class="badge badge-primary">Design:{{$inProgressToDo->design->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_journal === 1)
                            <p><span class="badge badge-primary">Journal:{{$inProgressToDo->journal->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_project === 1)
                            <p><span class="badge badge-primary">Project:{{$inProgressToDo->project->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_product === 1)
                            <p><span class="badge badge-primary">Product:{{$inProgressToDo->product->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_order === 1)
                            <p><span class="badge badge-primary">Order:{{$inProgressToDo->order->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_email === 1)
                            <p><span class="badge badge-primary">Email:{{$inProgressToDo->email->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_contact === 1)
                            <p><span class="badge badge-primary">Contact:{{$inProgressToDo->contact->first_name}} {{$inProgressToDo->contact->last_name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_organization === 1)
                            <p><span class="badge badge-primary">Organization:{{$inProgressToDo->organization->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_deal === 1)
                            <p><span class="badge badge-primary">Deal:{{$inProgressToDo->deal->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_campaign === 1)
                            <p><span class="badge badge-primary">Campaign:{{$inProgressToDo->campaign->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_asset === 1)
                            <p><span class="badge badge-primary">Campaign:{{$inProgressToDo->asset->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_kit === 1)
                            <p><span class="badge badge-primary">Campaign:{{$inProgressToDo->kit->name}}</span></p>
                        @endif
                        @if($inProgressToDo->is_asset_action === 1)
                            <p><span class="badge badge-primary">Campaign:{{$inProgressToDo->asset_action->name}}</span></p>
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
                            <p><span class="badge badge-primary">Album:{{$overdueToDo->album->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_design === 1)
                            <p><span class="badge badge-primary">Design:{{$overdueToDo->design->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_journal === 1)
                            <p><span class="badge badge-primary">Journal:{{$overdueToDo->journal->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_project === 1)
                            <p><span class="badge badge-primary">Project:{{$overdueToDo->project->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_product === 1)
                            <p><span class="badge badge-primary">Product:{{$overdueToDo->product->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_order === 1)
                            <p><span class="badge badge-primary">Order:{{$overdueToDo->order->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_email === 1)
                            <p><span class="badge badge-primary">Email:{{$overdueToDo->email->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_contact === 1)
                            <p><span class="badge badge-primary">Contact:{{$overdueToDo->contact->first_name}} {{$overdueToDo->contact->last_name}}</span></p>
                        @endif
                        @if($overdueToDo->is_organization === 1)
                            <p><span class="badge badge-primary">Organization:{{$overdueToDo->organization->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_deal === 1)
                            <p><span class="badge badge-primary">Deal:{{$overdueToDo->deal->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_campaign === 1)
                            <p><span class="badge badge-primary">Campaign:{{$overdueToDo->campaign->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_asset === 1)
                            <p><span class="badge badge-primary">Campaign:{{$overdueToDo->asset->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_kit === 1)
                            <p><span class="badge badge-primary">Campaign:{{$overdueToDo->kit->name}}</span></p>
                        @endif
                        @if($overdueToDo->is_asset_action === 1)
                            <p><span class="badge badge-primary">Campaign:{{$overdueToDo->asset_action->name}}</span></p>
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
                            <p><span class="badge badge-primary">Album:{{$completedToDo->album->name}}</span></p>
                        @endif
                        @if($completedToDo->is_design === 1)
                            <p><span class="badge badge-primary">Design:{{$completedToDo->design->name}}</span></p>
                        @endif
                        @if($completedToDo->is_journal === 1)
                            <p><span class="badge badge-primary">Journal:{{$completedToDo->journal->name}}</span></p>
                        @endif
                        @if($completedToDo->is_project === 1)
                            <p><span class="badge badge-primary">Project:{{$completedToDo->project->name}}</span></p>
                        @endif
                        @if($completedToDo->is_product === 1)
                            <p><span class="badge badge-primary">Product:{{$completedToDo->product->name}}</span></p>
                        @endif
                        @if($completedToDo->is_order === 1)
                            <p><span class="badge badge-primary">Order:{{$completedToDo->order->name}}</span></p>
                        @endif
                        @if($completedToDo->is_email === 1)
                            <p><span class="badge badge-primary">Email:{{$completedToDo->email->name}}</span></p>
                        @endif
                        @if($completedToDo->is_contact === 1)
                            <p><span class="badge badge-primary">Contact:{{$completedToDo->contact->first_name}} {{$completedToDo->contact->last_name}}</span></p>
                        @endif
                        @if($completedToDo->is_organization === 1)
                            <p><span class="badge badge-primary">Organization:{{$completedToDo->organization->name}}</span></p>
                        @endif
                        @if($completedToDo->is_deal === 1)
                            <p><span class="badge badge-primary">Deal:{{$completedToDo->deal->name}}</span></p>
                        @endif
                        @if($completedToDo->is_campaign === 1)
                            <p><span class="badge badge-primary">Campaign:{{$completedToDo->campaign->name}}</span></p>
                        @endif
                        @if($completedToDo->is_asset === 1)
                            <p><span class="badge badge-primary">Campaign:{{$completedToDo->asset->name}}</span></p>
                        @endif
                        @if($completedToDo->is_kit === 1)
                            <p><span class="badge badge-primary">Campaign:{{$completedToDo->kit->name}}</span></p>
                        @endif
                        @if($completedToDo->is_asset_action === 1)
                            <p><span class="badge badge-primary">Campaign:{{$completedToDo->asset_action->name}}</span></p>
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
            console.log('var');
            var today = new Date();
            console.log(today);
            var dd = today.getDate();
            var mm = today.getMonth();
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            mm ++;
            if (dd < 10){
                dd = '0'+dd;
            }
            if (mm < 10){
                mm = '0'+mm;
            }
            var date_today = mm + '/' + dd + '/' + yyyy;
            var time_curr = h + ':' + m;
            console.log(time_curr);
            document.getElementById("start_date").value = date_today;
            document.getElementById("end_date").value = date_today;
            document.getElementById("start_time").value = time_curr;
            document.getElementById("end_time").value = time_curr;

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

            var elem_15 = document.querySelector('.js-switch_15');
            var switchery_15 = new Switchery(elem_15, { color: '#1AB394' });

            var elem_16 = document.querySelector('.js-switch_16');
            var switchery_16 = new Switchery(elem_16, { color: '#1AB394' });

            var elem_17 = document.querySelector('.js-switch_17');
            var switchery_17 = new Switchery(elem_17, { color: '#1AB394' });

            var elem_18 = document.querySelector('.js-switch_18');
            var switchery_18 = new Switchery(elem_18, { color: '#1AB394' });

            var elem_19 = document.querySelector('.js-switch_19');
            var switchery_19 = new Switchery(elem_19, { color: '#1AB394' });

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
            $(".select2_demo_album").select2({
                placeholder: "Select Album",
                allowClear: true
            });
            $(".select2_demo_design").select2({
                placeholder: "Select Design",
                allowClear: true
            });
            $(".select2_demo_journal").select2({
                placeholder: "Select Journal",
                allowClear: true
            });
            $(".select2_demo_journal_series").select2({
                placeholder: "Select Journal Series",
                allowClear: true
            });
            $(".select2_demo_project").select2({
                placeholder: "Select Project",
                allowClear: true
            });
            $(".select2_demo_product").select2({
                placeholder: "Select Product",
                allowClear: true
            });
            $(".select2_demo_order").select2({
                placeholder: "Select Order",
                allowClear: true
            });
            $(".select2_demo_email").select2({
                placeholder: "Select Email",
                allowClear: true
            });
            $(".select2_demo_contact").select2({
                placeholder: "Select Contact",
                allowClear: true
            });
            $(".select2_demo_organization").select2({
                placeholder: "Select Organization",
                allowClear: true
            });
            $(".select2_demo_deal").select2({
                placeholder: "Select Deal",
                allowClear: true
            });
            $(".select2_demo_campaign").select2({
                placeholder: "Select Campaign",
                allowClear: true
            });
            $(".select2_demo_asset").select2({
                placeholder: "Select Asset",
                allowClear: true
            });
            $(".select2_demo_kit").select2({
                placeholder: "Select Kit",
                allowClear: true
            });
            $(".select2_demo_asset_action").select2({
                placeholder: "Select Asset Action",
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
