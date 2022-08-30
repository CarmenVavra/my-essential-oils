@extends('layouts.main')

@section('content')
    <div class="container">
      <form action="{{ route('admin.essentialoil.store') }}" method="post">
        @csrf
        <div class="row py-4">
          <div class="col">
            <input type="text" class="form-control" name="name_german" id="name_german" placeholder="Name Deutsch">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="name_latin" id="name_latin" placeholder="Name Latein">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="name_english" id="name_english" placeholder="Name Englisch">
          </div>
          <div class="col">
            <input type="text" class="form-control" name="description" id="description" placeholder="Beschreibung">
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
                <option value="{{ $merchant->id }}">{{ $merchant->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col">
            <label for="methodSelect">Verfahren</label>
            <select class="form-control" name="methodSelect" id="methodSelect">
              @foreach($data['methods'] as $key => $method)
                <option value="{{ $method->id }}">{{ $method->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="col">
            <label for="plantpartSelect">Pflanzenteile</label>
            <div class="list-group">
              @foreach($data['plantparts'] as $key => $plantpart)
                <label class="list-group-item">
                  <input class="form-check-input me-1" id="plantPartSelect" name="part_{{ $plantpart->id }}" type="checkbox" value="{{ $plantpart->id }}">
                  {{ $plantpart->part }}
                </label>
              @endforeach
            </div>
          </div>
        </div>
        <div class="row py-4">
          <div class="col">
            <label for="incredientSelect">Inhaltsstoffe</label>
            <div class="list-group">
              @foreach($data['incredients'] as $key => $incredient)
                <label class="list-group-item">
                  <input class="form-check-input me-1" name="incredientId_{{ $incredient->id }}" type="checkbox" value="{{ $incredient->id }}">
                  {{ $incredient->name }}
                </label>
              @endforeach
            </div>
          </div>
          <div class="col">
            <label for="applicationscopeSelect">Anwendungsbereiche</label>
            <div class="list-group">
              @foreach($data['applicationscopes'] as $key => $applicationscope)
                <label class="list-group-item">
                  <input class="form-check-input me-1" name="applicationscopeId_{{ $applicationscope->id }}" type="checkbox" value="{{ $applicationscope->id }}">
                  {{ $applicationscope->name }}
                </label>
              @endforeach
            </div>
          </div>
          <div class="col">
            <label for="attentionSelect">Gefahrenhinweise</label>
            <div class="list-group">
              @foreach($data['attentions'] as $key => $attention)
                <label class="list-group-item">
                  <input class="form-check-input me-1" name="attentionId_{{ $attention->id }}" type="checkbox" value="{{ $attention->id }}">
                  {{ $attention->name }}
                </label>
              @endforeach
            </div>
          </div>
        </div>
        <div class="row py-4">
          <div class="col">
            <label for="physicaleffectSelect">Körperliche Wirkung</label>
            <div class="list-group">
              @foreach($data['physicaleffects'] as $key => $physicaleffect)
                <label class="list-group-item">
                  <input class="form-check-input me-1" name="physicaleffectId_{{ $physicaleffect->id }}" type="checkbox" value="{{ $physicaleffect->id }}">
                  {{ $physicaleffect->name }}
                </label>
              @endforeach
            </div>
          </div>
          <div class="col">
            <label for="mentaleffectSelect">Psychische Wirkung</label>
            <div class="list-group">
              @foreach($data['mentaleffects'] as $key => $mentaleffect)
                <label class="list-group-item">
                  <input class="form-check-input me-1" name="mentaleffectId_{{ $mentaleffect->id }}" type="checkbox" value="{{ $mentaleffect->id }}">
                  {{ $mentaleffect->name }}
                </label>
              @endforeach
            </div>
          </div>
          <div class="col">
            <label for="fragrancenoteSelect">Duftnoten</label>
            <div class="list-group">
              @foreach($data['fragrancenotes'] as $key => $fragrancenote)
                <label class="list-group-item">
                  <input class="form-check-input me-1" name="fragrancenoteId_{{ $fragrancenote->id }}" type="checkbox" value="{{ $fragrancenote->id }}">
                  {{ $fragrancenote->name }}
                </label>
              @endforeach
            </div>
          </div>
        </div>
        <div class="row py-4">
          <div class="col">
            <button type="submit" class="btn btn-purple">anlegen</button>
          </div>
          </div>
      </form>
    </div>
@endsection