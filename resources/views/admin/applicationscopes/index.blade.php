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
    <a href="{{ route('admin.applicationscope.create') }}" class="btn btn-secondary">Neu</a>
    <table class="table table-hover table-secondary table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Name Latein</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($applicationscopes as $applicationscope)
        <tr>
          <td>{{ $applicationscope->name }}</td>
          <td>{{ $applicationscope->name_latin }}</td>
          <td><a href="{{ route('admin.applicationscope.edit', $applicationscope->id) }}" class="btn btn-warning">edit</a></td>
          <td>
            <form action="{{ route('admin.applicationscope.delete', $applicationscope->id) }}" method="post">
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