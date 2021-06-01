@extends('admin.components.main')

@section('title', 'Calendar')

@section('content')

<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-warm-flame"></i>
                </div>
                <div>Calendar
                    <div class="page-title-subheading">Calendars are used in a lot of apps. We thought to include one for React.</div>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
                    class="btn-shadow mr-3 btn btn-dark">
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
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span> Inbox</span>
                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-book"></i>
                                    <span> Book</span>
                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">
                                    <i class="nav-link-icon lnr-picture"></i>
                                    <span> Picture</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a disabled class="nav-link disabled">
                                    <i class="nav-link-icon lnr-file-empty"></i>
                                    <span> File Disabled</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
        <li class="nav-item">
            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#calendar">
                <span>Basic Calendar</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#list-view">
                <span>List View</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" id="tab-2" data-toggle="tab" href="#background-events">
                <span>Background Events</span>
            </a>
        </li>
        <li class="nav-item">
            <a role="tab" class="nav-link" id="tab-3" data-toggle="tab" href="#add-to-do">
                <span>Add To Do</span>
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane tabs-animation fade show active" id="calendar" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
        <div class="tab-pane tabs-animation fade" id="list-view" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div id='calendar-list'></div>
                </div>
            </div>
        </div>
        <div class="tab-pane tabs-animation fade" id="background-events" role="tabpanel">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <div id="calendar-bg-events"></div>
                </div>
            </div>
        </div>
        <div class="tab-pane tabs-animation fade" id="add-to-do" role="tabpanel">
            <div class="row">
                <div class="col-md-8">
                    <div class="main-card mb-3 card">

                        <div class="card-body">
                            <h5 class="card-title">Add To Do</h5>

                            <form method="post" action="{{ route('admin.to.do.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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

                                <div class="form-row">
                                    <div class="col-md-8">
                                        <label for="name" class="">
                                            Name
                                        </label>
                                        <input name="name" id="name" placeholder="name" type="text" class="form-control" {{ $errors->has('name') ? ' is-invalid' : '' }} required="required">
                                        <i>name</i>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="is_event" class="">
                                            is Event
                                        </label><br>
                                        <input id="is_event" name="is_event" type="checkbox" data-toggle="toggle" data-onstyle="primary">
                                        <br>
                                        <i>check if this item is an event</i>
                                    </div>
                                </div>

                                <br>

                                <div class="form-row">
                                    <div class="col-md-2">
                                        <label for="is_event" class="">
                                            is period
                                        </label><br>
                                        <input id="is_event" name="is_event" type="checkbox" data-toggle="toggle" data-onstyle="primary">
                                        <br>
                                        <i>Check if it takes a couple of days.</i>
                                    </div>
                                    <div class="col-md-5">
                                        <label>
                                            Start Date
                                        </label>
                                        <input required name="start_date" id="start_date" type="text" class="form-control" data-toggle="datepicker"/>
                                        <i>start date.</i>
                                    </div>
                                    <div class="col-md-5">
                                        <label>
                                            End Date
                                        </label>
                                        <input name="end_date" id="end_date" type="text" class="form-control" data-toggle="datepicker"/>
                                        <i>end date.</i>
                                    </div>
                                </div>

                                <br>

                                <div class="form-row">
                                    <div class="col-md-2">
                                        <label for="is_event" class="">
                                            is end time
                                        </label><br>
                                        <input id="is_event" name="is_end_time" type="checkbox" data-toggle="toggle" data-onstyle="primary">
                                        <br>
                                        <i>Check if it takes a time period.</i>
                                    </div>
                                    <div class="col-md-5">
                                        <label>
                                            Start Time
                                        </label>
                                        <input name="start_date" id="start_time" type="text" class="form-control" data-toggle="timepicker"/>
                                        <i>start time.</i>
                                    </div>
                                    <div class="col-md-5">
                                        <label>
                                            End Time
                                        </label>
                                        <input name="end_date" id="end_time" type="text" class="form-control" data-toggle="timepicker"/>
                                        <i>end time.</i>
                                    </div>
                                </div>

                                <br>
                                <div class="form-row">
                                    <label for="notes" class="">Name</label>
                                    <textarea name="notes" id="notes" rows="5" class="form-control" ></textarea>
                                    <i>notes</i>
                                </div>
                                <br>

                                <hr>
                                    <button type="submit" class="mt-1 btn btn-success btn-lg btn-block">Submit</button>


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

    <script>

        $(document).ready(function() {


            /* initialize the calendar
            -----------------------------------------------------------------*/
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function() {
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                events: [
                    @foreach ($toDos as $toDo)
                    {
                        title: '{{$toDo->name}} [{{$toDo->status->name}}]',
                        @if($toDo->is_album == True)
                        color: '#C2F970',
                        @elseif($toDo->is_design == True)
                        color: '#2D0320',
                        @elseif($toDo->is_journal == True)
                        color: '#564D80',
                        @elseif($toDo->is_journal_series == True)
                        color: '#6C969D',
                        @elseif($toDo->is_project == True)
                        color: '#D3FCD5',
                        @elseif($toDo->is_product == True)
                        color: '#D8CFAF',
                        @elseif($toDo->is_order == True)
                        color: '#E6B89C',
                        @elseif($toDo->is_email == True)
                        color: '#ED9390',
                        @elseif($toDo->is_contact == True)
                        color: '#F374AE',
                        @elseif($toDo->is_organization == True)
                        color: '#32533D',
                        @elseif($toDo->is_deal == True)
                        color: '#31231E',
                        @elseif($toDo->is_campaign == True)
                        color: '#5A3A31',
                        @elseif($toDo->is_asset == True)
                        color: '#84714F',
                        @elseif($toDo->is_kit == True)
                        color: '#E3D888',
                        @elseif($toDo->is_asset_action == True)
                        color: '#E2F1AF',
                        @elseif($toDo->is_tudeme == True)
                        color: '#C2F970',
                        @elseif($toDo->is_account == True)
                        color: '#560176',
                        @endif
                        start: new Date({{$toDo->start_year}}, {{$toDo->start_month-1}}, {{$toDo->start_day}}, {{$toDo->start_hour}}, {{$toDo->start_minute}}),
                        @if($toDo->is_end_date == 1)
                            end: new Date({{$toDo->end_year}}, {{$toDo->end_month-1}}, {{$toDo->end_day}} @if($toDo->is_end_time == 1), {{$toDo->end_hour}}, {{$toDo->end_minute}} @endif),
                        @endif
                    },
                    @endforeach
                ]
            });


        });

    </script>

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
@endsection
