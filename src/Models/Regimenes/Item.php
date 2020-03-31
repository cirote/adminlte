<?php

namespace Mercosur\Regimenes\Models\Regimenes;

use Illuminate\Database\Eloquent\Model;
use Mercosur\Regimenes\Config\Regimenes;

class Item extends Model
{
	protected $table = Regimenes::PREFIJO . Regimenes::ITEMS;

	protected $guarded = [];

	protected $dates = ['inclusion', 'finalizacion', 'created_at', 'updated_at'];

	public function observaciones()
	{
		return $this->hasMany(Observacion::class);
	}

	public function getCodigoFormateadoAttribute()
	{
		return substr($this->codigo, 0, 4) . '.' . substr($this->codigo, 4, 2) . '.' . substr($this->codigo, 6, 2);
	}	
}
