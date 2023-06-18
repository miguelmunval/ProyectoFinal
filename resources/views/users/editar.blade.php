@extends("layouts.app")

@section("main")
   <div class="flex justify-center">
      <form class="bg-red-200 rounded-lg p-5" action="{{ route("user.actualizar", $usuarioEditar->idUsu) }}" method="post">

      @csrf
      <div class="mt-4">
         <x-input-label for="nombre" :value="__('Nombre')" />
         <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"  required autofocus autocomplete="nombre" value="{{$usuarioEditar->nombre}}"/>
         <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
     </div>
     <div class="mt-4">
         <x-input-label for="apellido" :value="__('Apellido')" />
         <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" required autofocus autocomplete="apellido" value="{{$usuarioEditar->apellido}}"/>
         <x-input-error :messages="$errors->get('apellido')" class="mt-2" />
     </div class="mt-4">
     <div class="mt-4">
         <x-input-label for="email" :value="__('Email')" />
         <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" value="{{$usuarioEditar->email}}"/>
         <x-input-error :messages="$errors->get('email')" class="mt-2" />
     </div>
     <div class="mt-4">
         <x-input-label for="password" :value="__('Password')" />
         <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" value="******"/>
         <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <div class="mt-4 mb-5">
         <label for="roles" class="block font-medium text-sm text-gray-700">@lang('app.rol')</label>
         <select name="roles" id="roles" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
             <option selected disabled readonly>@lang('app.selRol')</option>
             <option value="propietario">@lang('app.prop')</option>
             <option value="trabajador">@lang('app.tra')</option>
         </select>
     </div>
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('app.btn_actualizar')</button>

      </form>
   </div>
   
   @if ($errors->any())
    {{ $errors->first("numero") }}
   @endif

@endsection