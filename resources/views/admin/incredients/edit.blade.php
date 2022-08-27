@extends('layouts.main')

@section('content')
@if(isset($merchant))
    <div>
      <form action="{{ route('admin.merchant.update', $merchant->id) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
          <div class="col">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $merchant->name }}">
          </div>
          <div class="col">
            <label for="website">Website</label>
            <input type="text" class="form-control" name="website" id="website" placeholder="http://" value="{{ $merchant->website }}">
          </div>
          <div class="col">
            <button type="submit" class="btn btn-dark">anlegen</button>
          </div>
        </div>
      </form>
    </div>
@endif
@endsection