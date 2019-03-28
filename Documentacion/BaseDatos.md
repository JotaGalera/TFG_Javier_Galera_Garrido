# Documentación Base de Datos

### Ideas Iniciales

Respecto a la gestión de multimedia, la base de datos partirá de dos tablas: "Dispositivos" y "Contenido".

La tabla "Contenido" contendrá una clasificación de archivos multimedia, de tal forma, que si en un futuro, 
queremos añadir alguna otra clasificación, no afectará a la integridad de nuestro sistema. Principalmente, 
partiremos de dos tipos de archivos: "Estáticos" (fotos, textos, etc) y "Dinámicos" (Videos).

Estas clasificaciones tendrán sus propias tablas, como entidades de nuestro sistema.

La tabla "Dispositivo" será la encargada de mantener la información de los distintos dispositivos a los que 
les enviaremos nuestra información.

En nuestro sistema contemplaremos también a los usuarios y los distintos permisos que estos tendrán. Como 
consecuencia ambos serán entidades de nuestro sistema y contarán con sus propias tablas.
