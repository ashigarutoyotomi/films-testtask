<?php

namespace App\Domains\Genre\Gateways;


use App\Domains\Genre\Models\Genre;
use App\Traits\BasicGatewaysTrait;

class GenreGateway
{
    use BasicGatewaysTrait;

    public function all()
    {
        $query = Genre::query();

        if ($this->with) {
            $query->with($this->with);
        }

        if ($this->limit) {
            $query->limit($this->limit);
        }
        if ($this->paginate) {
            return $query->paginate($this->paginate);
        }

        return $query->get();
    }

    public function edit($id)
    {
        $genre = Genre::find($id);
        return $genre;
    }

    public function find($id)
    {
        $query = Genre::query();

        if ($this->with) {
            $query->with($this->with);
        }

        return $query->find($id);
    }
}
