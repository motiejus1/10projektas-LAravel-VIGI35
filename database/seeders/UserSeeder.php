<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Permission;;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Superadministratorius',
            'email' => 'superadmin@localhost.lt',
            'password' => Hash::make('password')
        ]);

        $role = Role::find(1);

        $permission = Permission::pluck('id', 'id')->all();// sudeti teises ir roles i rysio lentele
        $role->syncPermissions($permission);
        $user->assignRole([$role->id]);
        
        //prie roles supedadmin priskirti visas teises
        //role priskirti sio konkretaus vartotojo

        // Slaptazodzio simboliu kiekis 8
        // bent 1 didzioji raide
        //bent skaicius
        //specialus simbolis ,

        //TOP 1000 slaptazodziu sarasa
    }
}
