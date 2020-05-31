@extends('layouts.app')

@section('content')
    <div class="content mx-auto" style="width: 60%;">
        @if (isset($assign))
            <h1 class="my-3">Tárgyfelvétel</h1>
        @else
            @if (Auth::user()->teacher)
                <div class="row">
                    <div class="col-6"><h1 class="my-3">Tanított tárgyaim</h1></div>
                    <div class="col-6 my-auto text-right"><a class="btn btn-success btn-lg" href="{{ route('create-subject') }}"><i class="fa fa-plus"></i> Új tárgy meghirdetése</a></div>
                </div>
            @else
                <h1 class="my-3">Felvett tárgyaim</h1>
            @endif
            
        @endif

        @forelse ($subjects as $subject)

            <div class="card mb-3">
                <div class="card-header pb-0 px-0 mx-0 border-bottom-0 row">
                    <nav class="col">
                        <div class="nav nav-tabs" id="{{ $subject->code }}-tab" role="tablist">
                            <a class="nav-item nav-link active" id="{{ $subject->code }}-home-tab" data-toggle="tab" href="#{{ $subject->code }}-home" role="tab" aria-controls="{{ $subject->code }}-home" aria-selected="true" onclick="document.getElementById('{{ $subject->code }}-home').classList.add('d-flex');">Adatlap</a>
                            <a class="nav-item nav-link {{ is_null($subject->description) ? 'disabled' : '' }}" id="{{ $subject->code }}-profile-tab" data-toggle="tab" href="#{{ $subject->code }}-profile" role="tab" aria-controls="{{ $subject->code }}-profile" aria-selected="false" onclick="document.getElementById('{{ $subject->code }}-home').classList.remove('d-flex');">Leírás</a>
                            
                            @if(!Auth::user()->teacher)
                                <a class="nav-item nav-link" id="{{ $subject->code }}-teacher-tab" data-toggle="tab" href="#{{ $subject->code }}-teacher" role="tab" aria-controls="{{ $subject->code }}-teacher" aria-selected="true" onclick="document.getElementById('{{ $subject->code }}-home').classList.remove('d-flex');">Tanár</a>
                            @endif

                        </div>
                    </nav>
                    <div class="col text-right">
                        <h5 class="mb-0"><i>{{ $subject->name }}</i></h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="{{ $subject->code }}-tabContent">
                        <div class="tab-pane fade show active d-flex" id="{{ $subject->code }}-home" role="tabpanel" aria-labelledby="{{ $subject->code }}-home-tab">
                            <div class="flex-grow-1">
                                <h5 class="card-title"><a href="{{ route('subject', ['code' => $subject->code]) }}">{{ $subject->name }}</a> <small>({{ $subject->code }})</small></h5>
                                <p class="mb-0">Kredit: {{ $subject->credit }}</p>
                            </div>
                            <div class="text-right btn-group h-25" role="group" aria-label="Subject buttons">
                                @if (isset($assign))
                                    <a class="btn btn-success text-white rounded-right" onclick="document.getElementById('{{ $subject->code }}-assign').submit();">Felvesz</a>
                                    <form id="{{ $subject->code }}-assign" action="{{ route('assign') }}" method="post" class="d-none">
                                        @csrf
                                        <input type="number" name="id" value="{{ $subject->id }}">
                                    </form>
                                @else
                                    @if (Auth::user()->teacher)
                                        <a href="{{ route('edit-subject', ['code' => $subject->code]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Szerkesztés</a>
                                        <a class="btn btn-{{ $subject->public ? 'danger' : 'success' }} text-white rounded-right" onclick="document.getElementById('{{ $subject->code }}-toggle').submit();"><i class="fa fa-{{ $subject->public ? 'times' : 'check' }}"></i> {{ $subject->public ? 'Publikálás visszavonása' : 'Publikálás' }}</a>
                                        <form id="{{ $subject->code }}-toggle" action="{{ route('toggle-publicity', ['code' => $subject->code]) }}" method="post" class="d-none">
                                            @csrf
                                        </form>
                                    @else
                                        <a class="btn btn-danger text-white rounded-right" onclick="document.getElementById('{{ $subject->code }}-down').submit();">Lead</a>
                                        <form id="{{ $subject->code }}-down" action="{{ route('drop') }}" method="post" class="d-none">
                                            @csrf
                                            <input type="number" name="id" value="{{ $subject->id }}">
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade" id="{{ $subject->code }}-profile" role="tabpanel" aria-labelledby="{{ $subject->code }}-profile-tab">
                            <p class="card-text">{{ $subject->description }}</p>
                        </div>

                        @if(!Auth::user()->teacher)
                            <div class="tab-pane fade" id="{{ $subject->code }}-teacher" role="tabpanel" aria-labelledby="{{ $subject->code }}-teacher-tab">
                                <p class="card-text">Név: {{ $subject->teacher->name }}<br>Email: {{ $subject->teacher->email }}</p>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-primary" role="alert">Nincs megjeleníthető tárgy!</div>
        @endforelse
    </div>
@endsection