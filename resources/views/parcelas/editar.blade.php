@extends("layouts.app")

@section("main")
   <script>document.title = "{{ config('app.name', 'Laravel') }} - Editar" </script>
   <div class="pull-left">
      <h1 class="my-5 mx-4 text-2xl">Formulario para editar Parcela:</h1>
   </div>
   <div class="flex items-center justify-end mr-4">
      <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{ route('parcela.listar') }}"> Volver</a>
   </div>
   <div class="flex justify-center">
      <form class="bg-red-200 rounded-lg p-5" action="{{ route("parcela.actualizar", $parcelaEditar->idPar) }}" method="post">

      @csrf

      <label for="locPar">Localización del Parcela</label>
      <br/>
      <input class="mb-5" type="text" name="locPar" value="{{$parcelaEditar->locPar}}" required />
      <br/>
      <label for="tamPar">Tamaño del Parcela</label>
      <br/>
      <input class="mb-5" type="number" name="tamPar" value="{{$parcelaEditar->tamPar}}" required />
      <br/>
      <label for="semPar">Semilla del Parcela</label>
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
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>

      </form>
   </div>
   
   @if ($errors->any())
    {{ $errors->first("numero") }}
   @endif

@endsection