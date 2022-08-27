@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($plantparts))
  <div>
    <h1>Merchants</h1>
    <a href="{{ route('admin.plantpart.create') }}" class="btn btn-secondary">Neu</a>
    <table class="table table-hover table-dark">
      <thead>
        <tr>
          <th>#</th>
          <th>Pflanzenteil</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($plantparts as $plantpart)
        <tr>
          <td>{{ $plantpart->id }}</td>
          <td>{{ $plantpart->part }}</td>
          <td><a href="{{ route('admin.plantpart.edit', $plantpart->id) }}" class="btn btn-warning">edit</a></td>
          <td>
            <form action="{{ route('admin.plantpart.delete', $plantpart->id) }}" method="post">
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