@extends("layouts.app")

@section("main")
    @if (Auth::user()->roles == 'trabajador')
        <h1>@lang('app.noAcs')</h1>
    @else
        @empty($cultivos)
            {{-- No hay datos: mostramos mensaje --}}
            @lang('app.noReg')
        @else
            <h6 class="my-5 mx-4 text-2xl">@lang('app.titHist') {{$parcela->locPar}}</h6>
            <div class="flex items-center justify-end mr-4">
            <a href="{{ route("parcela.listar")}}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">@lang('app.bck')</a>
            </div>
            {{-- Hay datos: mostramos el historial de cultivo --}}
            <table class="text-center text-2xl m-auto mt-5 bg-red-200 rounded-lg">
                <thead>
                    <tr>
                        <th class="px-6 py-4">@lang('app.Nombre')</th>
                        <th class="px-6 py-4">@lang('app.fech')</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = max(count($cultivos), count($hist));
                    @endphp
                    @for ($i = 0; $i < $count; $i++)
                        <tr>
                            <td class="px-6 py-4">
                                @if (isset($cultivos[$i]))
                                    {{ $cultivos[$i]->NomCult }}
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if (isset($hist[$i]))
                                    {{ $hist[$i]->fechaCult }}
                                @endif
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        @endempty
    @endif
@endsection