@extends("layouts.app")

@section("main")
   @if (Auth::user()->roles == 'trabajador')
      <h1>@lang('app.noAcs')</h1>
   @else
      <script>document.title = "{{ config('app.name', 'Laravel') }} - Editar" </script>
      <div class="pull-left">
         <h1 class="my-5 mx-4 text-2xl">@lang('app.frmediPar')</h1>
      </div>
      <div class="flex items-center justify-end mr-4">
         <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{ route('parcela.listar') }}"> @lang('app.bck')</a>
      </div>
      <div class="flex justify-center">
         <form class="bg-red-200 rounded-lg p-5" action="{{ route("parcela.actualizar", $parcelaEditar->idPar) }}" method="post">

         @csrf

         <label for="locPar">@lang('app.Localizacion')</label>
         <br/>
         <input class="mb-5" type="text" name="locPar" value="{{$parcelaEditar->locPar}}" required />
         <br/>
         <label for="tamPar">@lang('app.Superficie')</label>
         <br/>
         <input class="mb-5" type="number" name="tamPar" value="{{$parcelaEditar->tamPar}}" required />
         <br/>
         <label for="semPar">@lang('app.Semilla')</label>
         <br/>
         <select class="mb-5" name="idCult" id="idCult">
            <option id="selected" selected disabled readonly></option>
            <script>
               $("#idCult").ready(function(){
                  $.ajax({
                  url: "/petiById/"+ {{$parcelaEditar->idCult}},
                  type: 'GET',
                  success: function (result) {
                     $('#selected').html(result.NomCult)
                  }})
               });

               $("#idCult").ready(function(){
                  $.ajax({
                  url: "/peti_ajax",
                  type: 'GET',
                  success: function (result) {
                     $.each(result, function(cultivo) {
                     $("#idCult").append(new Option(result[cultivo].NomCult, result[cultivo].idCult));})
                  }})
               });
            </script>
         </select>
         <br/>
         <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('app.btn_actualizar')</button>

         </form>
      </div>
   @endif
   
   @if ($errors->any())
    {{ $errors->first("numero") }}
   @endif

@endsection