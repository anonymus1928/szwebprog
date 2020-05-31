@extends('layouts.app')

@section('content')
    <div class="content mx-auto" style="width: 60%;">
        <div class="card">
            <div class="card-header d-flex m-0">
                <div class="flex-grow-1 text-left"><h3 class="m-0">{{ $task->name }} <small class="text-secondary"><br>// {{ $task->points }} pont</small></h3></div>
            </div>
            <div class="card-body">
                <div class="mt-2">
                    <h5>Határidő: <small>{{ date('Y. m. d. G:i', strtotime($task->from)) }} – {{ date('Y. m. d. G:i', strtotime($task->until)) }}</small></h5>
                    
                </div>

                @if (Auth::user()->teacher)
                    <!-- Teacher -->
                    <div class="mt-2">
                        <details><summary>Leírás</summary>{{ $task->description }}</details>
                    </div>
                    <hr>
                    <div class="mt-2">
                        <h5>Megoldás szövege:</h5>
                        <p>{{ $solution->text }}</p>
                    </div>
                    <hr>
                    @if (!is_null($solution->file))
                        <div class="mt-2">
                            <h5><a href="{{ route('download', ['id' => $solution->id]) }}">Beadott file letöltése</a></h5>
                        </div>
                        <hr>
                    @endif
                    <form action="{{ route('correct', ['code' => $task->subject->code, 'id' => $solution->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="comment">Megjegyzés</label>
                            <textarea class="form-control" name="comment" id="comment" rows="3">{{ old('comment') }}</textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="result">Pontérték</label>
                                <input type="number" class="form-control @error('result') is-invalid @enderror" name="result" id="result" placeholder="Pontérték" value="{{ is_null(old('result')) && isset($task) ? $task->result : old('result') }}">
                                @error('result')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary col-md-4">Rögzít</button>
                        </div>
                    </form>
                @else
                    <!-- Student -->
                    <div class="mt-2">
                        <h5>Tárgy: <small>{{ $task->subject->name }}</small></h5>
                    </div>
                    <div class="mt-2">
                        <h5>Oktató: <small>{{ $task->subject->teacher->name }}</small></h5>
                    </div>
                    <hr>
                    <div class="mt-2">
                        <details open><summary>Leírás</summary>{{ $task->description }}</details>
                    </div>
                    <hr>
                    <form action="{{ route('store-solve', ['code' => $code, 'id' => $id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="text">Megoldás</label>
                            <textarea class="form-control @error('text') is-invalid @enderror" name="text" id="text" rows="3">{{ old('text') }}</textarea>
                            @error('text')
                                <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="form-group">
                                <label for="upfile">File feltöltés</label>
                                <input type="file" class="form-control-file" name="upfile" id="upfile">
                                <input type="hidden" name="until" value="{{ $task->until }}">
                                <input type="hidden" name="now" value="{{ date('Y-m-d\TG:i') }}">
                                @error('until')
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ "Lejárt a beadási határidő!" }}</strong>
                                    </span>
                                @enderror
                              </div>
                            <button type="submit" class="btn btn-success ml-auto" style="height: fit-content;">Beküld</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection