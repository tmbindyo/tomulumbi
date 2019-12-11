<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ViewType extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function views()
    {
        return $this->hasMany('App\View');
    }

}
