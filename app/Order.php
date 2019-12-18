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
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    // children
    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
    public function order_products()
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
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
    }

}
