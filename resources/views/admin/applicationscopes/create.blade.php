@extends('layouts.main')

@section('content')
    <div class="container">
      <form action="{{ route('admin.applicationscope.store') }}" method="post">
        @csrf
        <div class="card"">
          <div class="card-body">
            <h5 class="card-title">Anwendungsbereich</h5>
            <div class="row py-4">
              <div class="col-md-4">
                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
              </div>
            </div>
            <div class="row py-4">
              <div class="col-md-4">
                <input type="text" class="form-control" name="name_latin" id="name_latin" placeholder="Name Latein">
              </div>
            </div>
            <h6>Sektion</h6>
            <div class="row py-2">
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="radioApplicationSection" id="radioApplicationSectionPhysical" value="physical">
                  <label class="form-check-label" for="radioApplicationScopePhysical">
                    körperlich
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="radioApplicationSection" id="radioApplicationSectionMental" value="mental">
                  <label class="form-check-label" for="radioApplicationSectionMental">
                    psychisch
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="radioApplicationSection" id="radioApplicationSectionBoth" value="both">
                  <label class="form-check-label" for="radioApplicationSectionBoth">
                    beides
                  </label>
                </div>
              </div>
            </div>
            <div class="row py-4">
              <div class="col">
                <button type="submit" class="btn btn-dark">anlegen</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
@endsection