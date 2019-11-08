<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThumbnailSize extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
    public function tags()
    {
        return $this->hasMany('App\Tag');
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
