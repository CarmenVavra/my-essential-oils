@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($basicoils))
  <div class="container">
    <h1>Basisöle</h1>
    <a href="{{ route('admin.basicoil.create') }}" class="btn btn-secondary">Neu</a>
    <table class="table table-hover table-secondary table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Hauttyp</th>
          <th>Hautbereich</th>
          <th>Beschreibung</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($basicoils as $basicoil)
        <tr>
          <td>{{ $basicoil->name }}</td>
          <td>{{ $basicoil->skintype }}</td>
          <td>{{ $basicoil->skinarea }}</td>
          <td>{{ $basicoil->description }}</td>
          <td><a href="{{ route('admin.basicoil.edit', $basicoil->id) }}" class="btn btn-warning">edit</a></td>
          <td>
            <form action="{{ route('admin.basicoil.delete', $basicoil->id) }}" method="post">
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