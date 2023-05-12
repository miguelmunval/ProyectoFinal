<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} @yield("section", "- Parcelas")</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 bg-green-200">

            
            <nav class="flex items-center py-3 bg-green-400"> 
                
                <div class="menu flex-auto ml-3 aling-middle">
                    <a href="{{route("parcela.listar")}}" class="mr-2">@lang("app.btn_inicio")</a>
                    <a href="{{route("user.listar")}}" class="mr-2">@lang("app.btn_perfil")</a>
                    <a href="{{route("cultivo.listar")}}" class="mr-2">@lang("app.btn_cultivos")</a>
                    <a href="{{route("objeto.listar")}}">@lang("app.btn_objetos")</a>
                    
                </div>
                
                {{ Auth::user() }}
                <div class="mx-4">
                    
                    
                    <form action="{{ route("logout") }}" method="post">
                        @csrf
                        <button class="bg-red-400 text-white font-bold px-2 py-1 rounded-lg">@lang("app.btn_salir")</button>
                    </form>
                </div>
            </nav>
            <h1 class="text-7xl text-center mb-5 mt-3">{{ config('app.name', 'Laravel') }}</h1>

            <br/>
           
            <!-- Page Content -->
            <main>
                @yield("main")                    
            </main>
        </div>
    </body>
</html>