<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlbumFavouriteList extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function album_favourite_list_emails()
    {
        return $this->hasMany('App\AlbumFavouriteListEmail');
    }
    public function album_favourite_list_images()
    {
        return $this->hasMany('App\AlbumFavouriteListImage');
    }

    // Parents
    public function album()
    {
        return $this->belongsTo('App\Album');
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
