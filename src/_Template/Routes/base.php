<?php

	Route::get('/%UnitHint%', '%UnitName%Controller@index')
		->name('%UnitHint%.index');

	Route::match(['get', 'post'], '/%UnitHint%/all', '%UnitName%Controller@all')
					->name('%UnitHint%.all')
					->middleware('UserActivity');	

	Route::get('/%UnitHint%/find/{id}', '%UnitName%Controller@find')
					->name('%UnitHint%.find')
					->middleware('UserActivity');

	Route::post('/%UnitHint%/store', '%UnitName%Controller@store')
	->name('%UnitHint%.store')
		->middleware('UserActivity');	
	
	Route::post('/%UnitHint%/update/{id}', '%UnitName%Controller@update')
		->name('%UnitHint%.update')
			->middleware('UserActivity');	
	
	Route::get('/%UnitHint%/destroy/{id}', '%UnitName%Controller@destroy')
		->name('%UnitHint%.destroy')
			->middleware('UserActivity');