<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use UuidTrait;

    public $incrementing = false;
    
    public function institution(){

        return $this->hasMany("App\Institution");

    }

    public function share(){

        return $this->belongsTo("App\Share");

    }

}
