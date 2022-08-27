@extends('layouts.main')

@section('content')
    <div>
      <form action="{{ route('admin.plantpart.store') }}" method="post">
        @csrf
        <div class="row">
          <div class="col">
            <label for="part">Planzenteil</label>
            <input type="text" class="form-control" name="part" id="part" placeholder="Pflanzenteil">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">anlegen</button>
          </div>
        </div>
      </form>
    </div>
@endsection