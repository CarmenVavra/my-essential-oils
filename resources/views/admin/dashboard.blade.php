@extends('layouts.main')

@section('content')

<div class="container">
  <div class="row py-4">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Ätherische Öle</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.essentialoils.index') }}" class="btn btn-primary btn-sm">enter</a>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <img src="{{ asset('/img/basicoil.jpg') }}" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Basisöle</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.basicoils.index') }}" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <img src="{{ asset('/img/merchant.jpg') }}" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Merchants</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.merchants.index') }}" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Verfahren</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.methods.index') }}" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row py-4">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Inhaltsstoffe</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.incredients.index') }}" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Pflanzenteile</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.plantparts.index') }}" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Duftrichtungen</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.scentdirections.index') }}" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Duftnoten</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.fragrancenotes.index') }}" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row py-4">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Anwendungsbereiche</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.applicationscopes.index') }}" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Körperliche Wirkungen</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.physicaleffects.index') }}" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Psychische Wirkungen</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.mentaleffects.index') }}" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <img src="{{ asset('/img/Gefahrenhinweis.jpg') }}" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Gefahrenhinweise</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.attentions.index') }}" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
  </div>
  <div class="row py-4">
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Anwendungen</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.applications.index') }}" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Rezepte</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.recipes.index') }}" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Zutaten</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="{{ route('admin.components.index') }}" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
    <div class="col-md">
      <div class="card">
        <img src="{{ asset('/img/Gefahrenhinweis.jpg') }}" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Empty Item</h5>
          {{-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> --}}
          <a href="#" class="btn btn-primary btn-sm">Enter</a>
        </div>
      </div>
    </div>
  </div>
</div>
    
@endsection