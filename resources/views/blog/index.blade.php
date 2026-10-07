@extends('base')

@section('title', 'Articles à Consulter')

@section('content')
<h1 class="text-center text-2xl uppercase font-extrabold text-purple-900 mt-2">Tous Les Articles</h1>

<div class="p-6">

    <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($articles as $article)
            <li class="border border-gray-300 p-2 my-2">
                <img src="{{ asset('storage/'. $article->image) }}" alt="{{ $article->title }}" class="w-full object-cover h-auto mb-3">
                <p class="text-base font-medium mb-3">{{ $article->title }}</p>
                <p class="text-base font-medium italic">Créé par {{ $article->author->name }} le {{ $article->created_at }}</p>
                <div class="flex items-center gap-2 w-full mt-6">
                    <a href="{{ route('article.show', $article->id) }}" class=" bg-yellow-300 rounded-md text-white font-medium hover:bg-yellow-500 text-base px-3 py-3">Lire L'Article</a>
                </div>
            </li>
            
        @endforeach
    </ul>
</div>

@endsection