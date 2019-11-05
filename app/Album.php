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
    public function cover_image()
    {
        return $this->hasOne('App\Upload','id', 'cover_image_id');
    }
    public function album_sets()
    {
        return $this->hasMany('App\AlbumSet');
    }
    public function album_views()
    {
        return $this->hasMany('App\AlbumViews');
    }
    public function album_tags()
    {
        return $this->hasMany('App\AlbumTag');
    }
    public function album_registrations()
    {
        return $this->hasMany('App\AlbumRegistration');
    }
    public function album_expiry_reminders()
    {
        return $this->hasMany('App\AlbumExpiryReminder');
    }
    public function album_expiry_reminder_emails()
    {
        return $this->hasMany('App\AlbumExpiryReminderEmail');
    }
    public function album_download_restriction_emails()
    {
        return $this->hasMany('App\AlbumDownloadRestrictionEmail');
    }
    public function album_downloads()
    {
        return $this->hasMany('App\AlbumDownload');
    }
    public function album_favourites()
    {
        return $this->hasMany('App\AlbumFavourite');
    }
    public function album_favourite_lists()
    {
        return $this->hasMany('App\AlbumFavouriteList');
    }
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
    }


    // Parents
    public function album_type()
    {
        return $this->belongsTo('App\AlbumType');
    }
    public function color()
    {
        return $this->belongsTo('App\Color');
    }
    public function content_align()
    {
        return $this->belongsTo('App\ContentAlign');
    }
    public function cover_design()
    {
        return $this->belongsTo('App\CoverDesign');
    }
    public function image_position()
    {
        return $this->belongsTo('App\ImagePosition');
    }
    public function orientation()
    {
        return $this->belongsTo('App\Orientation');
    }
    public function scheme()
    {
        return $this->belongsTo('App\Scheme');
    }
    public function thumbnail_size()
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
