<?php

return [

	"name" => "%UnitName%",
	"order" => 2,
	"hint" => "%UnitHint%",
	"prefix" => "%UnitPrefix%",
	"version" => "1.0.0",
	
	"composer" => [
		'intermediatica/units'
	],

	"aliases" => [
		// 'Example' => 'App\Units\%UnitName%\_Models\Example'
	],

	"providers" => [
		// 'App\Units\%UnitName%\Providers\Example'
	],	

	"commands" => [
		// 'Example' => 'App\Units\%UnitName%\Console\Example'
	],

	"middleware" => [
		// 'Example' => 'App\Units\%UnitName%\Middleware\Example'
	],

	"blade_components" => [
		// '%UnitHint%::components.example' => 'example'
	],

	"blade_aliases" => [
		// '%UnitHint%::example' => 'example'
	],


	"subscriptions" => [],

	"permissions" => [],

];