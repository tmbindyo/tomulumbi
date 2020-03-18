<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function campaign()
    {
        return $this->belongsTo('App\Campaign');
    }
    public function campaign_type()
    {
        return $this->belongsTo('App\CampaignType');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }

    // children
    public function campaigns()
    {
        return $this->hasMany('App\Campaign');
    }
    public function campaign_uploads()
    {
        return $this->hasMany('App\Upload');
    }
    public function contacts()
    {
        return $this->hasMany('App\Contact')->where('is_lead',False);
    }
    public function deals()
    {
        return $this->hasMany('App\Deal');
    }
    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
    public function leads()
    {
        return $this->hasMany('App\Contact')->where('is_lead',True);
    }
    public function organizations()
    {
        return $this->hasMany('App\Organization');
    }
    public function quotes()
    {
        return $this->hasMany('App\Quote');
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
