<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create(['id' => 1, 'description' => 'Administrador']);
        Level::create(['id' => 2, 'description' => 'Logistica']);
    }
}
