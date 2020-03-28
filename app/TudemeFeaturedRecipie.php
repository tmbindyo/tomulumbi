<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TudemeFeaturedRecipie extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    protected $fillable = ['status_id'];

    // Parents
    public function tudeme()
    {
        return $this->belongsTo('App\Tudeme');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
