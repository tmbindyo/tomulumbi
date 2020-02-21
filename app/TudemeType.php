<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TudemeType extends Model
{

    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function tudeme_tudeme_types()
    {
        return $this->hasMany('App\TudemeTudemeType');
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
