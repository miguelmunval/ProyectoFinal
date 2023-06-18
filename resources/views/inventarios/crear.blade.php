@extends('layouts.app')

@section('main')
    <script>document.title = "{{ config('app.name', 'Laravel') }} - Crear" </script>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="my-5 mx-4 text-2xl">@lang('app.frmInv')</h1>
            </div>
            <div class="flex items-center justify-end mr-4">
                <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{ route('inventario.listar') }}"> @lang('app.bck')</a>
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
      <form class="bg-red-200 rounded-lg p-5" action="{{ route('inventario.guardar') }}" method="POST">
          @csrf
          <div class="row">
              <div class="col-md-6">
                  <div class="form-group mb-5">
                    <label for="idObj">@lang('app.selObj')</label>
                    <select name="idObj" id="idObj">
                      <option selected disabled readonly>@lang('app.selObj')</option>
                      @foreach ($datos as $objeto)
                        <option value="{{$objeto->idObj}}">{{$objeto->NomObj}}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-5">
                  <label for="cant">@lang('app.cant')</label>
                  <input type="number" name="cant" id="cant">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group mb-5">
                  <label for="fecha">@lang('app.fech')</label>
                  <input type="date" name="fecha" id="fecha">
                </div>
              </div>
              <div class="col-md-12 text-center">
				        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('app.sve')</button>
              </div>
          </div>
      </form>
    </div>
@endsection