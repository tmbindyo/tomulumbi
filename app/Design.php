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
    public function design_views()
    {
        return $this->hasMany('App\DesignView');
    }
    public function design_works()
    {
        return $this->hasMany('App\DesignWork');
    }
    public function design_galleries()
    {
        return $this->hasMany('App\DesignGallery');
    }
    public function design_categories()
    {
        return $this->hasMany('App\DesignCategory');
    }
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
    }

    // Parents
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function upload()
    {
        return $this->belongsTo('App\Upload');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    public function typography()
    {
        return $this->belongsTo('App\Typography');
    }
    public function cover_image()
    {
        return $this->belongsTo('App\Upload','id', 'cover_image_id');
    }
}
