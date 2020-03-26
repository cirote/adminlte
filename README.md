## Regimenes Especiales de Importacion

Proyecto para la creacion de una base de datos con la informacion proporcionada por los Estados Parte del MERCOSUR sobre composicion y utilizacion de los Regimenes Especiales de Importacion.

### Instalacion

Instalar el paquete utilizando [Composer](http://getcomposer.org/). 

Escriba el siguiente comando en la terminal:

    composer require mercosur/regimenes

Realice las migraciones

    php artisan migrate

### Agregar datos a la base

Cargar los datos sobre los regimenes especiales disponibles

    php artisan populate:regimenes