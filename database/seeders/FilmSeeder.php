<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Domains\Film\Models\Film;
class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('films')->insert([
            'name' => "Forest Gump",
            'status' => Film::STATUS_NOT_PUBLISHED,
            'poster_link' => asset('/storage/posters/download.png'),

        ]);
        DB::table('films')->insert([
            'name' => "King Kong",
            'status' => Film::STATUS_NOT_PUBLISHED,
            'poster_link' => asset('/storage/posters/download.png'),
        ]);
        DB::table('films')->insert([
            'name' => "Interstellar",
            'status' => Film::STATUS_NOT_PUBLISHED,
            'poster_link' => asset('/storage/posters/download.png')
        ]);
        DB::table('films')->insert([
            'name' => "Indiana Jones",
            'status' => Film::STATUS_NOT_PUBLISHED,
            'poster_link' => asset('/storage/posters/download.png')
        ]);
    }
}
