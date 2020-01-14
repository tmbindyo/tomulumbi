<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quote extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
    public function quote_items()
    {
        return $this->hasMany('App\QuoteItem');
    }
    public function quote_taxes()
    {
        return $this->hasMany('App\QuoteTax');
    }
    public function uploads()
    {
        return $this->hasMany('App\Upload');
    }


    // Parents
    public function campaign()
    {
        return $this->belongsTo('App\Campaign');
    }
    public function deal()
    {
        return $this->belongsTo('App\Deal');
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
