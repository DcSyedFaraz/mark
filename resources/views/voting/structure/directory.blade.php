@extends('voting.layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Directory</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Directory</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h5>Personal Information</h5>
                    </div>
                    <div class="card-body">
                        {{-- <form action="{{route('directory.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label>Voting Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="votingStatus" id="votingYes"
                                        value="Voting">
                                    <label class="form-check-label" for="votingYes">
                                        Voting
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="votingStatus" id="votingNo"
                                        value="Non-Voting">
                                    <label class="form-check-label" for="votingNo">
                                        Non-Voting
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form> --}}
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.N</th>
                                        <th>Full name:</th>
                                        <th>Email:</th>
                                        <th>Address:</th>
                                        <th>Phone Number:</th>
                                        <th>Voting Status:</th>
                                    </tr>
                                </thead>

                                <tbody>
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

                <!-- /.container-fluid -->
        </section>
    </div>
@section('script')
@endsection
@endsection
