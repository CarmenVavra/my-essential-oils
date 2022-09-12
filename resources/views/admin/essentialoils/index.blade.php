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
    <hr>
    @if(!empty(Auth::user()) && Auth::user()->role === 1)

    <a href="{{ route('admin.essentialoil.create') }}">
      <button class="icon-btn add-btn">
        <div class="add-icon"></div>
        <div class="btn-txt">Add Essential-Oil</div>
      </button>
    </a>
    @endif
    <table id="essentialOils" class="table table-hover table-oils table-striped">
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
            <th class="align-center">hinzufügen</th>
            <th class="align-center">merken</th>
          @endif
          @if(!empty(Auth::user()) && Auth::user()->role === 1)
            <th class="align-center">edit</th>
            <th class="align-center">delete</th>
          @endif
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
          <td class="align-center"><a href="{{ route('admin.essentialoil.show', $essentialOil->id) }}" class="btn btn-show btn-sm">show</a></td>
          @if(!empty(Auth::user()) && Auth::user()->role === 2)
          <td id="essentialoilCounter" class="align-center">
            <span class="minus">- </span><span class="count">0</span><span class="plus"> +</span>
          </td>
          <td class="align-center"><button type="button" class="btn btn-success btn-sm btn-add">hinzufügen</a></td>
          <td class="align-center"><a href="" class="btn @if($essentialOil->eun_notice) btn-warning @else btn-primary @endif btn-sm btn-notice">merken</a></td>
          @endif
          @if(!empty(Auth::user()) && Auth::user()->role === 1)
          <td class="align-center"><a href="{{ route('admin.essentialoil.edit', $essentialOil->id) }}" class="btn btn-edit btn-sm">edit</a></td>
          <td class="align-center">
            <form action="{{ route('admin.essentialoil.delete', $essentialOil->id) }}" method="post">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-delete btn-sm"><strong>X</strong></button>
            </form>
          </td>
          @endif
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

      $(function(){
        let btnsPlus = document.querySelectorAll('.plus');
        let btnsMinus = document.querySelectorAll('.minus');

        let maxCount = 10;
        let minCount = 1;

        btnsPlus.forEach(function(value, index){
          
          value.onclick = function(e){
            let btnPlus = e.target;
            if(btnPlus.previousElementSibling.previousElementSibling.classList.contains('hide')){
              btnPlus.previousElementSibling.previousElementSibling.classList.remove('hide')
            }
            let count = btnPlus.previousElementSibling.innerText;
            count++;
            btnPlus.previousElementSibling.innerText = count;
            if(btnPlus.previousElementSibling.innerText == maxCount){
              btnPlus.classList.add('hide');
            }
          };
        });

        btnsMinus.forEach(function(value, index){

          value.classList.add('hide');
          value.onclick = function(e){
            let btnMinus = e.target;
            if(btnMinus.nextElementSibling.nextElementSibling.classList.contains('hide')){
              btnMinus.nextElementSibling.nextElementSibling.classList.remove('hide')
            }
            let count = btnMinus.nextElementSibling.innerText;
            count--;
            btnMinus.nextElementSibling.innerText = count;
            if(btnMinus.nextElementSibling.innerText < minCount){
              btnMinus.classList.add('hide');
            }
          };
        });

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        let saveCount = 0;
        let btnsAdd = document.querySelectorAll('.btn-add');
        btnsAdd.forEach(function(value, index){
          value.onclick = function(e){
            let btnAdd = e.target;
            saveCount = btnAdd.parentElement.previousElementSibling.firstElementChild.nextElementSibling.innerText;
            let tr = btnAdd.closest('tr');
            let essentialoilName = tr.firstElementChild.innerText;
            let essentialoilMerchant = tr.childNodes[15].innerText;

            $.ajax({
              type:'POST',
              url:"{{ route('user.essentialoil.store') }}",
              datatype:"json",
              data:{saveCount:saveCount, essentialoil_name:essentialoilName, essentialoil_merchant:essentialoilMerchant},
              success:function(data){
                console.log(data);                

              }
            });

          }
        });

      });
  

      /* das ist der Code von Favorit .. auf merken umschreiben */
        let $btnsNotice = document.querySelectorAll('.btn-notice');
        $btnsNotice.forEach(function(value, index){
          value.onclick = function(e){
            e.preventDefault();
            let btnNotice = e.target;
            let tr = btnNotice.closest('tr');
            let essentialoilName = tr.firstElementChild.innerText;
            let essentialoilMerchant = tr.childNodes[15].innerText;

            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
  
            $.ajax({
              type:'PUT',
              url:"{{ route('user.essentialoil.notice.update') }}",
              datatype:"json",
              data:{notice:'notice',essentialoil_name:essentialoilName , essentialoil_merchant:essentialoilMerchant},
              success:function(data){
                console.log('data: ', data);
                if(data){
                  if(e.target.classList.contains('btn-primary')){
                    e.target.classList.remove('btn-primary');
                    e.target.classList.add('btn-warning');
                  }else if(e.target.classList.contains('btn-warning')){
                    e.target.classList.remove('btn-warning');
                    e.target.classList.add('btn-primary');
                  }
  
                }
  
              }
            });
          };
        });
        
        
    
        </script>
@endsection