@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($merchants))
  <div class="container">
    <h1>Merchants</h1>
    <hr>
    <a href="{{ route('admin.merchant.create') }}">
      <button class="icon-btn add-btn">
        <div class="add-icon"></div>
        <div class="btn-txt">Add Merchant</div>
      </button>
    </a>
    {{-- <a href="{{ route('admin.merchant.create') }}" class="btn btn-secondary">Neu</a> --}}
    <table class="table table-hover table-oils table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Website</th>
          <th>edit</th>
          <th>delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($merchants as $merchant)
        <tr>
          <td>{{ $merchant->name }}</td>
          <td><a href="{{ $merchant->website }}" target="_blank">{{ $merchant->website }}</a></td>
          <td><a href="{{ route('admin.merchant.edit', $merchant->id) }}" class="btn btn-edit btn-sm">edit</a></td>
          <td>
            <form action="{{ route('admin.merchant.delete', $merchant->id) }}" method="post">
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