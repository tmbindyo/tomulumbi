<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TudemeView extends Model
{

    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function tudeme()
    {
        return $this->belongsTo('App\Tudeme');
    }

    public function view()
    {
        return $this->hasOne('App\View','view_id','id');
    }

}
