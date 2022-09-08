<?php

namespace App\Domains\Film\Actions;

use App\Domains\Film\DTO\FilmDTO\CreateFilmData;
use App\Domains\Film\Models\Film;
use App\Domains\Film\DTO\FilmDTO\UpdateFilmData;
use Illuminate\Support\Facades\Log;
class FilmAction
{
    /**
     * create user
     * @param CreateFilmData $data
     * @return mixed
     */
    public function create(CreateFilmData $data)
    {
        $genre_ids = json_decode($data->genre_ids);
        $film =  Film::create([
            'name' => $data->name,
            'status' => Film::STATUS_NOT_PUBLISHED,
            'poster_link' => $data->poster_link
        ]);
        foreach ($genre_ids as $id) {
            $film->genres()->attach($id);
        }
        return $film;
    }

    public function update(UpdateFilmData $data)
    {
        $film = Film::find($data->film_id);
        abort_unless((bool)$film, 404, 'Film not found');
        $film->name = $data->name;
        $film->save();
        return $film;
    }
    public function delete($film_id)
    {
        $film = Film::find($film_id);
        abort_unless((bool)$film, 404, 'Film not found');
        $film->delete();
        return $film;
    }
    public function publish($film_id){
        $film = Film::find($film_id);
        abort_unless((bool)$film, 404, 'Film not found');
        $film->status = Film::STATUS_PUBLISHED;
        $film->save();
        return $film;
    }
}
