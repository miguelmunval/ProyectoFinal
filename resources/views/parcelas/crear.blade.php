@extends("layouts.app")

@section("main")
   <h1 class="my-5 mx-4 text-2xl">Formulario para añadir parcela:</h1>
   <div class="flex items-center justify-end mr-4">
      <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{ route('parcela.listar') }}"> Volver</a>
  </div>
   <div class="flex justify-center">
      <form class="bg-red-200 rounded-lg p-5" action="{{ route("parcela.guardar") }}" method="post">

      @csrf
      <label for="locPar">Localización del Parcela</label>
      <br/>
      <input class="mb-5" type="text" name="locPar" required />
      <br/>
      <label for="tamPar">Tamaño del Parcela(ha)</label>
      <br/>
      <input class="mb-5" type="number" name="tamPar" required />
      <br/>
      <label for="idCult">Semilla del Parcela</label>
      <br/>
      <input class="mb-5" type="text" name="idCult" />
      <br/>

      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>

      </form>
   </div>

   @if ($errors->any())
    {{ $errors->first("numero") }}
   @endif

@endsection