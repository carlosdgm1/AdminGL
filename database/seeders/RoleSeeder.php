<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $roleA = Role::create(['name' => 'administrador']);
        $roleV = Role::create(['name' => 'operacion']);
        $roleN = Role::create(['name' => 'configuracion']);

         
         Permission::create(['name' => 'administracion'])->syncRoles([$roleA]);
         Permission::create(['name' => 'busqueda'])->syncRoles([$roleA]);
         Permission::create(['name' => 'operacion'])->syncRoles([$roleV]);
         Permission::create(['name' => 'configuracion'])->syncRoles([$roleN]);
       
       
        

        
    }
}
