<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $posisi = Array('FWD', 'MID', 'DEF', 'GK');
        $faker = Faker::create('id_ID');
        for($i = 0; $i < 50; $i++){
            DB::table('player')->insert([
                'nama'  => $faker->firstNameMale(),
                'posisi' => $posisi[array_rand($posisi)],
                'harga' => rand(50000, 5000000),
                'rating' => rand(45, 100),
            ]);
        }

    }
}
