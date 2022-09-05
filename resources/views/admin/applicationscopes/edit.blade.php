@extends('layouts.main')

@section('content')
@if(isset($applicationscope))
    <div class="container">
      <form action="{{ route('admin.applicationscope.update', $applicationscope->id) }}" method="post">
        @csrf
        @method('put')

        <div class="card"">
          <div class="card-body">
            <h5 class="card-title">Anwendungsbereich</h5>
            <div class="row py-2">
              <div class="col">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{ $applicationscope->name }}">
              </div>
              <div class="col">
                <label for="name_latin">Name Latein</label>
                <input type="text" class="form-control" name="name_latin" id="name_latin" placeholder="Name Latein" value="{{ old('name_latin', $applicationscope->name_latin) }}">
              </div>
            </div>
            <h6>Sektion</h6>
            <div class="row py-2">
              <div class="col">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="radioApplicationSection" id="radioApplicationSectionPhysical" value="physical" @if(isset($applicationscope['section_short']) && strtoupper($applicationscope['section_short']) == 'P') checked @endif>
                  <label class="form-check-label" for="radioApplicationScopePhysical">
                    körperlich
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="radioApplicationSection" id="radioApplicationSectionMental" value="mental" @if(isset($applicationscope['section_short']) && strtoupper($applicationscope['section_short']) == 'M') checked @endif>
                  <label class="form-check-label" for="radioApplicationSectionMental">
                    psychisch
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="radioApplicationSection" id="radioApplicationSectionBoth" value="both" @if(isset($applicationscope['section_short']) && strtoupper($applicationscope['section_short']) == 'B') checked @endif>
                  <label class="form-check-label" for="radioApplicationSectionBoth">
                    beides
                  </label>
                </div>
              </div>
            </div>
            <div class="row py-2">
              <div class="col">
                <button type="submit" class="btn btn-dark">ändern</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
@endif
@endsection