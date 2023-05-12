@extends("layouts.app")

@section("main")

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
      <input class="mb-5" type="text" name="semPar" value="{{$parcelaEditar->semPar}}" />
      <br/>
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>

      </form>
   </div>
   
   @if ($errors->any())
    {{ $errors->first("numero") }}
   @endif

@endsection