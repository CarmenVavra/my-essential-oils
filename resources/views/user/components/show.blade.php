@extends('layouts.main')

@section('content')

  @if(isset($component))
    <div class="container">
      <h1>{{ $component->name }}</h1>

    </div>
  @endif
@endsection