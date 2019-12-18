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

    public function albums()
    {
        return $this->hasMany('App\Album');
    }
    public function expense_items()
    {
        return $this->hasMany('App\ExpenseItem');
    }
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    // Parents
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
    public function album()
    {
        return $this->belongsTo('App\Album');
    }
    public function design()
    {
        return $this->belongsTo('App\Design');
    }
    public function expense_account()
    {
        return $this->belongsTo('App\ExpenseAccount');
    }
    public function frequency()
    {
        return $this->belongsTo('App\Frequency');
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
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
