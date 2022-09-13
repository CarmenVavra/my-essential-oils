@extends('layouts.main')

@section('content')
@if(isset($application))

    <div class="container">
      <h5>Anwendung ändern</h5>
      <hr>
      <div class="row py-2">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('admin.application.update', $application->id) }}" method="post">
                @csrf
                @method('put')
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="name">
                      <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $application->name) }}">
                      <span class="label">Name</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="how_to">
                      <input class="form-control" name="how_to" id="how_to" type="text" value="{{ old('how_to', $application->how_to) }}">
                      <span class="label">HowTo</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <button type="submit" class="btn btn-dark">ändern</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endif
@endsection