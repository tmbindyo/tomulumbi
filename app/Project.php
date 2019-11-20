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
    public function project_type()
    {
        return $this->belongsTo('App\ProjectType');
    }
    public function typography()
    {
        return $this->belongsTo('App\Typography');
    }
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }

    // Children
    public function cover_image()
    {
        return $this->hasOne('App\Upload','id', 'cover_image_id');
    }
    public function project_galleries()
    {
        return $this->hasMany('App\ProjectGallery');
    }
    public function project_views()
    {
        return $this->hasMany('App\ProjectView');
    }
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
    }
}
