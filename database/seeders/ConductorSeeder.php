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
            'nombre' => 'Finnick Norton',
            'email' => 'nortonfinnick@gmail.com',
            'password' => '123456789',
            'ci' => '8945087',
            'fecha_nacimiento' => '1992-11-21',
            'telefono' => '60845219',
            'categoria_lic' => 'C',
            'users_id' => '1'
        ]);

        Conductor::create([
            'nombre' => 'Zachary Natch',
            'email' => 'natchzachary@gmail.com',
            'password' => '123456789',
            'ci' => '45263754',
            'fecha_nacimiento' => '1992-11-21',
            'telefono' => '75266344',
            'categoria_lic' => 'C',
            'users_id' => '1'
        ]);

        Conductor::create([
            'nombre' => 'Fatih Sekercizade',
            'email' => 'sekercizadefatih@gmail.com',
            'password' => '123456789',
            'ci' => '46723184',
            'fecha_nacimiento' => '1992-11-21',
            'telefono' => '60593624',
            'categoria_lic' => 'C',
            'users_id' => '1'
        ]);
    }
}
