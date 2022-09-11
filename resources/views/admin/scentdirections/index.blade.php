@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container">
  <h1>Duftrichtungen</h1>
  <a href="{{ route('admin.scentdirection.create') }}" class="btn btn-secondary">Neu</a>
  @if(isset($scentdirections))
    <table class="table table-hover table-secondary table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($scentdirections as $scentdirection)
        <tr>
          <td>{{ $scentdirection->name }}</td>
          <td><a href="{{ route('admin.scentdirection.edit', $scentdirection->id) }}" class="btn btn-warning">edit</a></td>
          <td>
            <form action="{{ route('admin.scentdirection.delete', $scentdirection->id) }}" method="post">
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