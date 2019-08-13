<?php

namespace App\Http\Controllers\Admin;

use App\AlbumCategory;
use App\AlbumDownloadRestrictionEmail;
use App\AlbumImage;
use App\AlbumSet;
use App\AlbumTag;
use App\Category;
use App\Status;
use App\Tag;
use App\ToDo;
use App\Traits\PasswordTrait;
use App\Traits\UserTrait;
use Auth;
use DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Album;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AlbumController extends Controller
{
    use UserTrait;
    use PasswordTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function albums()
    {
        // User
        $user = $this->getAdmin();
        // Get albums
        $albums = Album::with('user','status')->get();
        return view('admin.albums',compact('albums','user'));
    }

}
