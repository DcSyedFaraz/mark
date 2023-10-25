@extends('voting.layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">DataTables</li>
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
                  <!-- <div class="card-header">
                    <h3 class="card-title">User Managment</h3>
                  </div> -->
                <!-- /.card-header -->
                  <div class="card-header">
                    <a class="btn btn-success" href="{{ route('voting.blogs.create') }}"> New Blogs </a>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Title</th>
                            <th>Contact</th>
                            <th>users</th>
                            <th>Created_at</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                      
                        <tbody>
                          @if($blogs)
                              @php
                                $id =1;
                              @endphp
                              @foreach($blogs as $key => $blog)
                                  <tr>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->content }}</td>
                                    <td>{{ $blog->users->name }}</td>
                                    <td>{{ $blog->created_at }}</td>
                                    <td>
                                      <div class="btn-group">
                                        <a class="btn btn-primary" href="{{ route('voting.blogs.edit', $blog) }}"><i class="fas fa-edit"></i></a> 
                                        <form action="{{ route('voting.blogs.destroy', $blog) }}" method="POST" style="display: inline-block">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" onclick="return confirm('Are You Sure Want To Delete This.??')" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                      </div>
                                    </td>
                                  </tr>
                              @endforeach
                          @endif
                        </tbody>

                        <tfoot>
                          <tr>
                            <th>Title</th>
                            <th>Contact</th>
                            <th>users</th>
                            <th>Created_at</th>
                            <th width="">Action</th>
                          </tr>
                        </tfoot>
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
  </div>

@endsection

