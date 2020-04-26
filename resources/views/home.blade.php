@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-3">
          <div class="card text-center">
            <div class="card-body">
              <p>{{ $teachers }}</p>
              <h5>Tanár</h5>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card text-center">
            <div class="card-body">
              <p>{{ $students }}</p>
              <h5>Diák</h5>
            </div>
          </div>
        </div>
        <div class="col-3">
          <div class="card text-center">
            <div class="card-body">
              <p>{{ $tasks }}</p>
              <h5>Feladat</h5>
            </div>
          </div>
        </div>
        <div class="col-3 text-center">
          <div class="card">
            <div class="card-body">
              <p>{{ $solutions }}</p>
              <h5>Megoldás</h5>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection