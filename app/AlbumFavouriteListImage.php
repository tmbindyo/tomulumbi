<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlbumFavouriteListImage extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function albumFavouriteList()
    {
        return $this->belongsTo('App\AlbumFavouriteList');
    }
    public function albumImage()
    {
        return $this->belongsTo('App\AlbumImage');
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
