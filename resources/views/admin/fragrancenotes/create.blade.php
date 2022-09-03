@extends('layouts.main')

@section('content')
    <div>
      <form action="{{ route('admin.fragrancenote.store') }}" method="post">
        @csrf
        <div class="row">
          <div class="col">
            <label for="name">Duftnote</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Duftnote">
          </div>
          <div class="col">
            <label for="description">Beschreibung</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Beschreibung">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">anlegen</button>
          </div>
        </div>
      </form>
    </div>
@endsection