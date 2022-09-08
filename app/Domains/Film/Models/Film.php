<?php

namespace App\Domains\Film\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domains\Genre\Models\Genre;

class Film extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
        'poster_link'
    ];
    const STATUS_NOT_PUBLISHED = 1;
    const STATUS_PUBLISHED = 2;
    
    // public function genres()
    // {
    //     return $this->belongsToMany(Genre::class);
    // }
    public function genres(){
        return $this->belongsToMany(Genre::class,'film_genre','film_id','genre_id');
    }    
}
