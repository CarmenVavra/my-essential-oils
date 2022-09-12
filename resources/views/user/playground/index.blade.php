@extends('layouts.main')

@section('css')
    
@endsection

@section('content')
@if(!empty(session('success')))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if(isset($essentialOils))

  <div class="container">
    <h1>Ätherische Öle</h1>
    <table id="essentialOils" class="table table-hover table-secondary table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Name Latein</th>
          <th>Name Deutsch</th>
          <th class="align-center">Pur</th>
          <th class="align-center">Verdünnt</th>
          <th class="align-center">Empfindlich</th>
          <th class="align-center">Intern</th>
          <th>Merchant</th>
          <th>Verfahren</th>
          <th class="align-center">show</th>
          @if(!empty(Auth::user()) && Auth::user()->role === 2)
            <th class="align-center">Anzahl</th>
            <th class="align-center">Favorit</th>
          @endif
          <th class="align-center">delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($essentialOils as $essentialOil)
        <tr>
          <td>{{ $essentialOil->name_english }}</td>
          <td>{{ $essentialOil->name_latin }}</td>
          <td>{{ $essentialOil->name_german }}</td>
          <td class="align-center">
            @if($essentialOil->pur == 1)
              <div class="badge bg-warning">P</div>
            @endif
          </td>
          <td class="align-center">
            @if($essentialOil->dilute == 1)
              <div class="badge bg-primary">V</div>
            @endif
          </td>
          <td class="align-center">
            @if($essentialOil->sensitive == 1)
              <div class="badge bg-danger">E</div>
            @endif
          </td>
          <td class="align-center">
            @if($essentialOil->internal == 1)
              <div class="badge bg-success">I</div>
            @endif
          </td>
          <td>{{ $essentialOil->merchant_name }}</td>
          <td>{{ $essentialOil->method_short_name }}</td>
          <td class="align-center"><a href="{{ route('admin.essentialoil.show', $essentialOil->id) }}" class="btn btn-info btn-sm">show</a></td>
          @if(!empty(Auth::user()) && Auth::user()->role === 2)
          <td id="essentialoilCounter" class="align-center">{{ $essentialOil->count }}</td>
          <td class="align-center"><button type="button" class="btn @if($essentialOil->favourite) btn-warning @else btn-success @endif btn-sm btn-fav">Favorit</a></td>
          @endif
          <td class="align-center">
            <form action="{{ route('user.essentialoil.delete', $essentialOil->id) }}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger btn-sm">löschen</button>
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
    <script>
      "use strict";

      let $btnsFav = document.querySelectorAll('.btn-fav');
      $btnsFav.forEach(function(value, index){
        value.onclick = function(e){
          
          let btnFav = e.target;
          let tr = btnFav.closest('tr');
          let essentialoilName = tr.firstElementChild.innerText;
          let essentialoilMerchant = tr.childNodes[15].innerText;

          $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
            type:'PUT',
            url:"{{ route('user.essentialoil.update') }}",
            datatype:"json",
            data:{favourite:'favourite',essentialoil_name:essentialoilName , essentialoil_merchant:essentialoilMerchant},
            success:function(data){
              console.log('data: ', data);
              if(data){
                if(e.target.classList.contains('btn-success')){
                  e.target.classList.remove('btn-success');
                  e.target.classList.add('btn-warning');
                }else if(e.target.classList.contains('btn-warning')){
                  e.target.classList.remove('btn-warning');
                  e.target.classList.add('btn-success');
                }

              }

            }
          });
        };
      });
      
      

    </script>
@endsection