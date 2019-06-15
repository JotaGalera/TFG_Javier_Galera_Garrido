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
            'name'     => 'Francisco Chica',
            'user'     => 'fchica',
            'email'    => 'fchica@atisoluciones.com',
            'password' => bcrypt('machote'),
            'rfid_tag' => '8AF22EBF',
            'pin' => '1234',
        ])->roles()->attach(1);
        \App\User::create([
            'name' => 'Jose Ignacio Carvajal',
            'user' => 'jcarvajal',
            'email' => 'jcarvajal@atisoluciones.com',
            'password' => bcrypt('jcarvajal'),
            'rfid_tag' => '15E7161D',
            'pin' => '1234',
        ])->roles()->attach(1);
        \App\User::create([
            'name' => 'Tomas Rodriguez',
            'user' => 'jtrodriguez',
            'email' => 'jtrodrigez@atisoluciones.com',
            'password' => bcrypt('jtrodriguez'),
            'rfid_tag' => '058F2E1D',
            'pin' => '1234',
        ])->roles()->attach(1);
        \App\User::create([
            'name' => 'Ivan Fernandez',
            'user' => 'ifernandez',
            'email' => 'ifernandez@atisoluciones.com',
            'password' => bcrypt('ifernandez'),
            'rfid_tag' => 'B330A9B3',
            'pin' => '1234',
        ])->roles()->attach(1);
        \App\User::create([
            'name' => 'Juan Galvez',
            'user' => 'jgalvez',
            'email' => 'jgalvez@atisoluciones.com',
            'password' => bcrypt('jgalvez'),
            'rfid_tag' => '9334BBB4',
            'pin' => '1234',
        ])->roles()->attach(1);
        \App\User::create([
            'name' => 'Alejandro Rubia',
            'user' => 'arubia',
            'email' => 'arubia@atisoluciones.com',
            'password' => bcrypt('arubia'),
            'rfid_tag' => '63E4BAB4',
            'pin' => '1234',
        ])->roles()->attach(1);
        \App\User::create([
            'name' => 'Raúl Serrano',
            'user' => 'rserrano',
            'email' => 'rserrano@atisoluciones.com',
            'password' => bcrypt('rserrano'),
            'rfid_tag' => '7416D251',
            'pin' => '1234',
        ])->roles()->attach(1);
        \App\User::create([
            'name' => 'Javier Galera',
            'user' => 'jgalera',
            'email' => 'javigalera94@gmail.com  ',
            'password' => bcrypt('jgalera'),
            'rfid_tag' => 'D3C0B9B4',
            'pin' => '1234',
        ])->roles()->attach(1);
        \App\User::create([
            'name' => 'Carlos Martinez',
            'user' => 'cmartinez',
            'email' => 'cmartinez@atisoluciones.com',
            'password' => bcrypt('cmartinez'),
            'rfid_tag' => '935222A6',
            'pin' => '1234',
        ])->roles()->attach(1);
    }
}
