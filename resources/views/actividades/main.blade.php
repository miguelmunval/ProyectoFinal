@extends('layouts.app')
 {{-- Intentar que cuando el Usuario logeado sea trabajador se redirija directamente aquí --}}
@section('main')
    @if (Auth::user()->roles == 'trabajador')
        @empty($parcela)
        {{-- No hay datos: mostramos mensaje --}}
        <div class="overflow-x-auto m-auto">
            @lang('app.noAct')<br/>
            @lang('app.paAct')
        </div>
        @else
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h6 class="my-5 mx-4 text-2xl">@lang('app.listActUsu')</h6>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="overflow-x-auto mx-4">
                <table class="text-center text-2xl m-auto mt-5 bg-red-200 rounded-lg">
                    <thead>
                        <tr>
                            <th class="pt-6 px-8">@lang('app.par')</th>
                            <th class="pt-6 px-8">@lang('app.act')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @dd($actividad)
                        @php
                            $count = max(count($parcela), count($actividad));
                        @endphp
                        @for ($i = 0; $i < $count; $i++)
                            <tr>
                                <td class="px-6 py-4">
                                    {{ $parcela[$i]->locPar ?? '' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $actividad[$i]->desAct ?? '' }}
                                </td>
                                
                                <td class="px-6 py-4">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary" href="{{ route('actividad.borrar', $actividad[$i]->idAct) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        @endempty
    @else
        @empty($parcela)
        {{-- No hay datos: mostramos mensaje --}}
        <div class="overflow-x-auto m-auto">
            @lang('app.noAct')<br/>
            @lang('app.paAct')
        </div>
        <div class="flex items-center justify-end mr-4">
            <a href="{{ route('actividad.crear', $idUsu)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('app.nueAct')</a>
        </div>
        @else
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h6 class="my-5 mx-4 text-2xl">@lang('app.listActUsu')</h6>
                    </div>
                    <div class="flex items-center justify-end mr-4">
                        <a href="{{ route('actividad.crear', $idUsu)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('app.nueAct')</a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="overflow-x-auto mx-4">
                <table class="text-center text-2xl m-auto mt-5 bg-red-200 rounded-lg">
                    <thead>
                        <tr>
                            <th class="pt-6 px-8">@lang('app.par')</th>
                            <th class="pt-6 px-8">@lang('app.act')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count = max(count($parcela), count($actividad));
                        @endphp
                        @for ($i = 0; $i < $count; $i++)
                            <tr>
                                <td class="px-6 py-4">
                                    {{ $parcela[$i]->locPar ?? '' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $actividad[$i]->desAct ?? '' }}
                                </td>
                                    
                                <td class="px-6 py-4">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-primary" href="{{ route('actividad.borrar', $actividad[$i]->idAct) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        @endempty
    @endif
@endsection