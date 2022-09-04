@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div>
  <h1>Duftnoten</h1>
  <a href="{{ route('admin.fragrancenote.create') }}" class="btn btn-secondary">Neu</a>
  @if(isset($fragrancenotes))
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
        @foreach($fragrancenotes as $fragrancenote)
        <tr>
          <td>{{ $fragrancenote->name }}</td>
          <td>{{ $fragrancenote->description }}</td>
          <td><a href="{{ route('admin.fragrancenote.edit', $fragrancenote->id) }}" class="btn btn-warning">edit</a></td>
          <td>
            <form action="{{ route('admin.fragrancenote.delete', $fragrancenote->id) }}" method="post">
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