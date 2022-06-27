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
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 2',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 5',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 8',
            'tipo' => null,
        ]);
        Linea::create([
            'nombre' => 'Línea 9',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 10',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 11',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 16',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 17',
            'tipo' => null,
        ]);

        Linea::create([
            'nombre' => 'Línea 18',
            'tipo' => null,
        ]);
    }
}
