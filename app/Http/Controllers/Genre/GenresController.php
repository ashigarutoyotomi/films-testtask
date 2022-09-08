<?php

namespace App\Http\Controllers\Genre;
use App\Domains\Genre\DTO\GenreDTO\UpdateGenreData;
use App\Domains\Genre\Actions\GenreAction;
use App\Http\Requests\Genre\UpdateGenreRequest;
use App\Domains\Genre\DTO\GenreDTO\CreateGenreData;
use App\Domains\Genre\Gateways\GenreGateway;
use App\Http\Requests\Genre\CreateGenreRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenresController extends Controller
{
    public function index(Request $request)
    {
        $gateway = new GenreGateway();

        // $gateway->with('genres');

        return $gateway->paginate(20)->all();
    }

    public function show($genre_id)
    {
        $gateway = new GenreGateway();

        $gateway->with('films');
        $genre = $gateway->find($genre_id);
        abort_unless((bool)$genre, 404, 'Genre not found');
        return $genre;
    }

    public function store(CreateGenreRequest $request)
    {
        $data = CreateGenreData::fromRequest($request);
        return (new GenreAction)->create($data);
    }
    public function update(UpdateGenreRequest $request, $genre_id)
    {
        $data = UpdateGenreData::fromRequest($request, $genre_id);

        $genre = (new GenreAction)->update($data);

        return $genre;
    }
    public function delete($genre_id)
    {
        $genre = (new GenreAction)->delete($genre_id);
        return $genre;
    }
}
