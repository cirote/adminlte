<?php

namespace App\Models\Nomenclatura;

use Illuminate\Database\Eloquent\Model;

class NomenclaturaItemAec extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysqlNomenclaturas';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nomenclatura_item_aec';
}
