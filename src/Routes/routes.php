<?php

//Route::middleware(['web', 'auth'])->namespace('Mercosur\Regimenes\Controllers')->group(function()

Route::middleware(['web'])->namespace('Mercosur\Regimenes\Controllers')
	->prefix('regimenes')
	->name('regimenes.')
	->group(function() {
		Route::get('/', 'RegimenesController@index')->name('index');
	});
