@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/fullcalendar5.9.0.min.css') }}">
<script src="{{ asset('js/fullcalendar5.9.0.main.min.js') }}"></script>
<div class="container">
    <div class="row justify-content-start">
        @include('layouts.left-menu')
        <div class="col-xs-11 col-sm-11 col-md-11 col-lg-10 col-xl-10 col-xxl-10">
            <div class="row pt-2">
                <div class="col ps-4">
                    <h1 class="display-6 mb-3">
                        <i class="bi bi-calendar2-week"></i> {{ __('attendance.view_attendance') }}
                    </h1>

                    <h5><i class="bi bi-person"></i> {{ __('attendance.student_name') }}: {{$student->first_name}}
                        {{$student->last_name}}</h5>
                    <div class="row mt-3">
                        <div class="col bg-white p-3 border shadow-sm">
                            <div id="attendanceCalendar"></div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col bg-white border shadow-sm p-3">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">{{ __('attendance.status') }}</th>
                                        <th scope="col">{{ __('attendance.date') }}</th>
                                        <th scope="col">{{ __('attendance.context') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                    <tr>
                                        <td>
                                            @if ($attendance->status == "on")
                                            <span class="badge bg-success">{{ __('attendance.present') }}</span>
                                            @else
                                            <span class="badge bg-danger">{{ __('attendance.absent') }}</span>
                                            @endif
                                        </td>
                                        <td>{{$attendance->created_at}}</td>
                                        <td>{{($attendance->section ==
                                            null)?$attendance->course->course_name:$attendance->section->section_name}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>
    </div>
</div>

@php
$events = array();
if(count($attendances) > 0){
foreach ($attendances as $attendance){
if($attendance->status == "on"){
$events[] = ['title'=> __('attendance.present'), 'start' => $attendance->created_at, 'color'=>'green'];
} else {
$events[] = ['title'=> __('attendance.absent'), 'start' => $attendance->created_at, 'color'=>'red'];
}
}
}
@endphp

<script>
    document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('attendanceCalendar');
    var attEvents = @json($events);

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        height: 350,
        events: attEvents,
    });
    calendar.render();
});
</script>
@endsection
