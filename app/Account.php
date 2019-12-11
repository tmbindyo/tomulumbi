<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
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

    // Children
    public function account_adjustments()
    {
        return $this->hasMany('App\AccountAdjustment');
    }
    public function destination_account()
    {
        return $this->hasMany('App\Transaction','destination_account_id','id');
    }
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
    public function source_account()
    {
        return $this->hasMany('App\Transaction','source_account_id','id');
    }
}