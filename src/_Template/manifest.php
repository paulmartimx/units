<?php

return [

	"name" => "%UnitName%",
	"order" => 1,
	"hint" => "%UnitHint%",
	"prefix" => null,
	"version" => "1.0.0",
	
	"composer" => [
		'intermediatica/units'
	],

	"aliases" => [
		// 'Example' => 'Units\%UnitName%\_Models\Example'
	],

	"providers" => [
		// 'Units\%UnitName%\Providers\Example'
	],	

	"commands" => [
		// 'Example' => 'Units\%UnitName%\Commands\Example'
	],

	"middleware" => [
		// 'Example' => 'Units\%UnitName%\Middleware\Example'
	],

	"blade_components" => [
		// '%UnitHint%::components.example' => 'example'
	],

	"blade_aliases" => [
		// '%UnitHint%::example' => 'example'
	]

];