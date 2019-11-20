<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    // project partner, and
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
    public function design()
    {
        return $this->hasMany('App\Design');
    }

    // Parents
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function contact_type()
    {
        return $this->belongsTo('App\ContactType');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
