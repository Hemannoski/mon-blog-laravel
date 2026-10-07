@extends('base')

@section('title', 'détails')

@section('content')
<h1 class="text-center text-2xl uppercase font-extrabold text-purple-900 mt-2">Article {{ $article->id }}</h1>


<div class="rounded-lg bg-gray-200 shadow-lg mx-auto w-2/3 mt-9 px-8 pb-6">
    <img src="{{ asset('Storage/'. $article->image) }}" alt="{{ $article->title }}" class="w-full h-auto object-cover object-center">
    <h1 class="text-3xl font-bold text-center py-6">{{ $article->title }}</h1>
    <div class="flex items-center justify-center gap-7">
        <h3 class="text-xl text-white capitalize font-medium text-center rounded-md p-2 bg-blue-500">{{ $article->category->name }}</h3>
        <h3 class="text-xl text-gray-500 capitalize font-medium">par {{ $article->author->name }}</h3>
        <h3 class="text-xl text-gray-500 capitalize font-medium">le {{ $article->created_at }}</h3>
    </div>
    <div class="rounded-md bg-slate-800 my-6 p-4 shadow-slate-200 shadow-xl">
        <p class="text-white text-lg text-center">
            {{ $article->description }}
        </p>
    </div>
    <div class="flex justify-center mx-6 py-2 gap-6">
        <a href="{{ route('home') }}" class="bg-black text-white text-xl rounded-md p-2 shadow-lg shadow-black/50">Retour</a>
    </div>
</div>

@endsection