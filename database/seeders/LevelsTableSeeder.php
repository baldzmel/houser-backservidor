<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'id_level' => 1,
            'rol' => "Admin",
        ]);
        Level::create([
            'id_level' => 2,
            'rol' => "User",
        ]);
        Level::create([
            'id_level' => 3,
            'rol' => "Professional",
        ]);
    }
}
