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
            <label for="effect">Wirkung</label>
            <input type="text" class="form-control" name="effect" id="effect" placeholder="Wirkung" value="{{ $incredient->effect }}">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">anlegen</button>
          </div>
        </div>
      </form>
    </div>
@endif
@endsection