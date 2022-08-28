@extends('layouts.main')

@section('content')
    <div>
      <form action="{{ route('admin.basicoil.store') }}" method="post">
        @csrf
        <div class="row">
          <div class="col">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
          </div>
          <div class="col">
            <label for="skintype">Hauttyp</label>
            <input type="text" class="form-control" name="skintype" id="skintype" placeholder="Hauttyp">
          </div>
          <div class="col">
            <label for="skinarea">Hautbereich</label>
            <input type="text" class="form-control" name="skinarea" id="skinarea" placeholder="Hautbereich">
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