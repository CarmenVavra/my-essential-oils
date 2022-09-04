@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container">
  <h1>Körperliche Wirkungen</h1>
  <a href="{{ route('admin.physicaleffect.create') }}" class="btn btn-secondary">Neu</a>
  @if(isset($physicaleffects))
    <table class="table table-hover table-secondary table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Beschreibung</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($physicaleffects as $physicaleffect)
        <tr>
          <td>{{ $physicaleffect->name }}</td>
          <td>{{ $physicaleffect->description }}</td>
          <td><a href="{{ route('admin.physicaleffect.edit', $physicaleffect->id) }}" class="btn btn-warning">edit</a></td>
          <td>
            <form action="{{ route('admin.physicaleffect.delete', $physicaleffect->id) }}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger">löschen</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endif




@endsection

@section('js')
    
@endsection