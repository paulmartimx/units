<?php

return [

	"name" => "%UnitName%",
	"order" => 2,
	"hint" => "%UnitHint%",
	"prefix" => null,
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

	"permissions" => [
		
		"title" => "Configurar %UnitName%",

		"nav" => [
			"title" => "%UnitName%",
			"requires" => null,
			"items" => [
				"%UnitHint%" => "Acceso a %UnitName%"				
			]
		],

		"%UnitHint%" => [
			"title" => "Áreas",
			"requires" => "nav.%UnitHint%",
			"items" => [
				"example" => "Acceso a Example",
			]
		],

		// "example" => [
		// 	"title" => "Example",
		// 	"requires" => "%UnitHint%.example",
		// 	"items" => [
		// 		"__r" => "Consulta",
		// 		"__w" => "Creación",
		// 		"__u" => "Edición",
		// 		"__d" => "Eliminar",
		// 	]
		// ],

	]

];