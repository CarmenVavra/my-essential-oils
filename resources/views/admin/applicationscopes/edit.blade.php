@extends('layouts.main')

@section('content')
@if(isset($applicationscope))
    <div>
      <form action="{{ route('admin.applicationscope.update', $applicationscope->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
          <div class="col">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $applicationscope->name }}">
          </div>
          <div class="col">
            <label for="name_latin">Name Latein</label>
            <input type="text" class="form-control" name="name_latin" id="name_latin" placeholder="Name Latein" value="{{ $applicationscope->name_latin }}">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">anlegen</button>
          </div>
        </div>
      </form>
    </div>
@endif
@endsection