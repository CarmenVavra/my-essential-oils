@extends('layouts.main')

@section('content')
@if(isset($fragrancenote))
    <div>
      <form action="{{ route('admin.fragrancenote.update', $fragrancenote->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
          <div class="col">
            <label for="name">Duftnote</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Duftnote" value="{{ $fragrancenote->name }}">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">anlegen</button>
          </div>
        </div>
      </form>
    </div>
@endif
@endsection