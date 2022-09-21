@extends('layouts.main')

@section('content')

  @if(isset($recipe))
    <div class="container">
      <h1>{{ $recipe->name }}</h1>
      <hr>
      <div class="row py-2">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">
              Zutaten
            </div>
            <div class="card-body">
              <ul>
                @if(isset($components))
                  @foreach($components as $component)
                    @foreach($component as $comp)
                      <li class="list-item">{{ $comp->amount}} {{ $comp->unit }} {{ $comp->name }}</li>
                    @endforeach
                  @endforeach
                @endif
                @if(isset($basicoils))
                  @foreach($basicoils as $basicoil)
                    @foreach($basicoil as $bo)
                      <li class="list-item">{{ $bo->amount}} {{ $bo->unit }} {{ $bo->name }}</li>
                    @endforeach
                  @endforeach
                @endif
                @if(isset($essentialoils))
                  @foreach($essentialoils as $essentialoil)
                    @foreach($essentialoil as $eo)
                      <li class="list-item">{{ $eo->amount}} {{ $eo->unit }} {{ $eo->name_english }}</li>
                    @endforeach
                  @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">Beschreibung</div>
            <div class="card-body"><pre>{{ $recipe->description }}</pre></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-header">Anmerkung</div>
            <div class="card-body">{{ $recipe->annotation }}</div>
          </div>
        </div>
      </div>

    </div>
  @endif
@endsection