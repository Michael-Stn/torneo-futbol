Torneo de Fútbol v2.0
=====================

Este proyecto es para visualizar información
referente a un torneo de fútbol.
(Equipos, Jugadores, Calendario, Resultados, etc.)

> Está basado en:
> https://github.com/jorzarate/torneodefutbol

Puesta en marcha
================

#### Plataformas recomendadas
* PHP +7.3
* MySQL +8

#### Dependencias utilizadas
* JQuery 3.6.0

***

### 1. Importar la base de datos

Para obtener la estructura de la base datos
que utiliza el proyecto, debes dirigirte a la
carpeta **/setup** y ejecutar el script
**database.sql** en tu Host de base datos propio.

***
Ten en cuenta que ese Script te importa la base
de datos sin información.
Puedes ingresar posteriormente la información
por medio del SGBD.

- *En el Script **/setup/data_sample.sql** se
puede encontrar información de ejemplo.*
***

### 2. Configurar el entorno de ejecución

Dentro de la carpeta **/config** se puede
observar un archivo **env.sample.php**, este
archivo solo contiene una estructura de
ejemplo con las configuraciones. Debes copiarlo
dentro de la misma carpeta pero con el nombre
**env.php**.

Una vez tengas ese nuevo archivo, tienes que
modificar los valores de las variables que tenga,
con los que se adecuen a tu caso. Como serían
las indicaciones para conectarse a la base de datos.

### 3. Acceder al sitio web

Con las configuraciones realizadas, y teniendo
los archivos del proyecto dentro de algún servidor
web de preferencia
(*se recomienda Apache HTTP Server*), puedes
ingresar a tu navegar favorito y en la URL apuntar
al directorio raíz del proyecto, el archivo
**index.php** tomará el control de todo.
