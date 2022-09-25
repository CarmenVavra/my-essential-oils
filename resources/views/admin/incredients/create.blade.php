@extends('layouts.main')

@section('content')
    <div class="container">
      <h5>Neuer Inhaltsstoff</h5>
      <hr>
      <div class="row py-2">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('admin.incredient.store') }}" method="post">
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
                    <label class="inp" for="description">Beschreibung</label>
                    <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="physicalEffect">Körperliche Wirkung</label>
                    <textarea class="form-control" name="physical_effect" id="physicalEffect" rows="5"></textarea>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="mentalEffect">Psychische Wirkung</label>
                    <textarea class="form-control" name="mental_effect" id="mentalEffect" rows="5"></textarea>
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