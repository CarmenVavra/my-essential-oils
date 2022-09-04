@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container">
  <h1>Psychische Wirkungen</h1>
  <a href="{{ route('admin.mentaleffect.create') }}" class="btn btn-secondary">Neu</a>
  @if(isset($mentaleffects))
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
        @foreach($mentaleffects as $mentaleffect)
        <tr>
          <td>{{ $mentaleffect->name }}</td>
          <td>{{ $mentaleffect->description }}</td>
          <td><a href="{{ route('admin.mentaleffect.edit', $mentaleffect->id) }}" class="btn btn-warning">edit</a></td>
          <td>
            <form action="{{ route('admin.mentaleffect.delete', $mentaleffect->id) }}" method="post">
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