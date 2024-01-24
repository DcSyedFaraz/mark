@extends('admin.layouts.app')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-5">Voting Details</h1>
        @foreach ($polls as $poll)
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="text-center">{{ $poll->question }}</h3>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        @foreach ($poll->options as $option)
                            <li class="mb-3">
                                {{ $option->options }}
                                @if ($option->votess->count() > 0)
                                    <p class="mt-2">- Voted by:</p>
                                    <ul class="list-inline">
                                        @foreach ($option->votess as $vote)
                                            <li class="list-inline-item">
                                                <span class="badge bg-primary">{{ $vote->user->name }}</span>
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
@endsection
