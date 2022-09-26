@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($incredients))
  <div class="container">
    <h1>Inhaltsstoffe</h1>
    <hr>
    <a href="{{ route('admin.incredient.create') }}">
      <button class="icon-btn add-btn">
        <div class="add-icon"></div>
        <div class="btn-txt">Add Incredient</div>
      </button>
    </a>


    {{-- <a href="{{ route('admin.incredient.create') }}" class="btn btn-secondary">Neu</a> --}}
    <table class="table table-hover table-oils table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Beschreibung</th>
          <th>Körperliche Wirkung</th>
          <th>Psychische Wirkung</th>
          <th>show</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($incredients as $incredient)
        <tr>
          <td>{{ $incredient->name }}</td>
          <td>{{ $incredient->description }}</td>
          <td>{{ $incredient->physical_effect }}</td>
          <td>{{ $incredient->mental_effect }}</td>
          <td><a href="{{ route('admin.incredient.show', $incredient->id) }}" class="btn btn-show btn-sm">show</a></td>
          <td><a href="{{ route('admin.incredient.edit', $incredient->id) }}" class="btn btn-edit btn-sm">edit</a></td>
          <td>
            <form action="{{ route('admin.incredient.delete', $incredient->id) }}" method="post">
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