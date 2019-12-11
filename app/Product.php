<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
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
    public function type()
    {
        return $this->belongsTo('App\Type');
    }
    public function cover_image()
    {
        return $this->belongsTo('App\Upload','cover_image_id', 'id');
    }
    public function second_cover_image()
    {
        return $this->belongsTo('App\Upload','second_cover_image_id', 'id');
    }


    // Children
    public function order_products()
    {
        return $this->hasMany('App\OrderProduct');
    }
    public function product_galleries()
    {
        return $this->hasMany('App\ProductGallery');
    }
    public function product_views()
    {
        return $this->hasMany('App\ProductView');
    }
    public function price_lists()
    {
        return $this->hasMany('App\PriceList');
    }
    public function lowest_price()
    {
        return $this->hasMany('App\PriceList')->orderBy('price','asc');
    }
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
    }
}
