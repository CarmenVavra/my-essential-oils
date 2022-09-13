@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="container">
  <h1>Psychische Wirkungen</h1>
  <hr>
  <a href="{{ route('admin.mentaleffect.create') }}">
    <button class="icon-btn add-btn">
      <div class="add-icon"></div>
      <div class="btn-txt">Add Mentaleffect</div>
    </button>
  </a>
  {{-- <a href="{{ route('admin.mentaleffect.create') }}" class="btn btn-secondary">Neu</a> --}}
  @if(isset($mentaleffects))
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
        @foreach($mentaleffects as $mentaleffect)
        <tr>
          <td>{{ $mentaleffect->name }}</td>
          <td>{{ $mentaleffect->description }}</td>
          <td><a href="{{ route('admin.mentaleffect.edit', $mentaleffect->id) }}" class="btn btn-edit btn-sm">edit</a></td>
          <td>
            <form action="{{ route('admin.mentaleffect.delete', $mentaleffect->id) }}" method="post">
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