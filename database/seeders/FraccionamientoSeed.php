<?php

namespace Database\Seeders;

use App\Models\Fraccionamiento;
use Illuminate\Database\Seeder;

class FraccionamientoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fraccionamiento::truncate();


        $fraccionamiento =  [
            [
              'nombre' => 'S&T',
              'paneles' => '1',
            ],
            [
              'nombre' => 'Asturias_50',
              'paneles' => '1',
            ],

          ];

          Fraccionamiento::insert($fraccionamiento);
    }
}
