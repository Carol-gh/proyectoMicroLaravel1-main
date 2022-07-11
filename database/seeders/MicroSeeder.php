<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Microbus;

class MicroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Microbus::create([
            'placa' => '2140SCT',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '18',
            'estado' => 'Disponible',
            'linea_id' => 1,
        ]);

        Microbus::create([
            'placa' => '6542STG',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '14',
            'estado' => 'Disponible',
            'linea_id' => 1,
        ]);

        Microbus::create([
            'placa' => '3648SDF',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '1',
            'estado' => 'Disponible',
            'linea_id' => 1,
        ]);

        Microbus::create([
            'placa' => '4568SFG',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '18',
            'estado' => 'Disponible',
            'linea_id' => 2,
        ]);

        Microbus::create([
            'placa' => '3648SRT',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '2',
            'estado' => 'Disponible',
            'linea_id' => 2,
        ]);

        Microbus::create([
            'placa' => '6945SJY',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '10',
            'estado' => 'Disponible',
            'linea_id' => 2,
        ]);
    }
}
