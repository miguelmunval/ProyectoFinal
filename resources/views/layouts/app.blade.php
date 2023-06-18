<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
        <title>{{ config('app.name', 'Laravel') }} @yield("section")</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 bg-green-200">
            @if (Auth::check())
                @if (Auth::user()->roles == 'admin')
                    <nav class="flex items-center py-3 bg-green-400"> 
                        <div class="menu flex-auto ml-3 aling-middle">
                            <a href="{{route("parcela.listar")}}" class="mr-2">@lang("app.btn_inicio")</a>
                            <a href="{{route("user.listar")}}" class="mr-2">@lang("app.btn_perfil")</a>
                            <a href="{{route("cultivo.listar")}}" class="mr-2">@lang("app.btn_cultivos")</a>
                            <a href="{{route("objeto.listar")}}" class="mr-2">@lang("app.btn_objetos")</a>
                            <a href="{{route("producto.listar")}}" class="mr-2">@lang("app.btn_productos")</a>
                            <a href="{{route("inventario.listar")}}" class="mr-2">@lang("app.btn_inventarios")</a>
                            <a href="{{route("trabajador.listar")}}">@lang("app.btn_trabajadores")</a>
                        </div>
                        <div class="relative inline-block text-left mr-5">
                            <div>
                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-gray-700 border border-transparent rounded-md hover:bg-gray-600 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray active:bg-gray-800" id="navbarDropdown" aria-haspopup="true" aria-expanded="false" onclick="toggleLanguageDropdown()">
                                    @lang('app.selLan')
                                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 12l-4-4h8l-4 4z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            <div id="languageDropdown" class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg hidden">
                                <div class="py-1 bg-white rounded-md shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="navbarDropdown">
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem" href="locale/en">English</a>
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem" href="locale/es">Español</a>
                                </div>
                            </div>
                        </div>   
                        <script>
                            function toggleLanguageDropdown() {
                                var dropdown = document.getElementById("languageDropdown");
                                dropdown.classList.toggle("hidden");
                            }
                        </script>                 
                        {{ Auth::user() }}
                        <div class="mx-4">
                            <form action="{{ route("logout") }}" method="post">
                                @csrf
                                <button class="bg-red-400 text-white font-bold px-2 py-1 rounded-lg">@lang("app.btn_salir")</button>
                            </form>
                        </div>
                    </nav>
                    <img class="w-1/5 mx-auto" src="{{ asset('AgroAssist.png') }}" alt="LogoAgroAssistTexto"/>
                    <br/>
                @elseif (Auth::user()->roles == 'propietario')
                    <nav class="flex items-center py-3 bg-green-400"> 
                        <div class="menu flex-auto ml-3 aling-middle">
                            <a href="{{route("parcela.listar")}}" class="mr-2">@lang("app.btn_inicio")</a>
                            <a href="{{route("user.listar")}}" class="mr-2">@lang("app.btn_perfil")</a>
                            <a href="{{route("inventario.listar")}}" class="mr-2">@lang("app.btn_inventarios")</a>
                            <a href="{{route("trabajador.listar")}}">@lang("app.btn_trabajadores")</a>
                        </div>
                        <div class="relative inline-block text-left mr-5">
                            <div>
                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-gray-700 border border-transparent rounded-md hover:bg-gray-600 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray active:bg-gray-800" id="navbarDropdown" aria-haspopup="true" aria-expanded="false" onclick="toggleLanguageDropdown()">
                                    @lang('app.selLan')
                                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 12l-4-4h8l-4 4z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            <div id="languageDropdown" class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg hidden">
                                <div class="py-1 bg-white rounded-md shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="navbarDropdown">
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem" href="locale/en">English</a>
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem" href="locale/es">Español</a>
                                </div>
                            </div>
                        </div>   
                        <script>
                            function toggleLanguageDropdown() {
                                var dropdown = document.getElementById("languageDropdown");
                                dropdown.classList.toggle("hidden");
                            }
                        </script> 
                        {{ Auth::user() }}
                        <div class="mx-4">
                            <form action="{{ route("logout") }}" method="post">
                                @csrf
                                <button class="bg-red-400 text-white font-bold px-2 py-1 rounded-lg">@lang("app.btn_salir")</button>
                            </form>
                        </div>
                    </nav>
                    <img class="w-1/5 mx-auto" src="{{ asset('AgroAssist.png') }}" alt="LogoAgroAssistTexto"/>
                    <br/>
                @elseif (Auth::user()->roles == 'trabajador')
                    <nav class="flex items-center py-3 bg-green-400"> 
                        <div class="menu flex-auto ml-3 aling-middle">
                            <a href="{{route("actividad.listar", Auth::id())}}" class="mr-2">@lang("app.btn_inicio")</a>
                            <a href="{{route("user.listar")}}" class="mr-2">@lang("app.btn_perfil")</a>
                        </div>
                        <div class="relative inline-block text-left mr-5">
                            <div>
                                <button type="button" class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-gray-700 border border-transparent rounded-md hover:bg-gray-600 focus:outline-none focus:border-gray-800 focus:shadow-outline-gray active:bg-gray-800" id="navbarDropdown" aria-haspopup="true" aria-expanded="false" onclick="toggleLanguageDropdown()">
                                    @lang('app.selLan')
                                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 12l-4-4h8l-4 4z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                            <div id="languageDropdown" class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-lg hidden">
                                <div class="py-1 bg-white rounded-md shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="navbarDropdown">
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem" href="/locale/en">English</a>
                                    <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem" href="/locale/es">Español</a>
                                </div>
                            </div>
                        </div>   
                        <script>
                            function toggleLanguageDropdown() {
                                var dropdown = document.getElementById("languageDropdown");
                                dropdown.classList.toggle("hidden");
                            }
                        </script> 
                        {{ Auth::user() }}
                        <div class="mx-4">
                            <form action="{{ route("logout") }}" method="post">
                                @csrf
                                <button class="bg-red-400 text-white font-bold px-2 py-1 rounded-lg">@lang("app.btn_salir")</button>
                            </form>
                        </div>
                    </nav>
                    <img class="w-1/5 mx-auto" src="{{ asset('AgroAssist.png') }}" alt="LogoAgroAssistTexto"/>
                    <br/>
                @endif
            @endif
            <!-- Contenido de la página -->
            <main>
                @yield("main")                    
            </main>
        </div>
    </body>
</html>
