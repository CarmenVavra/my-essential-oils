@extends('layouts.main')

@section('content')
    <div>
      <form action="{{ route('admin.usagetype.store') }}" method="post">
        @csrf
        <div class="row">
          <div class="col">
            <label for="name">Pur</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
          </div>
          <div class="col">
            <label for="website">Verdünnt</label>
            <input type="text" class="form-control" name="website" id="website" placeholder="http://">
          </div>
          <div class="col">
            <label for="name">Empflindlich</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name">
          </div>
          <div class="col">
            <label for="website">Einnahme</label>
            <input type="text" class="form-control" name="website" id="website" placeholder="http://">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">anlegen</button>
          </div>
        </div>
      </form>
    </div>
@endsection