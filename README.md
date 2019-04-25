# TFG: Sistema de Cartelería Digital

## El problema:

Se quiere producir un sistema que pueda gestionar una reserva de espacios y que además pueda reproducir contenido multimedia en diferentes dispositivos.

___Reserva de espacio___: Un usuario del sistema, podrá hacer reservas de "espacios"(aulas,despachos,...), junto con artículos que ofrece el sistema, que sean adecuados para dicho espacio.
Los artículos varían en función de la ubicación en la que se encuentre nuestro usuario. Y podrán o no estar disponibles según la ubicación en la que se encuentre.

___Contenido multimedia___: Al sistema podrán conectarse diferentes dispositivos, para que estos puedan reproducir el contenido que el sistema les facilite.


## ¿En qué consiste?

En este proyecto se abordan diferentes objetivos, para ello se construirá un sistema central, el cual podrá evolucionar a partir de diferentes modulos. El sistema nace de la idea de los
S.O. microkernel, los cuales tienen un núcleo del sistema y el resto de programas se acoplan a él. Consiguiendo así un sistema robusto e independiente de futuras versiones. De esta manera
los futuros cambios surgidos en los módulos y/o en el sistema central , no repercutirá en el resto del sistema.

El nucleo de nuestro sistema será un poco mas grueso que la descripción como tal de un microkernel, este será la base centralizada de nuestro sistema y alojará las funciones presentadas anteriormente.

/******
El primer módulo que se le acoplará será "Cartelería Digital".

Trataremos de ofrecer un servicio en el cual podremos transmitir cierta información digital ( Videos o imágenes ) a distintos dispositivos (tablets,televisiones,...).

******/


Nuestro sistema cuenta con 2 interfaces, una de ellas para el usuario y otra para gestionar a este.

En la primera, (DESCRIPCION: GESTION MULTIMEDIA Y RESERVA DE ESPACIOS.)

En la segunda, (DESCRIPCION: GESTION DEL SISTEMA.)

La comunicación entre los dispositivos , la página y la BBDD será via API.  

Las diferentes tecnologías que se utilizarán en este proyecto serán:

	- Laravel, un Framework de PHP, ágil de utilizar y cómodo para mantener el Model Vista Controlador a la hora de desarrollar el sistema.
	- Eloquent, el ORM que proporciona junto con Laravel proporciona una forma sencilla y manejable de trabajar con la Base de Datos.
	- La base de datos a utilizar será MySQL, utilizaremos una base de datos relacional, la base de datos será el pilar de nuestra aplicación,
	  y el modelo relacional nos aportará atomicidad, consistencia, ailamiento y durabilidad. 

## Tipos de usuarios:

Para abordar el proyecto se definirán unos roles, a los cuales se les adjudicarán ciertas funcionalidades. 
Hablamos de un sistema complejo y basaremos varios roles en el tema de la administración de este. Los principales papeles de los usuarios serán:

	- Unidad de Mantenimiento.
	- Administrador del sistema.
	- Administrador.
	- Empresa.


#### Unidad de mantenimiento.

Este rol , va enfocado a la empresa productora de la aplicación, tiene acceso interno a esta, y podrá trabajar sobre futuras actualizaciones sobre el sistema, pudiendo así
modificar a este añadiendole nuevos modulos.

(DESCRIPCIÓN FUNCIONES OFRECIDAS)

#### Administrador del sistema.

Roles destinados a las Gestiones del sistema a un nivel global.

(DESCRIPCION FUNCIONES OFRECIDAS)




##### Autor: Javier Galera Garrido
##### Tutorizado: J.J. Merelo
##### Empresa: ATISoluciones
