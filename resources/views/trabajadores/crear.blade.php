@extends('layouts.app')

@section('main')
    @if (Auth::user()->roles == 'trabajador')
        <h1>@lang('app.noAcs')</h1>
    @else
        <script>document.title = "{{ config('app.name', 'Laravel') }} - Crear" </script>
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h1 class="my-5 mx-4 text-2xl">@lang('app.contTra')</h1>
                </div>
                <div class="flex items-center justify-end mr-4">
                    <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{ route('trabajador.listar') }}"> @lang('app.bck')</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>¡Error!</strong> @lang('app.corrige')<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="flex justify-center">
            <form class="bg-red-200 rounded-lg p-5" action="{{ route('trabajador.guardar') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-5">
                            <label for="usuario"><strong>@lang('app.tra')</strong></label>
                            <select name="usuario" id="usuario">
                                <option selected disabled readonly>@lang('app.traDisp')</option>
                                @foreach ($datos as $trabajador)
                                    <option value="{{$trabajador->idUsu}}">{{$trabajador}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('app.sve')</button>
                    </div>
                </div>
            </form>
        </div>
    @endif
@endsection