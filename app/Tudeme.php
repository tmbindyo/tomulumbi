<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tudeme extends Model
{

    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
    public function journals()
    {
        return $this->hasMany('App\Journal');
    }
    public function meals()
    {
        return $this->hasMany('App\Meal');
    }
    public function nutritional_facts()
    {
        return $this->hasMany('App\NutritionalFact');
    }
    public function notes()
    {
        return $this->hasMany('App\Note');
    }
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
    }
    public function tudeme_tudeme_tags()
    {
        return $this->hasMany('App\TudemeTudemeTag');
    }
    public function tudeme_tudeme_types()
    {
        return $this->hasMany('App\TudemeTudemeType');
    }
    public function tudeme_views()
    {
        return $this->belongsTo('App\TudemeView');
    }
    public function tudeme_galleries()
    {
        return $this->hasMany('App\TudemeGallery');
    }
    public function tudeme_featureds()
    {
        return $this->hasMany('App\TudemeFeature');
    }

    // Parents
    public function cover_image()
    {
        return $this->belongsTo('App\Upload','cover_image_id', 'id');
    }
    public function spread()
    {
        return $this->belongsTo('App\Upload','spread_id', 'id');
    }
    public function icon()
    {
        return $this->belongsTo('App\Upload','icon_id', 'id');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
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
