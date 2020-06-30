<?php

namespace App\Units\%UnitName%\_Models;

use Illuminate\Database\Eloquent\Model;
use App\Units\_\Traits\withAllScope;
use App\Units\_\Traits\withFilterScope;
use App\Units\_\Traits\withActiveInactiveScopes;
use App\Units\_\Traits\HasFireEvents;

class BaseModel extends Model
{

		use withAllScope, 
				withFilterScope, 
				withActiveInactiveScopes
				HasFireEvents;

    protected $guarded = ['id'];    
        
}
