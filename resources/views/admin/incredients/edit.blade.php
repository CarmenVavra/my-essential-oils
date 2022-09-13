@extends('layouts.main')

@section('content')
@if(isset($incredient))

    <div class="container">
      <h5>Inhaltsstoff ändern</h5>
      <hr>
      <div class="row py-2">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('admin.incredient.update', $incredient->id) }}" method="post">
                @csrf
                @method('put')
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="name">
                      <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $incredient->name) }}">
                      <span class="label">Name</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="description">
                      <input class="form-control" name="description" id="description" type="text" value="{{ old('name', $incredient->description) }}">
                      <span class="label">Beschreibung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="physicalEffect">
                      <input type="text" class="form-control" name="physical_effect" id="physicalEffect" value="{{ old('physical_effect', $incredient->physical_effect) }}">
                      <span class="label">Körperliche Wirkung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="mentalEffect">
                      <input type="text" class="form-control" name="mental_effect" id="mentalEffect" value="{{ old('mental_effect', $incredient->mental_effect) }}">
                      <span class="label">Psychische Wirkung</span>
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