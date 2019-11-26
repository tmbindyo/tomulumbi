<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PriceList extends Model
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
    public function sub_type()
    {
        return $this->belongsTo('App\SubType');
    }
    public function size()
    {
        return $this->belongsTo('App\Size');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }


}
