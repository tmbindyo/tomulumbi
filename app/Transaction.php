<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
    public function destination_account()
    {
        return $this->belongsTo('App\Account','destination_account_id','id');
    }
    public function expense()
    {
        return $this->belongsTo('App\Expense');
    }
    public function source_account()
    {
        return $this->belongsTo('App\Account','source_account_id','id');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // children
    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }

}
