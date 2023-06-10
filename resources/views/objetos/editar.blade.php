@extends('layouts.app')

@section('main')
    <script>document.title = "{{ config('app.name', 'Laravel') }} - Editar" </script>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h1 class="my-5 mx-4 text-2xl">Formulario para editar Objeto:</h1>
            </div>
            <div class="flex items-center justify-end mr-4">
                <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" href="{{ route('objeto.listar') }}"> Volver</a>
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
      <form class="bg-red-200 rounded-lg p-5" action="{{ route("objeto.actualizar", $objetoEditar->idObj) }}" method="post">
          @csrf

          <div class="row">
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="NomObj"><strong>Nombre:</strong></label>
                      <input type="text" name="NomObj" class="form-control" placeholder="Nombre" value="{{$objetoEditar->NomObj}}">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="DesObj"><strong>Descripción:</strong></label>
                      <input type="text" class="form-control" name="DesObj" placeholder="Descripción" value="{{$objetoEditar->DesObj}}">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="Cantidad"><strong>Cantidad:</strong></label>
                      <input type="text" name="Cantidad" class="form-control" placeholder="Temporada de siembra" value="{{$objetoEditar->Cantidad}}">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="Precio"><strong>Precio:</strong></label>
                      <input type="text" name="EstCos" class="form-control" placeholder="Precio" value="{{$objetoEditar->Precio}}">
                  </div>
              </div>
              <div class="col-md-6">
                  <div class="form-group mb-5">
                      <label for="FechComp"><strong>Fecha de Compra:</strong></label>
                      <input type="text" name="FechComp" class="form-control" placeholder="Fecha de Compra:" value="{{$objetoEditar->FechComp}}">
                  </div>
              </div>
              <div class="col-md-12 text-center">
				        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Guardar</button>
              </div>
          </div>
      </form>
    </div>
@endsection