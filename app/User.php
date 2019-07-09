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
    public function userType()
    {
        return $this->belongsTo('App\UserType');
    }

    // Children
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
    public function albumCategories()
    {
        return $this->hasMany('App\AlbumCategory');
    }
    public function albumDownloads()
    {
        return $this->hasMany('App\AlbumDownload');
    }
    public function albumDownloadRestrictEmails()
    {
        return $this->hasMany('App\AlbumDownloadRestrictEmail');
    }
    public function albumExpiryReminders()
    {
        return $this->hasMany('App\AlbumExpiryReminder');
    }
    public function albumExpiryReminderEmails()
    {
        return $this->hasMany('App\AlbumExpiryReminderEmail');
    }
    public function albumFavourites()
    {
        return $this->hasMany('App\AlbumFavourite');
    }
    public function albumFavouriteLists()
    {
        return $this->hasMany('App\AlbumFavouriteList');
    }
    public function albumFavouriteListEmails()
    {
        return $this->hasMany('App\AlbumFavouriteListEmail');
    }
    public function albumFavouriteListImages()
    {
        return $this->hasMany('App\AlbumFavouriteListImage');
    }
    public function albumImages()
    {
        return $this->hasMany('App\AlbumImage');
    }
    public function albumImageDownloads()
    {
        return $this->hasMany('App\AlbumImageDownload');
    }
    public function albumImageFavourites()
    {
        return $this->hasMany('App\AlbumImageFavourite');
    }
    public function albumRegistrations()
    {
        return $this->hasMany('App\AlbumRegistration');
    }
    public function albumSets()
    {
        return $this->hasMany('App\AlbumSet');
    }
    public function albumSetDownloads()
    {
        return $this->hasMany('App\AlbumSetDownload');
    }
    public function albumSetFavourites()
    {
        return $this->hasMany('App\AlbumSetFavourite');
    }
    public function albumTags()
    {
        return $this->hasMany('App\AlbumTag');
    }
    public function albumTypes()
    {
        return $this->hasMany('App\AlbumType');
    }
    public function categories()
    {
        return $this->hasMany('App\Category');
    }
    public function colors()
    {
        return $this->hasMany('App\Color');
    }
    public function coverDesigns()
    {
        return $this->hasMany('App\CoverDesign');
    }
    public function downloadResolutions()
    {
        return $this->hasMany('App\DownloadResolution');
    }
    public function gridSpacings()
    {
        return $this->hasMany('App\GridSpacing');
    }
    public function gridStyles()
    {
        return $this->hasMany('App\GridStyle');
    }
    public function projects()
    {
        return $this->hasMany('App\Project');
    }
    public function projectTypes()
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
    public function thumbnailSizes()
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
    public function uploadTypes()
    {
        return $this->hasMany('App\UploadType');
    }
    public function userDetails()
    {
        return $this->hasMany('App\UserDetail');
    }

    public function findUserType($userKey)
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
