<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
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

    // Children
    public function account_adjustments()
    {
        return $this->hasMany('App\AccountAdjustment');
    }
    public function deposits()
    {
        return $this->hasMany('App\Deposit');
    }
    public function destination_account()
    {
        return $this->hasMany('App\Transfer','destination_account_id','id');
    }
    public function liabilities()
    {
        return $this->hasMany('App\Liability');
    }
    public function loans()
    {
        return $this->hasMany('App\Loan');
    }
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
    public function refunds()
    {
        return $this->hasMany('App\Refund');
    }
    public function source_account()
    {
        return $this->hasMany('App\Transfer','source_account_id','id');
    }
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
    }
    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }
    public function withdrawals()
    {
        return $this->hasMany('App\Withdrawal');
    }

    // to dos
    public function pending_to_dos()
    {
        return $this->hasMany('App\ToDo')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc');
    }
    public function in_progress_to_dos()
    {
        return $this->hasMany('App\ToDo')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568');
    }
    public function completed_to_dos()
    {
        return $this->hasMany('App\ToDo')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f');
    }
    public function overdue_to_dos()
    {
        return $this->hasMany('App\ToDo')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782');
    }
}
