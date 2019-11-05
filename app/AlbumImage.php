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
    public function album_image_downloads()
    {
        return $this->hasMany('App\AlbumImageDownload');
    }
    public function album_image_favourites()
    {
        return $this->hasMany('App\AlbumImageFavourite');
    }
    public function album_favourite_list_images()
    {
        return $this->hasMany('App\AlbumFavouriteListImage');
    }


    // Parents
    public function album_set()
    {
        return $this->belongsTo('App\AlbumSet');
    }
    public function upload()
    {
        return $this->belongsTo('App\Upload');
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
