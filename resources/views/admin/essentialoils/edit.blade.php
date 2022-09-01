@extends('layouts.main')

@section('content')
@if(isset($essentialoil))
    <div class="container">
      <form action="{{ route('admin.essentialoil.update', $essentialoil->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row py-4">
          <div class="col">
            <input type="text" class="form-control" name="name_german" id="name_german" placeholder="Name Deutsch" value="{{ old('name_german', $essentialoil->name_german) }}">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="name_latin" id="name_latin" placeholder="Name Latein" value="{{ old('name_latin', $essentialoil->name_latin) }}">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="name_english" id="name_english" placeholder="Name Englisch" value="{{ old('name_english', $essentialoil->name_english) }}">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="description" id="description" placeholder="Beschreibung" value="{{ old('description', $essentialoil->description) }}">
          </div>
        </div>
        <div class="row py-4">
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
        <div class="row py-4">
          <div class="col">
            <label for="merchantSelect">Merchant</label>
            <select class="form-control" name="merchantSelect" id="merchantSelect">
              @foreach($data['merchants'] as $key => $merchant)
                <option name="{{ $merchant->id }}" value="{{ $merchant->id }}">{{ $merchant->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col">
            <label for="methodSelect">Verfahren</label>
            <select class="form-control" name="methodSelect" id="methodSelect">
              <option value="first">bitte wählen ...</option>
              @foreach($data['methods'] as $key => $method)
                <option name="{{ $method->id }}" value="{{ $method->id }}">{{ $method->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col">
            <label for="plantpartSelect">Pflanzenteile</label>
            <select class="form-control" name="plantpartSelect[]" id="plantpartSelect" multiple size="5">
              @foreach($data['plantparts'] as $key => $plantpart)
                <option name="{{ $plantpart->id }}" value="{{ $plantpart->id }}">{{ $plantpart->part }}</option>
              @endforeach
            </select>
        </div>
        <div class="row py-4">
          <div class="col">
            <label for="incredientSelect">Inhaltsstoffe</label>
            <select class="form-control" name="incredientSelect[]" id="incredientSelect" multiple size="5">
              @foreach($data['incredients'] as $key => $incredient)
                <option name="{{ $incredient->id }}" value="{{ $incredient->id }}">{{ $incredient->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col">
            <label for="applicationscopeSelect">Anwendungsbereiche</label>
            <select class="form-control" name="incredientSelect[]" id="incredientSelect" multiple size="5">
              @foreach($data['applicationscopes'] as $key => $applicationscope)
                <option name="{{ $applicationscope->id }}" value="{{ $applicationscope->id }}">{{ $applicationscope->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col">
            <label for="attentionSelect">Gefahrenhinweise</label>
            <select class="form-control" name="attentionSelect[]" id="incredientSelect" multiple size="5">
              @foreach($data['attentions'] as $key => $attention)
                <option name="{{ $attention->id }}" value="{{ $attention->id }}">{{ $attention->name }}</option>
              @endforeach
            </select>
        </div>
        <div class="row py-4">
          <div class="col">
            <label for="physicaleffectSelect">Körperliche Wirkung</label>
            <select class="form-control" name="physicaleffectSelect[]" id="physicaleffectSelect" multiple size="5">
              @foreach($data['physicaleffects'] as $key => $physicaleffect)
                <option name="{{ $physicaleffect->id }}" value="{{ $physicaleffect->id }}">{{ $physicaleffect->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col">
            <label for="mentaleffectSelect">Psychische Wirkung</label>
            <select class="form-control" name="mentaleffectSelect[]" id="mentaleffectSelect" multiple size="5">
              @foreach($data['mentaleffects'] as $key => $mentaleffect)
                <option name="{{ $mentaleffect->id }}" value="{{ $mentaleffect->id }}">{{ $mentaleffect->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col">
            <label for="fragrancenoteSelect">Duftnoten</label>
            <select class="form-control" name="fragrancenoteSelect[]" id="fragrancenoteSelect" multiple size="5">
              @foreach($data['fragrancenotes'] as $key => $fragrancenote)
                <option name="{{ $fragrancenote->id }}" value="{{ $fragrancenote->id }}">{{ $fragrancenote->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="row py-4">
          <div class="col">
            <button type="submit" class="btn btn-purple">ändern</button>
          </div>
          </div>
      </form>
    </div>
    @endif
@endsection