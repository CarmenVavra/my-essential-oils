@extends('layouts.main')

@section('content')

  @if(isset($recipe))
    <div class="container">
      <h1>{{ $recipe->name }}</h1>

    </div>
  @endif
@endsection