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
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
    public function album()
    {
        return $this->belongsTo('App\Album');
    }
    public function asset()
    {
        return $this->belongsTo('App\Asset');
    }
    public function asset_action()
    {
        return $this->belongsTo('App\AssetAction');
    }
    public function campaign()
    {
        return $this->belongsTo('App\Campaign');
    }
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
    public function deal()
    {
        return $this->belongsTo('App\Deal');
    }
    public function design()
    {
        return $this->belongsTo('App\Design');
    }
    public function email()
    {
        return $this->belongsTo('App\Email');
    }
    public function journal()
    {
        return $this->belongsTo('App\Journal');
    }
    public function journal_series()
    {
        return $this->belongsTo('App\JournalSeries');
    }
    public function letter()
    {
        return $this->belongsTo('App\Letter');
    }
    public function kit()
    {
        return $this->belongsTo('App\Kit');
    }
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function tudeme()
    {
        return $this->belongsTo('App\Tudeme');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
