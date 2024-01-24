@extends(auth()->user()->hasRole('member') ? 'voting.layouts.app' : 'admin.layouts.app')
@section('content')
    {{-- <style>
        .poll-form {
            max-width: 00px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #f5f5f5;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .poll-form label {
            font-weight: bold;
            display: block;
            margin-bottom: 0.5rem;
        }

        .poll-form input[type="text"] {
            width: 100%;
            padding: 0.5rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 1rem;
        }

        .poll-form .options {
            margin-bottom: 1rem;
        }

        .poll-form .options .option {
            margin-bottom: 0.5rem;
        }

        .poll-form .options .add-option {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #007bff;
            color: #fff;
            padding: 0.5rem;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 1rem;
        }

        .poll-form .options .add-option:hover {
            background-color: #0062cc;
        }
    </style> --}}
    <!-- Button trigger modal -->
   @if (!auth()->user()->hasRole('member'))
     <div class="d-flex justify-content-center align-items-start my-2">
         <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
             Add Poll
         </button>
         <a href="{{ route('polls.details') }}" class="btn btn-warning mx-2 btn-sm">
             <span class="me-1"><i class="bi bi-file-text"></i></span>Voting Details</a>
     </div>
   @endif


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Poll</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('polls.store') }}" class="poll-form row g-3">
                        @csrf
                        <div class="col-md-12">
                            <label for="question" class="form-label">Question:</label>
                            <input type="text" name="question" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label for="question" class="form-label">Deadline(Optional):</label>
                            <input type="datetime-local" name="deadline" class="form-control" required>
                        </div>

                        <div class="col-md-12 options">
                            <div class="option">
                                <label for="options" class="form-label">Options:</label>
                                <input type="text" name="options[]" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12 options">
                            <div class="option">
                                <label for="options" class="form-label">Options:</label>
                                <input type="text" name="options[]" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Create Poll</button>
                        </div>

                        <div class="col-12 add-option">
                            <button type="button" class="btn btn-secondary">Add Option</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Inside index.blade.php -->
    {{-- <div class="row">
        @foreach ($polls as $poll)
            <div class="col-md-6">
                <h3 class="mb-3">{{ $poll->question }}</h3>
                <ul class="list-unstyled">
                    @foreach ($poll->options as $index => $option)
                        <li class="d-flex justify-content-between align-items-center">
                            {{ $option->options }}
                            <span class="badge bg-primary rounded-pill">{{ $option->votes }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div> --}}
    <div class="container my-5">
        @foreach ($polls as $poll)
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">
                        <span class="me-2"><i class="bi bi-arrow-right-circle"></i></span>{{ $poll->question }}
                    </h5>
                    <p>Deadline: {{ $poll->formattedDeadline }}</p>
                </div>
                <form method="post" action="{{ route('polls.vote', $poll->id) }}">
                    <div class="card-body">
                        @csrf
                        {{-- {{ $poll->id }} --}}
                        <div class="row g-3">
                            @foreach ($poll->options as $index => $option)
                                <div class="col-6">
                                    <div class="form-check">

                                        <input class="form-check-input" type="radio"
                                            @if (auth()->user()->hasVoted($poll) &&
                                                    auth()->user()->votedPolls->first()->pivot->option_id == $option->id) checked @endif
                                            @if (auth()->user()->hasVoted($poll) || !$poll->isOpenForVoting()) disabled @endif name="option_id"
                                            value="{{ $option->id }}">

                                        <label class="form-check-label" for="option_{{ $option->id }}">
                                            {{ $option->options }}

                                            @if (auth()->user()->hasVoted($poll) || !$poll->isOpenForVoting())
                                                <span class="badge bg-success ms-2">{{ $option->votes }}</span>
                                            @endif
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-success btn-sm"
                        @if (auth()->user()->hasVoted($poll) || !$poll->isOpenForVoting()) disabled @endif>
                            <span class="me-1"><i class="bi bi-check"></i></span>Vote</button>
                        <a href="{{ route('polls.show', $poll->id) }}" class="btn btn-primary btn-sm">
                            <span class="me-1"><i class="bi bi-chat-left-text"></i></span>View Comments</a>

                    </div>
                </form>
            </div>
        @endforeach
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.add-option').click(function() {
                var newOption = `<div class="option row"><div class="col-10">
                            <label for="options" class="form-label">Options:</label>
                            <input type="text" name="options[]" class="form-control" required></div>
                        <div class="col-2 d-flex align-items-end"><button type="button" class="btn btn-danger btn-sm remove-option"><i
                                                class="bi bi-trash"></i></button></div>
                          </div>`;
                $('.options').append(newOption);
            });

            $('.options').on('click', '.remove-option', function() {
                $(this).closest('.option').remove();
            });
        });
    </script>
@endsection
