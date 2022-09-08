@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
{{-- @if(isset($essentialOils)) --}}

  <div class="container">
    <h1>Ätherische Öle!!!!!!!!!!!!!!!!!!!!!!</h1>
{{--     <table id="essentialOils" class="table table-hover table-secondary table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Name Latein</th>
          <th>Name Deutsch</th>
          <th class="align-center">Pur</th>
          <th class="align-center">Verdünnt</th>
          <th class="align-center">Empfindlich</th>
          <th class="align-center">Einnahme</th>
          <th>Merchant</th>
          <th>Verfahren</th>
          <th class="align-center">show</th>
          @if(!empty(Auth::user()) && Auth::user()->id === 1)
            <th class="align-center">edit</th>
            <th class="align-center">delete</th>
          @endif
        </tr>
      </thead>
      <tbody>
        @foreach($essentialOils as $essentialOil)
        <tr>
          <td>{{ $essentialOil->name_english }}</td>
          <td>{{ $essentialOil->name_latin }}</td>
          <td>{{ $essentialOil->name_german }}</td>
          <td class="align-center">
            @if($essentialOil->pur == 1)
              <div class="badge bg-warning">P</div>
            @endif
          </td>
          <td class="align-center">
            @if($essentialOil->dilute == 1)
              <div class="badge bg-primary">V</div>
            @endif
          </td>
          <td class="align-center">
            @if($essentialOil->sensitive == 1)
              <div class="badge bg-danger">E</div>
            @endif
          </td>
          <td class="align-center">
            @if($essentialOil->internal == 1)
              <div class="badge bg-success">I</div>
            @endif
          </td>
          <td>{{ $essentialOil->merchant_name }}</td>
          <td>{{ $essentialOil->method_short_name }}</td>
          <td class="align-center"><a href="{{ route('admin.essentialoil.show', $essentialOil->id) }}" class="btn btn-info">show</a></td>
          @if(!empty(Auth::user()) && Auth::user()->id === 1)
          <td class="align-center"><a href="{{ route('admin.essentialoil.edit', $essentialOil->id) }}" class="btn btn-warning">edit</a></td>
          <td class="align-center">
            <form action="{{ route('admin.essentialoil.delete', $essentialOil->id) }}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger">löschen</button>
            </form>
          </td>
          @endif
        </tr>
        @endforeach
      </tbody>
    </table> --}}
  </div>
{{-- @endif --}}
@endsection

@section('js')
    
@endsection