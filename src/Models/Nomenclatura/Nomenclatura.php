<?php

namespace App\Models\Nomenclatura;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Nomenclatura extends Model
{
    use HasTranslations;

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
    protected $table = 'nomenclaturas';

    public $translatable = ['nombre_corto', 'nombre_largo'];

	public static function bySigla($sigla)
	{
		return static::where('sigla', strtoupper($sigla))->first();
	}

	public function versiones()
	{
		return $this->hasMany(NomenclaturaVersion::class);
	}
}
