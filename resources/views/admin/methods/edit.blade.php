@extends('layouts.main')

@section('content')
@if(isset($method))
    <div>
      <form action="{{ route('admin.method.update', $method->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
          <div class="col">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ old('name', $method->name) }}">
          </div>
          <div class="col">
            <label for="name">Kürzel</label>
            <input type="text" class="form-control" name="short_name" id="short_name" placeholder="Kürzel" value="{{ old('short_name', $method->short_name) }}">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">ändern</button>
          </div>
        </div>
      </form>
    </div>
@endif
@endsection