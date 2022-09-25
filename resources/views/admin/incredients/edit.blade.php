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
                    <label class="inp" for="description">Beschreibung</label>
                    <textarea class="form-control" name="description" id="description" rows="5">{{ old('name', $incredient->description) }}</textarea>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="physicalEffect">Körperliche Wirkung</label>
                      <textarea class="form-control" name="physical_effect" id="physicalEffect" rows="5">{{ old('physical_effect', $incredient->physical_effect) }}</textarea>
                      <span class="label"></span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="mentalEffect">Psychische Wirkung</label>
                    <textarea class="form-control" name="mental_effect" id="mentalEffect" rows="5">{{ old('mental_effect', $incredient->mental_effect) }}</textarea>
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