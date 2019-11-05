<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DesignView extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function design()
    {
        return $this->belongsTo('App\Design');
    }
    public function design_work()
    {
        return $this->belongsTo('App\DesignWork');
    }
    public function design_gallery()
    {
        return $this->belongsTo('App\DesignGallery');
    }
}
