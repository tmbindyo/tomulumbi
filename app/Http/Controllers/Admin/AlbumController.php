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
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\AlbumDownloadRestrictionEmail;
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
        $albumSets = AlbumSet::where('album_id',$album->id)->with('status','user','album_images','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();
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
        $folderName = str_replace(' ', '', $album->name."/");

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/personal/album/".$folderName, $file_name_extension);
        $path = public_path()."/personal/album/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $cover_image = $file_name.".".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        $small_thumbnail = $file_name."_small_thumbnail.".$extension;
        $medium_thumbnail = $file_name."_medium_thumbnail.".$extension;
        $large_thumbnail = $file_name."_large_thumbnail.".$extension;
        $banner = $file_name."_banner.".$extension;

        if ($width > $height) { //landscape

            //Small image
            Image::make( $path )->fit(150, 150)->save(public_path()."/personal/album/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/personal/album/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(550, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/personal/album/".$folderName.$large_thumbnail);

        } else {

            //Small image
            Image::make( $path )->fit(150, 150)->save(public_path()."/personal/album/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/personal/album/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(null, 550, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/personal/album/".$folderName.$large_thumbnail);

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


        $albumImage = new AlbumImage;
        $albumImage->artist = $Artist;
        $albumImage->aperture_f_number = $ApertureFNumber;
        $albumImage->copyright = $Copyright;
        $albumImage->height = $Height;
        $albumImage->width = $Width;
        $albumImage->date_time = $DateTime;
        $albumImage->file_name = $FileName;
        $albumImage->file_size = $FileSize;
        $albumImage->iso = $ISOSpeedRatings;
        $albumImage->focal_length = $FocalLength;
        $albumImage->light_source = $LightSource;
        $albumImage->max_aperture_value = $MaxApertureValue;
        $albumImage->mime_type = $MimeType;
        $albumImage->make = $Make;
        $albumImage->model = $Model;
        $albumImage->software = $Software;
        $albumImage->shutter_speed = $ShutterSpeed;

        $albumImage->name = $file_name;
        $albumImage->extension = $extension;
        $albumImage->image = "personal/album/".$folderName.$file_name;
        $albumImage->small_thumbnail = "personal/album/".$folderName.$small_thumbnail;
        $albumImage->large_thumbnail = "personal/album/".$folderName.$large_thumbnail;
        $albumImage->banner = "personal/album/".$folderName.$banner;

        $albumImage->size = $size;
        $albumImage->is_client_exclusive_access = False;
        $albumImage->is_album_set_image = False;
        $albumImage->is_album_cover = False;
        $albumImage->album_id = $album_id;
        $albumImage->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumImage->user_id = Auth::user()->id;
        $albumImage->save();

        // Update album cover image
        $album = Album::findOrFail($album_id);
        $album->cover_image_id = $albumImage->id;
        $album->save();

        //return $album;

        return back()->withStatus(__('Client proof cover image successfully uploaded.'));
    }
    public function personalAlbumUpdateDesign(Request $request, $album_id)
    {
        $album = Album::findOrFail($album_id);
        $album->typography_id = $request->typography;
        $album->thumbnail_size_id = $request->thumbnail_size;
        $album->save();

        return back()->withSuccess('Personal album design updated!');
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

        $album->thumbnail_size_id = "6fdf4858-01ce-43ff-bbe6-827f09fa1cef";

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
        $albumSets = AlbumSet::where('album_id',$album->id)->with('status','user','album_images','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();
        $albumTags = AlbumTag::where('album_id',$album_id)->with('album','tag')->get();
        $albumDownloadRestrictionEmails = AlbumDownloadRestrictionEmail::where('album_id',$album_id)->get();

        return view('admin.client_proof_show',compact('album','user','albumSets','tags','albumTags','albumStatuses','albumDownloadRestrictionEmails','pendingToDos', 'inProgressToDos','completedToDos','overdueToDos', 'albums', 'typographies', 'colors','schemes','orientations','contentAligns','imagePositions','coverDesigns','orientations'));
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
        return $request;
        $album = Album::findOrFail($album_id);
        $album->typography_id = $request->typography;
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
        $folderName = str_replace(' ', '', $album->name."/");

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/client/proof/".$folderName, $file_name_extension);
        $path = public_path()."/client/proof/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $cover_image = $file_name.".".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        $small_thumbnail = $file_name."_small_thumbnail.".$extension;
        $large_thumbnail = $file_name."_large_thumbnail.".$extension;
        $banner = $file_name."_banner.".$extension;

        // Resize image
        // image
        Image::make( $path )->fit(353, 326)->save(public_path()."/client/proof/".$folderName.$small_thumbnail);
        Image::make( $path )->fit(550, 400)->save(public_path()."/client/proof/".$folderName.$large_thumbnail);
        Image::make( $path )->fit(1440, 900)->save(public_path()."/client/proof/".$folderName.$banner);

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


        $albumImage = new AlbumImage;
        $albumImage->artist = $Artist;
        $albumImage->aperture_f_number = $ApertureFNumber;
        $albumImage->copyright = $Copyright;
        $albumImage->height = $Height;
        $albumImage->width = $Width;
        $albumImage->date_time = $DateTime;
        $albumImage->file_name = $FileName;
        $albumImage->file_size = $FileSize;
        $albumImage->iso = $ISOSpeedRatings;
        $albumImage->focal_length = $FocalLength;
        $albumImage->light_source = $LightSource;
        $albumImage->max_aperture_value = $MaxApertureValue;
        $albumImage->mime_type = $MimeType;
        $albumImage->make = $Make;
        $albumImage->model = $Model;
        $albumImage->software = $Software;
        $albumImage->shutter_speed = $ShutterSpeed;

        $albumImage->name = $file_name;
        $albumImage->extension = $extension;
        $albumImage->image = "client/proof/".$folderName.$file_name;
        $albumImage->small_thumbnail = "client/proof/".$folderName.$small_thumbnail;
        $albumImage->large_thumbnail = "client/proof/".$folderName.$large_thumbnail;
        $albumImage->banner = "client/proof/".$folderName.$banner;

        $albumImage->size = $size;
        $albumImage->is_client_exclusive_access = False;
        $albumImage->is_album_set_image = False;
        $albumImage->is_album_cover = False;
        $albumImage->album_id = $album_id;
        $albumImage->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumImage->user_id = Auth::user()->id;
        $albumImage->save();

        // Update album cover image
        $album = Album::findOrFail($album_id);
        $album->cover_image_id = $albumImage->id;
        $album->save();

        //return $album;

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

        $file = Input::file("file");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/client/proof/".$folderName, $file_name_extension);
        $path = public_path()."/client/proof/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $smallthumbnail = $file_name."_small.".$extension;
        $mediumthumbnail = $file_name."_medium.".$extension;
        $largethumbnail = $file_name."_large.".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            //Small image
            Image::make( $path )->fit(150, 150)->save(public_path()."/client/proof/".$folderName.$smallthumbnail);

            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/client/proof/".$folderName.$mediumthumbnail);

            Image::make( $path )->resize(550, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/client/proof/".$folderName.$largethumbnail);

        } else {

            //Small image
            Image::make( $path )->fit(150, 150)->save(public_path()."/client/proof/".$folderName.$smallthumbnail);

            Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/client/proof/".$folderName.$mediumthumbnail);

            Image::make( $path )->resize(null, 550, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/client/proof/".$folderName.$largethumbnail);

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


        $albumImage = new AlbumImage;
        $albumImage->artist = $Artist;
        $albumImage->aperture_f_number = $ApertureFNumber;
        $albumImage->copyright = $Copyright;
        $albumImage->height = $Height;
        $albumImage->width = $Width;
        $albumImage->date_time = $DateTime;
        $albumImage->file_name = $FileName;
        $albumImage->file_size = $FileSize;
        $albumImage->iso = $ISOSpeedRatings;
        $albumImage->focal_length = $FocalLength;
        $albumImage->light_source = $LightSource;
        $albumImage->max_aperture_value = $MaxApertureValue;
        $albumImage->mime_type = $MimeType;
        $albumImage->make = $Make;
        $albumImage->model = $Model;
        $albumImage->software = $Software;
        $albumImage->shutter_speed = $ShutterSpeed;

        $albumImage->name = $file_name;
        $albumImage->extension = $extension;
        $albumImage->image = "client/proof/".$folderName.$file_name;
        $albumImage->small = "client/proof/".$folderName.$smallthumbnail;
        $albumImage->medium = "client/proof/".$folderName.$mediumthumbnail;
        $albumImage->large = "client/proof/".$folderName.$largethumbnail;


        $albumImage->size = $size;
        $albumImage->is_client_exclusive_access = False;
        $albumImage->is_album_set_image = True;
        $albumImage->is_album_cover = False;
        $albumImage->is_album_set_image = True;
        $albumImage->album_set_id = $album_set_id;
        $albumImage->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumImage->user_id = Auth::user()->id;
        $albumImage->save();

        return back()->withStatus(__('Album set image successfully uploaded.'));
    }

}
