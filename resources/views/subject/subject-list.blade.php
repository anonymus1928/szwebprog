@extends('layouts.app')

@section('content')
    <div class="content mx-auto" style="width: 60%;">

        @foreach ($subjects as $subject)

            <div class="card mb-3">
                <div class="card-header pb-0 px-0 mx-0 border-bottom-0 row">
                    <nav class="col">
                        <div class="nav nav-tabs" id="{{ $subject->code }}-tab" role="tablist">
                            <a class="nav-item nav-link active" id="{{ $subject->code }}-home-tab" data-toggle="tab" href="#{{ $subject->code }}-home" role="tab" aria-controls="{{ $subject->code }}-home" aria-selected="true">Adatlap</a>
                            <a class="nav-item nav-link {{ is_null($subject->description) ? 'disabled' : '' }}" id="{{ $subject->code }}-profile-tab" data-toggle="tab" href="#{{ $subject->code }}-profile" role="tab" aria-controls="{{ $subject->code }}-profile" aria-selected="false">Leírás</a>
                            
                            @if(!Auth::user()->teacher)
                                <a class="nav-item nav-link" id="{{ $subject->code }}-teacher-tab" data-toggle="tab" href="#{{ $subject->code }}-teacher" role="tab" aria-controls="{{ $subject->code }}-teacher" aria-selected="true">Tanár</a>
                            @endif

                        </div>
                    </nav>
                    <div class="col text-right">
                        <h5 class="mb-0"><i>{{ $subject->name }}</i></h5>
                    </div>
                </div>
                <div class="card-body row">
                    <div class="tab-content col-md-4" id="{{ $subject->code }}-tabContent">
                        <div class="tab-pane fade show active" id="{{ $subject->code }}-home" role="tabpanel" aria-labelledby="{{ $subject->code }}-home-tab">
                            <h5 class="card-title">{{ $subject->name }} <small>({{ $subject->code }})</small></h5>
                            <p class="mb-0">Kredit: {{ $subject->credit }}</p>

                        </div>
                        <div class="tab-pane fade" id="{{ $subject->code }}-profile" role="tabpanel" aria-labelledby="{{ $subject->code }}-profile-tab">
                            <p class="card-text">{{ $subject->description }}</p>
                        </div>

                        @if(!Auth::user()->teacher)
                            <div class="tab-pane fade" id="{{ $subject->code }}-teacher" role="tabpanel" aria-labelledby="{{ $subject->code }}-teacher-tab">
                                <p class="card-text">Név: {{ $subject->teacher->name }}</p>
                                <p class="card-text">Email: {{ $subject->teacher->email }}</p>
                            </div>
                        @endif

                    </div>
                    <div class="col-md-8 text-right">
                        <a href="{{ route('subject', ['code' => $subject->code]) }}" class="btn btn-primary">Megtekintés</a>
                        <a href="{{ route('edit-subject', ['code' => $subject->code]) }}" class="btn btn-primary">Szerkesztés</a>
                        <form action="{{ route('toggle-publicity', ['code' => $subject->code]) }}" method="post" style="display: inline;">
                            @csrf
                            <button class="btn btn-{{ $subject->public ? 'danger' : 'success' }}"><i class="fa fa-{{ $subject->public ? 'times' : 'check' }}"></i> {{ $subject->public ? 'Publikálás visszavonása' : 'Publikálás' }}</button>
                        </form>
                    </div>
                </div>
            </div>

        @endforeach

    </div>
@endsection