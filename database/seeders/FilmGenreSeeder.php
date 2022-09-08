<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $films = DB::table('films')->get();
        $genres = DB::table('genres')->get();

        for ($i = 0; $i < count($films); $i++) {
            DB::table('film_genre')->insert(['film_id' => $films[$i]->id, 'genre_id' => $genres[$i]->id]);
        }
        DB::table('film_genre')->insert(['film_id' => $films[0]->id, 'genre_id' => $genres[1]->id]);
        DB::table('film_genre')->insert(['film_id' => $films[3]->id, 'genre_id' => $genres[1]->id]);               
        DB::table('film_genre')->insert(['film_id' => $films[2]->id, 'genre_id' => $genres[0]->id]);
    }
}
