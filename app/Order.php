<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
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
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    // children
    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
    public function order_product()
    {
        return $this->hasMany('App\OrderProduct');
    }
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
    public function promo_code_uses()
    {
        return $this->hasMany('App\PromoCodeUse');
    }

}
