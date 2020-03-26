<?php

namespace Mercosur\Regimenes\Facades;

use Illuminate\Support\Facades\Facade;

class Regimenes extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'regimenes';
	}
}