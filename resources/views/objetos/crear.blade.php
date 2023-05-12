@extends('layouts.app')

@section('main')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="my-5 mx-4 text-2xl">Formulario para añadir Objeto:</h1>
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
      <form class="bg-red-200 rounded-lg p-5" action="{{ route('objeto.guardar') }}" method="POST">
          @csrf

          <div class="row">
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="NomObj"><strong>Nombre:</strong></label>
                      <input type="text" name="NomObj" class="form-control" placeholder="Nombre">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="DesObj"><strong>Descripción:</strong></label>
                      <input type="text" class="form-control" name="DesObj" placeholder="Descripción">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="Cantidad"><strong>Cantidad:</strong></label>
                      <input type="number" name="Cantidad" class="form-control" placeholder="Cantidad">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="Precio"><strong>Precio:</strong></label>
                      <input type="number" name="Precio" class="form-control" placeholder="Precio">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="FechComp"><strong>Fecha de Compra:</strong></label>
                      <input type="text" name="FechComp" class="form-control" placeholder="Fecha de compra">
                  </div>
              </div>
              <div class="col-md-12 text-center">
				<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
              </div>
          </div>
      </form>
    </div>
@endsection