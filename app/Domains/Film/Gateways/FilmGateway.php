<?php

namespace App\Domains\Film\Gateways;


use App\Domains\Film\Models\Film;
use App\Traits\BasicGatewaysTrait;

class FilmGateway
{
    use BasicGatewaysTrait;

    public function all()
    {
        $query = Film::query();

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
        $film = Film::find($id);
        return $film;
    }

    public function find($id)
    {
        $query = Film::query();

        if ($this->with) {
            $query->with($this->with);
        }

        return $query->find($id);
    }
}
