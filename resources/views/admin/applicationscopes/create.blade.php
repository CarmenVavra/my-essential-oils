@extends('layouts.main')

@section('content')
    <div>
      <form action="{{ route('admin.applicationscope.store') }}" method="post">
        @csrf
        <div class="row">
          <div class="col">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
          </div>
          <div class="col">
            <label for="name_latin">Name Latein</label>
            <input type="text" class="form-control" name="name_latin" id="name_latin" placeholder="Name Latein">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">anlegen</button>
          </div>
        </div>
      </form>
    </div>
@endsection