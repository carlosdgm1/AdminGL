<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {

    DB::table('users')->delete();

    $user2 =  User::create([
      'name' => 'Administrador',
      'username' => 'Administrador',
      'fraccionamiento' => '2',
      'email' => 'admin@austrias.com',
      'password' => bcrypt('P@ssw0rd'),
    ])->assignRole('administrador');

    $user3 =  User::create([
      'name' => 'Operacion',
      'username' => 'Operacion',
      'fraccionamiento' => '2',
      'email' => 'operacion@austrias.com',
      'password' => bcrypt('P@ssw0rd'),
    ])->assignRole('operacion');


    $user4 =  User::create([
      'name' => 'Configuracion',
      'username' => 'Configuracion',
      'fraccionamiento' => '2',
      'email' => 'configuracion@austrias.com',
      'password' => bcrypt('P@ssw0rd'),
    ])->assignRole('configuracion');


    // $usuarios =  [
    //   [
    //     'name' => 'goodlock',
    //     'fraccionamiento' => '1',
    //     'email' => 'S&T@admin.com',
    //     'password' => bcrypt('4dmin123+'),
    //   ],
    //   [
    //     'name' => 'Administrador',
    //     'fraccionamiento' => '2',
    //     'email' => 'admin@austrias.com',
    //     'password' => bcrypt('P@ssw0rd'),
    //   ],

    // ];

    // User::insert($usuarios);
  }
}
