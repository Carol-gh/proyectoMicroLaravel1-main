<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

use App\Models\Linea;
use App\Models\Ruta;
use App\Models\Coordenada;
use App\Models\User;
use App\Models\Conductor;
use App\Models\Microbus;
use App\Models\MicroConductor;


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
        $this->call([UsersTableSeeder::class]);
        $this->call(MicroSeeder::class);
    }
}
