<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kost')->insert([
            'nama' => Str::random(10),
            'foto_path' => Str::random(10),
            'cordinat_x' => fake()->numerify('###.###'),
            'cordinat_y' => fake()->numerify('###.###'),
            'fasilitas' => Str::random(10),
            'harga' => fake()->numerify('######'),
            'area' => Str::random(10)
        ]);
        DB::table('kost')->insert([
            'nama' => Str::random(10),
            'foto_path' => Str::random(10),
            'cordinat_x' => fake()->numerify('###.###'),
            'cordinat_y' => fake()->numerify('###.###'),
            'fasilitas' => Str::random(10),
            'harga' => fake()->numerify('######'),
            'area' => Str::random(10)
        ]);
    }
}
