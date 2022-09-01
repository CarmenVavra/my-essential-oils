@extends('layouts.main')

@section('content')
    <div class="container">
      <form action="{{ route('admin.essentialoil.store') }}" method="post">
        @csrf
        <div class="row py-4">
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                Ätherisches Öl
              </div>
              <div class="card-body">
                <h5 class="card-title">Ätherisches Öl</h5>
                <div class="row py-2">
                  <div class="col">
                    <label for="merchantSelect">Merchant</label>
                    <select class="form-control" name="merchantSelect" id="merchantSelect">
                      @foreach($data['merchants'] as $key => $merchant)
                        <option name="{{ $merchant->id }}" value="{{ $merchant->id }}">{{ $merchant->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <input type="text" class="form-control" name="name_german" id="name_german" placeholder="Name Deutsch">
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <input type="text" class="form-control" name="name_latin" id="name_latin" placeholder="Name Latein">
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <input type="text" class="form-control" name="name_english" id="name_english" placeholder="Name Englisch">
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <input type="text" class="form-control" name="description" id="description" placeholder="Beschreibung">
                  </div>
                </div>
                <div class="row py-2">
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
                </div>
                <div class="row py-2">
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
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                Informatives
              </div>
              <div class="card-body">
                <h5 class="card-title">Informatives</h5>
                <div class="row py-2">
                  <div class="col">
                    <label for="methodSelect">Verfahren</label>
                    <select class="form-control" name="methodSelect" id="methodSelect">
                      <option value="first">bitte wählen ...</option>
                      @foreach($data['methods'] as $key => $method)
                        <option name="{{ $method->id }}" value="{{ $method->id }}">{{ $method->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="plantpartSelect">Pflanzenteile</label>
                    <select class="form-control style widthHeight" name="plantpartSelect[]" id="plantpartSelect" multiple size="3">
                      @foreach($data['plantparts'] as $key => $plantpart)
                        <option name="{{ $plantpart->id }}" value="{{ $plantpart->id }}">{{ $plantpart->part }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="incredientSelect">Inhaltsstoffe</label>
                    <select class="form-control style widthHeight" name="incredientSelect[]" id="incredientSelect" multiple size="3">
                      @foreach($data['incredients'] as $key => $incredient)
                        <option name="{{ $incredient->id }}" value="{{ $incredient->id }}">{{ $incredient->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="fragrancenoteSelect">Duftnoten</label>
                    <select class="form-control style widthHeight" name="fragrancenoteSelect[]" id="fragrancenoteSelect" multiple size="3">
                      @foreach($data['fragrancenotes'] as $key => $fragrancenote)
                        <option name="{{ $fragrancenote->id }}" value="{{ $fragrancenote->id }}">{{ $fragrancenote->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="attentionSelect">Gefahrenhinweise</label>
                    <select class="form-control style widthHeight" name="attentionSelect[]" id="incredientSelect" multiple size="3">
                      @foreach($data['attentions'] as $key => $attention)
                        <option name="{{ $attention->id }}" value="{{ $attention->id }}">{{ $attention->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-header">
                Anwendungen
              </div>
              <div class="card-body">
                <h5 class="card-title">Anwendungen</h5>
                <div class="row py-2">
                  <div class="col">
                    <label for="applicationscopeSelect">Anwendungsbereiche</label>
                    <select class="form-control style widthHeight" name="incredientSelect[]" id="incredientSelect" multiple size="3">
                      @foreach($data['applicationscopes'] as $key => $applicationscope)
                        <option name="{{ $applicationscope->id }}" value="{{ $applicationscope->id }}">{{ $applicationscope->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="physicaleffectSelect">Körperliche Wirkung</label>
                    <select class="form-control style widthHeight" name="physicaleffectSelect[]" id="physicaleffectSelect" multiple size="3">
                      @foreach($data['physicaleffects'] as $key => $physicaleffect)
                        <option name="{{ $physicaleffect->id }}" value="{{ $physicaleffect->id }}">{{ $physicaleffect->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="mentaleffectSelect">Psychische Wirkung</label>
                    <select class="form-control style widthHeight" name="mentaleffectSelect[]" id="mentaleffectSelect" multiple size="3">
                      @foreach($data['mentaleffects'] as $key => $mentaleffect)
                        <option name="{{ $mentaleffect->id }}" value="{{ $mentaleffect->id }}">{{ $mentaleffect->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <button type="submit" class="btn btn-purple">anlegen</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </form>
    </div>
@endsection