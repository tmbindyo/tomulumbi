<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AlbumView extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function album()
    {
        return $this->belongsTo('App\Album');
    }
    public function album_downloads()
    {
        return $this->hasMany('App\AlbumDownload');
    }

    public function view()
    {
        return $this->hasOne('App\View','view_id','id');
    }
}
