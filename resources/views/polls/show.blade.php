@extends('admin.layouts.app')
@section('content')
<!-- Inside your poll view -->
<div class="container mt-5">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <h3 class="text-center mb-4">{{ $poll->question }}</h3>

        <!-- Display poll options -->
        <h4 class="mb-3">Comments:</h4>
        @foreach($poll->comments as $comment)
        <div class="card mb-3">
          <div class="card-body">
            <strong>{{ $comment->user->name }}:</strong>
            <p>{{ $comment->body }}</p>
            <p class="text-muted">{{ $comment->created_at->diffforhumans() }}</p>
          </div>
        </div>
        @endforeach

        <!-- Add a form for users to add comments -->
        <h4 class="mb-3">Add a comment:</h4>
        <form method="post" action="{{ route('comments.store', ['poll' => $poll->id]) }}">
          @csrf
          <div class="form-floating mb-3">
            <textarea name="body" class="form-control" id="floatingTextarea" style="height: 100px" required></textarea>
            <label for="floatingTextarea">Comment</label>
          </div>
          <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
      </div>
    </div>
  </div>

@endsection
