<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable;

    // Parent
    public function user_type()
    {
        return $this->belongsTo('App\UserType');
    }

    // Children
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
    public function design_categories()
    {
        return $this->hasMany('App\AlbumCategory');
    }
    public function album_download_restrict_emails()
    {
        return $this->hasMany('App\AlbumDownloadRestrictEmail');
    }
    public function album_expiry_reminders()
    {
        return $this->hasMany('App\AlbumExpiryReminder');
    }
    public function album_expiry_reminder_emails()
    {
        return $this->hasMany('App\AlbumExpiryReminderEmail');
    }
    public function album_favourites()
    {
        return $this->hasMany('App\AlbumFavourite');
    }
    public function album_favourite_lists()
    {
        return $this->hasMany('App\AlbumFavouriteList');
    }
    public function album_favourite_list_emails()
    {
        return $this->hasMany('App\AlbumFavouriteListEmail');
    }
    public function album_favourite_list_images()
    {
        return $this->hasMany('App\AlbumFavouriteListImage');
    }
    public function album_images()
    {
        return $this->hasMany('App\AlbumImage');
    }
    public function album_image_downloads()
    {
        return $this->hasMany('App\AlbumImageDownload');
    }
    public function album_image_favourites()
    {
        return $this->hasMany('App\AlbumImageFavourite');
    }
    public function album_registrations()
    {
        return $this->hasMany('App\AlbumRegistration');
    }
    public function album_sets()
    {
        return $this->hasMany('App\AlbumSet');
    }
    public function album_set_downloads()
    {
        return $this->hasMany('App\AlbumSetDownload');
    }
    public function album_set_favourites()
    {
        return $this->hasMany('App\AlbumSetFavourite');
    }
    public function album_tags()
    {
        return $this->hasMany('App\AlbumTag');
    }
    public function album_types()
    {
        return $this->hasMany('App\AlbumType');
    }
    public function categories()
    {
        return $this->hasMany('App\Category');
    }
    public function clients()
    {
        return $this->hasMany('App\Client');
    }
    public function colors()
    {
        return $this->hasMany('App\Color');
    }
    public function cover_designs()
    {
        return $this->hasMany('App\CoverDesign');
    }
    public function designs()
    {
        return $this->hasMany('App\Design');
    }
    public function design_gallaries()
    {
        return $this->hasMany('App\DesignGallery');
    }
    public function design_works()
    {
        return $this->hasMany('App\DesignWork');
    }
    public function diys()
    {
        return $this->hasMany('App\Diy');
    }
    public function diy_galleries()
    {
        return $this->hasMany('App\DiyGallery');
    }
    public function download_resolutions()
    {
        return $this->hasMany('App\DownloadResolution');
    }
    public function grid_spacings()
    {
        return $this->hasMany('App\GridSpacing');
    }
    public function grid_styles()
    {
        return $this->hasMany('App\GridStyle');
    }
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    public function project_types()
    {
        return $this->hasMany('App\ProjectType');
    }
    public function statuses()
    {
        return $this->hasMany('App\Status');
    }
    public function tags()
    {
        return $this->hasMany('App\Tag');
    }
    public function thumbnail_sizes()
    {
        return $this->hasMany('App\ThumbnailSize');
    }
    public function typographys()
    {
        return $this->hasMany('App\Typography');
    }
    public function uploads()
    {
        return $this->hasMany('App\Upload');
    }
    public function upload_types()
    {
        return $this->hasMany('App\UploadType');
    }
    public function user_details()
    {
        return $this->hasMany('App\UserDetail');
    }

    public function find_user_type($userKey)
    {

        if (UserType::all()[$userKey]['id'] == Auth::user()->user_type_id) {
            return true;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at', 'user_type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
