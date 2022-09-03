@extends('layouts.main')

@section('content')
  @if(isset($essentialoil))
    <div class="container">
      <form action="{{ route('admin.essentialoil.update', $essentialoil->id) }}" method="post">
        @csrf
        @method('put')
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
                    <input type="text" class="form-control" name="name_german" id="name_german" placeholder="Name Deutsch" value="{{ old('name_german', $essentialoil->name_german) }}">
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <input type="text" class="form-control" name="name_latin" id="name_latin" placeholder="Name Latein" value="{{ old('name_latin', $essentialoil->name_latin) }}">
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <input type="text" class="form-control" name="name_english" id="name_english" placeholder="Name Englisch" value="{{ old('name_english', $essentialoil->name_english) }}">
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <input type="text" class="form-control" name="description" id="description" placeholder="Beschreibung" value="{{ old('description', $essentialoil->description) }}">
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
                        <option name="{{ $plantpart->id }}" value="{{ $plantpart->id }}"{{--  @if(in_array($plantpart->id, $pivotIds['essentialoil_plantpart_ids'])) selected @endif --}}>{{ $plantpart->part }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="incredientSelect">Inhaltsstoffe</label>
                    <select class="form-control style widthHeight" name="incredientSelect[]" id="incredientSelect" multiple size="3">
                      @foreach($data['incredients'] as $key => $incredient)
                        <option name="{{ $incredient->id }}" value="{{ $incredient->id }}"{{--  @if(in_array($incredient->id, $pivotIds['essentialoil_incredient_ids'])) selected @endif --}}>{{ $incredient->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="fragrancenoteSelect">Duftnoten</label>
                    <select class="form-control style widthHeight" name="fragrancenoteSelect[]" id="fragrancenoteSelect" multiple size="3">
                      @foreach($data['fragrancenotes'] as $key => $fragrancenote)
                        <option name="{{ $fragrancenote->id }}" value="{{ $fragrancenote->id }}"{{--  @if(in_array($fragrancenote->id, $pivotIds['essentialoil_fragrancenote_ids'])) selected @endif --}}>{{ $fragrancenote->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="attentionSelect">Gefahrenhinweise</label>
                    <select class="form-control style widthHeight" name="attentionSelect[]" id="incredientSelect" multiple size="3">
                      @foreach($data['attentions'] as $key => $attention)
                        <option name="{{ $attention->id }}" value="{{ $attention->id }}"{{--  @if(in_array($attention->id, $pivotIds['attention_essential_ids'])) selected @endif --}}>{{ $attention->name }}</option>
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
                        <option name="{{ $applicationscope->id }}" value="{{ $applicationscope->id }}"{{--  @if(in_array($applicationscope->id, $pivotIds['essential_applicationscope_ids'])) selected @endif --}}>{{ $applicationscope->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="physicaleffectSelect">Körperliche Wirkung</label>
                    <select class="form-control style widthHeight" name="physicaleffectSelect[]" id="physicaleffectSelect" multiple size="3">
                      @foreach($data['physicaleffects'] as $key => $physicaleffect)
                        <option name="{{ $physicaleffect->id }}" value="{{ $physicaleffect->id }}"{{--  @if(in_array($physicaleffect->id, $pivotIds['essential_physicaleffect_ids'])) selected @endif --}}>{{ $physicaleffect->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="mentaleffectSelect">Psychische Wirkung</label>
                    <select class="form-control style widthHeight" name="mentaleffectSelect[]" id="mentaleffectSelect" multiple size="3">
                      @foreach($data['mentaleffects'] as $key => $mentaleffect)
                        <option name="{{ $mentaleffect->id }}" value="{{ $mentaleffect->id }}"{{--  @if(in_array($mentaleffect->id, $pivotIds['essential_mentaleffect_ids'])) selected @endif --}}>{{ $mentaleffect->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <button type="submit" class="btn btn-purple">ändern</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </form>
    </div>
    @endif
@endsection