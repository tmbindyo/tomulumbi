<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents

    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function thumbnail_size()
    {
        return $this->belongsTo('App\ThumbnailSize');
    }
    public function typography()
    {
        return $this->belongsTo('App\Typography');
    }
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    // Children
    public function cover_image()
    {
        return $this->hasOne('App\Upload','id', 'cover_image_id');
    }
    public function project_galleries()
    {
        return $this->belongsTo('App\ProjectGallery');
    }
    public function project_views()
    {
        return $this->belongsTo('App\ProjectView');
    }
}
