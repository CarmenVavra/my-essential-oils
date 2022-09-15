@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container">
  <h1>Rezepte</h1>
  @if(isset($components))
    <table class="table table-hover table-secondary table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Gut für</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($components as $component)
        <tr>
          <td>{{ $component->name }}</td>
          <td>{{ $component->good_for }}</td>
          <td>{{ $component->bad_for }}</td>
          <td><a href="{{ route('user.component.show', $component->id) }}" class="btn btn-warning">show</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endif




@endsection

@section('js')
    
@endsection