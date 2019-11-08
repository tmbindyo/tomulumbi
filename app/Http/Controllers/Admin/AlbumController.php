<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Color;
use App\ContentAlign;
use App\CoverDesign;
use App\Design;
use App\GridSpacing;
use App\GridStyle;
use App\ImagePosition;
use App\Orientation;
use App\Scheme;
use App\ThumbnailSize;
use App\Traits\PasswordTrait;
use App\Typography;
use App\Upload;
use DB;
use Auth;
use App\Tag;
use App\ToDo;
use App\Album;
use App\Status;
use App\AlbumSet;
use App\AlbumTag;
use App\Category;
use App\AlbumImage;
use App\AlbumCategory;
use App\Traits\UserTrait;
//use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\AlbumDownloadRestrictionEmail;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class AlbumController extends Controller
{
    use UserTrait;
    use PasswordTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function personalAlbums()
    {
        // User
        $user = $this->getAdmin();
        // Get albums
        $albums = Album::with('user','status')->where('album_type_id','6fdf4858-01ce-43ff-bbe6-827f09fa1cef')->get();
//        return $albums;
        return view('admin.personal_albums',compact('albums','user'));
    }

    public function personalAlbumCreate()
    {
        // Tags
        $tags = Tag::all();

        // User
        $user = $this->getAdmin();
        return view('admin.personal_album_create',compact('user','tags'));
    }

    public function personalAlbumStore(Request $request)
    {

        $album = new Album();
        $album->name = $request->name;
        $album->location = $request->location;
        $album->date = date('Y-m-d', strtotime($request->date));

        if ($request->is_homepage_visible){
            $album->is_homepage_visible = True;
        }
        else{
            $album->is_homepage_visible = False;
        }

        $album->is_auto_expiry = False;

        $album->views = 0;
        $album->is_client_exclusive_access = False;
        $album->album_type_id = "6fdf4858-01ce-43ff-bbe6-827f09fa1cef";
        $album->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $album->thumbnail_size_id = "36400ca6-68d0-4897-b22f-6bc04bbaa929";
        $album->user_id = Auth::user()->id;
        $album->save();


        foreach ($request->tags as $albumAlbumTag){
            $albumTag = new AlbumTag();
            $albumTag->album_id = $album->id;
            $albumTag->tag_id = $albumAlbumTag;
            $albumTag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $albumTag->user_id = Auth::user()->id;
            $albumTag->save();

            // Get album tag name to name album set
            $tag = Tag::findOrFail($albumAlbumTag);
            $albumSet = new AlbumSet();
            $albumSet->album_id = $album->id;
            $albumSet->name = $tag->name;
            $albumSet->is_client_exclusive_access = False;
            $albumSet->is_email_download_restrict = False;
            $albumSet->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $albumSet->user_id = Auth::user()->id;
            $albumSet->save();
        }

        // Save Album set
//        $albumSet = new AlbumSet();
//        $albumSet->album_id = $album->id;
//        $albumSet->name = "Highlights";
//        $albumSet->is_client_exclusive_access = False;
//        $albumSet->is_email_download_restrict = False;
//        $albumSet->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
//        $albumSet->user_id = Auth::user()->id;
//        $albumSet->save();


        return redirect()->route('admin.personal.albums')->withSuccess('Album '.$album->name.' successfully created!');
    }

    public function personalAlbumShow($album_id)
    {
        // Check if album exists
        $albumExists = Album::findOrFail($album_id);

        // User
        $user = $this->getAdmin();

        // Tags
        $tags = Tag::all();

        // Client Proof Design
        $typographies = Typography::all();
        $thumbnailSizes = ThumbnailSize::all();

        // Album & Image status
        $albumStatuses = Status::where('status_type_id','12a49330-14a5-41d2-b62d-87cdf8b252f8')->get();

        // Get album
        $album = Album::with('user','status','cover_image','album_download_restriction_emails')->where('id',$album_id)->first();

        // Get all albums for to do dropdown
        $albums = Album::with('user','status')->get();

        // Album To Do's
        // Pending to dos
        $pendingToDos = ToDo::with('user','status','album')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('album_id',$album->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','album')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('album_id',$album->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','album')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('album_id',$album->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','album')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('album_id',$album->id)->get();

        // Album Dependencies
        // Album Sets
        $albumSets = AlbumSet::where('album_id',$album->id)->with('status','user','album_images.upload','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();
        $albumTags = AlbumTag::where('album_id',$album_id)->with('album','tag')->get();
        $albumDownloadRestrictionEmails = AlbumDownloadRestrictionEmail::where('album_id',$album_id)->get();

        return view('admin.personal_album_show',compact('album','user','albumSets','tags','albumTags','albumStatuses','albumDownloadRestrictionEmails','pendingToDos', 'inProgressToDos','completedToDos','overdueToDos', 'albums', 'typographies', 'thumbnailSizes'));
    }

    public function personalAlbumDelete($album_id)
    {

        $album = Album::findOrFail($album_id);
        $album->status_id = 'b810f2f1-91c2-4fc9-b8e1-acc068caa03a';
        $album->save();

        return back()->withStatus(__('Personal Album successfully deleted.'));
    }

    public function personalAlbumRestore($album_id)
    {

        $album = Album::findOrFail($album_id);
        $album->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $album->save();

        return back()->withStatus(__('Personal album successfully restored.'));
    }

    public function personalAlbumCoverImageUpload(Request $request,$album_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $album = Album::where('id',$album_id)->first();
        $folderName = str_replace(' ', '', $album->name."/Banner/");

//        return $folderName;

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/personal/album/".$folderName, $file_name_extension);
        $path = public_path()."/personal/album/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $cover_image = $file_name.".".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();


        $small_thumbnail = "Thumbnail/Small/".$file_name.".".$extension;
        $large_thumbnail = "Thumbnail/Large/".$file_name.".".$extension;
        $banner = "banner".".".$extension;

        // Make directories
        File::makeDirectory(public_path()."/personal/album/".$folderName."Thumbnail/Small/", $mode = 0750, true, true);
        File::makeDirectory(public_path()."/personal/album/".$folderName."Thumbnail/Large/", $mode = 0750, true, true);

        // Resize image
        // image

        if ($width > $height) { //landscape

            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/personal/album/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(750, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/personal/album/".$folderName.$large_thumbnail);

            Image::make( $path )->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/personal/album/".$folderName.$banner);

        } else {

            Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/personal/album/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(null, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/personal/album/".$folderName.$large_thumbnail);

            Image::make( $path )->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/personal/album/".$folderName.$banner);

        }

        $img = Image::make($path);
        $size = $img->filesize();

        if ($img->exif()) {
            $Artist = $img->exif('Artist');
            $ApertureFNumber = $img->exif('COMPUTED->ApertureFNumber');
            $Copyright = $img->exif('COMPUTED->Copyright');
            $Height = $img->exif('COMPUTED->Height');
            $Width = $img->exif('COMPUTED->Width');
            $DateTime = $img->exif('DateTime');
            $ShutterSpeed = $img->exif('ExposureTime');
            $FileName = $img->exif('FileName');
            $FileSize = $img->exif('FileSize');
            $ISOSpeedRatings = $img->exif('ISOSpeedRatings');
            $FocalLength = $img->exif('FocalLength');
            $LightSource = $img->exif('LightSource');
            $MaxApertureValue = $img->exif('MaxApertureValue');
            $MimeType = $img->exif('MimeType');
            $Make = $img->exif('Make');
            $Model = $img->exif('Model');
            $Software = $img->exif('Software');

        }else{
            $Artist = "Pending";
            $ApertureFNumber = "Pending";
            $Copyright = "Pending";
            $Height = "Pending";
            $Width = "Pending";
            $DateTime = "Pending";
            $ShutterSpeed = "Pending";
            $FileName = "Pending";
            $FileSize = "Pending";
            $ISOSpeedRatings = "Pending";
            $FocalLength = "Pending";
            $LightSource = "Pending";
            $MaxApertureValue = "Pending";
            $MimeType = "Pending";
            $Make = "Pending";
            $Model = "Pending";
            $Software = "Pending";
        }


        $upload = new Upload();
        $upload->artist = $Artist;
        $upload->aperture_f_number = $ApertureFNumber;
        $upload->copyright = $Copyright;
        $upload->height = $Height;
        $upload->width = $Width;
        $upload->date_time = $DateTime;
        $upload->file_name = $FileName;
        $upload->file_size = $FileSize;
        $upload->iso = $ISOSpeedRatings;
        $upload->focal_length = $FocalLength;
        $upload->light_source = $LightSource;
        $upload->max_aperture_value = $MaxApertureValue;
        $upload->mime_type = $MimeType;
        $upload->make = $Make;
        $upload->model = $Model;
        $upload->software = $Software;
        $upload->shutter_speed = $ShutterSpeed;

        $upload->name = $file_name;
        $upload->extension = $extension;
        $upload->image = "personal/album/".$folderName.$file_name;
        $upload->small_thumbnail = "personal/album/".$folderName.$small_thumbnail;
        $upload->large_thumbnail = "personal/album/".$folderName.$large_thumbnail;
        $upload->banner = "personal/album/".$folderName.$banner;

        $upload->size = $size;
        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = False;
        $upload->album_id = $album_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update album cover image
        $album = Album::findOrFail($album_id);
        $album->cover_image_id = $upload->id;
        $album->save();

        return back()->withStatus(__('Client proof cover image successfully uploaded.'));
    }

    public function personalAlbumUpdateCollectionSettings(Request $request, $album_id)
    {

        $album = Album::findOrFail($album_id);
        $album->name = $request->name;
        $album->date = date('Y-m-d', strtotime($request->date));
        $album->status_id = $request->status;
        $album->expiry_date = date('Y-m-d', strtotime($request->expiry_date));
        $album->save();

        // Album tags update
        $albumRequestTags =array();
        foreach ($request->tags as $albumAlbumTag){
            // Append to array
            $albumRequestTags[]['id'] = $albumAlbumTag;

            // Check if album tag exists
            $albumTag = AlbumTag::where('album_id',$album->id)->where('tag_id',$albumAlbumTag)->first();

            if($albumTag === null) {
                $albumTag = new AlbumTag();
                $albumTag->album_id = $album->id;
                $albumTag->tag_id = $albumAlbumTag;
                $albumTag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $albumTag->user_id = Auth::user()->id;
                $albumTag->save();

                $tag = Tag::findOrFail($albumAlbumTag);
                $albumSet = new AlbumSet();
                $albumSet->album_id = $album->id;
                $albumSet->name = $tag->name;
                $albumSet->is_client_exclusive_access = False;
                $albumSet->is_email_download_restrict = False;
                $albumSet->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $albumSet->user_id = Auth::user()->id;
                $albumSet->save();
            }
        }

        // Parse the deleted album tags into an array
        $albumTagsIds = AlbumTag::where('album_id',$album_id)->whereNotIn('tag_id',$albumRequestTags)->select('id')->get()->toArray();
        // Get the album tag, tag_id
        $albumTagTagIds = AlbumTag::where('album_id',$album_id)->whereNotIn('tag_id',$albumRequestTags)->select('tag_id')->get()->toArray();
        // Get names of deleted tags
        $tagNames = Tag::whereIn('id',$albumTagTagIds)->select('name')->get()->toArray();

        // Delete removed album tags
        DB::table('album_tags')->whereIn('id', $albumTagsIds)->delete();
        // Delete removed album tag album set
        DB::table('album_sets')->whereIn('name', $tagNames)->where('album_id',$album->id)->delete();

        return back()->withStatus('Album collection settings updated!');
    }

    public function personalAlbumUpdateDesign(Request $request, $album_id)
    {
        $album = Album::findOrFail($album_id);
        $album->typography_id = $request->typography;
        $album->thumbnail_size_id = $request->thumbnail_size;
        $album->save();

        return back()->withSuccess('Personal album design updated!');
    }

    public function personalAlbumSetImageUpload(Request $request,$album_set_id)
    {
        // todo If already image delete
        // todo hash the folder name
        // Get the tag


        $albumSet = AlbumSet::where('id',$album_set_id)->with('album')->first();
        $tag = Tag::where('name',$albumSet->name)->first();
        $folderName = str_replace(' ', '', $albumSet->album->name."/" .$albumSet->name.'/');
        $originalFolderName = str_replace(' ', '', $albumSet->album->name."/Original/" .$albumSet->name.'/');
        $smallFolderName = str_replace(' ', '', $albumSet->album->name."/Small/" .$albumSet->name.'/');

        $pixel100FolderName = str_replace(' ', '', "personal/album/".$albumSet->album->name."/100/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "personal/album/".$albumSet->album->name."/300/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "personal/album/".$albumSet->album->name."/500/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "personal/album/".$albumSet->album->name."/750/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "personal/album/".$albumSet->album->name."/1000/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "personal/album/".$albumSet->album->name."/1500/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "personal/album/".$albumSet->album->name."/2500/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "personal/album/".$albumSet->album->name."/3600/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("file");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/personal/album/".$originalFolderName, $file_name_extension);
        $path = public_path()."/personal/album/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            Image::make( $path )->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            Image::make( $path )->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);
            Image::make( $path )->resize(750, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            Image::make( $path )->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            Image::make( $path )->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            Image::make( $path )->resize(2500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            Image::make( $path )->resize(3600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        } else {

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            Image::make( $path )->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);
            Image::make( $path )->resize(null, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            Image::make( $path )->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            Image::make( $path )->resize(null, 1500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            Image::make( $path )->resize(null, 2500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            Image::make( $path )->resize(null, 3600, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        }

        $img = Image::make($path);
        $size = $img->filesize();

        if ($img->exif()) {
            $Artist = $img->exif('Artist');
            $ApertureFNumber = $img->exif('COMPUTED->ApertureFNumber');
            $Copyright = $img->exif('COMPUTED->Copyright');
            $Height = $img->exif('COMPUTED->Height');
            $Width = $img->exif('COMPUTED->Width');
            $DateTime = $img->exif('DateTime');
            $ShutterSpeed = $img->exif('ExposureTime');
            $FileName = $img->exif('FileName');
            $FileSize = $img->exif('FileSize');
            $ISOSpeedRatings = $img->exif('ISOSpeedRatings');
            $FocalLength = $img->exif('FocalLength');
            $LightSource = $img->exif('LightSource');
            $MaxApertureValue = $img->exif('MaxApertureValue');
            $MimeType = $img->exif('MimeType');
            $Make = $img->exif('Make');
            $Model = $img->exif('Model');
            $Software = $img->exif('Software');

        }else{
            $Artist = "Pending";
            $ApertureFNumber = "Pending";
            $Copyright = "Pending";
            $Height = "Pending";
            $Width = "Pending";
            $DateTime = "Pending";
            $ShutterSpeed = "Pending";
            $FileName = "Pending";
            $FileSize = "Pending";
            $ISOSpeedRatings = "Pending";
            $FocalLength = "Pending";
            $LightSource = "Pending";
            $MaxApertureValue = "Pending";
            $MimeType = "Pending";
            $Make = "Pending";
            $Model = "Pending";
            $Software = "Pending";
        }

        $upload = new Upload();
        $upload->artist = $Artist;
        $upload->aperture_f_number = $ApertureFNumber;
        $upload->copyright = $Copyright;
        $upload->height = $Height;
        $upload->width = $Width;
        $upload->date_time = $DateTime;
        $upload->file_name = $FileName;
        $upload->file_size = $FileSize;
        $upload->iso = $ISOSpeedRatings;
        $upload->focal_length = $FocalLength;
        $upload->light_source = $LightSource;
        $upload->max_aperture_value = $MaxApertureValue;
        $upload->mime_type = $MimeType;
        $upload->make = $Make;
        $upload->model = $Model;
        $upload->software = $Software;
        $upload->shutter_speed = $ShutterSpeed;

        $upload->name = $file_name;
        $upload->extension = $extension;
        $upload->image = $smallFolderName.$image_name;

        $upload->pixels100 = $pixel100FolderName.$image_name;
        $upload->pixels300 = $pixel300FolderName.$image_name;
        $upload->pixels500 = $pixel500FolderName.$image_name;
        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1000 = $pixel1000FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;
        $upload->pixels2500 = $pixel2500FolderName.$image_name;
        $upload->pixels3600 = $pixel3600FolderName.$image_name;
        $upload->original = $originalFolderName.$image_name;

        $upload->size = $size;
        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = True;
        $upload->album_set_id = $album_set_id;
        $upload->tag_id = $tag->id;
        $upload->upload_type_id = "b3399a38-b355-4235-8f93-36baf410eef2";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        $albumImage = new AlbumImage();
        $albumImage->album_set_id = $album_set_id;
        $albumImage->upload_id = $upload->id;
        $albumImage->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumImage->user_id = Auth::user()->id;
        $albumImage->save();


        return back()->withStatus(__('Album set image successfully uploaded.'));
    }




    public function clientProofs()
    {
        // User
        $user = $this->getAdmin();
        // Get albums
        $albums = Album::with('user','status')->where('album_type_id','ca64a5e0-d39b-4f2c-a136-9c523d935ea4')->get();
        return view('admin.client_proofs',compact('albums','user'));
    }

    public function clientProofCreate()
    {
        // Tags
        $tags = Tag::all();

        // User
        $user = $this->getAdmin();
        return view('admin.client_proof_create',compact('user','tags'));
    }

    public function clientProofStore(Request $request)
    {

        $album = new Album();
        $album->name = $request->name;
        $album->date = date('Y-m-d', strtotime($request->date));

        if ($request->is_homepage_visible){
            $album->is_homepage_visible = True;
        }
        else{
            $album->is_homepage_visible = False;
        }

        if ($request->is_auto_expiry){
            $album->is_auto_expiry = True;
            $album->expiry_date = date('Y-m-d', strtotime($request->expiry_date));
        }
        else{
            $album->is_auto_expiry = False;
        }

        // Not sure why this was here
//        $album->thumbnail_size_id = "6fdf4858-01ce-43ff-bbe6-827f09fa1cef";
        $album->thumbnail_size_id = "36400ca6-68d0-4897-b22f-6bc04bbaa929";

        $album->cover_design_id = "5e664dd9-8fe4-4f08-82de-80b0f41c592b";
        $album->scheme_id = "5e664dd9-8fe4-4f08-82de-80b0f41c592b";
        $album->color_id = "cb14e177-d992-4151-8200-6d2c9992f581";
        $album->orientation_id = "5e664dd9-8fe4-4f08-82de-80b0f41c592b";
        $album->content_align_id = "5e664dd9-8fe4-4f08-82de-80b0f41c592b";
        $album->image_position_id = "54aa3f5c-a52e-4f68-902a-f8c45a51c948";

        $album->views = 0;
        $album->is_client_exclusive_access = False;
        $album->password = $this->generatePassword();
        $album->client_access_password = $this->generatePassword();
        $album->album_type_id = "ca64a5e0-d39b-4f2c-a136-9c523d935ea4";
        $album->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $album->user_id = Auth::user()->id;
        $album->save();

        foreach ($request->tags as $albumAlbumTag){
            $albumTag = new AlbumTag();
            $albumTag->album_id = $album->id;
            $albumTag->tag_id = $albumAlbumTag;
            $albumTag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $albumTag->user_id = Auth::user()->id;
            $albumTag->save();
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


        return redirect()->route('admin.client.proofs')->withSuccess('Album '.$album->name.' successfully created!');

    }

    public function clientProofShow($album_id)
    {
        // Check if album exists
        $albumExists = Album::findOrFail($album_id);

        // User
        $user = $this->getAdmin();
        // Thumbnail sizes
        $thumbnailSizes = ThumbnailSize::all();

        // Tags
        $tags = Tag::all();

        // Client Proof Design
        $typographies = Typography::all();

        // Cover Image
        $coverDesigns = CoverDesign::all();
        $schemes = Scheme::all();
        $colors = Color::all();
        $orientations = Orientation::all();
        $contentAligns = ContentAlign::all();
        $imagePositions = ImagePosition::all();


        // Album & Image status
        $albumStatuses = Status::where('status_type_id','12a49330-14a5-41d2-b62d-87cdf8b252f8')->get();

        // Get album
        $album = Album::with('user','status','cover_image','album_download_restriction_emails')->where('id',$album_id)->first();

        // Get all albums for to do dropdown
        $albums = Album::with('user','status')->get();

        // Album To Do's
        // Pending to dos
        $pendingToDos = ToDo::with('user','status','album')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('album_id',$album->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','album')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('album_id',$album->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','album')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('album_id',$album->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','album')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('album_id',$album->id)->get();

        // Album Dependencies
        // Album Sets
        $albumSets = AlbumSet::where('album_id',$album->id)->with('status','user','album_images.upload','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();
        $albumTags = AlbumTag::where('album_id',$album_id)->with('album','tag')->get();
        $albumDownloadRestrictionEmails = AlbumDownloadRestrictionEmail::where('album_id',$album_id)->get();

        return view('admin.client_proof_show',compact('album','user','albumSets','tags','albumTags','albumStatuses','albumDownloadRestrictionEmails','pendingToDos', 'inProgressToDos','completedToDos','overdueToDos', 'albums', 'typographies', 'colors','schemes','orientations','contentAligns','imagePositions','coverDesigns','orientations','thumbnailSizes'));
    }

    public function clientProofDelete($album_id)
    {

        $album = Album::findOrFail($album_id);
        $album->status_id = 'b810f2f1-91c2-4fc9-b8e1-acc068caa03a';
        $album->save();

        return back()->withStatus(__('Client proof successfully deleted.'));
    }

    public function clientProofRestore($album_id)
    {

        $album = Album::findOrFail($album_id);
        $album->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $album->save();

        return back()->withStatus(__('Client proof successfully restored.'));
    }



    // Update
    public function albumUpdateCollectionSettings(Request $request, $album_id)
    {

        $album = Album::findOrFail($album_id);
        $album->name = $request->name;
        $album->date = date('Y-m-d', strtotime($request->date));
        $album->status_id = $request->status;
        $album->expiry_date = date('Y-m-d', strtotime($request->expiry_date));
        $album->save();

        // Album tags update
        $albumRequestTags =array();
        foreach ($request->tags as $albumAlbumTag){
            // Append to array
            $albumRequestTags[]['id'] = $albumAlbumTag;

            // Check if album tag exists
            $albumTag = AlbumTag::where('album_id',$album->id)->where('tag_id',$albumAlbumTag)->first();

            if($albumTag === null) {
                $albumTag = new AlbumTag();
                $albumTag->album_id = $album->id;
                $albumTag->tag_id = $albumAlbumTag;
                $albumTag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $albumTag->user_id = Auth::user()->id;
                $albumTag->save();
            }
        }

        $albumTagsIds = AlbumTag::where('album_id',$album_id)->whereNotIn('tag_id',$albumRequestTags)->select('id')->get()->toArray();
        DB::table('album_tags')->whereIn('id', $albumTagsIds)->delete();

        return back()->withStatus('Album collection settings updated!');
    }

    public function clientProofUpdateDesign(Request $request, $album_id)
    {
        $album = Album::findOrFail($album_id);
        $album->typography_id = $request->typography;
        $album->thumbnail_size_id = $request->thumbnail_size;
        $album->save();

        return back()->withSuccess('Client proof design updated!');
    }

    public function clientProofUpdateCoverImageDesign(Request $request, $album_id)
    {

        $album = Album::findOrFail($album_id);

        $album->cover_design_id = $request->cover_design;
        $album->scheme_id = $request->scheme;
        $album->color_id = $request->color;
        $album->orientation_id = $request->orientation;
        $album->content_align_id = $request->content_align;
        $album->image_position_id = $request->image_position;
        $album->save();

        return back()->withSuccess('Client proof design updated!');
    }

    public function clientProofUpdatePrivacy(Request $request, $album_id)
    {

        $album = Album::findOrFail($album_id);

        // TODO Update column password to album_password
        $album->password = $request->album_password;

        if ($request->is_homepage_visible){
            $album->is_homepage_visible = True;
        }
        else{
            $album->is_homepage_visible = False;
        }

        if ($request->is_client_exclusive_access){
            $album->is_client_exclusive_access = True;
        }
        else{
            $album->is_client_exclusive_access = False;
        }

        // TODO Update db column from client_access_password to client_exclusive_access_password
        $album->client_access_password = $request->client_exclusive_access_password;

        if ($request->is_client_make_private){
            $album->is_client_make_private = True;
        }
        else{
            $album->is_client_make_private = False;
        }

        $album->save();

        return back()->withStatus('Album privacy updated!');
    }

    public function clientProofCoverImageUpload(Request $request,$album_id)
    {

        // todo If already image delete
        // todo hash the folder name
        $album = Album::where('id',$album_id)->first();
        $folderName = str_replace(' ', '', $album->name."/Banner/");

//        return $folderName;

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/client/proof/".$folderName, $file_name_extension);
        $path = public_path()."/client/proof/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $cover_image = $file_name.".".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();


        $small_thumbnail = "Thumbnail/Small/".$file_name.".".$extension;
        $large_thumbnail = "Thumbnail/Large/".$file_name.".".$extension;
        $banner = "banner".".".$extension;

        // Make directories
        File::makeDirectory(public_path()."/client/proof/".$folderName."Thumbnail/Small/", $mode = 0750, true, true);
        File::makeDirectory(public_path()."/client/proof/".$folderName."Thumbnail/Large/", $mode = 0750, true, true);

        // Resize image
        // image upload
        Image::make( $path )->fit(353, 326)->save(public_path()."/client/proof/".$folderName.$small_thumbnail);
        Image::make( $path )->fit(823, 760)->save(public_path()."/client/proof/".$folderName.$large_thumbnail);
        Image::make( $path )->fit(1294, 1195)->save(public_path()."/client/proof/".$folderName.$banner);

        $img = Image::make($path);
        $size = $img->filesize();

        if ($img->exif()) {
            $Artist = $img->exif('Artist');
            $ApertureFNumber = $img->exif('COMPUTED->ApertureFNumber');
            $Copyright = $img->exif('COMPUTED->Copyright');
            $Height = $img->exif('COMPUTED->Height');
            $Width = $img->exif('COMPUTED->Width');
            $DateTime = $img->exif('DateTime');
            $ShutterSpeed = $img->exif('ExposureTime');
            $FileName = $img->exif('FileName');
            $FileSize = $img->exif('FileSize');
            $ISOSpeedRatings = $img->exif('ISOSpeedRatings');
            $FocalLength = $img->exif('FocalLength');
            $LightSource = $img->exif('LightSource');
            $MaxApertureValue = $img->exif('MaxApertureValue');
            $MimeType = $img->exif('MimeType');
            $Make = $img->exif('Make');
            $Model = $img->exif('Model');
            $Software = $img->exif('Software');

        }else{
            $Artist = "Pending";
            $ApertureFNumber = "Pending";
            $Copyright = "Pending";
            $Height = "Pending";
            $Width = "Pending";
            $DateTime = "Pending";
            $ShutterSpeed = "Pending";
            $FileName = "Pending";
            $FileSize = "Pending";
            $ISOSpeedRatings = "Pending";
            $FocalLength = "Pending";
            $LightSource = "Pending";
            $MaxApertureValue = "Pending";
            $MimeType = "Pending";
            $Make = "Pending";
            $Model = "Pending";
            $Software = "Pending";
        }


        $upload = new Upload();
        $upload->artist = $Artist;
        $upload->aperture_f_number = $ApertureFNumber;
        $upload->copyright = $Copyright;
        $upload->height = $Height;
        $upload->width = $Width;
        $upload->date_time = $DateTime;
        $upload->file_name = $FileName;
        $upload->file_size = $FileSize;
        $upload->iso = $ISOSpeedRatings;
        $upload->focal_length = $FocalLength;
        $upload->light_source = $LightSource;
        $upload->max_aperture_value = $MaxApertureValue;
        $upload->mime_type = $MimeType;
        $upload->make = $Make;
        $upload->model = $Model;
        $upload->software = $Software;
        $upload->shutter_speed = $ShutterSpeed;

        $upload->name = $file_name;
        $upload->extension = $extension;
        $upload->image = "client/proof/".$folderName.$file_name;
        $upload->small_thumbnail = "client/proof/".$folderName.$small_thumbnail;
        $upload->large_thumbnail = "client/proof/".$folderName.$large_thumbnail;
        $upload->banner = "client/proof/".$folderName.$banner;

        $upload->size = $size;
        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = False;
        $upload->album_id = $album_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update album cover image
        $album = Album::findOrFail($album_id);
        $album->cover_image_id = $upload->id;
        $album->save();

        return back()->withStatus(__('Client proof cover image successfully uploaded.'));
    }

    public function clientProofUpdateDownload(Request $request, $album_id)
    {

        $album = Album::findOrFail($album_id);

        if ($request->is_download){
            $album->is_download = True;
        }
        else{
            $album->is_download = False;
        }
        $album->download_pin = $request->download_pin;
        $album->download_restriction_limit = $request->download_restriction_limit;

        $album->save();

        return back()->withStatus('Album download updated!');
    }

    public function clientProofSetStatus ($album_set_id) {
        // Remove appended %7D
        $remove = '%7D' ;
        $trimmed = str_replace($remove, '', $album_set_id) ;

        // Get album set
        $albumSet = AlbumSet::where('id', $trimmed)->first();

        // Update status
        if($albumSet->is_client_exclusive_access == 0){
            // Album set not client only
            $albumSet->is_client_exclusive_access = True;
        } elseif($albumSet->is_client_exclusive_access == 1){
            // Album set client only
            $albumSet->is_client_exclusive_access = False;
        }
        else{

        }
        $albumSet->save();

        echo 'Album set visibility successfully changed!';

    }

    public function clientProofSetDownloadStatus ($album_set_id) {
        // Remove appended %7D
        $remove = '%7D' ;
        $trimmed = str_replace($remove, '', $album_set_id) ;

        // Get album set
        $albumSet = AlbumSet::where('id', $trimmed)->first();

        // Update status
        if($albumSet->is_email_download_restrict == 0){
            // Album set not client only
            $albumSet->is_email_download_restrict = True;
        } elseif($albumSet->is_email_download_restrict == 1){
            // Album set client only
            $albumSet->is_email_download_restrict = False;
        }
        else{

        }
        $albumSet->save();

        echo 'Album set client download successfully changed!';

    }

    public function generateClientProofPassword ($album_id) {
        $password = $this->generatePassword();
        return $password;
    }

    public function generateClientProofPin ($album_id) {
        $pin = $this->generatePin();
        return $pin;
    }

    public function clientProofDownloadRestrictionEmail ($album_id,$email) {
        // Remove appended %7D
        $remove = '%7D' ;
        $trimmed = str_replace($remove, '', $album_id) ;

        // Update album set is_email_download_restrict to true
        $album = Album::where('id', $trimmed)->first();
        $album->is_email_download_restrict = True;
        $album->save();

        $albumDownloadRestrictionEmail = new AlbumDownloadRestrictionEmail();
        $albumDownloadRestrictionEmail->album_id = $trimmed;
        $albumDownloadRestrictionEmail->email = $email;
        $albumDownloadRestrictionEmail->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumDownloadRestrictionEmail->user_id = Auth::user()->id;
        $albumDownloadRestrictionEmail->save();
        echo 'Client proof restricted to '.$email;
    }

    public function clientProofDownloadRestrictionEmailDelete($album_download_restriction_id)
    {

        $albumDownloadRestrictionEmail = AlbumDownloadRestrictionEmail::findOrFail($album_download_restriction_id);
        $albumDownloadRestrictionEmail->delete();

        return back()->withStatus(__('Client proof download restriction email successfully deleted.'));
    }

    public function clientProofSetSave(Request $request, $album_id)
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

    public function clientProofSetImageUpload(Request $request,$album_set_id)
    {

        // todo If already image delete
        // todo hash the folder name
        $albumSet = AlbumSet::where('id',$album_set_id)->with('album')->first();
        $folderName = str_replace(' ', '', $albumSet->album->name."/" .$albumSet->name.'/');
        $originalFolderName = str_replace(' ', '', $albumSet->album->name."/Original/" .$albumSet->name.'/');
        $smallFolderName = str_replace(' ', '', $albumSet->album->name."/Small/" .$albumSet->name.'/');

        $pixel100FolderName = str_replace(' ', '', "client/proof/".$albumSet->album->name."/100/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "client/proof/".$albumSet->album->name."/300/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "client/proof/".$albumSet->album->name."/500/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "client/proof/".$albumSet->album->name."/750/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "client/proof/".$albumSet->album->name."/1000/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "client/proof/".$albumSet->album->name."/1500/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "client/proof/".$albumSet->album->name."/2500/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "client/proof/".$albumSet->album->name."/3600/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("file");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/client/proof/".$originalFolderName, $file_name_extension);
        $path = public_path()."/client/proof/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            Image::make( $path )->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            Image::make( $path )->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);
            Image::make( $path )->resize(750, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            Image::make( $path )->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            Image::make( $path )->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            Image::make( $path )->resize(2500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            Image::make( $path )->resize(3600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        } else {

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel300FolderName.$image_name);
            Image::make( $path )->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel500FolderName.$image_name);
            Image::make( $path )->resize(null, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            Image::make( $path )->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1000FolderName.$image_name);
            Image::make( $path )->resize(null, 1500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);
            Image::make( $path )->resize(null, 2500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel2500FolderName.$image_name);
            Image::make( $path )->resize(null, 3600, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel3600FolderName.$image_name);

        }

        $img = Image::make($path);
        $size = $img->filesize();

        if ($img->exif()) {
            $Artist = $img->exif('Artist');
            $ApertureFNumber = $img->exif('COMPUTED->ApertureFNumber');
            $Copyright = $img->exif('COMPUTED->Copyright');
            $Height = $img->exif('COMPUTED->Height');
            $Width = $img->exif('COMPUTED->Width');
            $DateTime = $img->exif('DateTime');
            $ShutterSpeed = $img->exif('ExposureTime');
            $FileName = $img->exif('FileName');
            $FileSize = $img->exif('FileSize');
            $ISOSpeedRatings = $img->exif('ISOSpeedRatings');
            $FocalLength = $img->exif('FocalLength');
            $LightSource = $img->exif('LightSource');
            $MaxApertureValue = $img->exif('MaxApertureValue');
            $MimeType = $img->exif('MimeType');
            $Make = $img->exif('Make');
            $Model = $img->exif('Model');
            $Software = $img->exif('Software');

        }else{
            $Artist = "Pending";
            $ApertureFNumber = "Pending";
            $Copyright = "Pending";
            $Height = "Pending";
            $Width = "Pending";
            $DateTime = "Pending";
            $ShutterSpeed = "Pending";
            $FileName = "Pending";
            $FileSize = "Pending";
            $ISOSpeedRatings = "Pending";
            $FocalLength = "Pending";
            $LightSource = "Pending";
            $MaxApertureValue = "Pending";
            $MimeType = "Pending";
            $Make = "Pending";
            $Model = "Pending";
            $Software = "Pending";
        }

        $upload = new Upload();
        $upload->artist = $Artist;
        $upload->aperture_f_number = $ApertureFNumber;
        $upload->copyright = $Copyright;
        $upload->height = $Height;
        $upload->width = $Width;
        $upload->date_time = $DateTime;
        $upload->file_name = $FileName;
        $upload->file_size = $FileSize;
        $upload->iso = $ISOSpeedRatings;
        $upload->focal_length = $FocalLength;
        $upload->light_source = $LightSource;
        $upload->max_aperture_value = $MaxApertureValue;
        $upload->mime_type = $MimeType;
        $upload->make = $Make;
        $upload->model = $Model;
        $upload->software = $Software;
        $upload->shutter_speed = $ShutterSpeed;

        $upload->name = $file_name;
        $upload->extension = $extension;
        $upload->image = $smallFolderName.$image_name;

        $upload->pixels100 = $pixel100FolderName.$image_name;
        $upload->pixels300 = $pixel300FolderName.$image_name;
        $upload->pixels500 = $pixel500FolderName.$image_name;
        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1000 = $pixel1000FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;
        $upload->pixels2500 = $pixel2500FolderName.$image_name;
        $upload->pixels3600 = $pixel3600FolderName.$image_name;
        $upload->original = $originalFolderName.$image_name;

        $upload->size = $size;
        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = True;
        $upload->album_set_id = $album_set_id;
        $upload->upload_type_id = "b3399a38-b355-4235-8f93-36baf410eef2";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        $albumImage = new AlbumImage();
        $albumImage->album_set_id = $album_set_id;
        $albumImage->upload_id = $upload->id;
        $albumImage->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumImage->user_id = Auth::user()->id;
        $albumImage->save();


        return back()->withStatus(__('Album set image successfully uploaded.'));
    }

}
