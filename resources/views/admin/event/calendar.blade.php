@extends(auth()->user()->hasRole('member') ? 'voting.layouts.app' : 'admin.layouts.app')

@section('content')
    <style>
        .btn.btn-primary.active {
            color: white !important;
        }

        .search-bar {
            display: none;
        }
    </style>
    <!-- fullCalendar -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fullcalendar/main.css') }}">
    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Calendar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item ">
                            @if (auth()->user()->hasRole('member'))

                            <a href="{{ route('event.index') }}">Event Details</a>
                            @else

                            <a href="{{ route('events.index') }}">Event Details</a>
                            @endif
                        </li>
                        <li class="breadcrumb-item active">Calendar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <!-- /.col -->
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <!-- THE CALENDAR -->
                            <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@section('script')
    <!-- fullCalendar 2.2.5 -->
    <script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/fullcalendar/main.js') }}"></script>
    <!-- CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


    <script>

        $(function() {
            /* initialize the external events
             -----------------------------------------------------------------*/

            /* initialize the calendar
             -----------------------------------------------------------------*/
            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var calendarEl = document.getElementById('calendar');

            var calendar = new Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                themeSystem: 'bootstrap',
                // Events
                events: [
                    @foreach ($jobs as $job)
                        {
                            id: '{{ $job->id }}',
                            title: '{{ $job->category }}',
                            url: '{{ route('calendar.show', $job->id) }}',
                            start: '{{ $job->start_date }}',
                            end: '{{ $job->end_date }}',
                            backgroundColor: '#{{ substr(md5(microtime()), 0, 6) }}',
                            borderColor: '#{{ substr(md5(microtime()), 0, 6) }}'
                        },
                    @endforeach

                ],


                editable: false,
                droppable: false, // this allows things to be dropped onto the calendar !!!
            });

            calendar.render();
        })
    </script>
@endsection
