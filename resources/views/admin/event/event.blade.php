@extends('admin.layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

@section('content')

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Event Details</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Event Details</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#createEventModal">
                                Create Event
                            </button>
                            <div class="modal fade" id="createEventModal" tabindex="-1" role="dialog"
                                aria-labelledby="createEventModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createEventModalLabel">Create Event</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('events.store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" class="form-control" id="title" name="title"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="location">Location</label>
                                                    <input type="text" class="form-control" id="location"
                                                        name="location" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="category">Category</label>
                                                    <input type="text" class="form-control" id="category"
                                                        name="category" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="start_date">Start Date</label>
                                                    <input type="datetime-local" class="form-control" id="start_date"
                                                        name="start_date" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="end_date">End Date</label>
                                                    <input type="datetime-local" class="form-control" id="end_date"
                                                        name="end_date" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="picture">Event Picture</label>
                                                    <input type="file" class="form-control-file" id="picture"
                                                        name="picture">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Publish Event</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach ($events as $event)
                                    <div class="col-sm-12 d-flex justify-content-center mb-4">
                                        <div class="card  w-75">

                                            <div class="card-body">
                                                <h5 class="card-title font-weight-bold">{{ $event->title }}</h5>
                                                <h6 class="card-text mb-2 text-muted">{{ $event->category }}</h6>
                                                <p class="card-text"> <span class="font-weight-bold">Location:</span>
                                                    {{ $event->location }}</p>
                                                <p class="card-text"> <span class="font-weight-bold">Start Date:</span>
                                                    {{ Carbon\Carbon::parse($event->start_date)->format('l, F j, Y h:i A') }}
                                                </p>
                                                <p class="card-text"> <span class="font-weight-bold">End Date:</span>
                                                    {{ Carbon\Carbon::parse($event->end_date)->format('l, F j, Y h:i A') }}
                                                </p>
                                                <p class="card-text">{{ $event->description }}</p>
                                            </div>
                                            @if ($event->picture)
                                                <img src="{{ asset('storage/' . $event->picture) }}" alt="Event Picture"
                                                    class="card-img-top">
                                            @endif
                                            <div class="card-footer">
                                                Posted by: <span
                                                    class="badge badge-success">{{ $event->username->name }}</span>
                                            </div>
                                            <div class="card-footer text-muted ">
                                                <i class="far fa-clock"></i> {{ $event->updated_at->diffforhumans() }}
                                            </div>
                                            <div class="card-footer p-0 d-flex">
                                                @if (Auth::check() && (Auth::user()->id == $event->user_id || Auth::user()->hasRole('Admin')))
                                                    <form method="post"
                                                        action="{{ route('events.destroy', $event->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger btn-sm mx-2 dltBtn"
                                                            data-id="{{ $event->id }}"
                                                            title="Delete this Event"><i
                                                                class="fas fa-trash"></i></button>
                                                    </form>
                                                    <div class="">

                                                        <a href="#" class="btn btn-primary btn-sm  " data-toggle="modal"
                                                            data-target="#editEventModal{{ $event->id }}"><i
                                                                class="fas fa-pencil-alt"></i></a>
                                                    </div>

                                                    <div class="modal fade" id="editEventModal{{ $event->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="editEventModalLabel{{ $event->id }}"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="editEventModalLabel{{ $event->id }}">Edit
                                                                        Event</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{ route('events.update', $event->id) }}"
                                                                    method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="title">Title</label>
                                                                            <input type="text" class="form-control"
                                                                                id="title" name="title"
                                                                                value="{{ $event->title }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="category">Category</label>
                                                                            <input type="text" class="form-control"
                                                                                id="category" name="category"
                                                                                value="{{ $event->category }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="location">Location</label>
                                                                            <input type="text" class="form-control"
                                                                                id="location" name="location"
                                                                                value="{{ $event->location }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="start_date">Start Date</label>
                                                                            <input type="datetime-local"
                                                                                class="form-control" id="start_date"
                                                                                name="start_date"
                                                                                value="{{ $event->start_date }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="end_date">End Date</label>
                                                                            <input type="datetime-local"
                                                                                class="form-control" id="end_date"
                                                                                name="end_date"
                                                                                value="{{ $event->end_date }}" required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="description">Description</label>
                                                                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $event->description }}</textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="picture">Event Picture</label>
                                                                            <input type="file"
                                                                                class="form-control-file" id="picture"
                                                                                accept=".jpeg, .jpg, .png, .gif"
                                                                                name="picture">
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.dltBtn').click(function(e) {
                var form = $(this).closest('form');
                var dataID = $(this).data('id');
                // alert(dataID);
                e.preventDefault();
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this data!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal("Your data is safe!");
                        }
                    });
            })
        })
    </script>
@endsection
