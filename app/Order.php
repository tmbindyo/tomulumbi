<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function contact()
    {
        return $this->belongsTo('App\Contact');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    // children
    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
    public function order_products()
    {
        return $this->hasMany('App\OrderProduct');
    }
    public function payments()
    {
        return $this->hasMany('App\Payment');
    }
    public function promo_code_uses()
    {
        return $this->hasMany('App\PromoCodeUse');
    }
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
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
