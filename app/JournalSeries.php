<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JournalSeries extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // parents
    public function journal_series()
    {
        return $this->belongsTo('App\JournalSeries');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // children
    public function Journals()
    {
        return $this->hasMany('App\Journal');
    }
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
    }
}
