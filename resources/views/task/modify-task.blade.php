@extends('layouts.app')

@section('content')
    <div class="content mx-auto" style="width: 60%;">
        <h1>Tárgy szerkesztő</h1>
        <form action="{{ isset($task) ? route('update-task', ['code' => $task->subject->code, 'id' => $task->id]) : route('store-task', ['code' => $code]) }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-8">
                    <label for="name">Feladatnév</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Feladatnév" value="{{ is_null(old('name')) && isset($task) ? $task->name : old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="points">Pontérték</label>
                    <input type="number" class="form-control @error('points') is-invalid @enderror" name="points" id="points" placeholder="Pontérték" value="{{ is_null(old('points')) && isset($task) ? $task->points : old('points') }}">
                    @error('points')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="description">Feladatleírás</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ is_null(old('description')) && isset($task) ? $task->description : old('description') }}</textarea>
                @error('description')
                    <span class="invalid-feedback" style="display: block;" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="from">Határidő "-tól"</label>
                    <input type="datetime-local" class="form-control @error('from') is-invalid @enderror" name="from" id="from" value="{{ is_null(old('from')) && isset($task) ? $task->from : old('from') }}">
                    @error('from')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="until">Határidő "-ig"</label>
                    <input type="datetime-local" class="form-control @error('until') is-invalid @enderror" name="until" id="until" value="{{ is_null(old('until')) && isset($task) ? $task->until : old('until') }}">
                    @error('until')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Rögzít</button>
          </form>
    </div>
@endsection