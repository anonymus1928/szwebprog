@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Better Than Neptun</h1>
    <p>Alapszintű oktatási rendszer. Regisztráció és bejelentkezés után tanárként lehetősége van új tantárgyat meghírdetni, illetve a már meglévő tárgyait kezelni. Diákként jelentkezhet és leadhat tárgyakat, illetve a kiadott feladatokat megoldhatja.</p>
    <p><strong>Jelszó: <em>admin</em></strong></p>
    <p><strong>Tanárok:</strong></p>
    <ul>
      <li>t1@btn.hu</li>
      <li>t2@btn.hu</li>
      <li>t3@btn.hu</li>
    </ul>
    <p><strong>Diákok:</strong></p>
    <ul>
      <li>s1@btn.hu</li>
      <li>s2@btn.hu</li>
      <li>s3@btn.hu</li>
      <li>s4@btn.hu</li>
      <li>s5@btn.hu</li>
      <li>s6@btn.hu</li>
    </ul>
    <h1>Statisztikák</h1>
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