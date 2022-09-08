<?php

namespace App\Domains\Genre\DTO\GenreDTO;

use Spatie\DataTransferObject\DataTransferObject;
use App\Http\Requests\Genre\CreateGenreRequest;

class CreateGenreData extends DataTransferObject
{
    public string $name;

    public static function fromRequest(CreateGenreRequest $request): CreateGenreData
    {
        $data = [
            'name' => $request->name,
        ];

        return new self($data);
    }
}
