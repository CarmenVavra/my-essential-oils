@extends('layouts.main')

@section('content')

@if(isset($recipe))

    <div class="container">
      <h5>Rezept ändern</h5>
      <hr>
      <div class="row py-2">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('admin.recipe.update', $recipe->id) }}" method="post">
                @csrf
                @method('put')
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="name">
                      <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $recipe->name) }}">
                      <span class="label">Name</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="description">
                      <input class="form-control" name="description" id="description" type="text" value="{{ old('description', $recipe->description) }}">
                      <span class="label">Beschreibung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="annotation">
                      <input type="text" class="form-control" name="annotation" id="annotation" value="{{ old('annotation', $recipe->annotation) }}">
                      <span class="label">Anmerkung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <button type="submit" class="btn btn-dark">ändern</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endif
@endsection