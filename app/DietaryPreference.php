<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DietaryPreference extends Model
{

    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function tudemes()
    {
        return $this->hasMany('App\Tudeme');
    }

    // Parents
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
}
