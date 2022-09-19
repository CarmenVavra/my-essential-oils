@extends('layouts.main')

@section('content')
    <div class="container">
      <h5>Rezept erstellen</h5>
      <hr>
      <form id="recipeForm" method="post">
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
                    <label class="inp" for="annotation">
                      <input type="text" class="form-control" name="annotation" id="annotation">
                      <span class="label">Anmerkung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <a href="" id="btnRecipeForm" class="btn btn-dark">anlegen</a>
                  </div>
                </div>
              </form>
              <form id="componentsForm" action="" method="post">
              @csrf
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
              </form>
              <form id="basicoilsForm" action="" method="post">
                @csrf
                <div class="row py-2">
                  <div class="col">
                    <label for="basicoilSelect">Basis-Öle</label>
                    <select class="form-control style widthHeight" name="basicoilSelect" id="basicoilSelect" size="5">
                      @foreach($basicoils as $key => $basicoil)
                        <option name="{{ $basicoil->name }}" value="{{ $basicoil->id }}">{{ $basicoil->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </form>
              <form id="essentialoilsForm" action="" method="post">
                @csrf
                <div class="row py-2">
                  <div class="col">
                    <label for="essentialoilSelect">Ätherische-Öle</label>
                    <select class="form-control style widthHeight" name="essentialoilSelect" id="essentialoilSelect" size="5">
                      @foreach($essentialoils as $key => $essentialoil)
                        <option name="{{ $essentialoil->name_english }}" value="{{ $essentialoil->id }}">{{ $essentialoil->name_english }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </form>
              <form id="applicationsForm" action="" method="post">
                <div class="row py-2">
                  <div class="col">
                    <label for="applicationSelect">Anwendungen</label>
                    <select class="form-control style widthHeight" name="applicationSelect[]" id="applicationSelect" multiple size="5">
                      @foreach($applications as $key => $application)
                        <option name="{{ $application->name }}" value="{{ $application->id }}">{{ $application->name }}</option>
                      @endforeach
                    </select>
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
                    <div class="group">
                      <div id="basicoils" class="group-label">
                        <h4>Basis-Öle</h4>
                        @foreach($basicoils as $basicoil)
                        <div id="{{ str_replace(' ', '_', $basicoil->name) }}">
                          <h6>{{ $basicoil->name }}</h6>
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
                    <div class="group">
                      <div id="essentialoils" class="group-label">
                        <h4>Ätherische-Öle</h4>
                        @foreach($essentialoils as $essentialoil)
                        <div id="{{ str_replace(' ', '_', $essentialoil->name_english) }}">
                          <h6>{{ $essentialoil->name_english }}</h6>
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
      "use strict"
      $(function(){

        let recipeId = 0;
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $('#componentsForm').hide();
        $('#basicoilsForm').hide();
        $('#essentialoilsForm').hide();
        $('#applicationsForm').hide();
        $('#components').hide();
        $('#components div').hide();

        let recipeForm = document.querySelector('#recipeForm');
        let btnRecipeForm = document.querySelector('#btnRecipeForm');
        let recipeFormName = document.querySelector('#name');
        let recipeFormDescription = document.querySelector('#description');
        let recipeFormAnnotation = document.querySelector('#annotation');

        btnRecipeForm.onclick = function(e){
          e.preventDefault();


  
          $.ajax({
            type:'POST',
            url:"{{ route('admin.recipe.store') }}",
            datatype:"json",
            data:{recipeName:recipeFormName.value, recipeDescription: recipeFormDescription.value, recipeAnnotation: recipeFormAnnotation.value},
            success:function(data){
              $('#componentsForm').show();
              $('#basicoilsForm').show();
              $('#essentialoilsForm').show();
              $('#applicationsForm').show();
              recipeId = data['recipe']['id'];
            }
          }); 
        };


        let components = document.querySelectorAll('#components div');
        let componentSelect = document.querySelector('#componentSelect');
        let componentsValue = '';
        let componentSelectboxValue = '';
        
        componentSelect.onclick = function(e){
          componentSelectboxValue = e.target.getAttribute('name');
          components.forEach(function(value, index){
          $.ajax({
            type:'POST',
            url:"{{ route('admin.component.recipe.store') }}",
            datatype:"json",
            data:{recipeId:recipeId, name:componentSelectboxValue},
            success:function(data){
              console.log(data);                

            }
          }); 
            componentsValue = value.getAttribute('id');
              if(componentsValue == componentSelectboxValue){
                $('#components').show();
                $('#'+componentsValue).show();
              }

            });
        };

        $('#basicoils').hide();
        $('#basicoils div').hide();
        let basicoils = document.querySelectorAll('#basicoils div');
        let basicoilSelect = document.querySelector('#basicoilSelect');
        let basicoilsValue = '';
        let basicoilSelectboxValue = '';
        
        basicoilSelect.onclick = function(e){
          basicoilSelectboxValue = e.target.getAttribute('name');
          basicoils.forEach(function(value, index){
            basicoilsValue = value.getAttribute('id').replaceAll('_', ' ');
            if(basicoilsValue == basicoilSelectboxValue){
                $('#basicoils').show();
                $('#'+basicoilsValue.replaceAll(' ', '_')).show();
                
              }

            });
        };

          
        $('#essentialoils').hide();
        $('#essentialoils div').hide();
        let essentialoils = document.querySelectorAll('#essentialoils div');
        let essentialoilSelect = document.querySelector('#essentialoilSelect');
        let essentialoilsValue = '';
        let essentialoilSelectboxValue = '';
        
        essentialoilSelect.onclick = function(e){
          essentialoilSelectboxValue = e.target.getAttribute('name');
          essentialoils.forEach(function(value, index){
            essentialoilsValue = value.getAttribute('id').replaceAll('_', ' ');
            if(essentialoilsValue == essentialoilSelectboxValue){
                $('#essentialoils').show();
                $('#'+essentialoilsValue.replaceAll(' ', '_')).show();
                
              }

            });
        };
          
          
          
          


      });






    </script>
@endsection