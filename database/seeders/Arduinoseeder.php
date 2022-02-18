<?php

namespace Database\Seeders;

use App\Models\Arduino;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Arduinoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Arduino::truncate();

        $arduino =  [
            [
              'abrir' => 'a',
              'cerrar' => 'z',
              'fraccionamiento' => '2',
              'panel' => '0',
              'puerto' => '1',
              'nonc' => 'no',
              'nombre' => 'entrada',
            ],
            [
              'abrir' => 's',
              'cerrar' => 'x',
              'fraccionamiento' => '2',
              'panel' => '0',
              'puerto' => '2',
              'nonc' => 'no',
              'nombre' => 'salida',
            ],
            [
                'abrir' => 'd',
                'cerrar' => 'c',
                'fraccionamiento' => '2',
                'panel' => '0',
                'puerto' => '3',
                'nonc' => 'no',
                'nombre' => '',
            ],
            [
                'abrir' => 'f',
                'cerrar' => 'v',
                'fraccionamiento' => '2',
                'panel' => '0',
                'puerto' => '4',
                'nonc' => 'no',
                'nombre' => '',
            ],
            [
                'abrir' => 'g',
                'cerrar' => 'b',
                'fraccionamiento' => '2',
                'panel' => '0',
                'puerto' => '5',
                'nonc' => 'no',
                'nombre' => '',
            ],
            [
                'abrir' => 'h',
                'cerrar' => 'n',
                'fraccionamiento' => '2',
                'panel' => '0',
                'puerto' => '6',
                'nonc' => 'no',
                'nombre' => '',
            ],
            [
                'abrir' => 'j',
                'cerrar' => 'm',
                'fraccionamiento' => '2',
                'panel' => '0',
                'puerto' => '7',
                'nonc' => 'no',
                'nombre' => '',
            ],
            [
                'abrir' => 'k',
                'cerrar' => 'l',
                'fraccionamiento' => '2',
                'panel' => '0',
                'puerto' => '8',
                'nonc' => 'no',
                'nombre' => '',
            ]
          ];

          Arduino::insert($arduino);


      


    }
}
