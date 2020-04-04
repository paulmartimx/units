<?php

namespace App\Units\%UnitName%\_Models;

use Illuminate\Database\Eloquent\Model;
use App\Units\_\Traits\withFilterScope;
use App\Units\_\Traits\HasIndexedSearch;
use App\Units\_\Traits\withActiveInactiveScopes;

class BaseModel extends Model
{

		use withFilterScope, withActiveInactiveScopes, HasIndexedSearch;

    protected $guarded = ['id'];
    public $indexed_id = 'id';
        
}
