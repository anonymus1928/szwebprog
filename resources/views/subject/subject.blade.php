@extends('layouts.app')

@section('content')
    <div class="content mx-auto" style="width: 60%;">
        <h1 class="my-3">Tantárgyi adatlap</h1>
        <div class="card">
            <div class="card-header d-flex m-0">
                <div class="flex-grow-1 text-left"><h3 class="m-0">{{ $subject->name }} <small class="text-secondary"><br>// {{ $subject->code }}<br>// {{ $subject->credit }} kredit</small></h3></div>
                @if (Auth::user()->teacher)
                    <div class="text-right">
                        <a href="{{ route('edit-subject', ['code' => $subject->code]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Szerkesztés</a>
                        <a id="delete-button" class="btn btn-danger text-white" onclick="document.getElementById('delete-subject').submit();"><i class="fa fa-trash"></i> Törlés</a>
                        <form id="delete-subject" action="{{ route('delete-subject') }}" method="post" class="d-none">
                            @csrf
                            <input type="text" name="code" value="{{ $subject->code }}">
                        </form>
                        <br>
                        <a href="{{ route('create-task', ['code' => $subject->code]) }}" class="btn btn-success mt-1 w-100"><i class="fa fa-plus"></i> Új feladat</a>
                    </div>
                @endif
            </div>
            <div class="card-body row">
                <div class="col-7">
                    <h5>Leírás:</h5>
                    <p>{{ $subject->description }}</p>
                </div>
                <div class="col-5" style="margin-top: 2em;">
                    <p><i class="fa fa-history"></i> Létrehozva: {{ $subject->created_at }}</p>
                    <p><i class="fa fa-history"></i> Utoljára módosítva: {{ $subject->updated_at }}</p>
                    @if (!Auth::user()->teacher)
                        <p>Tanár: {{ $subject->teacher->name }} | <em>{{ $subject->teacher->email }}</em></p>
                    @endif
                </div>
            </div>
            <!-- Students -->
            <div class="card-header row m-0 border-top">
                <div class="col-6 text-left">
                    <h3>Jelentkezett hallgatók</h3>
                </div>
                <div class="col-6 text-right">
                    A kurzusra jelentkezett hallgatók száma: {{ $subject->students->count() }}
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group" style="max-height: 20em; overflow-y: auto;">
                    @forelse ($subject->students as $student)
                        <li class="list-group-item">{{ $student->name }} | {{ $student->email }}</li>
                    @empty
                        Erre a tárgyra nem jelentkezett hallgató.
                    @endforelse
                </ul>
            </div>
            <!-- Tasks -->
            <div class="card-header row m-0 border-top">
                <h3 style="margin-left: 15px;">@if (!Auth::user()->teacher) Aktív feladatok @else Feladatok @endif</h3>
            </div>
            <div class="card-body">
                @if ($subject->tasks->count() > 0)
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Név</th>
                                <th scope="col">Pontszám</th>
                                <th scope="col">Határidő "-tól"</th>
                                <th scope="col">Határidő "-ig"</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subject->tasks()->orderBy('until', 'desc')->get() as $task)
                                @if (!Auth::user()->teacher && ($task->from < date('Y-m-d\TG:i') && $task->until > date('Y-m-d\TG:i')))
                                    <tr>
                                        <td><a href="{{ route('solve', ['code' => $subject->code , 'id' => $task->id]) }}">{{ $task->name }}</a></td>
                                        <td>{{ $task->points }}</td>
                                        <td>{{ date('Y. m. d. G:i', strtotime($task->from)) }}</td>
                                        <td>{{ date('Y. m. d. G:i', strtotime($task->until)) }}</td>
                                    </tr>
                                @elseif (Auth::user()->teacher)
                                    <tr class="@if($task->until < date('Y-m-d\TG:i')) table-danger @elseif($task->from < date('Y-m-d\TG:i') && $task->until > date('Y-m-d\TG:i')) table-success @else table-primary @endif">
                                        <td><a href="{{ route('task', ['code' => $subject->code , 'id' => $task->id]) }}">{{ $task->name }}</a></td>
                                        <td>{{ $task->points }}</td>
                                        <td>{{ date('Y. m. d. G:i', strtotime($task->from)) }}</td>
                                        <td>{{ date('Y. m. d. G:i', strtotime($task->until)) }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                @else
                    Ehhez a tárgyhoz nem tartozik feladat.
                @endif
            </div>
        </div>
    </div>
@endsection