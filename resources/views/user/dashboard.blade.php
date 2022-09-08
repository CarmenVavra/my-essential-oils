@extends('layouts.main')
@section('css')
    
@endsection
@section('content')
  <div class="container">
    <ul>
      <li class="list-item"><a href="{{ route('user.playground.index') }}">(eigene) Ätherische Öle / list, create, (show), update, delete</a></li>
      <li class="list-item"><a href="{{-- {{ route('') }} --}}">öffentliche Rezepte / list, show</a></li>
      <li class="list-item"><a href="{{-- {{ route('') }} --}}">(eigene) Rezepte / list, create, show, update, delete</a></li>
      <li class="list-item"><a href="{{-- {{ route('') }} --}}">Favoriten-Öle via jquery setzen / list, show</a></li>
    </ul>
  </div>

@endsection

@section('js')
    
@endsection