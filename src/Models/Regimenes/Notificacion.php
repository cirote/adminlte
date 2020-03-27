<?php

namespace Mercosur\Regimenes\Models\Regimenes;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Mercosur\Regimenes\Config\Regimenes;

class Notificacion extends Model
{
	use HasTranslations;

	protected $table = Regimenes::PREFIJO . Regimenes::NOTIFICACIONES;

	public $translatable = ['asunto'];

	protected $guarded = [];

	protected $dates = ['fecha', 'created_at', 'updated_at'];

	public function listas()
	{
		return $this->hasMany(Lista::class, 'notificacion_id');
	}
}
