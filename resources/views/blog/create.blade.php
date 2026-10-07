@extends('base')

@section('title', 'Articles')

@section('content')
    <h1>La page de création des articles</h1>
    
    <div class="shadow-md rounded-md mt-4 p-6 mx-auto max-w-2xl">

        <form action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-6">
                <label for="title" class="block mb-2 text-md text-gray-700 uppercase font-medium">Titre de l'article: </label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full px-3 py-2 rounded-md outline-2 outline-blue-400 shadow-md">
                @error('title')
                    <p class="text-sm text-red-500 font-bold bg-red-200">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="description" class="block mb-2 text-md text-gray-700 uppercase font-medium">description de l'article: </label>
                <textarea name="description" id="description" class="w-full px-3 py-2 rounded-md outline-2 outline-blue-400 shadow-md">{{  old('description')  }}</textarea>
                @error('description')
                    <p class="text-sm text-red-500 font-bold bg-red-200">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-6">
                <label for="categorie" class="block mb-2 text-md text-gray-700 uppercase font-medium">Catégorie de l'article: </label>
                <input type="text" name="categorie" id="categorie" value="{{ old('categorie') }}" class="w-full px-3 py-2 rounded-md outline-2 outline-blue-400 shadow-md">
                @error('categorie')
                    <p class="text-sm text-red-500 font-bold bg-red-200">{{ $message }}</p>
                @enderror
            </div>
             <div class="mb-6">
                <label for="image" class="block mb-2 text-md text-gray-700 uppercase font-medium">image: </label>
                <input type="file" name="image" id="image" class="px-3 py-2 rounded-md outline-2 outline-blue-400 shadow-md">
            </div>
            <div class="mb-4">
                <button type="submit" class="w-full py-2 text-xl uppercase rounded-md bg-gray-500 hover:bg-gray-800 shadow-md hover:text-white">Créer un article</button>
            </div>
        </form>

    </div>
@endsection