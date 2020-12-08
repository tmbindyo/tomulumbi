
    <!-- Mainly scripts -->
    <script src="{{ asset('inspinia') }}/js/plugins/fullcalendar/moment.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
    <script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('inspinia') }}/js/inspinia.js"></script>
    <script src="{{ asset('inspinia') }}/js/plugins/pace/pace.min.js"></script>

    <!-- Sparkline -->
    <script src="{{ asset('inspinia') }}/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Peity -->
    <script src="{{ asset('inspinia') }}/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="{{ asset('inspinia') }}/js/demo/peity-demo.js"></script>

    <!-- jQuery UI custom -->
    <script src="{{ asset('inspinia') }}/js/jquery-ui.custom.min.js"></script>

    <!-- Full Calendar -->
    <script src="{{ asset('inspinia') }}/js/plugins/fullcalendar/fullcalendar.min.js"></script>

    <!-- SUMMERNOTE -->
    <script src="{{ asset('inspinia') }}/js/plugins/summernote/summernote.min.js"></script>

    <!-- ChartJS-->
    <script src="{{ asset('inspinia') }}/js/plugins/chartJs/Chart.min.js"></script>

    <!-- blueimp gallery -->
    <script src="{{ asset('inspinia') }}/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>

    <!-- Datatables -->
    <script src="{{ asset('inspinia') }}/js/plugins/dataTables/datatables.min.js"></script>

    <!-- Data picker -->
    <script src="{{ asset('inspinia') }}/js/plugins/datapicker/bootstrap-datepicker.js"></script>

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

    <!-- Date range  moment js same as full calendar plugin -->
    <script src="{{ asset('inspinia') }}/js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="{{ asset('inspinia') }}/js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Select2 -->
    <script src="{{ asset('inspinia') }}/js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="{{ asset('inspinia') }}/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- DROPZONE -->
    <script src="{{ asset('inspinia') }}/js/plugins/dropzone/dropzone.js"></script>

    <script>
        $(document).ready(function(){
            $('.file-box').each(function() {
                animationHover(this, 'pulse');
            });
        });
    </script>

    {{--  dropzone  --}}
    <script>
        $(document).ready(function(){

            Dropzone.options.dropzone =
                {
                    maxFilesize: 12,
                    renameFile: function(file) {
                        var dt = new Date();
                        var time = dt.getTime();
                        return time+file.name;
                    },
                    addRemoveLinks: true,
                    timeout: 50000,
                    removedfile: function(file)
                    {
                        var name = file.upload.filename;
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            },
                            type: 'POST',
                            url: '{{ url("image/delete") }}',
                            data: {filename: name},
                            success: function (data){
                                console.log("File has been successfully removed!!");
                            },
                            error: function(e) {
                                console.log(e);
                            }});
                        var fileRef;
                        return (fileRef = file.previewElement) != null ?
                            fileRef.parentNode.removeChild(file.previewElement) : void 0;
                    },

                    success: function(file, response)
                    {
                        console.log(response);
                    },
                    error: function(file, response)
                    {
                        return false;
                    }
                };
        });
    </script>

    {{--  Get due date to populate   --}}
    <script>
        $(document).ready(function() {
            // Set date
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth()+1;
            var yyyy = today.getFullYear();
            if (dd < 10){
                dd = '0'+dd;
            }
            if (mm < 10){
                mm = '0'+mm;
            }
            var date = mm + '/' + dd + '/' + yyyy;
            if(document.getElementById("date")){
                document.getElementById("date").value = date;
            }
            if(document.getElementById("start_date")){
                document.getElementById("start_date").value = date;
            }
            if(document.getElementById("date_acquired")){
                document.getElementById("date_acquired").value = date;
            }
            if(document.getElementById("starting_date")){
                document.getElementById("starting_date").value = date;
            }

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
            if(document.getElementById("end_date")){
                document.getElementById("end_date").value = due_date;
            }
            if(document.getElementById("closing_date")){
                document.getElementById("closing_date").value = due_date;
            }
            if(document.getElementById("expiry_date")){
                document.getElementById("expiry_date").value = due_date;
            }


            // set start time
            var h = today.getHours();
            var m = today.getMinutes();
            var time_curr = h + ':' + m;
            if(document.getElementById("start_time")){
                document.getElementById("start_time").value = time_curr;
            }
            if(document.getElementById("end_time")){
                document.getElementById("end_time").value = time_curr;
            }
        });

    </script>


    {{--  liability and loan calculate interest  --}}
    <script>

        function getPercentAmount() {
            var principal = document.getElementById('principal').value;
            var interest = document.getElementById('interest').value;
            {{--  get percentage  --}}
            var percentage = interest /100;
            var interest_amount = parseFloat(principal) * parseFloat(percentage);
            var payback = parseFloat(principal) + parseFloat(interest_amount);
            {{--  set values  --}}
            document.getElementById("interest_amount").value = interest_amount;
            document.getElementById("total").value = payback;

        }

        function getPercentFromAmount() {
            var principal = document.getElementById('principal').value;
            var interest_amount = document.getElementById('interest_amount').value;
            {{--  get total  --}}
            var total = parseFloat(principal)+parseFloat(interest_amount)
            {{--  get percentage  --}}
            var percentage = parseFloat(interest_amount)/parseFloat(principal)
            var interestPercentage = parseFloat(percentage)*100;
            {{--  set values  --}}
            document.getElementById("interest").value = interestPercentage.toFixed(5);
            document.getElementById("total").value = total;

        }
    </script>

    {{--  summernote  --}}
    <script>
        $(document).ready(function(){

            $('.summernote').summernote();

        });
        var edit = function() {
            $('.click2edit').summernote({focus: true});
        };
        var save = function() {
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).
            $('.click2edit').destroy();
        };
    </script>

    {{--  datatables  --}}
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

        });

    </script>

    {{--  select 2  --}}
    <script>
        $(document).ready(function() {
            $('.select-2').select2();
        });
    </script>

    {{--  scripts  --}}
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
            $(".select2_demo_type").select2({
                placeholder: "Select Type",
                allowClear: true
            });
            $(".select2_demo_cuisine").select2({
                placeholder: "Select Cuisine",
                allowClear: true
            });
            $(".select2_demo_taxes").select2({
                placeholder: "Select Tax",
                allowClear: true
            });
            $(".select2_demo_liability").select2({
                placeholder: "Select Liability",
                allowClear: true
            });
            $(".select2_demo_transfer").select2({
                placeholder: "Select Transfer",
                allowClear: true
            });
            $(".select2_demo_frequency").select2({
                placeholder: "Select Frequency",
                allowClear: true
            });
            $(".select2_demo_album").select2({
                placeholder: "Select Album",
                allowClear: true
            });
            $(".select2_demo_title").select2({
                placeholder: "Select Title",
                allowClear: true
            });
            $(".select2_demo_design").select2({
                placeholder: "Select Design",
                allowClear: true
            });
            $(".select2_demo_project").select2({
                placeholder: "Select Project",
                allowClear: true
            });
            $(".select2_demo_kit").select2({
                placeholder: "Select Kit",
                allowClear: true
            });
            $(".select2_demo_tudeme_types").select2({
                placeholder: "Select Tudeme Type",
                allowClear: true
            });
            $(".select2_demo_letter_tags").select2({
                placeholder: "Select Letter Tag",
                allowClear: true
            });
            $(".select2_demo_tudeme_tags").select2({
                placeholder: "Select Tudeme Tag",
                allowClear: true
            });
            $(".select2_demo_tag").select2({
                placeholder: "Select Tags",
                allowClear: true
            });
            $(".select2_demo_deal").select2({
                placeholder: "Select Deal",
                allowClear: true
            });
            $(".select2_demo_label").select2({
                placeholder: "Select Label",
                allowClear: true
            });
            $(".select2_demo_size").select2({
                placeholder: "Select Size",
                allowClear: true
            });
            $(".select2_demo_client").select2({
                placeholder: "Select Client",
                allowClear: true
            });
            $(".select2_demo_status").select2({
                placeholder: "Select Status",
                allowClear: true
            });
            $(".select2_demo_asset").select2({
                placeholder: "Select Asset",
                allowClear: true
            });
            $(".select2_demo_category").select2({
                placeholder: "Select Categories",
                allowClear: true
            });
            $(".select2_demo_thumbnail_size").select2({
                placeholder: "Select Thumbnail Size",
                allowClear: true
            });
            $(".select2_demo_account").select2({
                placeholder: "Select Account",
                allowClear: true
            });
            $(".select2_demo_email").select2({
                placeholder: "Select Email",
                allowClear: true
            });
            $(".select2_demo_order").select2({
                placeholder: "Select Order",
                allowClear: true
            });
            $(".select2_demo_course").select2({
                placeholder: "Select Course",
                allowClear: true
            });
            $(".select2_demo_contact").select2({
                placeholder: "Select Contact",
                allowClear: true
            });
            $(".select2_demo_journal").select2({
                placeholder: "Select Journal",
                allowClear: true
            });
            $(".select2_demo_product").select2({
                placeholder: "Select Product",
                allowClear: true
            });
            $(".select2_demo_tudeme").select2({
                placeholder: "Select Tudeme",
                allowClear: true
            });
            $(".select2_demo_tudeme_top_location").select2({
                placeholder: "Select Tudeme Top Location",
                allowClear: true
            });
            $(".select2_demo_campaign").select2({
                placeholder: "Select Campaign",
                allowClear: true
            });
            $(".select2_demo_dish_type").select2({
                placeholder: "Select Dish Type",
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
            $(".select2_demo_cooking_style").select2({
                placeholder: "Select Cooking Style",
                allowClear: true
            });
            $(".select2_demo_cooking_skill").select2({
                placeholder: "Select Cooking Skill",
                allowClear: true
            });
            $(".select2_demo_journal_series").select2({
                placeholder: "Select Journal Series",
                allowClear: true
            });
            $(".select2_demo_dietary_preference").select2({
                placeholder: "Select Dietary Preference",
                allowClear: true
            });
            $(".select2_demo_typography").select2({
                placeholder: "Select Campaign",
                allowClear: true
            });
            $(".select2_demo_organization").select2({
                placeholder: "Select Organization",
                allowClear: true
            });
            $(".select2_demo_asset_action").select2({
                placeholder: "Select Asset Action",
                allowClear: true
            });
            $(".select2_demo_deal_types").select2({
                placeholder: "Select Deal Type",
                allowClear: true
            });
            $(".select2_demo_sub_types").select2({
                placeholder: "Select Sub Type",
                allowClear: true
            });
            $(".select2_demo_contact_types").select2({
                placeholder: "Select Contact Types",
                allowClear: true
            });
            $(".select2_demo_project_types").select2({
                placeholder: "Select Project Type",
                allowClear: true
            });
            $(".select2_demo_deal_stage").select2({
                placeholder: "Select Deal Stage",
                allowClear: true
            });
            $(".select2_demo_lead_source").select2({
                placeholder: "Select Lead Source",
                allowClear: true
            });
            $(".select2_demo_thumbnail_size").select2({
                placeholder: "Select Thumbnail Size",
                allowClear: true
            });
            $(".select2_demo_campaign_type").select2({
                placeholder: "Select Campaign Type",
                allowClear: true
            });
            $(".select2_demo_cover_design").select2({
                placeholder: "Select Cover Design",
                allowClear: true
            });
            $(".select2_demo_organization_type").select2({
                placeholder: "Select Organization Type",
                allowClear: true
            });
            $(".select2_demo_parent_organization").select2({
                placeholder: "Select Parent Organization",
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



