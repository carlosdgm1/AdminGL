<?php

namespace Database\Seeders;

use App\Models\Camaras;
use Illuminate\Database\Seeder;

class CamarasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Camaras::insert(['frente' => '192.168.100.132', 'placa' => '192.168.100.132', 'salida' => '192.168.100.132', 'ine' => '192.168.100.132', 'fraccionamiento' => '2']);
    }
}
