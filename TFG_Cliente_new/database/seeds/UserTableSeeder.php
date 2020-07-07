<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use Caffeinated\Shinobi\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permisos
        Role::create([
            'id' => 1,
            'name' => 'Unidad Mantenimiento',
            'slug' => 'mantenimiento',
            'special' => 'all-access'
        ]);
        //Permisos
        Role::create([
            'id' => 2,
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        //Permisos
        Role::create([
            'id' => 3,
            'name' => 'Administración',
            'slug' => 'administracion',
        ]);
        //Permisos
        Role::create([
            'id' => 4,
            'name' => 'Gestor de Incidencias',
            'slug' => 'gestor_incidencias',
        ]);
        //Permisos
        \App\PermissionRole::create([
            'permission_id' => '12',
            'role_id' => '2',
        ]);
        \App\PermissionRole::create([
            'permission_id' => '13',
            'role_id' => '2',
        ]);
        //Permisos
        \App\PermissionRole::create([
            'permission_id' => '2',
            'role_id' => '3',
        ]);
        \App\PermissionRole::create([
            'permission_id' => '3',
            'role_id' => '3',
        ]);
        \App\PermissionRole::create([
            'permission_id' => '4',
            'role_id' => '3',
        ]);
        \App\PermissionRole::create([
            'permission_id' => '5',
            'role_id' => '3',
        ]);
        \App\PermissionRole::create([
            'permission_id' => '6',
            'role_id' => '3',
        ]);
        \App\PermissionRole::create([
            'permission_id' => '7',
            'role_id' => '3',
        ]);
        \App\PermissionRole::create([
            'permission_id' => '8',
            'role_id' => '3',
        ]);
        \App\PermissionRole::create([
            'permission_id' => '9',
            'role_id' => '3',
        ]);
        \App\PermissionRole::create([
            'permission_id' => '10',
            'role_id' => '3',
        ]);
        \App\PermissionRole::create([
            'permission_id' => '11',
            'role_id' => '3',
        ]);
        \App\PermissionRole::create([
            'permission_id' => '12',
            'role_id' => '3',
        ]);
        \App\PermissionRole::create([
            'permission_id' => '12',
            'role_id' => '4',
        ]);
        \App\PermissionRole::create([
            'permission_id' => '13',
            'role_id' => '4',
        ]);
        //Usuarios por defecto del sistema con acceso total
        \App\User::create([
            'name' => 'Javier Galera',
            'user' => 'jgalera',
            'email' => 'javigalera94@gmail.com  ',
            'password' => bcrypt('jgalera'),
            'rfid_tag' => 'D3C0B9B4',
            'pin' => '1234',
        ])->roles()->attach(1);
    }
}
