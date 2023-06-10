@extends("layouts.app")

@section("main")

    
    @empty($parcela)
        {{-- No hay datos: mostramos mensaje --}}
        Lo siento, pero no hay historial de cultivo en la base de datos.
    @else
        <h6 class="my-5 mx-4 text-2xl">@lang('app.Bienvenido') {{ Auth::user() }}</h6>
        <div class="flex items-center justify-end mr-4">
        <a href="{{ route("parcela.crear")}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang("app.nuevo")</a>
        </div>
        {{-- Hay datos: mostramos el historial de cultivo --}}
        <table class="text-center text-2xl m-auto mt-5 bg-red-200 rounded-lg">
            <thead>
                <tr>
                    <th class="px-6 py-4">@lang("app.Localizacion")</th>
                    <th class="px-6 py-4">@lang("app.Superficie")</th>
                    <th class="px-6 py-4">@lang("app.Semilla")</th>
                    <th class="px-6 py-4">@lang("app.hist")</th>
                </tr>
            </thead>

            <tbody>
              {{$parcela}}
            {{-- @foreach($datos as $parcela) --}}
                
                <tr>
                    <td class="px-6 py-4">{{ $parcela->locPar }}</td>
                    <td class="px-6 py-4">{{ $parcela->tamPar }}ha</td>
                    {{-- <td class="px-6 py-4" id="{{$cont}}"></td> --}}
                    {{-- <script>
                        $("#{{$cont}}").ready(function(){
                            $.ajax({
                            url: "/petiById/"+ {{$parcela->idCult}},
                            type: 'GET',
                            success: function (result) {
                                console.log(result.NomCult);
                                $("#{{$cont}}").html(result.NomCult);
                            }})
                        });
                    </script> --}}
                    
                    <td class="px-6 py-4">
                        <a href="{{ route("peticion.Hist_Cult", $parcela->idPar) }}">
                            <svg class="w-6 h-6 inline align-top" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg">
                                <path d="m288 144a110.94 110.94 0 0 0 -31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1 -56 56 55.4 55.4 0 0 1 -27-7.24 111.71 111.71 0 1 0 107-80.76zm284.52 97.4c-54.23-105.81-161.59-177.4-284.52-177.4s-230.32 71.64-284.52 177.41a32.35 32.35 0 0 0 0 29.19c54.23 105.81 161.59 177.4 284.52 177.4s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zm-284.52 158.6c-98.65 0-189.09-55-237.93-144 48.84-89 139.27-144 237.93-144s189.09 55 237.93 144c-48.83 89-139.27 144-237.93 144z"/>
                            </svg>
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <a href="{{ route("parcela.editar", $parcela->idPar) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline align-top">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>                                    
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        <a href=" {{ route("parcela.borrar", $parcela->idPar) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline align-top">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </a>
                    </td>
                </tr>
            {{-- @endforeach --}}
            </tbody>
        </table>

    @endempty
   


@endsection