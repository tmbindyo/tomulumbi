<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlbumSet extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function album_images()
    {
        return $this->hasMany('App\AlbumImage');
    }
    public function album_set_downloads()
    {
        return $this->hasMany('App\AlbumSetDownload');
    }
    public function album_set_favourites()
    {
        return $this->belongsTo('App\AlbumSetFavourite');
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
