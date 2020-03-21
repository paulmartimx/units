<?php

Route::prefix(_setting('admin_prefix'))->namespace('App\Units\%UnitName%\_Controllers')->middleware(['web', 'auth'])->group(function() {

	include __DIR__ . '/Routes/base.php';
	
	/** Preferencias de Módulo (manejado en Tools) **/
	Route::view('/%UnitHint%/settings', '%UnitHint%::settings')->name('%UnitHint%.settings');

});