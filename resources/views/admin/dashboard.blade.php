@extends('layouts.main')

@section('content')

<ul>
  <li class="list-item"><a href="{{ route('admin.merchants.index') }}">Merchants</a></li>
  <li class="list-item"><a href="{{ route('admin.essentialoils.index') }}">Essential Oils</a></li>
  <li class="list-item"><a href="{{ route('admin.basicoils.index') }}">Basic Oils</a></li>
  <li class="list-item"><a href="{{ route('admin.incredients.index') }}">Incredients</a></li>
  <li class="list-item"><a href="{{ route('admin.plantparts.index') }}">Plantparts</a></li>
  <li class="list-item"><a href="{{ route('admin.applicationscopes.index') }}">Application Scopes</a></li>
  <li class="list-item"><a href="{{ route('admin.usagetypes.index') }}">Usage Types</a></li>
  <li class="list-item"><a href="{{ route('admin.methods.index') }}">Methods</a></li>
  <li class="list-item"><a href="{{ route('admin.fragrancenotes.index') }}">Frangrance Notes</a></li>
  <li class="list-item"><a href="{{ route('admin.attentions.index') }}">Attentions</a></li>
  <li class="list-item"><a href="{{ route('admin.physicaleffects.index') }}">Physical Effects</a></li>
  <li class="list-item"><a href="{{ route('admin.mentaleffects.index') }}">Mental Effects</a></li>
</ul>
    
@endsection