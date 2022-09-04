@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($methods))
  <div class="container">
    <h1>Verfahren</h1>
    <a href="{{ route('admin.method.create') }}" class="btn btn-secondary">Neu</a>
    <table class="table table-hover table-secondary table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Short</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($methods as $method)
        <tr>
          <td>{{ $method->name }}</td>
          <td>{{ $method->short_name }}</td>
          <td><a href="{{ route('admin.method.edit', $method->id) }}" class="btn btn-warning">edit</a></td>
          <td>
            <form action="{{ route('admin.method.delete', $method->id) }}" method="post">
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