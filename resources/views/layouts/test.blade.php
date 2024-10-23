<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- En el archivo resources/views/layouts/app.blade.php -->

    


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
       <title>TestAuto</title>
    @livewireStyles

    @yield('css')

</head>

<body class="bg-gray-200">
    <!-- Barra de navegación Livewire -->

    <x-Navbar />
    <!-- Contenido de la página -->
    <div>
        @yield('content')
    </div>
    <x-footer />
    @livewireScripts
    <!-- Otros scripts -->
</body>

</html>
