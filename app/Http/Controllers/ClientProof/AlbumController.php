<?php

namespace App\Http\Controllers\ClientProof;

use App\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    function albums(){
        $albums = Album::where('album_type_id','ca64a5e0-d39b-4f2c-a136-9c523d935ea4')->where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->get();
        return view('client_proof.landing.albums', compact('albums'));
    }

    function albumProof($album_id){
        $albumExists = Album::findOrFail($album_id);
        $album = Album::where('id',$album_id)->with('cover_design','scheme','color','orientation','content_align','image_position')->first();
        return view('client_proof.album.album',compact('album'));
    }
}
