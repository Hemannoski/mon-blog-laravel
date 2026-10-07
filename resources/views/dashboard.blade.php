@extends('base')

@section('title', 'dashboard')

@section('content')
<h1 class="text-center text-2xl uppercase font-extrabold text-purple-900 mt-2">Tableau de bord</h1>

@if (session('success'))
    <div class="bg-green-200 text-green-500 rounded-md p-4 border-green-500 relative">
        <p class="font-bold">Article créé avec succès</p>
        <p class="text-sm">{{ session('success') }}</p>
    </div>
@elseif (session('delete'))
    <div class="bg-red-200 text-red-500 rounded-md p-4 border-red-500 relative">
        <p class="font-bold">Suppression</p>
        <p class="text-sm">{{ session('delete') }}</p>
    </div>
@elseif (session('update'))
    <div class="bg-blue-200 text-blue-500 rounded-md p-4 border-blue-500 relative">
        <p class="font-bold">Mise à jour</p>
        <p class="text-sm">{{ session('update') }}</p>
    </div>    
    
@endif


<div class="p-6">
    <div class="flex justify-between mx-6 py-2">
        <a href="{{ route('create') }}" class="bg-green-500 text-white text-xl rounded-md p-2 shadow-lg shadow-green-400/50">Créer un article</a>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <input type="submit" value="Déconnexion" class="bg-red-500 text-white text-xl rounded-md p-2 shadow-lg shadow-red-400/50 cursor-pointer">
        </form>
    </div>


    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($allAuthorArticles as $authorArticle)
            <li class="border border-gray-300 p-2 my-2">
                <img src="{{ asset('storage/'. $authorArticle->image) }}" alt="{{ $authorArticle->title }}" class="w-full object-cover h-auto mb-3">
                <p class="text-base font-medium">{{ $authorArticle->title }}</p>
                <div class="flex items-center gap-2 w-full mt-6">
                    <a href="{{ route('article.edit', $authorArticle->id) }}" class=" bg-yellow-300 rounded-md text-white font-medium hover:bg-yellow-500 text-base px-3 py-3">Modifier</a>
                    <form action="{{ route('article.destroy', $authorArticle->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 rounded-md text-white font-medium hover:bg-red-800 text-base px-3 py-3">Supprimer</button>
                    </form>
                </div>
            </li>
            
        @endforeach
    </ul>
</div>

@endsection