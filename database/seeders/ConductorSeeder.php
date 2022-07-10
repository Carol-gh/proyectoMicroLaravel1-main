<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conductor;

class ConductorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conductor::create([
            'ci' => '8965038',
            'fecha_nacimiento' => '1998-11-24',
            'telefono' => '60342875',
            'categoria_lic' => 'C',
            'users_id' => 1,
        ]);
    }
}
