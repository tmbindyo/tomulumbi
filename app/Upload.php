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
    public function designs()
    {
        return $this->hasOne('App\Design');
    }
    public function design_work()
    {
        return $this->hasOne('App\DesignWork');
    }
    public function design_gallery()
    {
        return $this->hasOne('App\DesignGallery');
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
}
