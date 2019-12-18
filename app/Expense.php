<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children

    public function expense_items()
    {
        return $this->hasMany('App\ExpenseItem');
    }
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    // Parents
    public function album()
    {
        return $this->belongsTo('App\Album');
    }
    public function asset()
    {
        return $this->belongsTo('App\Asset');
    }
    public function design()
    {
        return $this->belongsTo('App\Design');
    }
    public function campaign()
    {
        return $this->belongsTo('App\Campaign');
    }
    public function expense()
    {
        return $this->belongsTo('App\Expense');
    }
    public function expense_account()
    {
        return $this->belongsTo('App\ExpenseAccount');
    }
    public function frequency()
    {
        return $this->belongsTo('App\Frequency');
    }
    public function liability()
    {
        return $this->belongsTo('App\Liability');
    }
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function transfer()
    {
        return $this->belongsTo('App\Transfer');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
