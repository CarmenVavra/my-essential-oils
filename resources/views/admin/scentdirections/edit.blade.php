@extends('layouts.main')

@section('content')
@if(isset($scentdirection))
    <div>
      <form action="{{ route('admin.scentdirection.update', $scentdirection->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
          <div class="col">
            <label for="name">Duftrichtung</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Duftrichtung" value="{{ $scentdirection->name }}">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">ändern</button>
          </div>
        </div>
      </form>
    </div>
@endif
@endsection