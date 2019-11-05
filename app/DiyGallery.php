<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiyGallery extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;
}
