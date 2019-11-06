<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function design_work()
    {
        return $this->hasOne('App\DesignWork');
    }
    public function design_gallery()
    {
        return $this->hasOne('App\DesignGallery');
    }
    public function album_image()
    {
        return $this->hasOne('App\AlbumImage');
    }
    public function diy_cover_image()
    {
        return $this->hasOne('App\Diy','cover_image_id', 'id');
    }
    public function design_cover_image()
    {
        return $this->hasOne('App\Design','cover_image_id', 'id');
    }
    public function album_cover_image()
    {
        return $this->hasOne('App\Album','cover_image_id', 'id');
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
    public function upload_type()
    {
        return $this->belongsTo('App\UploadType');
    }
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }
}
