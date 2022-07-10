<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MicroConductor;

class MicrodriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MicroConductor::create([
            'fecha' => '2022-07-07',
            'conductor_id' => '1',
            'micro_id' => '1',
        ]);

        MicroConductor::create([
            'fecha' => '2022-06-27',
            'conductor_id' => '1',
            'micro_id' => '2',
        ]);

        MicroConductor::create([
            'fecha' => '2022-07-08',
            'conductor_id' => '1',
            'micro_id' => '2',
        ]);

        MicroConductor::create([
            'fecha' => '2022-07-09',
            'conductor_id' => '1',
            'micro_id' => '1',
        ]);

        MicroConductor::create([
            'fecha' => '2022-07-05',
            'conductor_id' => '1',
            'micro_id' => '3',
        ]);
    }
}
