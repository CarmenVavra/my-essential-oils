@extends('layouts.main')

@section('content')
    <div>
      <form action="{{ route('admin.essentialoil.store') }}" method="post">
        @csrf
        <div class="row">
          <div class="col">
            <label for="name_german">Name Deutsch</label>
            <input type="text" class="form-control" name="name_german" id="name_german" placeholder="Name Deutsch">
          </div>
          <div class="col">
            <label for="name_latin">Name Latein</label>
            <input type="text" class="form-control" name="name_latin" id="name_latin" placeholder="Name Latein">
          </div>
          <div class="col">
            <label for="name_english">Name Englisch</label>
            <input type="text" class="form-control" name="name_english" id="name_english" placeholder="Name Englisch">
          </div>
          <div class="col">
            <label for="description">Beschreibung</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Beschreibung">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" name="pur" id="pur">
              <label class="form-check-label" for="pur">Pur</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" name="dilute" id="dilute">
              <label class="form-check-label" for="dilute">Verdünnt</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" name="sensitive" id="sensitive">
              <label class="form-check-label" for="sensitive">Empfindlich</label>
            </div>
          </div>
          <div class="col">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" name="internal" id="internal">
              <label class="form-check-label" for="internal">Einnahme</label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="merchant_id">Merchant ID</label>
            <input type="text" class="form-control" name="merchant_id" id="merchant_id" placeholder="Merchant ID">
          </div>
          <div class="col">
            <label for="method_id">Verfahren ID</label>
            <input type="text" class="form-control" name="method_id" id="method_id" placeholder="Verfahren ID">
          </div>
          <div class="col">
            <label for="plantpart_id">Pflanzenteil ID</label>
            <input type="text" class="form-control" name="plantpart_id" id="plantpart_id" placeholder="Pflanzenteil ID">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <button type="submit" class="btn btn-dark">anlegen</button>
          </div>
          </div>
      </form>
    </div>
@endsection