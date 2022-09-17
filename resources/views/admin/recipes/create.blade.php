@extends('layouts.main')

@section('content')
    <div class="container">
      <h5>Rezept erstellen</h5>
      <hr>
      <form action="{{ route('admin.recipe.store') }}" method="post">
      @csrf
        <div class="row py-2">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="name">
                      <input type="text" class="form-control" name="name" id="name">
                      <span class="label">Name</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="description">
                      <input class="form-control" name="description" id="description" type="text">
                      <span class="label">Beschreibung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="componentSelect">Zutaten</label>
                    <select class="form-control style widthHeight" name="componentSelect" id="componentSelect" size="5">
                      @foreach($components as $key => $component)
                        <option name="{{ $component->name }}" value="{{ $component->id }}">{{ $component->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="basicoilSelect">Basis-Öle</label>
                    <select class="form-control style widthHeight" name="basicoilSelect[]" id="basicoilSelect" multiple size="5">
                      @foreach($basicoils as $key => $basicoil)
                        <option name="{{ $basicoil->name }}" value="{{ $basicoil->id }}">{{ $basicoil->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="essentialoilSelect">Ätherische-Öle</label>
                    <select class="form-control style widthHeight" name="essentialoilSelect[]" id="essentialoilSelect" multiple size="5">
                      @foreach($essentialoils as $key => $essentialoil)
                        <option name="{{ $essentialoil->id }}" value="{{ $essentialoil->id }}">{{ $essentialoil->name_english }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="applicationSelect">Anwendungen</label>
                    <select class="form-control style widthHeight" name="applicationSelect[]" id="applicationSelect" multiple size="5">
                      @foreach($applications as $key => $application)
                        <option name="{{ $application->id }}" value="{{ $application->id }}">{{ $application->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="annotation">
                      <input type="text" class="form-control" name="annotation" id="annotation">
                      <span class="label">Anmerkung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <div class="row py-2">
                  <div class="col">
                    <div class="group">
                      <div id="components" class="group-label">
                        <h4>Zutaten</h4>
                        @foreach($components as $component)
                        <div id="{{ $component->name }}">
                          <h6>{{ $component->name }}</h6>
                          <label class="inp" for="amount">
                            <input type="text" class="form-control" name="amount">
                            <span class="label">Menge</span>
                            <span class="focus-bg"></span>
                          </label>
                          <label class="inp" for="unit">
                            <input type="text" class="form-control" name="unit">
                            <span class="label">Einheit</span>
                            <span class="focus-bg"></span>
                          </label>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="description">
                      <input class="form-control" name="description" id="description" type="text">
                      <span class="label">Beschreibung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="annotation">
                      <input type="text" class="form-control" name="annotation" id="annotation">
                      <span class="label">Anmerkung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <button type="submit" class="btn btn-dark">anlegen</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
@endsection

@section('js')
    <script>
      $(function(){
        $('#components').hide();
        $('#components div').hide();
        let components = document.querySelectorAll('#components div');
        let componentSelect = document.querySelector('#componentSelect');
        let componentsValue = '';
        let selectedValue = '';
        
        componentSelect.onclick = function(e){
          selectedValue = e.target.getAttribute('name');
          components.forEach(function(value, index){
          	console.log('value', value.getAttribute('id'));
            componentsValue = value.getAttribute('id');
              if(componentsValue == selectedValue){
                $('#'+componentsValue).show();
              }

            });
        };


/* 
        componentSelect.onchange = function(e){
          console.log(e.target)
          components.forEach(function(value, index){
            // console.log(e.target.value);
            if(value.id == e.target.id){

            }
          }); */
          
          
          
          
          
          
          
          
          
/*           $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
  
          $.ajax({
            type:'POST',
            url:"{{ route('componentrecipe.createorupdate') }}",
            datatype:"json",
            data:{componentId:e.target.value},
            success:function(data){
              console.log(data);                

            }
          }); */

          $('#components').show();
          
        
        
        
        
          //console.log('e.target', optionValue);
        });






    </script>
@endsection