<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //users valdymas
            //perziureti visus vartotojus superadmin
            //trinti vartotoja 
            //redaguoti vartotoja
            //perziureti vartotoja
        //roles
            //perziureti visus roles
            //trinti roles
            //redaguoti roles
            //perziureti roles
        //teises
             //perziureti visus roles
            //trinti roles
            //redaguoti roles
            //perziureti roles

       // '(modelio vardas)-('ka gali daryt')'

         $permissions = [
            'user-view',
            'user-create',
            'user-edit',
            'user-delete',
            'role-view',
            'role-create',
            'role-edit',
            'role-delete',
            'permission-view',
            'permission-create',
            'permission-edit',
            'permission-delete',
         ];   

         foreach($permissions as $permision) {
             Permission::create(['name' => $permision]);
         }

    } 
}
