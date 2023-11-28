@extends('admin.layouts.app')


@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Roles</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Roles</li>
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
                        <div class="card-header">
                            <h3 class="card-title">Role List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-header">
                            @can('role-create')
                                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                            @endcan
                        </div>
                        <div class="card-body">
                            <table  class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Roles</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($roles)
                                        @php
                                            $id = 1;
                                        @endphp
                                        @foreach ($roles as $key => $role)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    <div class="form-group">
                                                        <div
                                                            class="">
                                                            @can('role-edit')
                                                                <a class="btn btn-primary"
                                                                    href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                                            @endcan

                                                        </div>
                                                    </div>
                                                </td>
                                         
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
    <!-- /.content -->
    {{-- {!! $roles->render() !!} --}}

@endsection
