@extends('voting.layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

@section('content')
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
                <div class="card-body">
                    <div class="card-body table-responsive-xl">
                        <table id="example1" class="table table-bordered table-striped text-sm">
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
@section('script')
@endsection
@endsection
