<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::orderBy('created_at', 'desc')->paginate(10);

        return view('movies.index', compact('movies'));
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'overview' => 'nullable|string',
            'poster_path' => 'nullable|string|max:255',
            'release_date' => 'nullable|date',
            'vote_average' => 'nullable|numeric|min:0|max:10',
            'vote_count' => 'nullable|integer|min:0',
        ]);

        $movie->update($request->all());

        return redirect()->route('movies.show', $movie->id)->with('success', 'Film mis à jour avec succès.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Film supprimé avec succès.');
    }
}
