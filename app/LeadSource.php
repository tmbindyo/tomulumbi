<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LeadSource extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function contacts()
    {
        return $this->belongsTo('App\Contact');
    }
    public function deals()
    {
        return $this->belongsTo('App\Deal');
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
