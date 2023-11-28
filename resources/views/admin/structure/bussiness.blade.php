@extends('admin.layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

@section('content')
    <style>
        .card {
            border: none;
            transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
            overflow: hidden;
            border-radius: 20px;
            min-height: 450px;
            box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.2);

            @media (max-width: 768px) {
                min-height: 350px;
            }

            @media (max-width: 420px) {
                min-height: 300px;
            }

            &.card-has-bg {
                transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
                background-size: 120%;
                background-repeat: no-repeat;
                background-position: center center;

                &:before {
                    content: '';
                    position: absolute;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    background: inherit;
                    -webkit-filter: grayscale(1);
                    -moz-filter: grayscale(100%);
                    -ms-filter: grayscale(100%);
                    -o-filter: grayscale(100%);
                    filter: grayscale(100%);
                }

                /* &:hover {
                        transform: scale(0.98);
                        box-shadow: 0 0 5px -2px rgba(0, 0, 0, 0.3);
                        background-size: 130%;
                        transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);

                        .card-img-overlay {
                            transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
                            background: rgb(255, 186, 33);
                            background: linear-gradient(0deg, rgba(255, 186, 33, 0.5) 0%, rgba(255, 186, 33, 1) 100%);
                        }
                    } */
            }

            .card-footer {
                background: none;
                border-top: none;

                .media {
                    img {
                        border: solid 3px rgba(255, 255, 255, 0.3);
                    }
                }
            }

            .card-title {
                font-weight: 800
            }

            .card-meta {
                color: rgba(0, 0, 0, 0.3);
                text-transform: uppercase;
                font-weight: 500;
                letter-spacing: 2px;
            }

            .card-body {
                transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);


            }

            &:hover {
                .card-body {
                    margin-top: 30px;
                    transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
                }

                cursor: pointer;
                transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
            }

            .card-img-overlay {
                transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
                background: rgb(255, 186, 33);
                background: linear-gradient(0deg, rgba(255, 186, 33, 0.3785889355742297) 0%, rgba(255, 186, 33, 1) 100%);
            }
        }
    </style>
    
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Resource Directory</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Resource Directory</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">

                <!-- Search Bar -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{-- <input type="text" class="form-control"  id="search" placeholder="Search businesses...">
                            <div id="search-results"></div> --}}
                            <button type="button" class="btn btn-primary my-2" data-toggle="modal"
                                data-target="#businessModal">
                                Add Business
                            </button>
                            <!-- Business Modal -->
                            <div class="modal fade" id="businessModal" tabindex="-1" role="dialog"
                                aria-labelledby="businessModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="businessModalLabel">Add Business</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('business.store') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="name">Business Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone">Phone</label>
                                                    <input type="tel" class="form-control" id="phone" name="phone"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="website">Website</label>
                                                    <input type="url" class="form-control" id="website"
                                                        name="website">
                                                </div>
                                                <div class="form-group">
                                                    <label for="recommendation_note">Recommendation Note</label>
                                                    <textarea class="form-control" id="recommendation_note" name="recommendation_note"></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save Business</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Business Listings -->
                <div class="row">
                    @foreach ($businesses as $business)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                            <div class="card text-dark card-has-bg click-col"
                                style="background-image:url('https://source.unsplash.com/600x900/?tree,nature');">
                                <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tree,nature"
                                    alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="card-body">
                                        <h5 class="card-title mt-0 mx-2">{{ $business->name }}</h5>
                                        <small><i class="far fa-clock"></i>
                                            {{ $business->updated_at->diffforhumans() }}</small>
                                        <br><br>
                                        <p>{{ $business->phone }}</p>
                                        <p>{{ $business->email }}</p>
                                        <a href="{{ $business->website }}" target="blank">{{ $business->website }}</a>
                                        <p><span class="font-weight-bold">Recomendation
                                                Note:</span>{{ $business->recommendation_note }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="media">

                                            <div class="media-body">
                                                <h6 class="my-0 text-dark d-block font-weight-bold">Recommended by: <span
                                                        class="badge badge-success">
                                                        {{ $business->username->name }}
                                                    </span>
                                                </h6>
                                                <span class="">

                                                    @if (Auth::check() && (Auth::user()->id == $business->user_id || Auth::user()->hasRole('Admin')))
                                                        <form method="post"
                                                            action="{{ route('bussinessDelete', $business->id) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-sm dltBtn"
                                                                data-id="{{ $business->id }}"
                                                                title="Delelte this Bussiness"><i
                                                                    class="fas fa-trash"></i></button>
                                                        </form>
                                                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                                                            data-target="#editEventModal{{ $business->id }}"><i
                                                                class="my-0 fas fa-pencil-alt"></i></a>

                                                        <div class="modal fade" id="editEventModal{{ $business->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="editEventModalLabel{{ $business->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="editEventModalLabel{{ $business->id }}">Edit
                                                                            Bussiness</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="{{ route('business.update', $business->id) }}"
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="name">Business Name</label>
                                                                                <input type="text" class="form-control"
                                                                                    id="name" name="name"
                                                                                    value="{{ $business->name }}" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="phone">Phone</label>
                                                                                <input type="tel" class="form-control"
                                                                                    id="phone" name="phone"
                                                                                    value="{{ $business->phone }}" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="email">Email</label>
                                                                                <input type="email" class="form-control"
                                                                                    id="email" name="email"
                                                                                    value="{{ $business->email }}" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="website">Website</label>
                                                                                <input type="url" class="form-control"
                                                                                    id="website" name="website"
                                                                                    value="{{ $business->website }}" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="recommendation_note">Recommendation
                                                                                    Note</label>
                                                                                <textarea class="form-control" id="recommendation_note" name="recommendation_note" rows="4" required>{{ $business->recommendation_note }}</textarea>
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
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $business->name }}</h5>
                                    <p class="card-text">{{ $business->phone }}</p>
                                    <p class="card-text">{{ $business->email }}</p>
                                    <a href="{{ $business->website }}" class="card-link"
                                        target="_blank">{{ $business->website }}</a>
                                    <p class="card-text">{{ $business->recommendation_note }}</p>
                                    <p class="card-text">Recommended by: {{ $business->username->name }}</p>
                                    <p class="card-text text-muted">Updated At: {{ $business->updated_at->diffforhumans() }}</p>
                                </div>
                            </div>
                        </div> --}}
                    @endforeach
                </div>
            </div>
        </section>

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
    {{-- <script>
    // $(document).ready(function() {
    //     $('#search').on('input', function() {
    //         var query = $(this).val();
    //         if (query !== '') {
    //             $.ajax({
    //                 url: '{{route('liveSearch')}}', // Replace with your search route
    //                 method: 'GET',
    //                 data: { query: query },
    //                 success: function(response) {
    //                     $('#search-results').html(response);
    //                 }
    //             });
    //         } else {
    //             $('#search-results').html('');
    //         }
    //     });
    // });
</script> --}}
@endsection
@endsection
