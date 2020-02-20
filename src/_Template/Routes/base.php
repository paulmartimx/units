<?php

	Route::get('/%UnitHint%', '%UnitName%Controller@index')->name('%UnitHint%.index');
	Route::get('/%UnitHint%/create', '%UnitName%Controller@create')->name('%UnitHint%.create');
	Route::post('/%UnitHint%/store', '%UnitName%Controller@store')->name('%UnitHint%.store');
	Route::get('/%UnitHint%/edit/{id}', '%UnitName%Controller@edit')->name('%UnitHint%.edit');
	Route::post('/%UnitHint%/update/{id}', '%UnitName%Controller@update')->name('%UnitHint%.update');
	Route::get('/%UnitHint%/destroy/{id}', '%UnitName%Controller@destroy')->name('%UnitHint%.destroy');