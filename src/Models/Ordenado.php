<?php

namespace Mercosur\Ordenado\Models;

use Illuminate\Support\Facades\Facade;

class Ordenado
{
	public function Origen()
	{
		return Texto::where('referencia', 'ROM')->first();
	}

	public function Rei()
	{
		return Texto::where('referencia', 'REI')->first();
	}
}