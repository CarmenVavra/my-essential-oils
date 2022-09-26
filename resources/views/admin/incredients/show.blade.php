@extends('layouts.main')

@section('content')
@if(isset($incredient))

    <div class="container">
      <h5>{{ $incredient->name }}</h5>
      <hr>
      <div class="row py-2">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header btn-delete"></div>
            <div class="card-body">
              <h6>Beschreibung</h6>
              {{ $incredient->description }}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header btn-show"></div>
            <div class="card-body">
              <h6>Körperliche Wirkungen</h6>
              {{ $incredient->physical_effect}}
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header btn-edit"></div>
            <div class="card-body">
              <h6>Psychische Wirkungen</h6>
              {{ $incredient->mental_effect }}
            </div>
          </div>
        </div>
      </div>
    </div>
@endif
@endsection