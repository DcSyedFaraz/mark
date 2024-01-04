@extends('admin.layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
@section('content')


    <!-- Personal Information -->
    <div class="card justify-content-center"
        style="background-image: url({{asset('img/pexels-pixabay-417173.jpg')}}); background-size: cover; background-position: center; width: 46.5rem; height: 12rem;">
    </div>

    <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body table-responsive-xl">
                <table id="example1" class="table datatable table-bordered table-striped">
                    <thead class="text-sm">
                        <tr>
                            <th>S.N</th>
                            <th>Full name:</th>
                            <th>Email:</th>
                            <th>Address:</th>
                            <th>Phone Number:</th>
                            <th>Voting Status:</th>
                        </tr>
                    </thead>

                    <tbody class="text-sm">
                        @if ($users)
                            @foreach ($users as $key => $user)
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
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>

            </div>

        </div>
    </div>

    <!-- User Registeration -->
    {{-- <div class="col-12">
        <div class="card top-selling overflow-auto">

            <div class="card-body pb-0">
                <h5 class="card-title">Dashboard</span></h5>
                <div class="registeration-sec">
                    <h2><span>05</span>User Registeration</h2>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique
                        praesentium vitae dicta tenetur, cumque eos quam ipsa reiciendis nesciunt
                        nisi cum. Nam perspiciatis aut, amet eligendi est distinctio odit voluptas?
                    </p>
                    <button class="btn-more">More Info</button>

                </div>
            </div>

        </div>
    </div> --}}

    <!-- End Top Selling -->



@endsection
