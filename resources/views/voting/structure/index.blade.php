@extends('voting.layouts.app')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />

@section('content')
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Water System Manuals</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Water System Manuals</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-header">

                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>S.N</th>
                                                <th>Name</th>
                                                <th>Uploaded</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if ($files)
                                                @foreach ($files as $key => $file)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td><a href="{{ asset('storage/' . $file->path) ?? '' }}"
                                                                target="blank">{{ $file->name ?? '' }}</a></td>
                                                        <td>{{ $file->created_at->diffforhumans() ?? '' }}</td>


                                                        {{-- <td>{{ $file->deadline ?? '' }}</td> --}}

                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
        </section>

@endsection
