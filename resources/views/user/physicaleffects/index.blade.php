@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container">
  <h1>Körperliche Wirkungen</h1>
  @if(isset($physicaleffects))
    <table class="table table-hover table-secondary table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Beschreibung</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($physicaleffects as $physicaleffect)
        <tr>
          <td>{{ $physicaleffect->name }}</td>
          <td>{{ $physicaleffect->description }}</td>
          <td><a href="{{ route('user.physicaleffect.show', $physicaleffect->id) }}" class="btn btn-warning">show</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endif




@endsection

@section('js')
    
@endsection