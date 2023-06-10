@extends('layouts.app')

@section('main')
    @empty($datos)
        {{-- No hay datos: mostramos mensaje --}}
        Lo siento, pero no hay parcelas en la base de datos.
    @else
        <script>document.title = "{{ config('app.name', 'Laravel') }} - Objetos"</script>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h6 class="my-5 mx-4 text-2xl">Lista de Objetos</h6>
                </div>
                <div class="flex items-center justify-end mr-4">
                    <a href="{{ route("objeto.crear")}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Añadir Objeto</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="text-center text-2xl m-auto mt-5 bg-red-200 rounded-lg">
            <tr>
                <th class="pt-6 px-8">Nombre</th>
                <th class="pt-6">Descripción</th>
            </tr>
            @foreach ($datos as $objeto)
            <tr>
                <td>{{ $objeto->NomObj }}</td>
                <td>{{ $objeto->DesObj }}</td>
                    <form action="{{ route('objeto.borrar',$objeto->idObj) }}" method="POST">
                        <td class="px-6 py-4">
                        <a class="btn btn-primary" href="{{ route('objeto.editar',$objeto->idObj) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </a>
                        </td>
                        <td class="px-6 py-4">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{ route('objeto.borrar',$objeto->idObj) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </a>
                        </td>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" class="text-center">{{$datos->links()}}</td>
            </tr>
        </table>
    @endempty
@endsection