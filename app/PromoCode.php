<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PromoCode extends Model
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
    public function promo_code_uses()
    {
        return $this->hasMany('App\PromoCodeUse');
    }
    public function promo_code_assignments()
    {
        return $this->hasMany('App\PromoCodeAssignment');
    }
}
