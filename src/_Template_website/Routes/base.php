<?php

	use Illuminate\Support\Facades\Route;

	Route::get('/', '%UnitName%Controller@index')->name('%UnitHint%.index');
	Route::get('/nosotros', '%UnitName%Controller@nosotros')->name('%UnitHint%.nosotros');
	Route::get('/contacto', '%UnitName%Controller@contacto')->name('%UnitHint%.contacto');
