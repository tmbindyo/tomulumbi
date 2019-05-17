<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    
    public function institution(){

        return $this->hasMany("App\Institution");

    }

    public function share(){

        return $this->belongsTo("App\Share");

    }

}
