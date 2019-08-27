@extends('custom-layout') 
@section('title','รายการอาจารย์ประจำมหาวิทยาลัย')
@section('content')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<div id='calendar'></div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            defaultView: 'agendaWeek',
            events : [
                @foreach($appointments as $appointment)
                {
                    title : '{{ $appointment->client->first_name . ' ' . $appointment->client->last_name }}',
                    start : '{{ $appointment->start_time }}',
                    @if ($appointment->finish_time)
                            end: '{{ $appointment->finish_time }}',
                    @endif
                },
                @endforeach
            ],
        });
    });
</script>
@endsection