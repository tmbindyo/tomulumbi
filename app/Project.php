<?php

namespace App;

use App\Traits\UuidTrait;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes, UuidTrait;

    public $incrementing = false;
    
    //
    public function project_bids()
    {
        return $this->hasMany('App\ProjectBid');
    }
    public function ongoing_project_bids() {
        return $this->project_bids()->where('user_id','=', Auth::user()->id)->where('status_id','=', 1);
    }
    public function bid_project_bids() {
        return $this->project_bids()->where('user_id','!=', Auth::user()->id)->where('status_id','=', 1);
    }
    public function opportunity_project_bids() {
        return $this->project_bids()->where('user_id','!=', Auth::user()->id);
    }
    public function portfolio_project_bids() {
        return $this->project_bids()->where('user_id','=', Auth::user()->id);
    }
    public function project_investments()
    {
        return $this->hasMany('App\ProjectInvestment');
    }
    public function project_milestones()
    {
        return $this->hasMany('App\ProjectMilestones');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function project_type()
    {
        return $this->belongsTo('App\ProjectType');
    }
    public function project_images()
    {
        return $this->hasMany('App\ProjectImage');
    }
    public function project_teams()
    {
        return $this->hasMany('App\ProjectTeam');
    }
    public function project_updates()
    {
        return $this->hasMany('App\ProjectUpdate');
    }
    public function project_key_activitys()
    {
        return $this->hasMany('App\ProjectKeyActivity');
    }
    public function project_metrics()
    {
        return $this->hasMany('App\ProjectMetric');
    }
}
