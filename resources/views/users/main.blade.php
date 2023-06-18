@extends("layouts.app")

@section("main")
    <h6 class="my-5 mx-4 text-2xl">@lang('app.Bienvenido') {{ Auth::user() }}</h6>
    <div class="flex items-center justify-end mr-4">
        <a href="{{ route('user.editar', Auth::id())}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('app.edit')</a>
    </div>
    <div class="flex items-center justify-end mr-4">
    {{-- Hay datos: mostramos listado de parcelas --}}
    <table class="text-center text-2xl m-auto mt-5 bg-red-200 rounded-lg">
        <tbody>
            @foreach($datos as $user)
            <tr>
                <th class="px-6 py-4">@lang("app.Nombre")</th>
            
                <td class="px-6 py-4">{{$user->nombre}}</td>
            </tr>
            <tr>
                <th class="px-6 py-4">@lang("app.Apellidos")</th>
            
                <td class="px-6 py-4">{{$user->apellido}}</td>
            </tr>
            <tr>
                <th class="px-6 py-4">@lang("app.email")</th>
            
                <td class="px-6 py-4">{{$user->email}}</td>
            </tr>
            <tr>    
                <th class="px-6 py-4">@lang("app.pass")</th>
            
                <td class="px-6 py-4">**********</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection