@extends('layouts.masterLayout')

@section('content')
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <h3 class="card-label">Calendar</h3>
        </div>
        <div class="card-toolbar">
            <a href="{{route('employee_scheduling')}}" class="btn btn-light-primary font-weight-bold">
                <i class="ki ki-plus icon-md mr-2"></i>Add Event</a>
        </div>
    </div>
    <div class="card-body">
        <div id="kt_calendar"></div>
    </div>
</div>
@endsection
@section('script')

    var KTCalendarBasic = function() {

    return {
    //main function to initiate the module
    init: function() {
    var todayDate = moment().startOf('day');
    var YM = todayDate.format('YYYY-MM');
    var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
    var TODAY = todayDate.format('YYYY-MM-DD');
    var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

    var calendarEl = document.getElementById('kt_calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
    plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list' ],
    themeSystem: 'bootstrap',

    isRTL: KTUtil.isRTL(),

    header: {
    left: 'prev,next today',
    center: 'title',
    right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },

    height: 800,
    contentHeight: 780,
    aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

    nowIndicator: true,
    now: TODAY + 'T09:25:00', // just for demo

    views: {
    dayGridMonth: { buttonText: 'month' },
    timeGridWeek: { buttonText: 'week' },
    timeGridDay: { buttonText: 'day' }
    },

    defaultView: 'dayGridMonth',
    defaultDate: TODAY,

    editable: false,
    eventLimit: true, // allow "more" link when too many events
    navLinks: true,
    events: [
@foreach($schedule as $s)
    {
    title: '{{$s->shift}}',
    start: '{{$s->date}}',
    description : '@foreach(json_decode($s->user_id) as $d)
        {{$d}}, @endforeach',
    end: '{{$s->date}}',
    className: "fc-event-success"
    },
    @endforeach

    ],

    eventRender: function(info) {
    var element = $(info.el);

    if (info.event.extendedProps && info.event.extendedProps.description) {
    if (element.hasClass('fc-day-grid-event')) {
    element.data('content', info.event.extendedProps.description);
    element.data('placement', 'top');
    KTApp.initPopover(element);
    } else if (element.hasClass('fc-time-grid-event')) {
    element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
    } else if (element.find('.fc-list-item-title').lenght !== 0) {
    element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
    }
    }
    }
    });

    calendar.render();
    }
    };
    }();
@endsection