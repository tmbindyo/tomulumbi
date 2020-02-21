<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TudemeGallery extends Model
{

    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function tudeme_views()
    {
        return $this->belongsTo('App\TudemeView');
    }

    // Parents
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function tudeme()
    {
        return $this->belongsTo('App\Tudeme');
    }
    public function upload()
    {
        return $this->belongsTo('App\Upload');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
