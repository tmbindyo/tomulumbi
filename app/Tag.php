<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function album_tags()
    {
        return $this->hasMany('App\AlbumTag');
    }
    public function uploads()
    {
        return $this->hasMany('App\Upload');
    }
    public function cover_image()
    {
        return $this->hasOne('App\Upload','id', 'cover_image_id');
    }

    // Parents
    public function thumbnail_size()
    {
        return $this->belongsTo('App\ThumbnailSize');
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
