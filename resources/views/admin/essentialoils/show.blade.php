@extends('layouts.main')

@section('content')

  @if(isset($essentialoil))
    <div class="container-fluid">
      <h1>{{ $essentialoil->name_english }}</h1>
      <div class="under-heading">{{ $essentialoil->name_latin }}, {{ $essentialoil->name_german }}</div>
      <div>
        @if($essentialoil->pur !== 0)
          <span class="badge bg-warning">P</span>
        @endif
        @if($essentialoil->dilute !== 0)
          <span class="badge bg-primary">V</span>
        @endif
        @if($essentialoil->sensitive !== 0)
          <span class="badge bg-danger">E</span>
        @endif
        @if($essentialoil->internal !== 0)
          <span class="badge bg-success">I</span>
        @endif
      </div>

      <hr>
      <div class="row">
        <div class="col-md-8">
          <h5>{{ $essentialoil->name_english }}</h5>
        </div>
      </div>
      <div class="row py-4">
        <div class="col-md-8">
          {{ $essentialoil->description_long }}
        </div>
      </div>
        <div class="row py-4">
          <div class="col-md-3">
            <div id="cardSingleOil" class="card card-show-single-oil">
              <h5 class="card-header">Single-Oil</h5>
              <div class="card-body">
                <h5 class="card-title">{{ $essentialoil->name_english }}</h5>
                <p class="card-text card-text-single-oil">{{ $essentialoil->name_latin }}, {{ $essentialoil->name_german }}</p>
                <div class="list-header">Verfahren</div>
                {{ $data['method']['name'] }} ({{ $data['method']['short_name'] }})
                
                <div class="list-header">Pflanzenteile</div>
                <ul class="list-group">
                @foreach($data['plantparts'] as $plantpart)
                  <li class="list-group-item">{{ $plantpart->part }}</li>
                @endforeach
                </ul>
                <div class="list-header">Inhaltsstoffe</div>
                <ul class="list-group">
                @foreach($data['incredients'] as $incredient)
                  <li class="list-group-item">{{ $incredient->name }}</li>
                @endforeach
                </ul>
                <div class="list-header">Duftnoten</div>
                <ul class="list-group">
                @foreach($data['fragrancenotes'] as $fragrancenote)
                  <li class="list-group-item">{{ $fragrancenote->name }}</li>
                @endforeach
                </ul>
                <div class="list-header">Gefahrenhinweise</div>
                <ul class="list-group">
                @foreach($data['attentions'] as $attention)
                  <li class="list-group-item">{{ $attention->name }}</li>
                @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div id="cardApplicationScopes" class="card bg-card-applicationscope">
              <h5 class="card-header">Anwendungsbereiche</h5>
              <img src="{{ asset('/img/anwendungsbereiche.jpg') }}" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">{{ $essentialoil->name_english }}</h5>
                <p class="card-text">Ein Text</p>
                <ul class="list-group">
                  @foreach($data['applicationscopes'] as $applicationscope)
                    <li class="list-group-item list-group-item-sage">{{ $applicationscope->name }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div id="cardPhysicalEffects" class="card bg-card-physical">
              <h5 class="card-header">Körperliche Wirkungen</h5>
              <img src="{{ asset('/img/koerperlicheWirkung.jpg') }}" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">{{ $essentialoil->name_english }}</h5>
                <p class="card-text">Ein Text</p>
                <ul class="list-group">
                  @foreach($data['physicaleffects'] as $physicaleffect)
                    <li class="list-group-item list-group-item-sage">{{ $physicaleffect->name }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div id="cardMentalEffects" class="card bg-card-mental">
              <h5 class="card-header">Psychische Wirkungen</h5>
              <img src="{{ asset('/img/psychischeWirkung.jpg') }}" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">{{ $essentialoil->name_english }}</h5>
                <p class="card-text">Ein Text</p>
                <ul class="list-group">
                  @foreach($data['mentaleffects'] as $mentaleffect)
                    <li class="list-group-item list-group-item-sage">{{ $mentaleffect->name }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>



      </div>

  @endif
@endsection