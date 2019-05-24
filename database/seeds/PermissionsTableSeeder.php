<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Permisos
        Permission::create([
            'name' => 'Sección Usuarios',
            'slug' => 'user.index',
            'description' => 'Acceso a la sección usuarios'
        ]);
        Permission::create([
            'name' => 'Sección Personal',
            'slug' => 'personal.index',
            'description' => 'Acceso a la sección personal'
        ]);
        Permission::create([
            'name' => 'Sección Clientes',
            'slug' => 'cliente.index',
            'description' => 'Acceso a la sección clientes'
        ]);
        //Roles
        Permission::create([
            'name' => 'Sección Contactos',
            'slug' => 'contacto.index',
            'description' => 'Acceso a la sección contacto'
        ]);
        Permission::create([
            'name' => 'Sección GIS',
            'slug' => 'gis.index',
            'description' => 'Acceso a la sección GIS'
        ]);
        Permission::create([
            'name' => 'Sección Albaranes',
            'slug' => 'albaran.index',
            'description' => 'Acceso a la sección Albarán'
        ]);
        Permission::create([
            'name' => 'Sección Articulos',
            'slug' => 'articulo.index',
            'description' => 'Acceso a la sección articulos'
        ]);
        Permission::create([
            'name' => 'Sección Proveedores',
            'slug' => 'proveedor.index',
            'description' => 'Acceso a la sección proveedor'
        ]);
        Permission::create([
            'name' => 'Sección Configuraciónes',
            'slug' => 'config.index',
            'description' => 'Acceso a las configuraciónes generales'
        ]);
        Permission::create([
            'name' => 'Sección Proyecto',
            'slug' => 'proyecto.index',
            'description' => 'Acceso a los proyectos'
        ]);
        Permission::create([
            'name' => 'Sección Sistemas',
            'slug' => 'sistema.index',
            'description' => 'Acceso a los sistemas'
        ]);
        Permission::create([
            'name' => 'Sección Incidencias',
            'slug' => 'incidencia.index',
            'description' => 'Acceso a las incidencias'
        ]);
        Permission::create([
            'name' => 'Sección Actuaciones',
            'slug' => 'actuacion.index',
            'description' => 'Acceso a las actuaciones'
        ]);
    }
}
