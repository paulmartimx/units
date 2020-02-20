<?php

namespace Units;

use Exception;
use Illuminate\Support\Collection;
use Units\Unit;


/**
 * Unit Manager Class
 * 
 * 
 */

class UnitManager
{

	protected $basedir = "Units";
	protected $basepath;
	protected $foldersFound;
	
	// @array units
	public $units;
	
	function __construct()
	{

		$this->basepath = app_path($this->basedir);
		$this->foldersFound = $this->getDirs($this->basepath);
		$this->units = new Collection;

		$this->loadUnits();

	}

	protected function getDirs($path)
	{
		return glob("{$path}/*", GLOB_ONLYDIR);
	}

	protected function loadUnits()
	{
		foreach($this->foldersFound as $folder)
		{

			if(!file_exists( "{$folder}/manifest.php" ))
				throw new Exception("Manifest not Found in {$folder}", 1);
			
			$manifest = include "{$folder}/manifest.php";
			
			$this->units->push(new Unit([
				"name" => $manifest["name"] ?? null,
				"path" => $folder,
				"basename" => basename($folder),
				"order" => $manifest["order"] ?? null,
				"hint" => $manifest["hint"] ?? null,
				"prefix" => $manifest["prefix"] ?? null,
				"subdirs" => $this->getDirs($folder)
			]));

			$this->units = $this->units->sortBy('order');

		}
	}

	protected function getUnits()
	{
		return $this->units;
	}
}