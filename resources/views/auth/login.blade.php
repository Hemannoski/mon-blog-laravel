<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.boxicons.com/3.0.8/fonts/filled/boxicons-filled.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Connexion</title>
</head>
<body>
    <div class="mt-4">
        <h1 class="text-center text-2xl font-bold uppercase">Page Connexion</h1>
    </div>
    <div class="max-w-lg mx-auto p-6 m-6 rounded-md shadow-md bg-white">
        
        @if ($errors->any())
            <div class="text-red-500 font-bold bg-red-200 rounded-md p-4 border-red-500 relative">
                <p class="font-bold">Une erreur est survenue</p>
                <p class="text-sm">{{ $errors->first() }}</p>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-200 text-green-500 rounded-md p-4 border-green-500 relative">
                <p class="font-bold">Déconnexion réussie</p>
                <p class="text-sm">{{ session('success') }}</p>
            </div>
        @endif


        <form action="{{ route('login') }}" method="post" class="mt-4">
            @csrf
            
            <div class="mb-4">
                <label for="email" class="block text-2xl font-medium text-gray-700">E-mail: </label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="border border-gray-300 mt-1 p-3 block w-full rounded-md shadow-md outline-blue-600">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-2xl font-medium text-gray-700">Mot de Passe: </label>
                <input type="password" name="password" id="password" value="{{ old('password') }}" class="border border-gray-300 mt-1 p-3 block w-full rounded-md shadow-md outline-blue-600">
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full py-2 text-xl uppercase rounded-md bg-gray-500 hover:bg-gray-800 shadow-md hover:text-white">Se connecter</button>
            </div>
            <p class="mt-2" text-sm>
                Je n'ai pas de compte, <a href="{{ route('register') }}" class="text-red-500 underline">je m'inscrire.</a>
            </p>
        </form>
    </div>
</body>
</html>