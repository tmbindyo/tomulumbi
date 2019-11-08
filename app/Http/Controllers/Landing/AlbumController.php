<?php

namespace App\Http\Controllers\Landing;

use App\Album;
use App\AlbumSet;
use App\AlbumView;
use App\Design;
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
        $album = Album::where('id',$album_id)->with('cover_design','scheme','color','orientation','content_align','image_position','album_sets','thumbnail_size')->first();

        // Album Sets
        $albumSets = AlbumSet::where('album_id',$album->id)->with('status','user','album_images.upload','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();

//        return $albumSets;

        return view('landing.client_proofs.client_proof_show',compact('album','albumSets'));
    }

    function clientProofDownload($album_id){

        $albumExists = Album::findOrFail($album_id);
        $album = Album::where('id',$album_id)->first();
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

        $tag = Tag::where('id',$tag_id)->with('uploads.album_image.album_set.album','thumbnail_size')->first();
        return view('landing.personal_albums.tag_show',compact('tag'));

    }

    public function designs()
    {
        // Get designs
        $designs = Design::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->with('cover_image')->get();
        $designsCount = Design::where('status_id','be8843ac-07ab-4373-83d9-0a3e02cd4ff5')->count();

//        return $designsCount;
        // First column
        if($designsCount > 1){
            // first column
            if($designsCount % 2 == 0){
                // Even
                $firstColumnCount = $designsCount/2;
                $secondColumnCount = $designsCount/2;
                // Select
                $firstColumn = DB::table('designs')
                    ->leftJoin('uploads', 'designs.cover_image_id', '=', 'uploads.id')
                    ->leftJoin('clients', 'designs.client_id', '=', 'clients.id')
                    ->select('designs.*','designs.name as design_name', 'clients.name as client_name','uploads.*', 'clients.*')
                    ->where('designs.status_id', 'be8843ac-07ab-4373-83d9-0a3e02cd4ff5')
                    ->orderBy('designs.created_at', 'desc')
                    ->limit($firstColumnCount)
                    ->get();

//                return $firstColumn;
                $secondColumn = DB::table('designs')
                    ->leftJoin('uploads', 'designs.cover_image_id', '=', 'uploads.id')
                    ->leftJoin('clients', 'designs.client_id', '=', 'clients.id')
                    ->select('designs.*','designs.name as design_name', 'clients.name as client_name','uploads.*', 'clients.*')
                    ->where('designs.status_id', 'be8843ac-07ab-4373-83d9-0a3e02cd4ff5')
                    ->orderBy('designs.created_at', 'asc')
                    ->limit($secondColumnCount)
                    ->get();
            }
            else{
                // Odd
                $evenDesigns = $designsCount-1;
                $evenValue = $evenDesigns/2;

                $firstColumnCount = $evenValue+1;
                $secondColumnCount = $evenDesigns/2;
                // Select
                $firstColumn = DB::table('designs')
                    ->leftJoin('uploads', 'designs.cover_image_id', '=', 'uploads.id')
                    ->leftJoin('clients', 'designs.client_id', '=', 'clients.id')
                    ->select('designs.*','designs.name as design_name', 'clients.name as client_name','uploads.*', 'clients.*')
                    ->where('designs.status_id', 'be8843ac-07ab-4373-83d9-0a3e02cd4ff5')
                    ->orderBy('designs.created_at', 'desc')
                    ->limit($firstColumnCount)
                    ->get();

//                return $firstColumn;
                $secondColumn = DB::table('designs')
                    ->leftJoin('uploads', 'designs.cover_image_id', '=', 'uploads.id')
                    ->leftJoin('clients', 'designs.client_id', '=', 'clients.id')
                    ->select('designs.*','designs.name as design_name', 'clients.name as client_name','uploads.*', 'clients.*')
                    ->where('designs.status_id', 'be8843ac-07ab-4373-83d9-0a3e02cd4ff5')
                    ->orderBy('designs.created_at', 'asc')
                    ->limit($secondColumnCount)
                    ->get();

            }
        } else{
            $firstColumn = DB::table('designs')
                ->leftJoin('uploads', 'designs.cover_image_id', '=', 'uploads.id')
                ->leftJoin('clients', 'designs.client_id', '=', 'clients.id')
                ->select('designs.*','designs.name as design_name', 'clients.name as client_name','uploads.*', 'clients.*')
                ->where('designs.status_id', 'be8843ac-07ab-4373-83d9-0a3e02cd4ff5')
                ->orderBy('designs.created_at', 'desc')
                ->get();
            $secondColumn = [];
        }

//        return $firstColumn;
        return view('landing.design.designs',compact('firstColumn','secondColumn'));
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
