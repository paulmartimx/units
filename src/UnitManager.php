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
	
	protected $basepath;
	protected $foldersFound;
	
	// @array units
	public $units;
	
	function __construct()
	{

		// $config = include __DIR__.'/../config/config.php';

		$this->basepath = config('units.basepath');

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
				"name" => $manifest["name"],
				"path" => $folder,
				"order" => $manifest["order"] ?? 1,
				"basename" => basename($folder),
				"hint" => $manifest["hint"],
				"subdirs" => $this->getDirs($folder),
				"manifest" => $manifest				
			]));

			$this->units = $this->units->sortBy('order');

		}
	}

	
}