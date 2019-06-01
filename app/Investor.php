<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Investor extends Model
{
    use SoftDeletes, UuidTrait;

    public $incrementing = false;
    
    //
    public function project_investments()
    {
        return $this->hasMany('App\ProjectInvestment');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function institution()
    {
        return $this->belongsTo('App\Institution');
    }
}
