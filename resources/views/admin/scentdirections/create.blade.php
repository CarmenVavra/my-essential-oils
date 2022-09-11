@extends('layouts.main')

@section('content')
    <div>
      <form action="{{ route('admin.scentdirection.store') }}" method="post">
        @csrf
        <div class="row">
          <div class="col">
            <label for="name">Duftrichtung</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Duftrichtung">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">anlegen</button>
          </div>
        </div>
      </form>
    </div>
@endsection