<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesignGallery extends Model
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
    public function upload()
    {
        return $this->belongsTo('App\Upload');
    }
    public function design()
    {
        return $this->belongsTo('App\Design');
    }
}
