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
            'estado' => 'ocupado',
            'fecha_asignacion' => '2001-3-23',
        ]);

        Microbus::create([
            'placa' => '6542STG',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '14',
            'estado' => 'ocupado',
            'fecha_asignacion' => '2001-3-23',
        ]);

        Microbus::create([
            'placa' => '3648SDF',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '1',
            'estado' => 'ocupado',
            'fecha_asignacion' => '2001-3-23',
        ]);
    }
}
