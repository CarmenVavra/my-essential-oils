@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($applicationscopes))
  <div class="container">
    <h1>Anwendungsbereiche</h1>
    <table class="table table-hover table-secondary table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Name Latein</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($applicationscopes as $applicationscope)
        <tr>
          <td>{{ $applicationscope->name }}</td>
          <td>{{ $applicationscope->name_latin }}</td>
          <td><a href="{{ route('user.applicationscope.show', $applicationscope->id) }}" class="btn btn-info">show</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endif




@endsection

@section('js')
    
@endsection