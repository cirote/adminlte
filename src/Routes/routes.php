<?php

//Route::middleware(['web', 'auth'])->namespace('Mercosur\Regimenes\Controllers')->group(function()

Route::middleware(['web'])->namespace('Mercosur\Regimenes\Controllers')
	->prefix('regimenes')
	->name('regimenes.')
	->group(function() 
	{
		Route::get('/', 'RegimenesController@index')->name('index');

		Route::get('/{regimen}/composicion', 'RegimenesController@composicion')->name('composicion');

		Route::get('/lista/{lista}/nota', 'RegimenesController@lista_nota')->name('lista.nota');
		Route::get('/lista/{lista}/tabla', 'RegimenesController@lista_tabla')->name('lista.tabla');
	});
