@extends('base')

@section('title', 'article modifié')

@section('content')
    <h1>La page de modification des articles</h1>
    
    <div class="shadow-md rounded-md mt-4 p-6 mx-auto max-w-2xl">

        <form action="{{ route('article.update', $article->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="title" class="block mb-2 text-md text-gray-700 uppercase font-medium">Titre de l'article: </label>
                <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" class="w-full px-3 py-2 rounded-md outline-2 outline-blue-400 shadow-md">
            </div>
            <div class="mb-6">
                <label for="description" class="block mb-2 text-md text-gray-700 uppercase font-medium">description de l'article: </label>
                <textarea name="description" id="description" class="w-full px-3 py-2 rounded-md outline-2 outline-blue-400 shadow-md">{{  old('description', $article->description) }}</textarea>
            </div>
            <div class="mb-6">
                <label for="categorie_id" class="block mb-2 text-md text-gray-700 uppercase font-medium">Catégorie de l'article: </label>
                <select name="categorie_id" id="categorie_id" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-md">
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $article->category_id == $categorie->id ? "selected" : "" }}>
                            {{ $categorie->name }}
                        </option>
                    @endforeach
                </select>
            </div>
             <div class="mb-6">
                <img src="{{ asset('storage/'. $article->image) }}" alt="{{ $article->title }}" class="w-full h-auto object-cover mb-4">
                <label for="image" class="block mb-2 text-md text-gray-700 uppercase font-medium">image: </label>
                <input type="file" name="image" id="image" class="px-3 py-2 rounded-md outline-2 outline-blue-400 shadow-md">
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full py-2 text-xl uppercase rounded-md bg-gray-500 hover:bg-gray-800 shadow-md hover:text-white">Appliquer les modifications</button>
            </div>
            <div class="mb-1 py-2 rounded-md bg-gray-500 hover:bg-gray-800 shadow-md hover:text-white">
                <a href="{{ route('home') }}" class="text-xl text-center block">Retour</a>
            </div>

        </form>

    </div>
@endsection