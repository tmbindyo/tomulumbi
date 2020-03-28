<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TudemeTopLocation extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function tudeme_top_section()
    {
        return $this->hasMany('App\TudemeTopSection');
    }
    public function active_tudeme_top_section()
    {
        return $this->hasOne('App\TudemeTopSection')->where('status_id','c670f7a2-b6d1-4669-8ab5-9c764a1e403e');
    }
    public function tudeme()
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
