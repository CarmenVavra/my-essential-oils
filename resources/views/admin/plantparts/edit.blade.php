@extends('layouts.main')

@section('content')
@if(isset($plantpart))
    <div>
      <form action="{{ route('admin.plantpart.update', $plantpart->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
          <div class="col">
            <label for="part">Pflanzenteil</label>
            <input type="text" class="form-control" name="part" id="part" placeholder="Pflanzenteil" value="{{ $plantpart->part }}">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">anlegen</button>
          </div>
        </div>
      </form>
    </div>
@endif
@endsection