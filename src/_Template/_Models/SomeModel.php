<?php

namespace App\Units\%UnitName%\_Models;

use App\Units\%UnitName%\_Models\BaseModel;
use App\Units\_\Traits\Uploadable;
use App\Units\_\Traits\RelatesToLoggedUser;

class SomeModel extends BaseModel
{

	// use Uploadable, RelatesToLoggedUser;

    protected $indexed_model = 'SomeModel';
    protected $indexed_group = 'Something';
    protected $skip_index = ['id', 'created_at', 'updated_at'];

    protected function getIndexRoute()
    {
        $appends = "#st={$this->name}&id={$this->id}&reload=1";
        return route('example.index') . $appends;
    }

    protected function getIndexTitle()
    {
        return $this->name;
    }    

    
}
