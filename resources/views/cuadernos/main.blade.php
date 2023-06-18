@extends("layouts.app")

@section("main")
    @if (Auth::user()->roles == 'trabajador')
        <h1>@lang('app.noAcs')</h1>
    @else
        @empty($productos)
            {{-- No hay datos: mostramos mensaje --}}
            @lang('app.noReg')<br/>
            @lang('app.paReg')
            <div class="flex items-center justify-end mr-4">
            <a href="{{ route('cuadernocampo.crear', $idPar)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('app.nueReg')</a>
            </div>
        @else
            <script>document.title = "{{ config('app.name', 'Laravel') }} - Parcelas" </script>
            <h6 class="my-5 mx-4 text-2xl">@lang('app.listCua')</h6>
            <div class="flex items-center justify-end mr-4">
            <a href="{{ route('cuadernocampo.crear', $idPar)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">@lang('app.nueReg')</a>
            </div>
            {{-- Hay datos: mostramos listado de parcelas --}}
            <div class="overflow-x-auto mx-4">
                <table class="text-center text-2xl m-auto mt-5 bg-red-200 rounded-lg">
                    <thead>
                        <tr>
                            <th class="px-6 py-4">@lang('app.pro')</th>
                            <th class="px-6 py-4">@lang('app.tra')</th>
                            <th class="px-6 py-4">@lang('app.fech')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $index => $dato)
                            <tr>
                                <td class="px-6 py-4">{{ $productos[$index]->nomPro }}</td>
                                <td class="px-6 py-4">{{ $usuarios[$index] ?? '' }}</td>
                                <td class="px-6 py-4">{{ $dato->fechafitosanitario }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" class="text-center">{{$productos->links()}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @endempty
    @endif
@endsection