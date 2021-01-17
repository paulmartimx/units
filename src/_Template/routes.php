<?php

use Illuminate\Support\Facades\Route;

Route::prefix('api')
	->namespace('App\Units\%UnitName%\_Controllers')
		->middleware(['api', 'auth:sanctum'])->group(function() {

	include __DIR__ . '/Routes/base.php';

});