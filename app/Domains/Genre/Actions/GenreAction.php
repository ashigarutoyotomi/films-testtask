<?php

namespace App\Domains\Genre\Actions;

use App\Domains\Genre\DTO\GenreDTO\CreateGenreData;
use App\Domains\Genre\Models\Genre;
use App\Domains\Genre\DTO\GenreDTO\UpdateGenreData;
class GenreAction
{
    /**
     * create user
     * @param CreateGenreData $data
     * @return mixed
     */
    public function create(CreateGenreData $data)
    {
        return Genre::create([
            'name' => $data->name,
        ]);
    }
    public function update(UpdateGenreData $data)
    {
        $genre = Genre::find($data->genre_id);
        abort_unless((bool)$genre, 404, 'Genre not found');
        $genre->name = $data->name;
        $genre->save();
        return $genre;
    }
    public function delete($genre_id)
    {
        $genre = Genre::find($genre_id);
        abort_unless((bool)$genre, 404, 'Genre not found');
        $genre->delete();
        return $genre;
    }
}
