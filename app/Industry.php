<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Industry extends Model
{
    use SoftDeletes, UuidTrait;

    public $incrementing = false;
    
    
    //
    public function institutions()
    {
        return $this->hasMany('App\Institution');
    }
    
}
