@extends('layouts.main')

@section('content')

  @if(isset($essentialoil))
    <div class="container">
      <h1>{{ $essentialoil->name_german }}</h1>
      <div class="under-heading">{{ $essentialoil->name_latin }}, {{ $essentialoil->name_english }}</div>
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

      <div class="row py-4">
        <div class="col-md-8">
          CONTENT
        </div>
        <div class="col-md-4">
          <div class="card">
            <h5 class="card-header">Single-Oils</h5>
            <div class="card-body">
              <h5 class="card-title">{{ $essentialoil->name_german }}</h5>
              <p class="card-text">{{ $essentialoil->name_latin }}, {{ $essentialoil->name_english }}</p>
              <div class="list-header">Verfahren</div>
              <div class="list-header">Pflanzenteile</div>
              @foreach($essentialoil->plantparts as $plantpart)
                <span>{{ $plantpart->part }}</span>
              @endforeach
              <div class="list-header">Inhaltsstoffe</div>
              <div class="list-header">Duftnoten</div>
              <div class="list-header">Anwendungsbereiche</div>
              <div class="list-header">Körperliche Wirkungen</div>
              <div class="list-header">Psychische Wirkungen</div>
              <div class="list-header">Gefahrenhinweise</div>

              
              <ul class="list-group list-group-flush">
                <li class="list-group-item">An item</li>
                <li class="list-group-item">A second item</li>
                <li class="list-group-item">A third item</li>
              </ul>
            </div>
          </div>



          @foreach($data['attentions'] as $attention)
            {{ $attention->name }}
          @endforeach
          @foreach($data['applicationscopes'] as $applicationscope)
            {{ $applicationscope->name }}
          @endforeach
          @foreach($data['incredients'] as $incredient)
            {{ $incredient->name }}
          @endforeach
          @foreach($data['plantparts'] as $plantpart)
            {{ $plantpart->part }}
          @endforeach
          @foreach($data['fragrancenotes'] as $fragrancenote)
            {{ $fragrancenote->name }}
          @endforeach
          @foreach($data['physicaleffects'] as $physicaleffect)
            {{ $physicaleffect->name }}
          @endforeach
          @foreach($data['mentaleffects'] as $mentaleffect)
            {{ $mentaleffect->name }}
          @endforeach
        </div>
      </div>
    </div>
  @endif
@endsection