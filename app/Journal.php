<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journal extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function album()
    {
        return $this->belongsTo('App\Album');
    }
    public function design()
    {
        return $this->belongsTo('App\Design');
    }
    public function journal_series()
    {
        return $this->belongsTo('App\JournalSeries');
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
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
    public function cover_image()
    {
        return $this->hasOne('App\Upload','id', 'cover_image_id');
    }
    public function journal_galleries()
    {
        return $this->hasMany('App\JournalGallery');
    }
    public function journal_labels()
    {
        return $this->hasMany('App\JournalLabel');
    }
    public function Journal_views()
    {
        return $this->hasMany('App\JournalView');
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
