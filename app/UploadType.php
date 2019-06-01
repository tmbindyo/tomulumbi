<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UploadType extends Model
{
    use SoftDeletes, UuidTrait;

    public $incrementing = false;
    
    
    //
    public function uploads()
    {
        return $this->hasMany('App\Upload');
    }
}
