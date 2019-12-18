<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function contacts()
    {
        return $this->belongsTo('App\Contact');
    }
    public function deals()
    {
        return $this->belongsTo('App\Deal');
    }
    public function quotes()
    {
        return $this->belongsTo('App\Quote');
    }
    public function to_dos()
    {
        return $this->belongsTo('App\ToDo');
    }

    // Parents
    public function campaign()
    {
        return $this->belongsTo('App\Campaign');
    }
    public function organization_type()
    {
        return $this->belongsTo('App\OrganizationType');
    }
    public function parent_organization()
    {
        return $this->belongsTo('App\Organization','id', 'parent_account_id');
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
