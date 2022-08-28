@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($essentialoils))
  <div>
    <h1>Ätherische Öle</h1>
    <a href="{{ route('admin.essentialoil.create') }}" class="btn btn-secondary">Neu</a>
    <table class="table table-hover table-dark">
      <thead>
        <tr>
          <th>#</th>
          <th>Name Deutsch</th>
          <th>Name Latein</th>
          <th>Name Englisch</th>
          <th>Beschreibung</th>
          <th>Pur</th>
          <th>Verdünnt</th>
          <th>Empflindlich</th>
          <th>Einnahme</th>
          <th>Merchant ID</th>
          <th>Verfahren ID</th>
          <th>Pflanzenteil ID</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($essentialoils as $essentialoil)
        <tr>
          <td>{{ $essentialoil->id }}</td>
          <td>{{ $essentialoil->name_german }}</td>
          <td>{{ $essentialoil->name_latin }}</td>
          <td>{{ $essentialoil->name_english }}</td>
          <td>{{ $essentialoil->description }}</td>
          <td>{{ $essentialoil->pur }}</td>
          <td>{{ $essentialoil->dilute }}</td>
          <td>{{ $essentialoil->sensitive }}</td>
          <td>{{ $essentialoil->internal }}</td>
          <td>{{ $essentialoil->merchant_id }}</td>
          <td>{{ $essentialoil->method_id }}</td>
          <td>{{ $essentialoil->plantpart_id }}</td>
          <td><a href="{{ route('admin.essentialoil.edit', $essentialoil->id) }}" class="btn btn-warning">edit</a></td>
          <td>
            <form action="{{ route('admin.essentialoil.delete', $essentialoil->id) }}" method="post">
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