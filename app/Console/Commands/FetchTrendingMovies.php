<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;

class FetchTrendingMovies extends Command
{
    protected $signature = 'movies:fetch-trending {--period=day}';

    protected $description = 'Fetch trending movies from TMDb API and store them in the database.';

    public function handle()
    {
        $period = $this->option('period');

        if (!in_array($period, ['day', 'week'])) {
            $this->error('Invalid period. Allowed values are day or week.');
            return 1;
        }

        $this->info("Fetching trending movies for the period: $period");

        $response = Http::withToken(config('services.tmdb.token'))
            ->get("https://api.themoviedb.org/3/trending/movie/{$period}");

        if ($response->failed()) {
            $this->error('Failed to fetch trending movies.');
            return 1;
        }

        $movies = $response->json()['results'];

        foreach ($movies as $movieData) {
            Movie::updateOrCreate(
                ['tmdb_id' => $movieData['id']],
                [
                    'title' => $movieData['title'],
                    'overview' => $movieData['overview'],
                    'poster_path' => $movieData['poster_path'],
                    'release_date' => $movieData['release_date'] ?? null,
                    'vote_average' => $movieData['vote_average'],
                    'vote_count' => $movieData['vote_count'],
                ]
            );
        }

        $this->info('Trending movies have been fetched and stored.');

        return 0;
    }
}
