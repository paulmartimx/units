<?php

	use Illuminate\Support\Facades\Route;

// /api/%UnitHint%/*
Route::prefix('%UnitHint%')->group(function() {

	Route::get('/', '%UnitName%Controller@index')
		->name('%UnitHint%.index');

	Route::match(['get', 'post'], '/all', '%UnitName%Controller@all')
					->name('%UnitHint%.all')
					->middleware('UserActivity');	

	Route::match(['get', 'post'], '/find/{id}', '%UnitName%Controller@find')
					->name('%UnitHint%.find')
					->middleware('UserActivity');

	Route::post('/store', '%UnitName%Controller@store')
	->name('%UnitHint%.store')
		->middleware('UserActivity');	
	
	Route::post('/update/{id}', '%UnitName%Controller@update')
		->name('%UnitHint%.update')
			->middleware('UserActivity');	
	
	Route::get('/destroy/{id}', '%UnitName%Controller@destroy')
		->name('%UnitHint%.destroy')
			->middleware('UserActivity');

});
