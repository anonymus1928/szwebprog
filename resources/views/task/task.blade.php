@extends('layouts.app')

@section('content')
    <div class="content mx-auto" style="width: 60%;">
        <div class="card">
            <div class="card-header d-flex m-0">
                <div class="flex-grow-1 text-left"><h3 class="m-0">{{ $task->name }} <small class="text-secondary"><br>// {{ $task->points }} pont</small></h3></div>
                @if (Auth::user()->teacher)
                    <div class="text-right">
                        <a href="{{ route('edit-task', ['code' => $code, 'id' => $id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Szerkesztés</a>
                    </div>
                @endif
            </div>
            <div class="card-body">
                <div class="mt-2">
                    <h5>Határidő:</h5>
                    <p>{{ date('Y. m. d. G:i', strtotime($task->from)) }} – {{ date('Y. m. d. G:i', strtotime($task->until)) }}</p>
                </div>
                <div class="mt-2">
                    <h5>Leírás:</h5>
                    <p>{{ $task->description }}</p>
                </div>
            </div>
            <!-- Solutions -->
            <div class="card-header row m-0 border-top">
                <h3 style="margin-left: 15px;">Megoldások</h3>
            </div>
            <div class="card-body">
                @if ($task->solutions->count() > 0)
                    @foreach ($task->solutions as $solution)
                        @if (Auth::user()->id === $solution->student->id || Auth::user()->teacher)
                            <div class="row my-2 align-items-center border-bottom border-top mx-3 text-center {{ !is_null($solution->result) && Auth::user()->teacher ? 'corrected' : '' }}">
                                <div class="col-2 py-2">{{ $solution->student->name }}</div>
                                <div class="col-2 py-2">{{ $solution->student->email }}</div>
                                <div class="col-2 py-2">{{ $solution->created_at }}</div>
                                @if (!is_null($solution->result))
                                    <div class="col-2 py-2">{{ $solution->result }}</div>
                                    <div class="col-2 py-2">{{ $solution->updated_at }}</div>
                                @else
                                    <div class="col-2">-</div>
                                    <div class="col-2">-</div>
                                    @if (Auth::user()->teacher)
                                        <a class="btn btn-success ml-auto text-white" href="{{ route('solution', ['code' => $code, 'id' => $solution->id]) }}"><i class="fa fa-pencil"></i> Értékel</a>
                                    @endif
                                @endif
                            </div>
                        @endif
                    @endforeach
                @else
                    Erre a feladatra még nem adtak be megoldást.
                @endif
            </div>
        </div>
    </div>
@endsection