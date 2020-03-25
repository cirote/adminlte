<?php

namespace Mercosur\Regimenes\Controllers;

use App\Http\Controllers\Controller;

class RegimenesController extends Controller
{
	public function index()
	{
		dd('Hola');
		return view('ordenado::index');
	}
}
