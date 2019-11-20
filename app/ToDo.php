<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToDo extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function album()
    {
        return $this->belongsTo('App\Album');
    }
    public function design()
    {
        return $this->belongsTo('App\Design');
    }
    public function journal()
    {
        return $this->belongsTo('App\Journal');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function email()
    {
        return $this->belongsTo('App\Email');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
