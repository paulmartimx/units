<?php

Route::prefix(_setting('admin_prefix'))->namespace('App\Units\%UnitName%\_Controllers')->middleware(['web', 'auth'])->group(function() {

	include __DIR__ . '/Routes/base.php';	

});