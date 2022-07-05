<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Linea;
use App\Models\Ruta;
use App\Models\Coordenada;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LineaSeeder::class);
        $this->call(RutaSeeder::class);
        $this->call(Linea01Seeder::class);
        $this->call(Linea02Seeder::class);
        $this->call(Linea11Seeder::class);
        $this->call(Linea16Seeder::class);
    }
}
