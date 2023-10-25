@extends('admin.layouts.app')

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
              <a class="btn btn-success" href="{{ route('users.create') }}"> New Blogs </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Title</th>
                <th>Contact</th>
                <th>Created_at</th>
                <th width="560px">Action</th>
                </tr>
                </thead>
                
                <tbody>
                  @if($blogs)
                  @foreach($blogs as $blog)
                  <div>
                      <h2>{{ $blog->title }}</h2>
                      <p>{{ $blog->content }}</p>
                      <p>Created at: {{ $blog->created_at }}</p>
                      <a href="{{ route('blogs.edit', $blog) }}">Edit</a>
                      <form action="{{ route('blogs.destroy', $blog) }}" method="POST" style="display: inline-block">
                          @csrf
                          @method('DELETE')
                          <button type="submit" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                      </form>
                  </div>
                  <hr>
              @endforeach
                  @endif
                </tbody>
              </table>
              {!! $blogs->render() !!}
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


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

@endsection


   

