@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container">
  <h1>Psychische Wirkungen</h1>
  @if(isset($mentaleffects))
    <table class="table table-hover table-secondary table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Beschreibung</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($mentaleffects as $mentaleffect)
        <tr>
          <td>{{ $mentaleffect->name }}</td>
          <td>{{ $mentaleffect->description }}</td>
          <td><a href="{{ route('user.mentaleffect.show', $mentaleffect->id) }}" class="btn btn-warning">show</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endif




@endsection

@section('js')
    
@endsection