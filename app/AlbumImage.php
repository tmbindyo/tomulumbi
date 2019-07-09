<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlbumImage extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;
    // Children
    public function albumImageDownloads()
    {
        return $this->hasMany('App\AlbumImageDownload');
    }
    public function albumImageFavourites()
    {
        return $this->hasMany('App\AlbumImageFavourite');
    }
    public function albumFavouriteListImages()
    {
        return $this->hasMany('App\AlbumFavouriteListImage');
    }


    // Parents
    public function albumSet()
    {
        return $this->belongsTo('App\AlbumSet');
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
