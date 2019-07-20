<?php

namespace App\Http\Controllers\Admin;

use App\AlbumImage;
use App\AlbumSet;
use App\AlbumTag;
use App\Tag;
use App\Traits\UserTrait;
use Auth;
use App\Album;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AlbumController extends Controller
{
    use UserTrait;
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
    public function album($album_id)
    {
        // User
        $user = $this->getAdmin();

        // Get album
        $album = Album::with('user','status')->where('id',$album_id)->first();

        // Album Dependencies
        $albumSets = AlbumSet::where('album_id',$album->id)->with('status','user','album_images','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();

        //return $albumSets;
        return view('admin.album',compact('album','user','albumSets'));
    }
    public function albumSave(Request $request)
    {

        $album = new Album();
        $album->name = $request->name;
        $album->date = date('Y-m-d', strtotime($request->date));
        if ($request->is_auto_expiry === null){
            $album->is_auto_expiry = False;
        }
        else{
            $album->is_auto_expiry = True;
            $album->expiry_date = date('Y-m-d', strtotime($request->expiry_date));
        }
        $album->album_type_id = "ca64a5e0-d39b-4f2c-a136-9c523d935ea4";
        $album->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $album->user_id = Auth::user()->id;
        $album->save();

        if ($request->tags) {
            $array = explode (",", $request->tags);
            foreach ($array as $value) //loop over values
            {

                // Register tag if does not exist
                $tag = Tag::where('name', $value)->first();
                if ($tag === null) {
                    $tag = new Tag();
                    $tag->name = strtolower($value);
                    $tag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                    $tag->user_id = Auth::user()->id;
                    $tag->save();
                }


                $albumTag = new AlbumTag();
                $albumTag->album_id = $album->id;
                $albumTag->tag_id = $tag->id;
                $albumTag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $albumTag->user_id = Auth::user()->id;
                $albumTag->save();
            }
        }

        // Save Album set
        $albumSet = new AlbumSet();
        $albumSet->album_id = $album->id;
        $albumSet->name = "Highlights";
        $albumSet->is_client_exclusive_access = False;
        $albumSet->is_email_download_restrict = False;
        $albumSet->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumSet->user_id = Auth::user()->id;
        $albumSet->save();


        return back()->withSuccess('Album created!');

    }
    public function albumUpdate(Request $request, $album_id)
    {

        $album = Album::findOrFail($album_id);
        $album->name = $request->name;
        $album->description = $request->description;
        $album->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $album->save();

        return redirect()->route('admin.album.types')->withSuccess('Album type updated!');
    }
    public function albumDelete($album_id)
    {

        $album = Album::findOrFail($album_id);
        $album->delete();

        return back()->withStatus(__('Album type successfully deleted.'));
    }
    public function albumRestore($album_id)
    {

        $album = Album::findOrFail($album_id);
        $album->restore();

        return back()->withStatus(__('Album type successfully restored.'));
    }
    public function albumSetSave(Request $request, $album_id)
    {

        $albumSet = new AlbumSet();
        $albumSet->album_id = $album_id;
        $albumSet->name = $request->name;
        $albumSet->is_client_exclusive_access = False;
        $albumSet->is_email_download_restrict = False;
        $albumSet->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumSet->user_id = Auth::user()->id;
        $albumSet->save();

        return back()->withStatus(__('Album set successfully saved.'));
    }


    public function albumSetImageUpload($album_set_id)
    {
        $file = Input::file("file");
        $file_name = $file->getClientOriginalName();
        $file->move(public_path()."/client/proof/", $file_name);
        $path = public_path()."/client/proof/".$file_name;

        // Get file size
        //return Storage::size('/' . $path);
        //$size = File::size(public_path()."/train/", $file_name);


        $albumSetImage = new AlbumImage;
        $albumSetImage->name = $path;
        $albumSetImage->thumbnail = "client/proof/".$file_name;
        $albumSetImage->url = $path;
        $albumSetImage->is_client_exclusive_access = False;
        $albumSetImage->album_set_id = $album_set_id;
        $albumSetImage->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumSetImage->user_id = Auth::user()->id;
        $albumSetImage->save();

        return back()->withStatus(__('Album set image successfully uploaded.'));
    }
}
