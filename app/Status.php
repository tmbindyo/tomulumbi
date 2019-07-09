<?php

namespace App;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use SoftDeletes, UuidTrait;

    public $incrementing = false;

    protected $fillable = ['name', 'description', 'user_id', ''];

    // Parent
    public function user()
    {
        return $this->belongsTo('App\User');
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
    public function tags()
    {
        return $this->hasMany('App\Tag');
    }
    public function thumbnailSizes()
    {
        return $this->hasMany('App\ThumbnailSize');
    }
    public function typographyies()
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
    public function users()
    {
        return $this->belongsTo('App\User');
    }
    public function userDetails()
    {
        return $this->hasMany('App\UserDetail');
    }
    public function userTypes()
    {
        return $this->hasMany('App\UserType');
    }

}
