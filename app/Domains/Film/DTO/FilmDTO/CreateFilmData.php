<?php

namespace App\Domains\Film\DTO\FilmDTO;

use Spatie\DataTransferObject\DataTransferObject;
use App\Http\Requests\Film\CreateFilmRequest;

class CreateFilmData extends DataTransferObject
{
    public string $name;
    public string $poster_link;
    public string $genre_ids;
}
