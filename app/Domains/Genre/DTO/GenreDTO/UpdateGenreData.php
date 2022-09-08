<?php

namespace App\Domains\Genre\DTO\GenreDTO;

use Spatie\DataTransferObject\DataTransferObject;
use App\Http\Requests\Genre\UpdateGenreRequest;

class UpdateGenreData extends DataTransferObject
{
    public string $name;
    public int $genre_id;
    public static function fromRequest(UpdateGenreRequest $request): UpdateGenreData
    {
        $data = [
            'name' => $request->name,
        ];

        return new self($data);
    }
}
