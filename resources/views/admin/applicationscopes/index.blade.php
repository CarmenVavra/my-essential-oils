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
    <hr>
    <a href="{{ route('admin.applicationscope.create') }}">
      <button class="icon-btn add-btn">
        <div class="add-icon"></div>
        <div class="btn-txt">Add Applicationscope</div>
      </button>
    </a>
    {{-- <a href="{{ route('admin.applicationscope.create') }}" class="btn btn-secondary">Neu</a> --}}
    <table class="table table-hover table-oils table-striped">
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
          <td><a href="{{ route('admin.applicationscope.edit', $applicationscope->id) }}" class="btn btn-edit btn-sm">edit</a></td>
          <td>
            <form action="{{ route('admin.applicationscope.delete', $applicationscope->id) }}" method="post">
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