@extends('layouts.main')

@section('content')
  @if(isset($recipe))
    <div class="container">
      <h5>Rezept ändern</h5>
      <hr>
      <div class="row py-4">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">

              <form id="recipeForm" action="" method="post">
                @csrf
                <input id="recipeId" type="hidden" value="{{ $recipe->id }}">
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="name">
                      <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $recipe->name) }}">
                      <span class="label">Name</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label for="description">Beschreibung</label>
                    <textarea class="form-control" name="description" id="description" rows="5">{{ old('description', $recipe->description) }}</textarea>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <label class="inp" for="annotation">
                      <input type="text" class="form-control" name="annotation" id="annotation" value="{{ old('annotation', $recipe->annotation )}}">
                      <span class="label">Anmerkung</span>
                      <span class="focus-bg"></span>
                    </label>
                  </div>
                </div>
                <div class="row py-2">
                  <div class="col">
                    <a href="" id="btnRecipeForm" class="btn btn-dark">ändern</a>
                  </div>
                </div>
              </form>

              <form id="componentsForm" action="" method="post">
                @csrf
                <div class="row py-2">
                  <div class="col">
                    <label for="componentSelect">Zutaten</label>
                    <select class="form-control style widthHeight" name="componentSelect" id="componentSelect" size="5">
                      @foreach($componentsList as $key => $component)
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
                      @foreach($basicoilsList as $key => $basicoil)
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
                      @foreach($essentialoilsList as $key => $essentialoil)
                        <option name="{{ $essentialoil->name_english }}" value="{{ $essentialoil->id }}">{{ $essentialoil->name_english }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          {{-- Zutaten Menge Unit --}}
          <div id="componentsCard" class="card">
            <div class="card-body">
              <div class="row py-2">
                <div class="col">
                  <div class="group">
                    <div id="components" class="group-label">
                      <h4>Zutaten</h4>
                      
                      @foreach($components as $component)
                      <div id="{{ str_replace(' ', '_', $component->name) }}">
                        <h6>{{ $component->name }}</h6>
                        <label class="inp" for="amount">
                          <input type="text" class="form-control" name="amount" value="{{ old('amount', $component->amount) }}">
                          <span class="label">Menge</span>
                          <span class="focus-bg"></span>
                        </label>
                        <label class="inp" for="unit">
                          <input type="text" class="form-control" name="unit" value="{{ old('unit', $component->unit) }}">
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
                  <a href="" id="btnComponents" class="btn btn-dark">ändern</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          {{-- Basicoil Menge Unit --}}
          <div id="basicoilsCard" class="card">
            <div class="card-body">
              <div class="row py-2">
                <div class="col">
                  <div class="group">
                    <div id="basicoils" class="group-label">
                      <h4>Basis-Öle</h4>
                      @foreach($basicoils as $basicoil)
                      <div id="{{ str_replace(' ', '_', $basicoil->name) }}">
                        <h6>{{ $basicoil->name }}</h6>
                        <label class="inp" for="amount">
                          <input type="text" class="form-control" name="amount" value="{{ old('amount', $basicoil->amount) }}">
                          <span class="label">Menge</span>
                          <span class="focus-bg"></span>
                        </label>
                        <label class="inp" for="unit">
                          <input type="text" class="form-control" name="unit" value="{{ old('unit', $basicoil->unit) }}">
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
                  <a href="" id="btnBasicoils" class="btn btn-dark">ändern</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          {{-- Essentialoil Menge Unit --}}
          <div id="essentialoilsCard" class="card">
            <div class="card-body">
              <div class="row py-2">
                <div class="col">
                  <div class="group">
                    <div id="essentialoils" class="group-label">
                      <h4>Ätherische-Öle</h4>
                      @foreach($essentialoils as $essentialoil)
                      <div id="{{ str_replace(' ', '_', $essentialoil->name_english) }}">
                        <h6>{{ $essentialoil->name_english }}</h6>
                        <label class="inp" for="amount">
                          <input type="text" class="form-control" name="amount" value="{{ old('amount', $essentialoil->amount) }}">
                          <span class="label">Menge</span>
                          <span class="focus-bg"></span>
                        </label>
                        <label class="inp" for="unit">
                          <input type="text" class="form-control" name="unit" value="{{ old('unit', $essentialoil->unit) }}">
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
                  <a href="" id="btnEssentialoils" class="btn btn-dark">ändern</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
@endsection

@section('js')
    <script>
      "use strict"
      $(function(){

        let recipeId = document.querySelector('#recipeId').value;
        console.log('recipeId', recipeId);

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

/*         $('#componentsForm').hide();
        $('#basicoilsForm').hide();
        $('#essentialoilsForm').hide();
        $('#applicationsForm').hide(); 
        $('#componentsCard').hide();
        $('#components div').hide();
*/
        let recipeForm = document.querySelector('#recipeForm');
        let btnRecipeForm = document.querySelector('#btnRecipeForm');
        let recipeFormName = document.querySelector('#name');
        let recipeFormDescription = document.querySelector('#description');
        let recipeFormAnnotation = document.querySelector('#annotation');
        
        btnRecipeForm.onclick = function(e){
          e.preventDefault();
          $.ajax({
            type:'PUT',
            url:"{{ route('admin.recipe.update') }}",
            datatype:"json",
            data:{recipeId:recipeId, recipeName:recipeFormName.value, recipeDescription:recipeFormDescription.value, recipeAnnotation:recipeFormAnnotation.value},
            success:function(data){

/*               $('#componentsForm').show();
              $('#basicoilsForm').show();
              $('#essentialoilsForm').show();
              $('#applicationsForm').show();  */
              //recipeId = data['recipe']['id'];
            }
          }); 
        };

        let components = document.querySelectorAll('#components div');
        let componentSelect = document.querySelector('#componentSelect');
        let componentsValue = '';
        let componentSelectboxValue = '';
        
        componentSelect.onclick = function(e){
          componentSelectboxValue = e.target.getAttribute('name');
          console.log('componentSelectboxValue', componentSelectboxValue);
            $.ajax({
              type:'POST',
              url:"{{ route('admin.component.recipe.update') }}",
              datatype:"json",
              data:{recipeId:recipeId, name:componentSelectboxValue},
              success:function(data){
                //console.log(data['componentName']);                
                componentsValue = data['componentName'].replaceAll('_', ' ');
                console.log('componentsValue', componentsValue, 'componentSelectboxValue', componentSelectboxValue);
                if(componentsValue == componentSelectboxValue){
                  $('#componentsCard').show();
                  $('#components').append('Hallo');
                  //$('#'+componentSelectboxValue.replaceAll(' ', '_')).show();
                }

                // <div id="{{ str_replace(' ', '_', $component->name) }}">
                //         <h6>{{ $component->name }}</h6>
                //         <label class="inp" for="amount">
                //           <input type="text" class="form-control" name="amount" value="{{ old('amount', $component->amount) }}">
                //           <span class="label">Menge</span>
                //           <span class="focus-bg"></span>
                //         </label>
                //         <label class="inp" for="unit">
                //           <input type="text" class="form-control" name="unit" value="{{ old('unit', $component->unit) }}">
                //           <span class="label">Einheit</span>
                //           <span class="focus-bg"></span>
                //         </label>
                //       </div>







              }
            });
        };

/*         $('#basicoilsCard').hide();
        $('#basicoils div').hide(); */
        let basicoils = document.querySelectorAll('#basicoils div');
        let basicoilSelect = document.querySelector('#basicoilSelect');
        let basicoilsValue = '';
        let basicoilSelectboxValue = '';
        
        basicoilSelect.onclick = function(e){
          basicoilSelectboxValue = e.target.getAttribute('name');
            $.ajax({
              type:'POST',
              url:"{{ route('admin.basicoil.recipe.update') }}",
              datatype:"json",
              data:{recipeId:recipeId, name:basicoilSelectboxValue},
              success:function(data){
                console.log(data);                
                basicoilsValue = data['basicoilName'].replaceAll('_', ' ');
                if(basicoilsValue == basicoilSelectboxValue){
                    $('#basicoilsCard').show();
                    $('#'+basicoilSelectboxValue.replaceAll(' ', '_')).show();
                  }

              }
            });
        };

          
/*         $('#essentialoilsCard').hide();
        $('#essentialoils div').hide(); */
        let essentialoils = document.querySelectorAll('#essentialoils div');
        let essentialoilSelect = document.querySelector('#essentialoilSelect');
        let essentialoilsValue = '';
        let essentialoilSelectboxValue = '';
        
        essentialoilSelect.onclick = function(e){
          essentialoilSelectboxValue = e.target.getAttribute('name');
          //essentialoils.forEach(function(value, index){
            $.ajax({
              type:'POST',
              url:"{{ route('admin.essentialoil.recipe.update') }}",
              datatype:"json",
              data:{recipeId:recipeId, name:essentialoilSelectboxValue},
              success:function(data){
                console.log(data);                
                essentialoilsValue = data['essentialoilName'].replaceAll('_', ' ');
                if(essentialoilsValue == essentialoilSelectboxValue){
                  $('#essentialoilsCard').show();
                  $('#'+essentialoilsValue.replaceAll(' ', '_')).show();
                }

              }
            });


          //});
        };
          
        let btnAddComponents = document.querySelector('#btnComponents');
        let requestArray = [];
        let tmpArray = [];
        btnAddComponents.onclick = function(e){
          e.preventDefault();
          components.forEach(function(value, index){
            let comp = document.querySelectorAll('#'+value.id+' input');
            comp.forEach(function(value, index){
              if(value.value != ''){
                if(!tmpArray.includes(value.parentElement.parentElement.id)){
                  tmpArray.push(value.parentElement.parentElement.id);
                }
                tmpArray.push(value.value);
              }
            });

            $.ajax({
              type:'PUT',
              url:"{{ route('admin.component.recipe.update') }}",
              datatype:"json",
              data:{recipeId:recipeId, dataArray:tmpArray},
              success:function(data){
                console.log(data);                
              }
            });
            tmpArray = [];
          });
        };


        let btnAddBasicoils = document.querySelector('#btnBasicoils');
        let boRequestArray = [];
        let boTmpArray = [];
        btnAddBasicoils.onclick = function(e){
          e.preventDefault();
          basicoils.forEach(function(value, index){
            let bo = document.querySelectorAll('#'+value.id+' input');
            bo.forEach(function(value, index){
              if(value.value != ''){
                if(!boTmpArray.includes(value.parentElement.parentElement.id)){
                  boTmpArray.push(value.parentElement.parentElement.id);
                }
                boTmpArray.push(value.value);
              }
            });

            $.ajax({
              type:'PUT',
              url:"{{ route('admin.basicoil.recipe.update') }}",
              datatype:"json",
              data:{recipeId:recipeId, dataArray:boTmpArray},
              success:function(data){
                console.log(data);                
              }
            });
            boTmpArray = [];
          });
        };

        let btnAddEssentialoils = document.querySelector('#btnEssentialoils');
        let eoRequestArray = [];
        let eoTmpArray = [];
        btnAddEssentialoils.onclick = function(e){
          e.preventDefault();
          essentialoils.forEach(function(value, index){
            let eo = document.querySelectorAll('#'+value.id+' input');
            eo.forEach(function(value, index){
              if(value.value != ''){
                if(!eoTmpArray.includes(value.parentElement.parentElement.id)){
                  eoTmpArray.push(value.parentElement.parentElement.id);
                }
                eoTmpArray.push(value.value);
              }
            });

            $.ajax({
              type:'PUT',
              url:"{{ route('admin.essentialoil.recipe.update') }}",
              datatype:"json",
              data:{recipeId:recipeId, dataArray:eoTmpArray},
              success:function(data){
                console.log(data);     
              }
            });
            eoTmpArray = [];
          });
        };




      });


      

</script>
@endsection