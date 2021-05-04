<?php

$%UnitHint% = [

	"selector" => "%UnitHint%",
	"icon" => "",
	"label" => "%UnitName%",
	"title" => "%UnitName%",
	"link" => route('%UnitHint%.index'),

	"submenus" => []

];

// if(user()->perm('%UnitHint%.example'))
// 	$%UnitHint%["submenus"][] = [
// 			"selector" => "example",
// 			"icon" => "fas fa-asterisk",
// 			"label" => "Example",
// 			"title" => "Example",
// 			"link" => route('%UnitHint%.example'),
// 		];

$nav = [];

if(user()->perm('nav.%UnitHint%'))
	$nav["%UnitHint%"] = $%UnitHint%;

return $nav;