#ERP ATIS

#### Comandos para el despliegue a producción
##### Deploy realizado con el componente https://github.com/lorisleiva/laravel-deployer

Para realizar el deploy en el servidor principal, ejecutar la siguientes ordenes:

Dentro del servidor de GIT abrir tunel temporal, por favor cierre al salir que se escapa el gato.

~~~~
ssh -R 8080:localhost:80 -p 22022 pruebas@atisoluciones.com -N
~~~~

Guardar los cambios en el proyecto y subir a GIT

~~~~
git add .
git commit -m "Nombre del commit"
git push -u origin master
~~~~

Ejecutar el deploy dentro de la carpeta del proyecto
~~~~
php artisan deploy
~~~~

> Nota: "No incluye la ejecución de las migraciones, estas hay que hacerlas manuales en el servidor de producción."

Módulos
----------------------------

- Módulo de usuarios.
- Módulo de RRHH y Personal.
- Módulo de Clientes.
- Módulo de Contactos.
- Módulo de Albaranes.
- Módulo de Articulos.
- Módulo de Proveedores.
- Módulo de Configuraciones.
- Módulo de Proyectos.
- Módulo de Incidencias.
- Módulo de Actuaciones.

Gestión
-----------------------------

- Gestión de usuarios con Shinobi.
- Creación de APIRest con Passport y permisos.
- Exportación de parte electrónico en PDF con phantommagick.
- Configuración de APIRest para conexión de módulo externo modERP y APP Android.