@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($applications))
  <div class="container">
    <h1>Anwendungen</h1>
    <hr>
    <a href="{{ route('admin.application.create') }}">
      <button class="icon-btn add-btn">
        <div class="add-icon"></div>
        <div class="btn-txt">Add Application</div>
      </button>
    </a>

    {{-- <a href="{{ route('admin.incredient.create') }}" class="btn btn-secondary">Neu</a> --}}
    <table class="table table-hover table-oils table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>HowTo</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($applications as $application)
        <tr>
          <td>{{ $application->name }}</td>
          <td>{{ $application->how_to }}</td>

          <td><a href="{{ route('admin.application.edit', $application->id) }}" class="btn btn-edit btn-sm">edit</a></td>
          <td>
            <form action="{{ route('admin.application.delete', $application->id) }}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-delete btn-sm"><strong>X</strong></button>
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