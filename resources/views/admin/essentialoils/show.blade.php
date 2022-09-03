@extends('layouts.main')

@section('content')

  @if(isset($essentialoil))
    <div class="container">
      <h1>{{ $essentialoil->name_german }}</h1>
      <div class="under-heading">{{ $essentialoil->name_latin }}, {{ $essentialoil->name_english }}</div>
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