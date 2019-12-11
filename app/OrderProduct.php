<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduct extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function price_list()
    {
        return $this->belongsTo('App\PriceList');
    }

}
