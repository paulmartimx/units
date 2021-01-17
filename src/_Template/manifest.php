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


	"subscriptions" => [
		"title" => "Eventos de %UnitName%",

		"%UnitHint%.example" => "Example",		
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

		// "%UnitHint%" => [
		// 	"title" => "%UnitName%",
		// 	"requires" => "nav.%UnitHint%",
		// 	"items" => [
		// 		"__r" => "Consulta",
		// 		"__w" => "Creación",
		// 		"__u" => "Edición",
		// 		"__d" => "Eliminar",
		// 	]
		// ],

	]

];