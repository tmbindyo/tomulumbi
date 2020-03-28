<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TudemeTopSection extends Model
{

    use SoftDeletes, UuidTrait;
    public $incrementing = false;


    // Parents
    public function tudeme()
    {
        return $this->belongsTo('App\Tudeme');
    }
    public function tudeme_top_location()
    {
        return $this->belongsTo('App\TudemeTopLocation');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
