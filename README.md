## Regimenes Especiales de Importacion

Proyecto para la creacion de una base de datos con la informacion proporcionada por los Estados Parte del MERCOSUR sobre composicion y utilizacion de los Regimenes Especiales de Importacion.

### Instalacion

Via [Composer](http://getcomposer.org/). 

``` bash
$ composer require mercosur/regimenes
```

Realice las migraciones

``` bash
$ php artisan migrate
```

### Agregar datos a la base

Cargar los datos sobre los regimenes especiales disponibles

``` bash
$ php artisan populate:regimenes
```

Cargar las notificaciones de los Estados Parte

``` bash
$ php artisan populate:notificaciones
```

## Credits

- [Esteban Rogel][link-author]
- [All Contributors][link-contributors]

[link-author]: https://github.com/mercosur
[link-contributors]: ../../contributors]