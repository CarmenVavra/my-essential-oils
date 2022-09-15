@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container">
  <h1>Rezepte</h1>
  @if(isset($recipes))
    <table class="table table-hover table-secondary table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Beschreibung</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($recipes as $recipe)
        <tr>
          <td>{{ $recipe->name }}</td>
          <td>{{ $recipe->description }}</td>
          <td><a href="{{ route('user.recipe.show', $recipe->id) }}" class="btn btn-warning">show</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endif




@endsection

@section('js')
    
@endsection