@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($incredients))
  <div>
    <h1>Inhaltsstoffe</h1>
    <a href="{{ route('admin.incredient.create') }}" class="btn btn-secondary">Neu</a>
    <table class="table table-hover table-dark">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Beschreibung</th>
          <th>Körperliche Wirkung</th>
          <th>Psychische Wirkung</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($incredients as $incredient)
        <tr>
          <td>{{ $incredient->id }}</td>
          <td>{{ $incredient->name }}</td>
          <td>{{ $incredient->description }}</td>
          <td>{{ $incredient->physical_effect }}</td>
          <td>{{ $incredient->mental_effect }}</td>
          <td><a href="{{ route('admin.incredient.edit', $incredient->id) }}" class="btn btn-warning">edit</a></td>
          <td>
            <form action="{{ route('admin.incredient.delete', $incredient->id) }}" method="post">
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