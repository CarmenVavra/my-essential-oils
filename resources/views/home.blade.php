@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Essential Oils Web by Carmen Vavra</h1>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md">
            <div class="card">
                <img src="{{ asset('/img/essentialoils.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Ätherische Öle</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="{{ route('admin.essentialoils.index') }}" class="btn btn-primary">Enter</a>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
                <img src="{{ asset('/img/physical.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Anwendungen</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="{{ route('admin.applications.index') }}" class="btn btn-primary">Enter</a>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card">
                <img src="{{ asset('/img/mental.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Psychische Anwendungsbereiche</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="{{ route('user.mentaleffects.index') }}" class="btn btn-primary">Enter</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
