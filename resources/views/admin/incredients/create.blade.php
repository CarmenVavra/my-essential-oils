@extends('layouts.main')

@section('content')
    <div>
      <form action="{{ route('admin.incredient.store') }}" method="post">
        @csrf
        <div class="row">
          <div class="col">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
          </div>
          <div class="col">
            <label for="effect">Wirkung</label>
            <input type="text" class="form-control" name="effect" id="effect" placeholder="Wirkung">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">anlegen</button>
          </div>
        </div>
      </form>
    </div>
@endsection