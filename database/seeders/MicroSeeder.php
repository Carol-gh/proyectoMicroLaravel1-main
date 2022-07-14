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
        ]);

        Microbus::create([
            'placa' => '6542STG',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '14',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '3648SDF',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '1',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '4568SFG',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '18',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '8012SMN',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '2',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '1010SHX',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '10',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '1002SXX',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '2',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '3649SLK',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '10',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '3649SAQ',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '2',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '5248STG',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '10',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '3647STY',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '2',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '9852SDD',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '10',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '3642SWE',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '2',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '6348STG',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '10',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '2365SDF',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '2',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '4545SJY',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '10',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '3368SRT',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '2',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '6785SJY',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '10',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '5648SRT',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '2',
            'estado' => 'Disponible',
        ]);

        Microbus::create([
            'placa' => '6934SJY',
            'modelo' => '2015',
            'nro_asientos' => '23',
            'nroInterno' => '10',
            'estado' => 'Disponible',
        ]);
    }
}
