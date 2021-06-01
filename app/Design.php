<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Design extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
    public function design_contacts()
    {
        return $this->hasMany('App\DesignContact');
    }
    public function design_categories()
    {
        return $this->hasMany('App\DesignCategory');
    }
    public function design_galleries()
    {
        return $this->hasMany('App\DesignGallery');
    }
    public function design_views()
    {
        return $this->hasMany('App\DesignView');
    }
    public function design_works()
    {
        return $this->hasMany('App\DesignWork');
    }
    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
    public function journals()
    {
        return $this->hasMany('App\Journal');
    }
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
    }
    public function uploads()
    {
        return $this->hasMany('App\Upload');
    }

    // Parents
    public function cover_image()
    {
        return $this->belongsTo('App\Upload','cover_image_id', 'id');
    }
    public function deal()
    {
        return $this->belongsTo('App\Deal');
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
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
