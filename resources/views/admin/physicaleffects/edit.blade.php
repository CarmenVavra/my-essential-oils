@extends('layouts.main')

@section('content')

@if(isset($physicaleffect))
    <div>
      <form action="{{ route('admin.physicaleffect.update', $physicaleffect->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
          <div class="col">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $physicaleffect->name }}">
          </div>
          <div class="col">
            <label for="description">Beschreibung</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Beschreibung" value="{{ $physicaleffect->description }}">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">ändern</button>
          </div>
        </div>
      </form>
    </div>
@endif
@endsection