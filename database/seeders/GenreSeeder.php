<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
            'name' => "Drama",            
        ]);
        DB::table('genres')->insert([
            'name' => "Historical",            
        ]);
        DB::table('genres')->insert([
            'name' => "Sci-Fi",             
        ]);
        DB::table('genres')->insert([
            'name' => "Comedy",             
        ]);
    }
}
