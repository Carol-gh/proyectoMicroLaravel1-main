<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Linea;

class LineaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Linea::create([
            'nombre' => 'Línea 1',
            'tiempo' => '90',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 2',
            'tiempo' => '90',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 5',
            'tiempo' => '90',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 8',
            'tiempo' => '90',
            'tipo' => null,
        ]);
        Linea::create([
            'nombre' => 'Línea 9',
            'tiempo' => '90',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 10',
            'tiempo' => '90',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 11',
            'tiempo' => '90',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 16',
            'tiempo' => '90',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 17',
            'tiempo' => '90',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 18',
            'tiempo' => '90',
            'tipo' => null,
        ]);
    }
}
