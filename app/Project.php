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
    public function album()
    {
        return $this->belongsTo('App\Album');
    }
    public function deal()
    {
        return $this->belongsTo('App\Deal');
    }
    public function project_type()
    {
        return $this->belongsTo('App\ProjectType');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function thumbnail_size()
    {
        return $this->belongsTo('App\ThumbnailSize');
    }
    public function typography()
    {
        return $this->belongsTo('App\Typography');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // Children
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
    public function project_contacts()
    {
        return $this->hasMany('App\ProjectContact');
    }
    public function cover_image()
    {
        return $this->hasOne('App\Upload','id', 'cover_image_id');
    }
    public function designs()
    {
        return $this->hasMany('App\Design');
    }
    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
    public function journals()
    {
        return $this->hasMany('App\Journal');
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
    public function uploads()
    {
        return $this->hasMany('App\Upload');
    }
}
