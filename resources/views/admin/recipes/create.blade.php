@extends('layouts.main')

@section('content')
    <div class="container">
      <h5>Rezept erstellen</h5>
      <hr>
      <div class="row py-2">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('admin.recipe.store') }}" method="post">
                @csrf
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="name">
                      <input type="text" class="form-control" name="name" id="name">
                      <span class="label">Name</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="description">
                      <input class="form-control" name="description" id="description" type="text">
                      <span class="label">Beschreibung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="annotation">
                      <input type="text" class="form-control" name="annotation" id="annotation">
                      <span class="label">Anmerkung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <button type="submit" class="btn btn-dark">anlegen</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection