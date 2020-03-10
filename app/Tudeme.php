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

}
