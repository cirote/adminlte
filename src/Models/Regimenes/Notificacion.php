<?php

namespace Mercosur\Regimenes\Models\Regimenes;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Mercosur\Regimenes\Config\Regimenes;

class Notificaciones extends Model
{
	use HasTranslations;

	protected $table = Regimenes::PREFIJO . Regimenes::REGIMENES;

	public $translatable = ['nombre'];

	public static function byAbreviatura($abreviatura)
	{
		return static::where('abreviatura', $abreviatura)->first();
	}
}
