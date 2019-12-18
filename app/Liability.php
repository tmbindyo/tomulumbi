<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Liability extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }

    // Parents
    public function accounts()
    {
        return $this->belongsTo('App\Account');
    }
    public function contacts()
    {
        return $this->belongsTo('App\Contact');
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