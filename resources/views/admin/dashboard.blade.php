@extends('admin.layouts.app')

@section('content')




    <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        {{-- <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div> --}}
        <!-- /.content-header -->

        <!-- Main content -->
        {{-- <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-3">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $users }}</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>

            </div><!-- /.container-fluid -->
        </section> --}}
        <!-- /.content -->
        <section class="content mt-5">
            <div class="container">
                <div class="col-12">

                    <div class="card">



                            <div class="card-body table-responsive-xl">
                                <table  class="table table-bordered table-striped table-responsive">
                                    <thead class="text-sm">
                                        <tr>
                                            <th>S.N</th>
                                            <th>Full name:</th>
                                            <th>Email:</th>
                                            <th>Address:</th>
                                            <th>Phone Number:</th>
                                            <th>Voting Status:</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody class="text-sm">
                                        @if ($request)
                                            @foreach ($request as $key => $user)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $user->name ?? '' }}</td>
                                                    <td>{{ $user->email ?? '' }}</td>
                                                    <td>{{ $user->address ?? 'null' }}</td>
                                                    <td>{{ $user->phone ?? 'null' }}</td>
                                                    <td>
                                                        @if ($user->status === 'voting')
                                                            <span class="badge badge-success">Voting</span>
                                                        @elseif ($user->status === 'non-voting')
                                                            <span class="badge badge-warning">Non-Voting</span>
                                                        @else
                                                            <span class="badge badge-secondary">Unknown</span>
                                                        @endif
                                                    </td>
                                                    <td class="d-flex">
                                                        @if ($user->access == 'declined')
                                                            <span class="badge badge-danger"> Request Declined</span>
                                                        @else
                                                            <a href="{{ route('users.accept', $user->id) }}"
                                                                class="btn btn-sm btn-success">Approved</a>
                                                            <form action="{{ route('users.decline', $user->id) }}" method="POST"
                                                                class="d-inline mx-1">
                                                                @csrf
                                                                <button type="submit"
                                                                    class="btn btn-sm btn-danger dltBtn">Declined</button>
                                                            </form>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>

                            </div>
                    </div>
                </div>

                <!-- /.container-fluid -->
        </section>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


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

                        title: "Confirmation",
                        text: "Are you sure you want to decline this request?",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            form.submit();
                        } else {
                            swal("This request has not been declined yet!");
                        }
                    });
            })
        })
    </script>
@endsection
