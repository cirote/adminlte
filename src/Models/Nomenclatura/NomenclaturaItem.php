<?php

namespace App\Models\Nomenclatura;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class NomenclaturaItem extends Model
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
    protected $table = 'nomenclatura_items';

    public $translatable = ['descripcion'];

    protected $appends = ['codigoConFormato'];

    public function nomenclaturaVersion()
    {
        return $this->belongsTo('App\Models\Nomenclatura\NomenclaturaVersion');
    }

    public function nomenclaturaFamilia()
    {
        return $this->belongsTo('App\Models\Nomenclatura\NomenclaturaFamilia');
    }

    public function aec()
    {
        return $this->hasMany('App\Models\Nomenclatura\NomenclaturaItemAec', 'nomenclatura_item_id');
    }

    public function dictamenes()
    {
        return $this->hasMany('App\Models\Dictamen\Dictamen', 'ncm_completo', 'codigo_completo');
    }

    public function getCodigoConFormatoAttribute()
    {
        switch(strlen($this->codigo)){
            case 5:
            case 6:
                return substr($this->codigo, 0, 4) . '.' . substr($this->codigo, 4, 2);
            break;
            case 7:
            case 8:
                return substr($this->codigo, 0, 4) . '.' . substr($this->codigo, 4, 2) . '.' . substr($this->codigo, 6, 2);
            break;
            default:
                return $this->codigo;
        }
    }

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
