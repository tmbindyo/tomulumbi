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

    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function typography()
    {
        return $this->belongsTo('App\Typography');
    }

    // Children
    public function cover_image()
    {
        return $this->hasOne('App\Upload','id', 'cover_image_id');
    }
    public function journal_galleries()
    {
        return $this->belongsTo('App\JournalGallery');
    }
    public function Journal_views()
    {
        return $this->belongsTo('App\JournalView');
    }
}
