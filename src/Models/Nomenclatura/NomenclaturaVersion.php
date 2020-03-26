<?php

namespace App\Models\Nomenclatura;

use Illuminate\Database\Eloquent\Model;

class NomenclaturaVersion extends Model
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
    protected $table = 'nomenclatura_versiones';

    public function scopeUltimaVersionPrimero($query)
    {
        return $query->orderBy('version', "DESC");
    }
}
