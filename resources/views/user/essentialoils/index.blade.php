@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($essentialOils))

  <div class="container">
    <h1>Ätherische Öle</h1>
    <table id="essentialOils" class="table table-hover table-secondary table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Name Latein</th>
          <th>Name Deutsch</th>
          <th class="align-center">Pur</th>
          <th class="align-center">Verdünnt</th>
          <th class="align-center">Empfindlich</th>
          <th class="align-center">Intern</th>
          <th>Merchant</th>
          <th>Verfahren</th>
          <th class="align-center"></th>

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
          <td class="align-center"><a href="{{ route('user.essentialoil.show', $essentialOil->id) }}" class="btn btn-info">show</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endif
@endsection

@section('js')
    
@endsection