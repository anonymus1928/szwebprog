@extends('layouts.app')

@section('content')
    <div class="content mx-auto" style="width: 60%;">
        <h1>{{ $subject->name }}</h1>
        <div>
            <h3>A tárgy adatai</h3>
            <p>Tárgykód: {{ $subject->code }}</p>
            <p>Kredit: {{ $subject->credit }}</p>
            <p>Létrehozva: {{ $subject->created_at }}</p>
            <p>Utoljára módosítva: {{ $subject->updated_at }}</p>
            <p>A kurzusra jelentkezett hallgatók száma: {{ $subject->students->count() }}</p>
            <p>Leírás:</p>
            <p>{{ $subject->description }}</p>
        </div>
        <div>
            <h3>Jelentkezett hallgatók</h3>
            <ul>
                @forelse ($subject->students as $student)
                    <li>{{ $student->name }} ({{ $student->email }})</li>
                @empty
                    Erre a tárgyra nem jelentkezett hallgató.
                @endforelse
            </ul>
        </div>
    </div>
@endsection