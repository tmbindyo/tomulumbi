<?php

namespace App\Http\Controllers\Landing;

use App\Album;
use App\AlbumSet;
use App\AlbumView;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    function clientProofShow($album_id){

        $albumExists = Album::findOrFail($album_id);
        $albumExists->views++;
        $albumExists->save();

        // Register album view
        $albumView = new AlbumView();
        $albumView->album_id = $albumExists->id;
        $albumView->number = $albumExists->views;
        $albumView->save();

        // Get the album
        $album = Album::where('id',$album_id)->with('cover_design','scheme','color','orientation','content_align','image_position','album_sets')->first();

        // Album Sets
        $albumSets = AlbumSet::where('album_id',$album->id)->with('status','user','album_images','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();

        return view('landing.client_proofs.client_proof_show',compact('album','albumSets'));
    }


    public function personalAlbums()
    {
        // Get albums
        $albums = Album::where('album_type_id','6fdf4858-01ce-43ff-bbe6-827f09fa1cef')->where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->with('user','status')->get();

//        return $albums;
        return view('landing.personal_albums.personal_albums',compact('albums'));
    }

    function personalAlbumShow($album_id){

        $albumExists = Album::findOrFail($album_id);
        $albumExists->views++;
        $albumExists->save();

        // Register album view
        $albumView = new AlbumView();
        $albumView->album_id = $albumExists->id;
        $albumView->number = $albumExists->views;
        $albumView->save();

        // Get the album
        $album = Album::where('id',$album_id)->with('thumbnail_size')->first();

        // Album Sets
        $albumSets = AlbumSet::where('album_id',$album->id)->with('status','user','album_images','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();

        return view('landing.personal_albums.personal_album_show',compact('album','albumSets'));
    }

    public function designs()
    {
        // Get designs

        return view('landing.design.designs');
    }
    public function designShow($design_id)
    {
        // Get designs

        return view('landing.design.design_show');
    }
    public function designWork($design_work_id)
    {
        // Get designs
        return view('landing.design.design_work');
    }
    public function designGallery($design_id)
    {
        // Get designs
        return view('landing.design.design_gallery');
    }
}
