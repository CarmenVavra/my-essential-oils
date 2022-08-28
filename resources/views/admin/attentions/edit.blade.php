@extends('layouts.main')

@section('content')
@if(isset($attention))
    <div>
      <form action="{{ route('admin.attention.update', $attention->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
          <div class="col">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $attention->name }}">
          </div>
          <div class="col">
            <label for="description">Gefahrenhinweis</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Gefahrenhinweis" value="{{ $attention->description }}">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">ändern</button>
          </div>
        </div>
      </form>
    </div>
@endif
@endsection