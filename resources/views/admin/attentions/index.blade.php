@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($attentions))
  <div>
    <h1>Gefahrenhinweise</h1>
    <a href="{{ route('admin.attention.create') }}" class="btn btn-secondary">Neu</a>
    <table class="table table-hover table-dark">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Beschreibung</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($attentions as $attention)
        <tr>
          <td>{{ $attention->id }}</td>
          <td>{{ $attention->name }}</td>
          <td>{{ $attention->description }}</td>
          <td><a href="{{ route('admin.attention.edit', $attention->id) }}" class="btn btn-warning">edit</a></td>
          <td>
            <form action="{{ route('admin.attention.delete', $attention->id) }}" method="post">
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