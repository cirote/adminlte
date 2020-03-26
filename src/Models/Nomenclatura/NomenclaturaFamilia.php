<?php

namespace App\Models\Nomenclatura;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class NomenclaturaFamilia extends Model
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
    protected $table = 'nomenclatura_familias';

    public $translatable = ['nombre_corto', 'nombre_largo'];

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        $attributes = parent::toArray();

        foreach ($this->getTranslatableAttributes() as $name) {
            $attributes[$name] = $this->getTranslation($name, app()->getLocale());
        }

        return $attributes;
    }
}
