<?php

namespace App\Http\Controllers\Film;

use App\Domains\Genre\Gateways\GenreGateway;
use App\Domains\Film\Actions\FilmAction;
use App\Domains\Film\DTO\FilmDTO\CreateFilmData;
use App\Http\Requests\Film\UpdateFilmRequest;
use App\Domains\Film\Gateways\FilmGateway;
use App\Http\Requests\Film\CreateFilmRequest;
use Illuminate\Http\Request;
use App\Domains\Film\DTO\FilmDTO\UpdateFilmData;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class FilmsController extends Controller
{
    public function index(Request $request)
    {
        $gateway = new FilmGateway();

        $gateway->with('genres');

        return $gateway->paginate(20)->all();
    }

    public function show($film_id)
    {
        $gateway = new FilmGateway();

        $gateway->with('genres');
        $film = $gateway->find($film_id);
        abort_unless((bool)$film, 404, 'Film not found');
        return $film;
    }

    public function store(CreateFilmRequest $request)
    {
        if (isset($request->poster) && $request->poster != null) {
            $path = $request->poster->store('posters', 'public');
        } else {
            $path = asset('/storage/posters/download.png');
        }
        $data = new CreateFilmData(
            [
                'name' => $request->name,
                'poster_link' => $path,
                'genre_ids' => $request->genre_ids
            ]
        );        
        return (new FilmAction)->create($data);
    }

    public function update(UpdateFilmRequest $request, $film_id)
    {
        $data = UpdateFilmData::fromRequest($request, $film_id);

        $film = (new FilmAction)->update($data);

        return $film;
    }

    public function delete($film_id)
    {
        $film = (new FilmAction)->delete($film_id);
        return $film;
    }
    public function upload(Request $request)
    {
        $genres = (new GenreGateway)->all();
        return view('films.film-upload', ['genres' => $genres]);
    }
    public function publish($film_id){
        $film = (new FilmAction)->publish($film_id);
        return $film;
    }
}
