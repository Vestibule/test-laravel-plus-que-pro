@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Films Tendance</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach($movies as $movie)
        <div class="bg-white rounded shadow overflow-hidden">
            <a href="{{ route('movies.show', $movie->id) }}">
                @if($movie->poster_path)
                <img src="https://image.tmdb.org/t/p/w500{{ $movie->poster_path }}" alt="{{ $movie->title }}" class="w-full h-64 object-cover">
                @endif
                <div class="p-4">
                    <h2 class="text-lg font-semibold">{{ $movie->title }}</h2>
                    <p class="text-gray-600">{{ Str::limit($movie->overview, 100) }}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $movies->links() }}
    </div>
</div>
@endsection
