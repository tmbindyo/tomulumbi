<?php

namespace App\Http\Controllers\Landing;

use App\Album;
use App\AlbumDownload;
use App\AlbumSet;
use App\AlbumView;
use App\Design;
use App\DesignGallery;
use App\DesignWork;
use App\Tag;
use App\Upload;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Psr7\str;

class AlbumController extends Controller
{
    public function clientProofs()
    {
        // Get albums
        $albums = Album::where('album_type_id','ca64a5e0-d39b-4f2c-a136-9c523d935ea4')->where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->with('user','status')->get();
        return view('landing.client_proofs.client_proofs',compact('albums'));
    }

    function clientProof($album_id){
        $albumExists = Album::findOrFail($album_id);
        $album = Album::where('id',$album_id)->with('cover_design','scheme','color','orientation','content_align','image_position','album_sets')->first();
//        return $album;
        return view('landing.client_proofs.client_proof',compact('album'));
    }

    function clientProofAccess($album_id){

        // Check if the album is client exclusive

        $albumExists = Album::findOrFail($album_id);
        $album = Album::where('id',$album_id)->with('cover_design','scheme','color','orientation','content_align','image_position','album_sets')->first();

        // Require everyone to put an email
//        if ($album->is_client_exclusive_access == 1){
//
//        } else {
//            return redirect(route('client.proof.show',$album->id));
//        }

//        return $album->cover_image;
//        return $album;
        return view('landing.client_proofs.access',compact('album'));
    }

    function clientProofAccessCheck(Request $request,$album_id){


        // https://medium.com/@panjeh/laravel-detector-mobile-browser-name-version-platform-device-robot-crawler-user-language-8499bee7607c

        $albumExists = Album::findOrFail($album_id);
        $album = Album::where('id',$album_id)->with('cover_design','scheme','color','orientation','content_align','image_position','album_sets')->first();


        // Check if the passwords are the same
        if ($album->password) {
            if ($album->password == $request->password) {

                // Get token expiry
                $expiry = now();
                $expiry->modify('+ 1 hour');

                $albumExists = Album::findOrFail($album_id);
                $albumExists->views++;
                $albumExists->save();

                // Register album view
                $albumView = new AlbumView();
                $albumView->expiry = $expiry;
                $albumView->email = $request->email;
                $albumView->album_id = $albumExists->id;
                $albumView->number = $albumExists->views;
                $albumView->save();

                return redirect(route('client.proof.show', $albumView->id));

                // Generate album view record
            } else {
                return back()->withWarning('The password entered is incorrect');
            }
        }
        // Get token expiry
        $expiry = now();
        $expiry->modify('+ 1 hour');

        $albumExists = Album::findOrFail($album_id);
        $albumExists->views++;
        $albumExists->save();

        // Register album view
        $albumView = new AlbumView();
        $albumView->expiry = $expiry;
        $albumView->email = $request->email;
        $albumView->album_id = $albumExists->id;
        $albumView->number = $albumExists->views;
        $albumView->save();

        return redirect(route('client.proof.show', $albumView->id));
    }

    function clientProofShow($album_view_id){

        // Check if the ablum exists
        $album = Album::where('id',$album_view_id)->first();
        if ($album === null) {

            // get album view id (access token)
            $albumView = AlbumView::findOrFail($album_view_id);

            // check if the token has expired
            if (now() > $albumView->expiry){
                return redirect()->route('client.proof.access',$albumView->album_id)->with('warning', 'The token has expired, please log in again. Thank you.');
            }
            // Get the album
            $album = Album::where('id',$albumView->album_id)->with('cover_design','scheme','color','orientation','content_align','image_position','album_sets','thumbnail_size')->first();

        }else{
            // Get the album
            $album = Album::where('id',$album->id)->with('cover_design','scheme','color','orientation','content_align','image_position','album_sets','thumbnail_size')->first();

            $albumExists = Album::findOrFail($album->id);
            $albumExists->views++;
            $albumExists->save();

            // Register album view
            $albumView = new AlbumView();
            $albumView->album_id = $album->id;
            $albumView->number = $albumExists->views;
            $albumView->save();

        }

//        return $album;
        // Album Sets
        $albumSets = AlbumSet::where('album_id',$album->id)->with('status','user','album_images.upload','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();
        return view('landing.client_proofs.client_proof_show',compact('album','albumSets','albumView'));
    }

    function clientProofDownload($album_view_id){


        // todo Limit Total Number of Gallery Downloads
        $albumView = AlbumView::findOrFail($album_view_id);

        $albumExists = Album::findOrFail($albumView->album_id);
        $album = Album::where('id',$albumView->album_id)->first();

        // Check if the expiry date has expired

        if (now()>$album->expiry_date){
            return back()->withWarning('The download period for the selected proof has expired.');
        }

        // track download
        $albumDownload = new AlbumDownload();
        $albumDownload->album_view_id = $albumView->id;
        $albumDownload->album_id = $album->id;
        $albumDownload->save();

        // Begin download process
        $folderName = str_replace(' ', '',  $album->name.'/');

        // Get folder path
        $path = public_path()."/client/proof/".$folderName.'1500/';
//        return $path;

        // Zip folder
        $zip_file = $album->name.'.zip';
//        $zip_file = str_replace(' ', '',  $album->name.'.zip');
//        return $zip_file;
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file)
        {
            // We're skipping all subfolders
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();

                // extracting filename with substr/strlen
                $relativePath = substr($filePath, strlen($path));

                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return response()->download($zip_file);
    }

    function clientProofDownloadPin(Request $request, $album_view_id){

        // check if the download pin is correct
        // todo Limit Total Number of Gallery Downloads

        $albumView = AlbumView::findOrFail($album_view_id);


        $albumExists = Album::findOrFail($albumView->album_id);
        $album = Album::where('id',$albumView->album_id)->first();

        if (now()>$album->expiry_date){
            return back()->withWarning('The download period for the selected proof has expired.');
        }

        if ($album->client_access_password != $request->client_exclusive_password){
            return back()->withWarning('The client exclusive password entered is incorrect');
        }

        if ($album->download_pin != $request->download_pin){
            return back()->withWarning('The pin entered is incorrect');
        }
        // track download
        $albumDownload = new AlbumDownload();
        $albumDownload->album_view_id = $albumView->id;
        $albumDownload->album_id = $album->id;
        $albumDownload->save();

        // Begin download process
        $folderName = str_replace(' ', '',  $album->name.'/');

        // Get folder path
        $path = public_path()."/client/proof/".$folderName.'1500/';
//        return $path;

        // Zip folder
        $zip_file = $album->name.'.zip';
//        $zip_file = str_replace(' ', '',  $album->name.'.zip');
//        return $zip_file;
        $zip = new \ZipArchive();
        $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);

        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
        foreach ($files as $name => $file)
        {
            // We're skipping all subfolders
            if (!$file->isDir()) {
                $filePath     = $file->getRealPath();

                // extracting filename with substr/strlen
                $relativePath = substr($filePath, strlen($path));

                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();
        return response()->download($zip_file);
    }




    public function personalAlbums()
    {
        // Get albums
        $albums = Album::where('album_type_id','6fdf4858-01ce-43ff-bbe6-827f09fa1cef')->where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->with('user','status')->get();

//        return $albums;
        return view('landing.personal_albums.personal_albums',compact('albums'));
    }

    function personalAlbumAccess($album_id){

        // Check if the album is client exclusive

        $albumExists = Album::findOrFail($album_id);
        $album = Album::where('id',$album_id)->with('cover_design','scheme','color','orientation','content_align','image_position','album_sets')->first();

        // check the password
        if ($album->password){
            return view('landing.personal_albums.access',compact('album'));
//            return redirect()->route('personal.album.access.check',$album->id);
        }else{
            return redirect()->route('personal.album.show',$album->id);
        }
    }

    function personalAlbumAccessCheck(Request $request,$album_id){

        // https://medium.com/@panjeh/laravel-detector-mobile-browser-name-version-platform-device-robot-crawler-user-language-8499bee7607c
        $albumExists = Album::findOrFail($album_id);
        $album = Album::where('id',$album_id)->with('cover_design','scheme','color','orientation','content_align','image_position','album_sets')->first();

        // Check if the passwords are the same
        if ($album->password) {
            if ($album->password == $request->password) {

                // Get token expiry
                $expiry = now();
                $expiry->modify('+ 1 hour');

                $albumExists = Album::findOrFail($album_id);
                $albumExists->views++;
                $albumExists->save();

                // Register album view
                $albumView = new AlbumView();
                $albumView->expiry = $expiry;
                $albumView->email = $request->email;
                $albumView->album_id = $albumExists->id;
                $albumView->number = $albumExists->views;
                $albumView->save();

                return redirect(route('personal.album.show', $albumView->id));

                // Generate album view record
            } else {
                return back()->withWarning('The password entered is incorrect');
            }
        }
        // Get token expiry
        $expiry = now();
        $expiry->modify('+ 1 hour');

        $albumExists = Album::findOrFail($album_id);
        $albumExists->views++;
        $albumExists->save();

        // Register album view
        $albumView = new AlbumView();
        $albumView->expiry = $expiry;
        $albumView->email = $request->email;
        $albumView->album_id = $albumExists->id;
        $albumView->number = $albumExists->views;
        $albumView->save();

        return redirect(route('personal.album.show', $albumView->id));
    }

    function personalAlbumShow($album_view_id){

        // Check if the ablum exists
        $album = Album::where('id',$album_view_id)->first();
        if ($album === null) {

            // get album view id (access token)
            $albumView = AlbumView::findOrFail($album_view_id);

            // check if the token has expired
            if (now() > $albumView->expiry){
                return redirect()->route('client.proof.access',$albumView->album_id)->with('warning', 'The token has expired, please log in again. Thank you.');
            }
            // Get the album
            $album = Album::where('id',$albumView->album_id)->with('cover_design','scheme','color','orientation','content_align','image_position','album_sets','thumbnail_size')->first();

        }else{
            // Get the album
            $album = Album::where('id',$album->id)->with('cover_design','scheme','color','orientation','content_align','image_position','album_sets','thumbnail_size')->first();

            $albumExists = Album::findOrFail($album->id);
            $albumExists->views++;
            $albumExists->save();

            // Register album view
            $albumView = new AlbumView();
            $albumView->album_id = $album->id;
            $albumView->number = $albumExists->views;
            $albumView->save();
        }

        // Album Sets
        $albumSets = AlbumSet::where('album_id',$album->id)->with('status','user','album_images.upload','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();

        return view('landing.personal_albums.personal_album_show',compact('album','albumSets'));
    }


    public function tags()
    {
        $tags = Tag::with('cover_image')->get();
        return view('landing.personal_albums.tags',compact('tags'));
    }
    public function tagShow($tag_id)
    {

        $tag = Tag::where('id',$tag_id)->with('thumbnail_size')->first();
        $uploads = Upload::where('tag_id',$tag_id)->with('album','tag.thumbnail_size')->where('is_password',False)->where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->get();
        return view('landing.personal_albums.tag_show',compact('tag','uploads'));

    }


}
