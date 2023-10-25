@extends('voting.layouts.app')


@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create New Blogs</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create New blogs</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
    <div class="container-fluid">
  
        <div class="row">
          <div class="col-12">
              <div class="card">
                  <div class="card-header">
                  <form action="{{ route('nonvoting.blogs.store') }}" method="POST">
                    @csrf
                        <div>
                            <label for="title">Title:</label>
                            <input type="text" name="title" class="form-control" id="title" required>
                            <input type="hidden" name="user_id" class="form-control" value="{{ Auth::user()->id }}" >
                            <input type="hidden" name="type" class="form-control" value="0">
                        
                          </div>
                        <div>
                            <label for="content">Content:</label>
                            <textarea name="content" id="content" class="form-control" required></textarea>
                        </div></br>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                                <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                  </div>
              </div> 
          </div>   
        </div>
    </div>
</section>

</div>
@endsection