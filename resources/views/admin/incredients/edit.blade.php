@extends('layouts.main')

@section('content')
@if(isset($incredient))
    <div>
      <form action="{{ route('admin.incredient.update', $incredient->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
          <div class="col">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $incredient->name }}">
          </div>
          <div class="col">
            <label for="description">Beschreibung</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Beschreibung" value="{{ $incredient->description }}">
          </div>
          <div class="col">
            <label for="physicalEffect">Körperliche Wirkung</label>
            <input type="text" class="form-control" name="physical_effect" id="physicalEffect" placeholder="Körperliche Wirkung" value="{{ $incredient->physical_effect }}">
          </div>
          <div class="col">
            <label for="mentalEffect">Psychische Wirkung</label>
            <input type="text" class="form-control" name="mental_effect" id="mentalEffect" placeholder="Psychische Wirkung" value="{{ $incredient->mental_effect }}">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">anlegen</button>
          </div>
        </div>
      </form>
    </div>
@endif
@endsection