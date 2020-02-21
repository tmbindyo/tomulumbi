<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TudemeTag extends Model
{

    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function tudeme_tudeme_tags()
    {
        return $this->hasMany('App\TudemeTudemeTag');
    }

    // Parents
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function tudeme()
    {
        return $this->belongsTo('App\Tudeme');
    }
    public function tudeme_tag()
    {
        return $this->belongsTo('App\TudemeTag');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
