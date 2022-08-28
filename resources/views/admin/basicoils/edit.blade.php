@extends('layouts.main')

@section('content')
@if(isset($basicoil))
    <div>
      <form action="{{ route('admin.basicoil.update', $basicoil->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
          <div class="col">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $basicoil->name }}">
          </div>
          <div class="col">
            <label for="skintype">Hauttyp</label>
            <input type="text" class="form-control" name="skintype" id="skintype" placeholder="Hauttyp" value="{{ $basicoil->skintype }}">
          </div>
          <div class="col">
            <label for="skinarea">Hautbereich</label>
            <input type="text" class="form-control" name="skinarea" id="skinarea" placeholder="Hautbereich" value="{{ $basicoil->skinarea }}">
          </div>
          <div class="col">
            <label for="description">Beschreibung</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Beschreibung" value="{{ $basicoil->description }}">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">ändern</button>
          </div>
        </div>
      </form>
    </div>
@endif
@endsection