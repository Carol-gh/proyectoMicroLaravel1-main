<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Armando Mendoza',
            'email' => 'mendozarmando@gmail.com',
            'password' => '123456789',
            'linea' => 'Línea 1',
        ]);
    }
}
