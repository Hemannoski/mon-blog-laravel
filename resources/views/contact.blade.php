@extends('base')

@section('title', 'Contact')

@section('content')

<div class="mt-4">
    <h1 class="text-center text-2xl font-bold uppercase">Page Contact</h1>
</div>
<div class="max-w-lg mx-auto p-6 m-6 rounded-md shadow-md bg-white">
    
    @if (session('success'))
        <div class="bg-green-200 text-green-500 rounded-md p-4 border-green-500 relative">
            <p class="font-bold">Message Envoyé</p>
            <p class="text-sm">{{ session('success') }}</p>
        </div>
    @endif

    <form action="{{ route('contact.send') }}" method="post" class="mt-4">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-2xl font-medium text-gray-700">Nom: </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="border border-gray-300 mt-1 p-3 block w-full rounded-md shadow-md outline-blue-600">
            @error('name')
                <p class="text-sm text-red-500 font-bold bg-red-200">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-2xl font-medium text-gray-700">E-mail: </label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="border border-gray-300 mt-1 p-3 block w-full rounded-md shadow-md outline-blue-600">
            @error('email')
                <p class="text-sm text-red-500 font-bold bg-red-200">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="message" class="block mb-2 text-md text-gray-700 uppercase font-medium">Message: </label>
            <textarea name="message" id="message" class="w-full px-3 py-2 rounded-md outline-2 outline-blue-400 shadow-md">{{  old('message')  }}</textarea>
            @error('message')
                <p class="text-sm text-red-500 font-bold bg-red-200">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <button type="submit" class="w-full py-2 text-xl uppercase rounded-md bg-gray-500 hover:bg-gray-800 shadow-md hover:text-white">Envoyer Le Message</button>
        </div>
    </form>
</div>

@endsection