@extends("layouts.app")

@section("main")
   <script>document.title = "{{ config('app.name', 'Laravel') }} - Crear" </script>
   <h1 class="my-5 mx-4 text-2xl">Formulario para añadir parcela:</h1>
   <div class="flex items-center justify-end mr-4">
      <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{ route('parcela.listar') }}"> Volver</a>
  </div>
   <div class="flex justify-center">
      <form class="bg-red-200 rounded-lg p-5" action="{{ route("parcela.guardar") }}" method="post">

      @csrf
      <label for="locPar">Localización de la Parcela</label>
      <br/>
      <input class="mb-5" type="text" name="locPar" required />
      <br/>
      <label for="tamPar">Tamaño de la Parcela(ha)</label>
      <br/>
      <input class="mb-5" type="number" name="tamPar" required />
      <br/>
      <label for="idCult">Semilla de la Parcela</label>
      <br/>
      <select class="mb-5" name="idCult" id="idCult">
         <option selected disabled readonly>Escoge un cultivo</option>
      
         <script>
            $("#select").ready(function(){
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

      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>

      </form>
   </div>

   @if ($errors->any())
    {{ $errors->first("numero") }}
   @endif

@endsection