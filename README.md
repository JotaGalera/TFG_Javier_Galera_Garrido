# TFG: Sistema de Cartelería Digital

[![Build Status](https://travis-ci.com/JotaGalera/TFG_Javier_Galera_Garrido.svg?branch=master)](https://travis-ci.com/JotaGalera/TFG_Javier_Galera_Garrido)

## El problema:

Se quiere producir un sistema que pueda gestionar una reserva de espacios.

Reserva de espacio: Un usuario del sistema, podrá hacer reservas de "espacios"(aulas,despachos,...), junto con artículos que ofrece el sistema, que sean adecuados para dicho espacio. Los artículos varían en función de la ubicación en la que se encuentre nuestro usuario. Y podrán o no estar disponibles según la ubicación en la que se encuentre.

El sistema gestionará los precios y la factuación del alquiler de dichos espacios. Facilitando el uso de usuarios y
administradores.

## ¿En qué consiste?

El proyecto será abordado como el núcleo de un producto futuro. El sistema que se propone permitirá la gestión de los diferentes ___Espacios___ que pertenecen a una ___Ubicación___. La idea principal consta de una relación entre un ___Inventario___, el cual podrá ser creado, modificado o eliminado por los administradores de cada ___Ubicación___.

Para la gestión del inventario habrá dos formas de ubicarlo:
    1. Asignarlo a una ___Ubicación___. De esta forma podremos ir moviendolo según el ___Espacio___ que lo requiera.
    2. Asignarlo a un ___Espacio___ dentro de la ___Ubicación___. Debido a que es posible que dicho inventario no se quiera o pueda mover de un ___Espacio___ a otro, como puede ser un aire acondicionado o una pantalla de televisión sujeta a una pared.
    
Los clientes que utilicen el sistema podrán elegir el ___Espacio___ de la ___Ubicación___ que quieran "alquilar". Una vez seleccionado el ___Espacio___ se les permitirá gestionar el ___Inventario___ que necesiten para su propósito y del que disponga dicho ___Espacio___ y/o ___Ubicación___. Al acabar la operación se les generará una factura automáticamente la cual deberá ser abonada de la forma que prefiera el ___Centro___(Ubicación).


El sistema cuenta con 2 interfaces:

- Para los clientes: permitirá ver los distintos ___Espacios___ e ___Inventario___ de los que se disponen, así como la acción de alquiler de este.  
- Para los administradores: en la que se podrán configurar los ___Espacios___ ,___Ubicaciones___ , ___Inventarios___ , ___Usuarios del sistema___, ___factuacion___, ___alquileres___, etc.

La comunicación de la Interfaz del cliente y el resto del sistema será mediante una API, la cual ofrecerá los distintos servicios que se requieran para posibilitar sus funcionalidades principales y secundarias.

## Aspectos técnicos:

Las diferentes tecnologías que se utilizarán en este proyecto serán:

- Laravel, un Framework de PHP, ágil de utilizar y cómodo para mantener el Modelo Vista Controlador a la hora de desarrollar el sistema.
- Eloquent, el ORM que se proporciona junto con Laravel, ofrece una forma sencilla y directa de trabajar con las Entidades de la Base de Datos.
- La base de datos a utilizar será MySQL, utilizaremos una base de datos relacional, la base de datos será el pilar de nuestra aplicación,y el modelo relacional nos aportará atomicidad, consistencia, aislamiento y durabilidad.

## Tipos de usuarios:

Para abordar el proyecto se definirán unos roles, a los cuales se les adjudicarán ciertas funcionalidades. Hablamos de un sistema complejo y basaremos varios roles en el tema de la administración de este. Los principales papeles de los usuarios serán:

    - Administradores
    - Clientes

#### Administrador.

Destinado a la modularización de los servicios ofrecidos, está pensado para facilitar la asignación de distintas tareas sobre el sistema.

Serán los encargados del sistema, pudiendo crear espacios, ubicaciones, usuarios, actualizar o crear el mapa de habitaciones y gestionar las tarifas aplicadas a los distintos clientes .

#### Empresa/Cliente.

Cuentas de usuarios del sistema, que se benefician de los servicios que este ofrece.

Existirán distintos tipos de clientes con distintas tarifas aplicables sobre ellos. Por ejemplo: un profesor de la UGR, necesita un aula para dar una charla sobre TDD a sus alumnos, dicho profesor podrá alquilar un aula del centro de forma gratuita y beneficiarse de los diferentes artículos que la sala presente. Mientras que por otro lado, una empresa externa quiere realizar una reunión en una sala, ya que no cuentan con espacio suficiente para poder realizarla en su empresa, a dicha empresa se le puede aplicar un cargo por el alquiler del espacio y los articulos que necesiten para realizar la reunión.


##### Autor: Javier Galera Garrido
##### Tutorizado: J.J. Merelo
##### Empresa: ATISoluciones