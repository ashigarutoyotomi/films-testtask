<?php

namespace App\Domains\Film\DTO\FilmDTO;

use Spatie\DataTransferObject\DataTransferObject;
use App\Http\Requests\Film\UpdateFilmRequest;

class UpdateFilmData extends DataTransferObject
{
    public string $name;
    public int $film_id;
    public static function fromRequest(
        UpdateFilmRequest $request,
        $film_id
    ): UpdateFilmData {
        $data = [
            'film_id' => $film_id,
            'name' => (string)$request->name,
        ];
        return new self($data);
    }
}
