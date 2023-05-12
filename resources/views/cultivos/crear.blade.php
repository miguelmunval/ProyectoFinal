@extends('layouts.app')

@section('main')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="my-5 mx-4 text-2xl">Formulario para añadir Cultivo:</h1>
            </div>
            <div class="flex items-center justify-end mr-4">
                <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{ route('cultivo.listar') }}"> Volver</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Error!</strong> Por favor corrige los errores en el formulario.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="flex justify-center">
      <form class="bg-red-200 rounded-lg p-5" action="{{ route('cultivo.guardar') }}" method="POST">
          @csrf

          <div class="row">
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="NomCult"><strong>Nombre:</strong></label>
                      <input type="text" name="NomCult" class="form-control" placeholder="Nombre">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="DesCult"><strong>Descripción:</strong></label>
                      <input type="text" class="form-control" name="DesCult" placeholder="Descripción">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="EstSiem"><strong>Temporada de siembra:</strong></label>
                      <input type="text" name="EstSiem" class="form-control" placeholder="Temporada de siembra">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="EstCos"><strong>Temporada de cosecha:</strong></label>
                      <input type="text" name="EstCos" class="form-control" placeholder="Temporada de cosecha">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="ZonaCult"><strong>Zona de cultivo:</strong></label>
                      <input type="text" name="ZonaCult" class="form-control" placeholder="Zona de cultivo">
                  </div>
              </div>
              <div class="col-md-12 text-center">
				<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
              </div>
          </div>
      </form>
    </div>
@endsection