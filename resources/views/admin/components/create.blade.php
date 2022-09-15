@extends('layouts.main')

@section('content')
    <div class="container">
      <h5>Zutat erstellen</h5>
      <hr>
      <div class="row py-2">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('admin.component.store') }}" method="post">
                @csrf
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="name">
                      <input type="text" class="form-control" name="name" id="name">
                      <span class="label">Name</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="description">
                      <input class="form-control" name="description" id="description" type="text">
                      <span class="label">Beschreibung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="good_for">
                      <input type="text" class="form-control" name="good_for" id="good_for">
                      <span class="label">Gut geeignet</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="reason_good_for">
                      <input type="text" class="form-control" name="reason_good_for" id="reason_good_for">
                      <span class="label">Begründung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="bad_for">
                      <input type="text" class="form-control" name="bad_for" id="bad_for">
                      <span class="label">Nicht geeignet</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="reason_bad_for">
                      <input type="text" class="form-control" name="reason_bad_for" id="reason_bad_for">
                      <span class="label">Begründung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <button type="submit" class="btn btn-dark">anlegen</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection