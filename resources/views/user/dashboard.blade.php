@extends('layouts.main')
@section('css')
    
@endsection
@section('content')
  <div class="container">
    <div class="row py-4">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">eigene Ätherische Öle</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="{{ route('user.playground.index') }}" class="card-link btn btn-sm btn-primary">Enter</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">eigene Rezepte</h5>
            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="card-link btn btn-sm btn-primary">Enter</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row py-4">
      <div class="col">
        <div class="card">
          <div class="card-header">
            Wissenswertes
          </div>
          <div class="card-body">
            <h5 class="card-title">Fundgrube rund um das Thema Ätherische Öle</h5>
            <p class="card-text">Stöbern und Finden!</p>
            <div class="row py-4">
              <div class="col-md-4">
                <div class="card bg-card-application">
                  <div class="card-body">
                    <h5 class="card-title">Anwendungen</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="{{ route('admin.applications.index') }}" class="card-link btn btn-sm btn-primary">Enter</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card bg-card-public-recipes">
                  <div class="card-body">
                    <h5 class="card-title">öffentliche Rezepte</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link btn btn-sm btn-primary">Enter</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">öffentliche Rezepte</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link btn btn-sm btn-primary">Enter</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="row py-4">
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">öffentliche Rezepte</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link btn btn-sm btn-primary">Enter</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">öffentliche Rezepte</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link btn btn-sm btn-primary">Enter</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">öffentliche Rezepte</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link btn btn-sm btn-primary">Enter</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('js')
    
@endsection