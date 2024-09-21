@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Éditer le film</h1>
    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Titre -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Titre :</label>
            <input type="text" name="title" value="{{ old('title', $movie->title) }}" class="w-full border rounded px-3 py-2" required>
            @error('title')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Aperçu (Overview) -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Aperçu :</label>
            <textarea name="overview" rows="5" class="w-full border rounded px-3 py-2">{{ old('overview', $movie->overview) }}</textarea>
            @error('overview')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Chemin de l'affiche (Poster Path) -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Chemin de l'affiche :</label>
            <input type="text" name="poster_path" value="{{ old('poster_path', $movie->poster_path) }}" class="w-full border rounded px-3 py-2">
            @error('poster_path')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Date de sortie (Release Date) -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Date de sortie :</label>
            <input type="date" name="release_date" value="{{ old('release_date', $movie->release_date) }}" class="w-full border rounded px-3 py-2">
            @error('release_date')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Note moyenne (Vote Average) -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Note moyenne :</label>
            <input type="number" step="0.1" name="vote_average" value="{{ old('vote_average', $movie->vote_average) }}" class="w-full border rounded px-3 py-2">
            @error('vote_average')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Nombre de votes (Vote Count) -->
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Nombre de votes :</label>
            <input type="number" name="vote_count" value="{{ old('vote_count', $movie->vote_count) }}" class="w-full border rounded px-3 py-2">
            @error('vote_count')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>

        <!-- Bouton de soumission -->
        <div class="flex items-center">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Mettre à jour</button>
            <a href="{{ route('movies.index') }}" class="text-gray-700 underline">Annuler</a>
        </div>
    </form>
</div>
@endsection