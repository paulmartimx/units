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
	public $basename;
	public $order;
	public $hint;
	public $prefix;
	public $subdirs;
	
	function __construct($options = array())
	{

		$props = [
			"name",
			"path",
			"basename",
			"order",
			"hint",
			"prefix",
			"subdirs"
		];

		foreach($props as $prop)
		{
			if(array_key_exists($prop, $options)) 
				$this->{$prop} = $options[$prop];
		}

		return $this;
	}	
}