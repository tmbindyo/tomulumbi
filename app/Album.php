<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use SoftDeletes, UuidTrait;
    public $incrementing = false;

    // Children
    public function coverImage()
    {
        return $this->hasOne('App\Status','id', 'cover_image_id');
    }
    public function albumSets()
    {
        return $this->hasMany('App\AlbumSet');
    }
    public function albumTags()
    {
        return $this->hasMany('App\AlbumTag');
    }
    public function albumCategories()
    {
        return $this->hasMany('App\AlbumCategory');
    }
    public function albumRegistrations()
    {
        return $this->hasMany('App\AlbumRegistration');
    }
    public function albumExpiryReminders()
    {
        return $this->hasMany('App\AlbumExpiryReminder');
    }
    public function albumExpiryReminderEmails()
    {
        return $this->hasMany('App\AlbumExpiryReminderEmail');
    }
    public function albumDownloadRestrictionEmails()
    {
        return $this->hasMany('App\AlbumDownloadRestrictionEmail');
    }
    public function albumDownloads()
    {
        return $this->hasMany('App\AlbumDownload');
    }
    public function albumFavourites()
    {
        return $this->hasMany('App\AlbumFavourite');
    }
    public function albumFavouriteLists()
    {
        return $this->hasMany('App\AlbumFavouriteList');
    }


    // Parents
    public function albumType()
    {
        return $this->belongsTo('App\AlbumType');
    }
    public function color()
    {
        return $this->belongsTo('App\Color');
    }
    public function coverDesign()
    {
        return $this->belongsTo('App\CoverDesign');
    }
    public function gridSpacing()
    {
        return $this->belongsTo('App\GridSpacing');
    }
    public function gridStyle()
    {
        return $this->belongsTo('App\GridStyle');
    }
    public function thumbnailSize()
    {
        return $this->belongsTo('App\ThumbnailSize');
    }
    public function typography()
    {
        return $this->belongsTo('App\Typography');
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
