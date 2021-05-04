<?php

namespace App\Units\%UnitName%\_Models;

use App\Units\%UnitName%\_Models\IndexedModel;
use App\Units\%UnitName%\_Models\BaseModel;
use App\Units\_\Traits\Uploadable;
use App\Units\_\Traits\RelatesToLoggedUser;

class SomeModel extends BaseModel 
{

	// use Uploadable, RelatesToLoggedUser;

		protected $rels = [];

    protected $indexConfig = [
      "group" => 'Something',
      "include" => ['example'],
      "route" => 'example.index',
      "hash" => ['id' => 'id'],
      "title" => ['example']
    ];  
    

    
}
