@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container">
  <h1>Körperliche Wirkungen</h1>
  <hr>
  <a href="{{ route('admin.physicaleffect.create') }}">
    <button class="icon-btn add-btn">
      <div class="add-icon"></div>
      <div class="btn-txt">Add Physicaleffect</div>
    </button>
  </a>
  {{-- <a href="{{ route('admin.physicaleffect.create') }}" class="btn btn-secondary">Neu</a> --}}
  @if(isset($physicaleffects))
    <table class="table table-hover table-oils table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Beschreibung</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($physicaleffects as $physicaleffect)
        <tr>
          <td>{{ $physicaleffect->name }}</td>
          <td>{{ $physicaleffect->description }}</td>
          <td><a href="{{ route('admin.physicaleffect.edit', $physicaleffect->id) }}" class="btn btn-edit btn-sm">edit</a></td>
          <td>
            <form action="{{ route('admin.physicaleffect.delete', $physicaleffect->id) }}" method="post">
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