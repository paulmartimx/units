<?php

use Illuminate\Support\Facades\Route;

Route::prefix('%UnitPrefix%')
	->namespace('App\Units\%UnitName%\_Controllers')
	->middleware(['web'])->group(function () {

		include __DIR__ . '/Routes/base.php';
		
	});
