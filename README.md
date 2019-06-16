# TFG: Sistema de Cartelería Digital

[![Build Status](https://travis-ci.com/JotaGalera/TFG_Javier_Galera_Garrido.svg?branch=master)](https://travis-ci.com/JotaGalera/TFG_Javier_Galera_Garrido)

## El problema:

Se quiere producir un sistema que pueda gestionar una reserva de espacios.

Reserva de espacio: Un usuario del sistema, podrá hacer reservas de "espacios"(aulas,despachos,...), junto con artículos que ofrece el sistema, que sean adecuados para dicho espacio. Los artículos varían en función de la ubicación en la que se encuentre nuestro usuario. Y podrán o no estar disponibles según la ubicación en la que se encuentre.

El sistema gestionará los precios y la factuación del alquiler de dichos espacios. Facilitando el uso de usuarios y
administradores.

## ¿En qué consiste?

El proyecto será abordado como el núcleo de un producto futuro. El sistema que se propone permitirá la gestión de los diferentes ___Espacios___ que pertenecen a una ___Ubicación___. Con la posibilidad de poder reunir dichas ubicaciones como ___Campus___. La idea principal consta de una relación entre un ___Inventario___, el cual podrá ser creado, modificado o eliminado por los administradores de cada ___Ubicación___ o incluso ___Campus___, y una ___Ubicación___.
Para la gestión del inventario habrá dos formas de ubicarlo: 
    1. Asignarlo a un ___Espacio___ dentro de la ___Ubicación___. Debido a que es posible que dicho inventario no se quiera o pueda mover de un ___Espacio___ en concreto, como puede ser un aire acondicionado o una pantalla de televisión sujeta a una pared.
    2. Asignarlo a una ___Ubicación___. De esta forma podremos ir moviendolo según el ___Espacio___ que lo requiera.

Los clientes que utilicen el sistema podrán elegir los ___Espacios___ de la ___Ubicación___ que quiera "alquilar". Una vez seleccionado el ___Espacio___ se les permitirá gestionar el ___Inventario___ que necesiten para su propósito y del que disponga dicho ___Espacio___ y/o ___Ubicación___. Al acabar la operación se les generará una factura automáticamente la cual deberá ser abonada de la forma que prefiera el ___Centro___.


El sistema cuenta con 2 interfaces:

- Para los clientes: permitirá ver los distintos ___Espacios___ e ___Inventario___ de los que se disponen, así como la gestión del alquiler de este.  
- Para la gestion del sistema: en la que se podrán configurar los ___Espacios___ ,___Ubicaciones___ , ___Inventarios___ , ___Usuarios del sistema___, etc.

La comunicación de la Interfaz del cliente y el resto del sistema será mediante una API REST, la cual le ofrecerá los distintos servicios que se requieran para posibilitar sus funcionalidades principales y secundarias.

## Aspectos técnicos:

Las diferentes tecnologías que se utilizarán en este proyecto serán:

- Laravel, un Framework de PHP, ágil de utilizar y cómodo para mantener el Modelo Vista Controlador a la hora de desarrollar el sistema.
- Eloquent, el ORM que se proporciona junto con Laravel, ofrece una forma sencilla y directa de trabajar con la Base de Datos.
- La base de datos a utilizar será MySQL, utilizaremos una base de datos relacional, la base de datos será el pilar de nuestra aplicación,y el modelo relacional nos aportará atomicidad, consistencia, aislamiento y durabilidad.

## Tipos de usuarios:

Para abordar el proyecto se definirán unos roles, a los cuales se les adjudicarán ciertas funcionalidades. Hablamos de un sistema complejo y basaremos varios roles en el tema de la administración de este. Los principales papeles de los usuarios serán:

    - Unidad de Mantenimiento.
    - Administrador del sistema.
    - Administrador.
    - Empresa.

#### Unidad de mantenimiento.

Este rol , va enfocado a la empresa productora de la aplicación, tiene acceso interno a esta, y podrá trabajar sobre futuras actualizaciones sobre el sistema, pudiendo así modificar a este añadiendole nuevos modulos.

(DESCRIPCIÓN FUNCIONES OFRECIDAS)

#### Administrador del sistema.

Roles destinados a las Gestiones del sistema a un nivel global.

(DESCRIPCION FUNCIONES OFRECIDAS)

#### Administrador.

Destinado a la modularización de los servicios ofrecidos, está pensado para facilitar la asignación de distintas tareas sobre el sistema.

(DESCRIPCION FUNCIONES OFRECIDAS)

#### Empresa/Cliente.

Cuentas de usuarios del sistema, que se benefician de los servicios que este ofrece.

(DESCRIPCION FUNCIONES OFRECIDAS)

##### Autor: Javier Galera Garrido
##### Tutorizado: J.J. Merelo
##### Empresa: ATISoluciones