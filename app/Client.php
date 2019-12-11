<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function designs()
    {
        return $this->hasMany('App\Design');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
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
