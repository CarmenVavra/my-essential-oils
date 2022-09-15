@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($components))
  <div class="container">
    <h1>Zutaten</h1>
    <hr>
    <a href="{{ route('admin.component.create') }}">
      <button class="icon-btn add-btn">
        <div class="add-icon"></div>
        <div class="btn-txt">Add Component</div>
      </button>
    </a>


    {{-- <a href="{{ route('admin.incredient.create') }}" class="btn btn-secondary">Neu</a> --}}
    <table class="table table-hover table-oils table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Beschreibung</th>
          <th>Gut geeignet</th>
          <th>Begründung</th>
          <th>Nicht geeignet</th>
          <th>Begründung</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($components as $component)
        <tr>
          <td>{{ $component->name }}</td>
          <td>{{ $component->description }}</td>
          <td>{{ $component->good_for }}</td>
          <td>{{ $component->reason_good_for }}</td>
          <td>{{ $component->bad_for }}</td>
          <td>{{ $component->reason_bad_for }}</td>
          <td><a href="{{ route('admin.component.edit', $component->id) }}" class="btn btn-edit btn-sm">edit</a></td>
          <td>
            <form action="{{ route('admin.component.delete', $component->id) }}" method="post">
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