<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/filled/boxicons-filled.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>
    <nav class="bg-black p-5 flex justify-between">
        <div class="flex space-x-4">
            <a href="{{ route('home') }}" class="text-white text-lg uppercase hover:text-gray-500 focus:border-b-red-500 focus:border-b-2 focus:text-gray-500">Accueil</a>
            <a href="{{ route('contact.show') }}" class="text-white text-lg uppercase hover:text-gray-500 focus:border-b-red-500 focus:border-b-2 focus:text-gray-500">Contact</a>
            <a href="{{ route('dashboard') }}" class="text-white text-lg uppercase hover:text-gray-500 focus:border-b-red-500 focus:border-b-2 focus:text-gray-500">Mes articles</a>        
        </div>
        <a href="#"><i class="bxf bx-user-circle text-3xl" style="color: white;"></i></a>
    </nav>
    <div>
        @yield('content')
    </div>
</body>
</html>