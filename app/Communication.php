<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Communication extends Model
{
    use SoftDeletes, UuidTrait;

    public $incrementing = false;

    //
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function communication_type()
    {
        return $this->belongsTo('App\CommunicationType');
    }
}
