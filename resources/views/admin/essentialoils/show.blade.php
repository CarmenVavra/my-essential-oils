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
  @endif
@endsection