<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kit extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function asset_actions()
    {
        return $this->hasMany('App\AssetAction');
    }
    public function kit_assets()
    {
        return $this->hasMany('App\KitAsset');
    }
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
    }

    // Parents
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
