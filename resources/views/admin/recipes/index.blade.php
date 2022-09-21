@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($recipes))
  <div class="container">
    <h1>Rezepte</h1>
    <hr>
    <a href="{{ route('admin.recipe.create') }}">
      <button class="icon-btn add-btn">
        <div class="add-icon"></div>
        <div class="btn-txt">Add Recipe</div>
      </button>
    </a>


    {{-- <a href="{{ route('admin.incredient.create') }}" class="btn btn-secondary">Neu</a> --}}
    <table class="table table-hover table-oils table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Beschreibung</th>
          <th>Anmerkung</th>
          <th>show</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($recipes as $recipe)
        <tr>
          <td>{{ $recipe->name }}</td>
          <td>{{ $recipe->description }}</td>
          <td>{{ $recipe->annotation }}</td>
          <td><a href="{{ route('admin.recipe.show', $recipe->id) }}" class="btn btn-show btn-sm">show</a></td>
          <td><a href="{{ route('admin.recipe.edit', $recipe->id) }}" class="btn btn-edit btn-sm">edit</a></td>
          <td>
            <form action="{{ route('admin.recipe.delete', $recipe->id) }}" method="post">
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