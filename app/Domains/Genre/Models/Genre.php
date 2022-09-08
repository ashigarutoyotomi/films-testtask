<?php

namespace App\Domains\Genre\Models;
use Illuminate\Database\Eloquent\Model;
use App\Domains\Film\Models\Film;
class Genre extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function films(){
        return $this->belongsToMany(Film::class,'film_genre','genre_id','film_id');
    }    
    // public function films()
    // {
    //     return $this->belongsToMany(Genre::class);
    // }
}