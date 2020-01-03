<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
    public function asset_actions()
    {
        return $this->hasMany('App\AssetAction');
    }
    public function contact_contact_types()
    {
        return $this->hasMany('App\ContactContactType');
    }
    public function deals()
    {
        return $this->hasMany('App\Deal');
    }
    public function designs()
    {
        return $this->hasMany('App\Design');
    }
    public function email_contacts()
    {
        return $this->hasMany('App\EmailContact');
    }
    public function liabilities()
    {
        return $this->hasMany('App\Liability');
    }
    public function loans()
    {
        return $this->hasMany('App\Loan');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    public function promo_code_assignments()
    {
        return $this->hasMany('App\PromoCodeAssignment');
    }
    public function quotes()
    {
        return $this->hasMany('App\Quote');
    }
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
    }

    // Parents
    public function campaign()
    {
        return $this->belongsTo('App\Campaign');
    }
    public function contact_type()
    {
        return $this->belongsTo('App\ContactType');
    }
    public function lead_source()
    {
        return $this->belongsTo('App\LeadSource');
    }
    public function industry()
    {
        return $this->belongsTo('App\Industry');
    }
    public function organization()
    {
        return $this->belongsTo('App\Organization');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function title()
    {
        return $this->belongsTo('App\Title');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
