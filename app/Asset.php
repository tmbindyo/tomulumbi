<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function asset_category()
    {
        return $this->belongsTo('App\AssetCategory');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    // children
    public function asset_actions()
    {
        return $this->hasMany('App\AssetAction');
    }
    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
    public function kit_assets()
    {
        return $this->hasMany('App\KitAsset');
    }
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
    }
}
