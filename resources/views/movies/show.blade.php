@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row">
        @if($movie->poster_path)
        <div class="md:w-1/3">
            <img src="https://image.tmdb.org/t/p/w500{{ $movie->poster_path }}" alt="{{ $movie->title }}" class="w-full h-auto">
        </div>
        @endif
        <div class="md:w-2/3 md:pl-8">
            <h1 class="text-3xl font-bold mb-4">{{ $movie->title }}</h1>
            <p class="text-gray-600 mb-4">{{ $movie->overview }}</p>
            <p><strong>Date de sortie :</strong> {{ $movie->release_date }}</p>
            <p><strong>Note moyenne :</strong> {{ $movie->vote_average }}</p>
            <p><strong>Nombre de votes :</strong> {{ $movie->vote_count }}</p>
            <div class="flex">
                <a href="/movies/{{ $movie->id }}/edit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 mr-4">Modifier</a>
                <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce film ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded mt-4">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
