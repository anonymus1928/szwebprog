@extends('layouts.app')

@section('content')
    <div class="content mx-auto" style="width: 60%;">
        <h1>Tárgy szerkesztő</h1>
        <form action="{{ route('store-subject') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="name">Tárgynév</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Tárgynév" value="{{ is_null(old('name')) && isset($subject) ? $subject->name : old('name') }}">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="code">Tárgykód</label>
                    <input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" placeholder="IK-SSSNNN" value="{{ is_null(old('code')) && isset($subject) ? $subject->code : old('code') }}">
                    @error('code')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="credit">Kredit</label>
                    <input type="number" class="form-control @error('credit') is-invalid @enderror" name="credit" id="credit" placeholder="Kredit" value="{{ is_null(old('credit')) && isset($subject) ? $subject->credit : old('credit') }}">
                    @error('credit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="description">Tárgyleírás</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ is_null(old('description')) && isset($subject) ? $subject->description : old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Rögzít</button>
          </form>
    </div>
@endsection