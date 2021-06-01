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
    public function tudeme()
    {
        return $this->belongsTo('App\Tudeme');
    }
    public function thumbnail_size()
    {
        return $this->belongsTo('App\ThumbnailSize');
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

    // to dos
    public function pending_to_dos()
    {
        return $this->hasMany('App\ToDo')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc');
    }
    public function in_progress_to_dos()
    {
        return $this->hasMany('App\ToDo')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568');
    }
    public function completed_to_dos()
    {
        return $this->hasMany('App\ToDo')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f');
    }
    public function overdue_to_dos()
    {
        return $this->hasMany('App\ToDo')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782');
    }
}
