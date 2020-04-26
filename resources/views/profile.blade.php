@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Név: {{ $user->name }}</h1>
    <h2>Email: {{ $user->email }}</h2>
    <h2>
        @if($user->teacher)
            Tanár
        @else
            Hallgató
        @endif
    </h2>
</div>
@endsection