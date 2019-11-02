<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Design extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function design_views()
    {
        return $this->hasMany('App\DesignView');
    }

    // Parents
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function upload()
    {
        return $this->belongsTo('App\Upload');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
