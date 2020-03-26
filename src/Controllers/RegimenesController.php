<?php

namespace Mercosur\Regimenes\Controllers;

use App\Http\Controllers\Controller;
use Mercosur\Regimenes\Models\Regimenes\Regimen;

class RegimenesController extends Controller
{
	public function index()
	{
		return view('regimenes::reo')
			->withRegimenes(Regimen::all());
	}
}
