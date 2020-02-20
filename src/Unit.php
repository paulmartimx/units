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
	
	function __construct($options = array())
	{

		$props = [
			"name",
			"path",
			"order",
			"basename",
			"hint",
			"subdirs",
			"manifest"
		];

		foreach($props as $prop)
		{
			if(array_key_exists($prop, $options)) 
				$this->{$prop} = $options[$prop];
		}

		return $this;
	}	
}