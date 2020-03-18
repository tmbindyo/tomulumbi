@extends('admin.layouts.app')

@section('title', 'Calendar')

@section('content')

<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <br>
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')

<script>

    $(document).ready(function() {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

        /* initialize the external events
         -----------------------------------------------------------------*/


        $('#external-events div.external-event').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 1111999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });

        });


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
@endsection
