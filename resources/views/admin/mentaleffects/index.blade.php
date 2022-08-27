@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($merchants))
  <div>
    <h1>Merchants</h1>
    <a href="{{ route('admin.merchant.create') }}" class="btn btn-secondary">Neu</a>
    <table class="table table-hover table-dark">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Website</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($merchants as $merchant)
        <tr>
          <td>{{ $merchant->id }}</td>
          <td>{{ $merchant->name }}</td>
          <td><a href="{{ $merchant->website }}" target="_blank">{{ $merchant->website }}</a></td>
          <td><a href="{{ route('admin.merchant.edit', $merchant->id) }}" class="btn btn-warning">edit</a></td>
          <td>
            <form action="{{ route('admin.merchant.delete', $merchant->id) }}" method="post">
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