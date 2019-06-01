<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;

class InvestorProfile extends Model
{
    use UuidTrait;

    public $incrementing = false;
}
