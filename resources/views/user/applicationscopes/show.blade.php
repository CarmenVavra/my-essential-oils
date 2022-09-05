@extends('layouts.main')

@section('content')

  @if(isset($essentialoil))
    <div class="container">
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

      <div class="row py-4">
        <div class="col-md-8">
          CONTENT
        </div>
        <div class="col-md-4">
          <div class="card">
            <h5 class="card-header">Single-Oils</h5>
            <div class="card-body">
              <h5 class="card-title">{{ $essentialoil->name_english }}</h5>
              <p class="card-text">{{ $essentialoil->name_latin }}, {{ $essentialoil->name_german }}</p>
              <div class="list-header">Verfahren</div>
              {{ $data['method']['name'] }} ({{ $data['method']['short_name'] }})
              
              <div class="list-header">Pflanzenteile</div>
              @foreach($data['plantparts'] as $plantpart)
                {{ $plantpart->part }}
              @endforeach
              <div class="list-header">Inhaltsstoffe</div>
              @foreach($data['incredients'] as $incredient)
              {{ $incredient->name }}
              @endforeach
              <div class="list-header">Duftnoten</div>
              @foreach($data['fragrancenotes'] as $fragrancenote)
                {{ $fragrancenote->name }}
              @endforeach
              <div class="list-header">Anwendungsbereiche</div>
              @foreach($data['applicationscopes'] as $applicationscope)
                {{ $applicationscope->name }}
              @endforeach
              <div class="list-header">Körperliche Wirkungen</div>
              @foreach($data['physicaleffects'] as $physicaleffect)
                {{ $physicaleffect->name }}
              @endforeach
              <div class="list-header">Psychische Wirkungen</div>
              @foreach($data['mentaleffects'] as $mentaleffect)
                {{ $mentaleffect->name }}
              @endforeach
              <div class="list-header">Gefahrenhinweise</div>
              @foreach($data['attentions'] as $attention)
                {{ $attention->name }}
              @endforeach
           

            </div>
          </div>

        </div>
      </div>
    </div>
  @endif
@endsection