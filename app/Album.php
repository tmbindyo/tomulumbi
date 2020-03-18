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
    public function album_sets()
    {
        return $this->hasMany('App\AlbumSet');
    }
    public function album_tags()
    {
        return $this->hasMany('App\AlbumTag');
    }
    public function album_views()
    {
        return $this->hasMany('App\AlbumView');
    }
    public function album_view_restriction_emails()
    {
        return $this->hasMany('App\AlbumViewRestrictionEmail');
    }
    public function album_set_view_restriction_emails()
    {
        return $this->hasMany('App\AlbumSetViewRestrictionEmail');
    }
    public function album_contacts()
    {
        return $this->hasMany('App\AlbumContact');
    }
    public function expenses()
    {
        return $this->hasMany('App\Expense');
    }
    public function journals()
    {
        return $this->hasMany('App\Journal');
    }
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    public function to_dos()
    {
        return $this->hasMany('App\ToDo');
    }
    public function upload()
    {
        return $this->hasMany('App\Upload');
    }


    // Parents
    public function cover_image()
    {
        return $this->hasOne('App\Upload','id', 'cover_image_id');
    }
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
    public function deal()
    {
        return $this->belongsTo('App\Deal');
    }
    public function image_position()
    {
        return $this->belongsTo('App\ImagePosition');
    }
    public function orientation()
    {
        return $this->belongsTo('App\Orientation');
    }
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function scheme()
    {
        return $this->belongsTo('App\Scheme');
    }
    public function tudeme()
    {
        return $this->belongsTo('App\Tudeme');
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
