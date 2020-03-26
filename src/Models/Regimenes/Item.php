<?php

namespace Mercosur\Regimenes\Models\Regimenes;

use Illuminate\Database\Eloquent\Model;
use Mercosur\Regimenes\Config\Regimenes;

class Item extends Model
{
	protected $table = Regimenes::PREFIJO . Regimenes::ITEMS;

	protected $fillable = ['codigo', 'arancel', 'observaciones'];

	public function observaciones()
	{
		return $this->hasMany(Observacion::class);
	}
}
