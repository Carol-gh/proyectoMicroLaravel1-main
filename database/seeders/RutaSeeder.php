<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ruta;
class RutaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Ruta::create([
            'tipo' => 'ida',
            'linea_id'=> 1
        ]);

        Ruta::create([
            'tipo' => 'vuelta',
            'linea_id'=> 1
        ]);

        Ruta::create([
            'tipo' => 'ida',
            'linea_id'=> 2
        ]);

        Ruta::create([
            'tipo' => 'vuelta',
            'linea_id'=> 2
        ]);
        Ruta::create([
            'tipo' => 'ida',
            'linea_id'=> 3
        ]);

        Ruta::create([
            'tipo' => 'vuelta',
            'linea_id'=> 3
        ]);
        Ruta::create([
            'tipo' => 'ida',
            'linea_id'=> 4
        ]);

        Ruta::create([
            'tipo' => 'vuelta',
            'linea_id'=> 4
        ]);
        Ruta::create([
            'tipo' => 'ida',
            'linea_id'=> 5
        ]);

        Ruta::create([
            'tipo' => 'vuelta',
            'linea_id'=> 5
        ]);
        Ruta::create([
            'tipo' => 'ida',
            'linea_id'=> 6
        ]);

        Ruta::create([
            'tipo' => 'vuelta',
            'linea_id'=> 6
        ]);
        Ruta::create([
            'tipo' => 'ida',
            'linea_id'=> 7
        ]);

        Ruta::create([
            'tipo' => 'vuelta',
            'linea_id'=> 7
        ]);
        Ruta::create([
            'tipo' => 'ida',
            'linea_id'=> 8
        ]);

        Ruta::create([
            'tipo' => 'vuelta',
            'linea_id'=> 8
        ]);
        Ruta::create([
            'tipo' => 'ida',
            'linea_id'=> 9
        ]);

        Ruta::create([
            'tipo' => 'vuelta',
            'linea_id'=> 9
        ]);
        Ruta::create([
            'tipo' => 'ida',
            'linea_id'=> 10
        ]);

        Ruta::create([
            'tipo' => 'vuelta',
            'linea_id'=> 10
        ]);
       
    }
}
