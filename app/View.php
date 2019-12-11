<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class View extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Parents
    public function view_type()
    {
        return $this->belongsTo('App\ViewType');
    }

    // album view
    public function album_view()
    {
        return $this->belongsTo('App\AlbumView');
    }
    // design view
    public function design_view()
    {
        return $this->belongsTo('App\DesignView');
    }
    // project view
    public function project_view()
    {
        return $this->belongsTo('App\ProjectView');
    }
    // journal view
    public function journal_view()
    {
        return $this->belongsTo('App\JournalView');
    }
    // product view
    public function product_view()
    {
        return $this->belongsTo('App\ProductView');
    }

}
