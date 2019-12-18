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
    public function quote_item()
    {
        return $this->hasMany('App\QuoteItem');
    }

    // Parents
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
    public function deal()
    {
        return $this->belongsTo('App\Deal');
    }
    public function order()
    {
        return $this->hasMany('App\Order');
    }
    public function organization()
    {
        return $this->belongsTo('App\Organization');
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
