<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoordenadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {  //linea 1
        /// escribir aquiii-.......................


       //linea 2 
         /// escribir aquiii-.......................

        //linea 5
        //ida
        Coordenada::create([
            'latitud' => -17.7267533802,
            'longitud' => -63.1384822645,
            'ruta_id' => 1
        ]);
        Coordenada::create([
            'latitud' => -17.7265854773,
            'longitud' => -63.138753376,
            'ruta_id' => 1
        ]);
        //vuelta
        Coordenada::create([
            'latitud' => -17.8251477167,
            'longitud' => -63.2347364167,
            'ruta_id' => 2
        ]);
        Coordenada::create([
            'latitud' => -17.824900833,
            'longitud' => -63.234937633,
            'ruta_id' => 2
        ]);

        //linea 8
        /// escribir aquiii-.......................

       //linea 9 
         /// escribir aquiii-.......................

        //linea 10
        /// escribir aquiii-.......................


       //linea 11
         /// escribir aquiii-.......................


        //linea 16
        /// escribir aquiii-.......................


       //linea 17
         /// escribir aquiii-.......................

        //linea 18
        /// escribir aquiii-.......................


    }
}
