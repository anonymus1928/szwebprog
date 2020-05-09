@extends('layouts.app')

@section('content')
    <div class="content mx-auto" style="width: 60%;">
        <h1 class="my-3">Tantárgyi adatlap</h1>
        <div class="card">
            <div class="card-header row m-0">
                <div class="col-6 text-left"><h3 class="m-0">{{ $subject->name }} <small class="text-secondary">// {{ $subject->code }} // {{ $subject->credit }} kredit</small></h3></div>
                <div class="col-6 text-right">
                    @if (Auth::user()->teacher)
                        <a href="{{ route('edit-subject', ['code' => $subject->code]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Szerkesztés</a>
                        <a id="delete-button" class="btn btn-danger text-white" onclick="document.getElementById('delete-subject').submit();"><i class="fa fa-trash"></i> Törlés</a>
                        <form id="delete-subject" action="{{ route('delete-subject') }}" method="post" class="d-none">
                            @csrf
                            <input type="text" name="code" value="{{ $subject->code }}">
                        </form>
                    @endif
                </div>
            </div>
            <div class="card-body row">
                <div class="col-7">
                    <h5>Leírás:</h5>
                    <p>{{ $subject->description }}</p>
                </div>
                <div class="col-5">
                    <p><i class="fa fa-history"></i> Létrehozva: {{ $subject->created_at }}</p>
                    @if (!Auth::user()->teacher)
                        <p><i class="fa fa-history"></i> Utoljára módosítva: {{ $subject->updated_at }}</p>
                    @endif
                    <p>Tanár: {{ $subject->teacher->name }} | <em>{{ $subject->teacher->email }}</em></p>
                </div>
            </div>
            <div class="card-footer row m-0">
                <div class="col-6 text-left">
                    <h3>Jelentkezett hallgatók</h3>
                </div>
                <div class="col-6 text-right">
                    A kurzusra jelentkezett hallgatók száma: {{ $subject->students->count() }}
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @forelse ($subject->students as $student)
                        <li class="list-group-item">{{ $student->name }} | {{ $student->email }}</li>
                    @empty
                        Erre a tárgyra nem jelentkezett hallgató.
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection