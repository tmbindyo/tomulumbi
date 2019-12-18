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
    public function payments()
    {
        return $this->hasMany('App\Payment');
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
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
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
    public function typography()
    {
        return $this->belongsTo('App\Typography');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
