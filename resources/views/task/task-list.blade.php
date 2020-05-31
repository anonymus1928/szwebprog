@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-5">Feladataim</h1>
        @foreach (Auth::user()->student_subjects as $subject)

            @if ($subject->tasks->count() > 0)
                <h2 class="my-3">{{ $subject->name }}</h2>
                <ul class="list-group">
                @foreach ($subject->tasks as $task)
                    <li class="list-group-item"><a href="{{ route('solve', ['code' => $subject->code, 'id' => $task->id]) }}">{{ $task->name }}</a></li>
                @endforeach
                </ul>
            @endif

        @endforeach
    </div>
@endsection