<?php

namespace Units;

/**
 * Unit Class
 *
 * @return self
 */
class Unit
{

	public $name;
	public $path;
	public $order;
	public $basename;
	public $hint;
	public $subdirs;
	public $manifest;	
	public $nav;	
	
	function __construct($options = array())
	{
		$this->nav = null;

		$props = [
			"name",
			"path",
			"order",
			"basename",
			"hint",
			"subdirs",
			"manifest",
			"nav"
		];

		foreach($props as $prop)
		{
			if(array_key_exists($prop, $options)) 
				$this->{$prop} = $options[$prop];
		}

		return $this;
	}

	public function getNav()
	{
		
		if(file_exists("{$this->path}/nav.php"))
			$this->nav = include "{$this->path}/nav.php";

		return $this->nav;
	}
}