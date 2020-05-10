<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use App\Tag;
use App\ToDo;
use App\Album;
use App\Color;
use App\Label;
use App\Status;
use App\Scheme;
use App\Upload;
use App\Project;
use App\Contact;
use App\AlbumSet;
use App\AlbumTag;
use App\Category;
use App\AlbumImage;
use App\Typography;
use App\Orientation;
use App\CoverDesign;
use App\ContentAlign;
use App\ImagePosition;
use App\AlbumCategory;
use App\AlbumContact;
use App\ThumbnailSize;
use App\Traits\UserTrait;
use App\Traits\AlbumTrait;
use App\Traits\NavbarTrait;
use Illuminate\Http\Request;
use App\Traits\PasswordTrait;
use App\Traits\StatusCountTrait;
use function GuzzleHttp\Psr7\str;
use App\AlbumViewRestrictionEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\AlbumSetViewRestrictionEmail;
use Illuminate\Support\Facades\Input;
use App\Traits\DocumentExtensionTrait;
use App\Traits\DownloadViewNumbersTrait;
use Intervention\Image\ImageManagerStatic as Image;

class AlbumController extends Controller
{
    use UserTrait;
    use AlbumTrait;
    use NavbarTrait;
    use PasswordTrait;
    use StatusCountTrait;
    use DocumentExtensionTrait;
    use DownloadViewNumbersTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function personalAlbums()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the Personal album status counts
        $personalAlbumsStatusCount = $this->personalAlbumsStatusCount();
        // Get albums
        $albums = Album::with('user','status')->where('album_type_id','6fdf4858-01ce-43ff-bbe6-827f09fa1cef')->get();
//        return $albums;
        return view('admin.personal_albums',compact('albums','user','navbarValues','personalAlbumsStatusCount'));
    }

    public function personalAlbumCreate()
    {
        // Tags
        $tags = Tag::all();
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        return view('admin.personal_album_create',compact('user','tags','navbarValues'));
    }

    public function personalAlbumStore(Request $request)
    {

        $album = new Album();
        $album->name = $request->name;
        $album->location = $request->location;
        $album->date = date('Y-m-d', strtotime($request->date));

        if($request->is_project){
            $album->is_project = True;
            $album->project_id = $request->project;
        }else{
            $album->is_project = False;
        }
        if($request->is_deal){
            $album->is_deal = True;
            $album->deal_id =$request->deal;
        }else{
            $album->is_deal = False;
        }
        if($request->is_design){
            $album->is_design = True;
            $album->design_id =$request->design;
        }else{
            $album->is_design = False;
        }
        if($request->is_tudeme){
            $album->is_tudeme = True;
            $album->tudeme_id =$request->tudeme;
        }else{
            $album->is_tudeme = False;
        }

        $album->is_download = False;
        $album->views = 0;
        $album->download_restriction_limit = 15;
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
            $albumSet->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $albumSet->user_id = Auth::user()->id;
            $albumSet->save();
        }

        return redirect()->route('admin.personal.album.show',$album->id)->withSuccess('Album '.$album->name.' successfully created!');
    }

    public function personalAlbumShow($album_id)
    {
        // Check if album exists
        $albumExists = Album::findOrFail($album_id);
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get views and downloads
        $albumViewsAndDownloads = $this->getAlbumDownloadViewNumbers($album_id);
        // get album aggregations
        $albumArray = $this->getAlbum($album_id);
        // User
        $user = $this->getAdmin();
        // Tags
        $tags = Tag::all();

        // Personal album Design
        $typographies = Typography::all();
        $thumbnailSizes = ThumbnailSize::all();

        // Album & Image status
        $albumStatuses = Status::where('status_type_id','12a49330-14a5-41d2-b62d-87cdf8b252f8')->get();

        // Get album
        $album = Album::with('user','status','cover_image','album_view_restriction_emails','expenses.expense_type','tudeme')->where('id',$album_id)->first();

        // Get all albums for to do dropdown
        $albums = Album::with('user','status')->get();

        // Album Dependencies
        // Album Sets
        $albumSets = AlbumSet::where('album_id',$album->id)->with('status','user','album_images.upload','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();
        $albumTags = AlbumTag::where('album_id',$album_id)->with('album','tag')->get();
        $albumViewRestrictionEmails = AlbumViewRestrictionEmail::where('album_id',$album_id)->get();

        return view('admin.personal_album_show',compact('album','user','albumSets','tags','albumTags','albumStatuses','albumViewRestrictionEmails', 'albums', 'typographies', 'thumbnailSizes','navbarValues','albumViewsAndDownloads','albumArray'));
    }

    public function personalAlbumShowImages($album_id)
    {
        // Check if album exists
        $albumExists = Album::findOrFail($album_id);
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // User
        $user = $this->getAdmin();

        // Get album
        $album = Album::with('user','status','cover_image','album_view_restriction_emails','expenses.expense_type','tudeme')->where('id',$album_id)->first();

        // Album Dependencies
        // Album Sets
        $albumSets = AlbumSet::where('album_id',$album->id)->with('status','user','album_images.upload','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();

        return view('admin.personal_album_show_images',compact('album','user','albumSets','navbarValues'));
    }

    public function personalAlbumDelete($album_id)
    {

        $album = Album::findOrFail($album_id);
        $album->status_id = 'b810f2f1-91c2-4fc9-b8e1-acc068caa03a';
        $album->save();

        return back()->withSuccess(__('Personal Album successfully deleted.'));
    }

    public function personalAlbumRestore($album_id)
    {

        $album = Album::findOrFail($album_id);
        $album->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $album->save();

        return back()->withSuccess(__('Personal album successfully restored.'));
    }

    public function personalAlbumCoverImageUpload(Request $request,$album_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $album = Album::where('id',$album_id)->first();
        $folderName = str_replace(' ', '', $album->name."/Banner/");
        $originalFolderName = str_replace(' ', '', $album->name."/Cover Image/Original/");

        $pixel750FolderName = str_replace(' ', '', "work/personal_album/".$album->name."/Cover Image"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/personal_album/".$album->name."/Cover Image"."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/personal_album/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/personal_album/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        // return "width ".$width ."height ". $height;

        if ($width > $height) { //landscape

            $orientation = "landscape";

            Image::make( $path )->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            Image::make( $path )->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);

        } else {

            $orientation = "portrait";

            Image::make( $path )->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            Image::make( $path )->resize(null, 1500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);

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
        $upload->orientation = $orientation;
        $upload->size = $size;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;


        $upload->is_restrict_to_specific_email = False;
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

        // delete original file
        File::delete($path);

        return back()->withSuccess(__('Personal album cover image successfully uploaded.'));
    }

    public function personalAlbumUpdateCollectionSettings(Request $request, $album_id)
    {

        $album = Album::findOrFail($album_id);
        // Check if the cover image has been uploaded if the status is being updated to published
        if ($request->status == "be8843ac-07ab-4373-83d9-0a3e02cd4ff5" && $album->cover_image_id == ""){
            return back()->withWarning(__('Please set a cover image before making the design to published.'));
        }

        // check if the album status has changed
        if ($album->status_id != $request->status){
            // get ids of uploads for the images
            $uploadsIds = Upload::where('album_id',$album_id)->select('id')->get()->toArray();
            DB::table('uploads')
                ->whereIn('id', $uploadsIds)
                ->update(array('status_id' => $request->status));
        }

        $album->name = $request->name;
        $album->date = date('Y-m-d', strtotime($request->date));
        $album->status_id = $request->status;
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

        return back()->withSuccess('Album collection settings updated!');
    }

    public function personalAlbumUpdateDesign(Request $request, $album_id)
    {
        $album = Album::findOrFail($album_id);
        $album->typography_id = $request->typography;
        $album->thumbnail_size_id = $request->thumbnail_size;
        $album->save();

        return back()->withSuccess('Personal album design updated!');
    }

    public function personalAlbumUpdatePrivacy(Request $request, $album_id)
    {

        $album = Album::findOrFail($album_id);

        // TODO Update column password to album_password
        // check if is download first to then set password
        if($request->is_download == "on"){
            $album->password = $request->album_password;
        }

        if ($request->album_password){
            // get ids of uploads for the images
            $checkUpload = Upload::where('album_id',$album_id)->where('is_restrict_to_specific_email', False)->first();
            if ($checkUpload){
                $uploadsIds = Upload::where('album_id',$album_id)->select('id')->get()->toArray();
                DB::table('uploads')
                    ->whereIn('id', $uploadsIds)
                    ->update(array('is_restrict_to_specific_email' => True));
            }

        }else{
            $checkUpload = Upload::where('album_id',$album_id)->where('is_restrict_to_specific_email', True)->first();
            if ($checkUpload){
                $uploadsIds = Upload::where('album_id',$album_id)->select('id')->get()->toArray();
                DB::table('uploads')
                    ->whereIn('id', $uploadsIds)
                    ->update(array('is_restrict_to_specific_email' => False));
            }
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

        return back()->withSuccess('Album privacy updated!');
    }

    public function personalAlbumImageUpdatePrintStatus(Request $request, $album_image_id)
    {
        $albumImage = AlbumImage::findOrFail($album_image_id);

        if ($request->is_print){
            $albumImage->is_print = True;
        }
        else{
            $albumImage->is_print = False;
        }

        $albumImage->limit = $request->limit;
        $albumImage->save();

        return back()->withSuccess('Personal album image print status updated!');
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

        $album = Album::where('id',$albumSet->album_id)->first();

        // todo Check if image exists
        $pixel100FolderName = str_replace(' ', '', "work/personal_album/".$albumSet->album->name."/100/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/personal_album/".$albumSet->album->name."/750/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/personal_album/".$albumSet->album->name."/1500/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);

        $file = Input::file("file");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/personal_album/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/personal_album/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            $orientation = "landscape";

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(750, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            Image::make( $path )->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);


        } else {

            $orientation = "portrait";

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(null, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            Image::make( $path )->resize(null, 1080, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);


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
        $upload->orientation = $orientation;
        $upload->size = $size;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->pixels100 = $pixel100FolderName.$image_name;
        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;
        $upload->original = $originalFolderName.$image_name;

        $upload->is_album_set_image = True;

        if ($album->password){
            $upload->is_restrict_to_specific_email = True;
        }else{
            $upload->is_restrict_to_specific_email = False;
        }

        $upload->is_restrict_to_specific_email = False;
        $upload->album_id = $albumSet->album_id;
        $upload->album_set_id = $album_set_id;
        $upload->tag_id = $tag->id;
        $upload->upload_type_id = "b3399a38-b355-4235-8f93-36baf410eef2";
        $upload->status_id = $album->status_id;
        $upload->user_id = Auth::user()->id;
        $upload->save();

        $albumImage = new AlbumImage();
        $albumImage->is_print = False;
        $albumImage->is_text = False;
        $albumImage->limit = 0;
        $albumImage->album_set_id = $album_set_id;
        $albumImage->upload_id = $upload->id;
        $albumImage->date_time = $DateTime;
        $albumImage->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumImage->user_id = Auth::user()->id;
        $albumImage->save();


        return back()->withSuccess(__('Album set image successfully uploaded.'));
    }

    public function personalAlbumSetShow($album_set_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $albumSet = AlbumSet::findOrFail($album_set_id);
        $albumSet = AlbumSet::where('id',$album_set_id)->with('album','status','album_images.upload')->first();
        // album restricted emails
        $albumSetViewRestrictionEmails = AlbumSetViewRestrictionEmail::where('album_set_id',$album_set_id)->get();
        return view('admin.personal_album_set_show',compact('user','navbarValues','albumSet','albumSetViewRestrictionEmails'));
    }



    public function clientProofs()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the client proof status counts
        $clientProofsStatusCount = $this->clientProofsStatusCount();
        // Get albums
        $albums = Album::with('user','status')->where('album_type_id','ca64a5e0-d39b-4f2c-a136-9c523d935ea4')->get();
        return view('admin.client_proofs',compact('albums','user','navbarValues','clientProofsStatusCount'));
    }

    public function clientProofCreate()
    {
        // Tags
        $tags = Tag::all();
        // Contacts
        $contacts = Contact::all();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // User
        $user = $this->getAdmin();
        return view('admin.client_proof_create',compact('user','tags','contacts','navbarValues'));
    }

    public function clientProofStore(Request $request)
    {
        $album = new Album();
        $album->name = $request->name;
        $album->date = date('Y-m-d', strtotime($request->date));

        if($request->is_project){
            $album->is_project = True;
            $album->project_id = $request->project;
        }else{
            $album->is_project = False;
        }
        if($request->is_deal){
            $album->is_deal = True;
            $album->deal_id =$request->deal;
        }else{
            $album->is_deal = False;
        }
        if($request->is_design){
            $album->is_design = True;
            $album->design_id =$request->design;
        }else{
            $album->is_design = False;
        }
        if($request->is_tudeme){
            $album->is_tudeme = True;
            $album->tudeme_id =$request->tudeme;
        }else{
            $album->is_tudeme = False;
        }
        /// download
        // TODO download pin is for whole album
        // TODO check limit of gallery downloads, should have a max by default
        // TODO remove restrict download for photo sets


        $album->thumbnail_size_id = "36400ca6-68d0-4897-b22f-6bc04bbaa929";
        $album->cover_design_id = "5e664dd9-8fe4-4f08-82de-80b0f41c592b";
        $album->scheme_id = "5e664dd9-8fe4-4f08-82de-80b0f41c592b";
        $album->color_id = "cb14e177-d992-4151-8200-6d2c9992f581";
        $album->orientation_id = "5e664dd9-8fe4-4f08-82de-80b0f41c592b";
        $album->content_align_id = "5e664dd9-8fe4-4f08-82de-80b0f41c592b";
        $album->image_position_id = "54aa3f5c-a52e-4f68-902a-f8c45a51c948";

        $album->views = 0;
        $album->is_download = False;
        $album->download_restriction_limit = 15;
        $album->password = $this->generatePassword();
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

        foreach ($request->contacts as $albumRequestContact){
            $albumContact = new AlbumContact();
            $albumContact->album_id = $album->id;
            $albumContact->contact_id = $albumRequestContact;
            $albumContact->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $albumContact->user_id = Auth::user()->id;
            $albumContact->save();
        }

        // Save Album set
        $albumSet = new AlbumSet();
        $albumSet->album_id = $album->id;
        $albumSet->name = "Highlights";
        $albumSet->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumSet->user_id = Auth::user()->id;
        $albumSet->save();


        return redirect()->route('admin.client.proof.show',$album->id)->withSuccess('Album '.$album->name.' successfully created!');

    }

    public function clientProofShow($album_id)
    {
        // todo delete album image
        // Check if album exists
        $albumExists = Album::findOrFail($album_id);

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get views and downloads
        $albumViewsAndDownloads = $this->getAlbumDownloadViewNumbers($album_id);
        // get album aggregations
        $albumArray = $this->getAlbum($album_id);
//        return $albumArray;
        // Thumbnail sizes
        $thumbnailSizes = ThumbnailSize::all();
        // contacts
        $contacts = Contact::all();
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
        $album = Album::with('user','status','cover_image','album_view_restriction_emails','expenses.expense_type')->where('id',$album_id)->first();
        // Get all albums for to do dropdown
        $albums = Album::with('user','status')->get();

        // Album Dependencies
        // Album Sets
        $albumSets = AlbumSet::where('album_id',$album->id)->with('status','user','album_images.upload','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();
        // album tags
        $albumTags = AlbumTag::where('album_id',$album_id)->with('album','tag')->get();
        // album contacts
        $albumContacts = AlbumContact::where('album_id',$album_id)->get();
        // album restricted emails
        $albumViewRestrictionEmails = AlbumViewRestrictionEmail::where('album_id',$album_id)->get();

        return view('admin.client_proof_show',compact('albumContacts','contacts','album','user','albumSets','tags','albumTags','albumStatuses','albumViewRestrictionEmails', 'albums', 'typographies', 'colors','schemes','orientations','contentAligns','imagePositions','coverDesigns','orientations','thumbnailSizes','navbarValues','albumViewsAndDownloads','albumArray'));
    }

    public function clientProofShowImages($album_id)
    {
        // todo delete album image
        // Check if album exists
        $albumExists = Album::findOrFail($album_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get album aggregations
        $albumArray = $this->getAlbum($album_id);
        // Get album
        $album = Album::with('user','status','cover_image','album_view_restriction_emails','expenses.expense_type')->where('id',$album_id)->first();
        // Album Sets
        $albumSets = AlbumSet::where('album_id',$album->id)->with('status','user','album_images.upload','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();

        return view('admin.client_proof_show_images',compact('album','user','albumSets','navbarValues','albumArray'));
    }

    public function clientProofDelete($album_id)
    {

        $album = Album::findOrFail($album_id);
        $album->status_id = 'b810f2f1-91c2-4fc9-b8e1-acc068caa03a';
        $album->save();

        return back()->withSuccess(__('Client proof successfully deleted.'));
    }

    public function clientProofRestore($album_id)
    {

        $album = Album::findOrFail($album_id);
        $album->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $album->save();

        return back()->withSuccess(__('Client proof successfully restored.'));
    }





    // Update
    public function albumUpdateCollectionSettings(Request $request, $album_id)
    {

        $album = Album::findOrFail($album_id);
        $album->name = $request->name;
        $album->date = date('Y-m-d', strtotime($request->date));
        $album->status_id = $request->status;
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


        // Album contacts update
        $albumRequestContacts =array();
        foreach ($request->contacts as $albumAlbumContact){
            // Append to array
            $albumRequestContacts[]['id'] = $albumAlbumContact;

            // Check if album contact exists
            $albumContact = AlbumContact::where('album_id',$album->id)->where('contact_id',$albumAlbumContact)->first();

            if($albumContact === null) {
                $albumContact = new AlbumContact();
                $albumContact->album_id = $album->id;
                $albumContact->contact_id = $albumAlbumContact;
                $albumContact->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $albumContact->user_id = Auth::user()->id;
                $albumContact->save();
            }
        }

        $albumContactsIds = AlbumContact::where('album_id',$album_id)->whereNotIn('contact_id',$albumRequestContacts)->select('id')->get()->toArray();
        DB::table('album_contacts')->whereIn('id', $albumContactsIds)->delete();

        return back()->withSuccess('Album collection settings updated!');
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

    public function clientProofCoverImageUpload(Request $request,$album_id)
    {

        // todo If already image delete
        // todo hash the folder name
        $album = Album::where('id',$album_id)->first();
        $folderName = str_replace(' ', '', $album->name."/Banner/");
        $originalFolderName = str_replace(' ', '', $album->name."/Cover Image/Original/");

        $pixel100FolderName = str_replace(' ', '', "work/client_proof/".$album->name."/Cover Image"."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/client_proof/".$album->name."/Cover Image"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/client_proof/".$album->name."/Cover Image"."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);


        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/client_proof/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/client_proof/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            $orientation = "landscape";

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(750, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            Image::make( $path )->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);

        } else {

            $orientation = "portrait";

            Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name);
            Image::make( $path )->resize(null, 750, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name);
            Image::make( $path )->resize(null, 1080, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name);

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
        $upload->orientation = $orientation;
        $upload->size = $size;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->pixels100 = $pixel100FolderName.$image_name;
        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;

        $upload->is_restrict_to_specific_email = False;
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

        // delete original file
        File::delete($path);

        return back()->withSuccess(__('Client proof cover image successfully uploaded.'));
    }

    public function clientProofUpdateDownload(Request $request, $album_id)
    {

        $album = Album::findOrFail($album_id);


        if ($request->is_download == "on"){
            $album->is_download = True;
        }
        else{
            $album->is_download = False;
        }
        $album->password = $request->album_password;
        $album->download_pin = $request->download_pin;
        $album->download_restriction_limit = $request->download_restriction_limit;
        if ($request->is_album_set_exclusive == "on"){
            $album->is_album_set_exclusive = True;
            $checkUpload = Upload::where('album_id',$album_id)->where('is_restrict_to_specific_email', False)->first();
            if ($checkUpload){
                $uploadsIds = Upload::where('album_id',$album_id)->select('id')->get()->toArray();
                DB::table('uploads')
                    ->whereIn('id', $uploadsIds)
                    ->update(array('is_restrict_to_specific_email' => True));
            }
        }else{
            $album->is_album_set_exclusive = False;
            $checkUpload = Upload::where('album_id',$album_id)->where('is_restrict_to_specific_email', True)->first();
            if ($checkUpload){
                $uploadsIds = Upload::where('album_id',$album_id)->select('id')->get()->toArray();
                DB::table('uploads')
                    ->whereIn('id', $uploadsIds)
                    ->update(array('is_restrict_to_specific_email' => False));
            }
        }

        $album->save();


        return back()->withSuccess('Album download updated!');
    }

    // TODO use for album set email exclusivity
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

    public function generateClientProofPassword ($album_id) {
        $password = $this->generatePassword();
        return $password;
    }

    public function generateClientProofPin ($album_id) {
        $pin = $this->generatePin();
        return $pin;
    }

    public function clientProofViewRestrictionEmail ($album_id,$email) {
        // Remove appended %7D
        $remove = '%7D' ;
        $trimmed = str_replace($remove, '', $album_id) ;

        $album = Album::where('id', $trimmed)->first();

        // TODO check if already exists
        $albumViewRestrictionEmail = AlbumViewRestrictionEmail::where('album_id',$album->id)->where('email',$email)->first();
        if($albumViewRestrictionEmail){
            if($albumViewRestrictionEmail->expiry<date("Y-m-d")){
                // expired
                $albumViewRestrictionEmail->expiry = date('Y-m-d', strtotime(date("Y-m-d") . "+7 day") );
                $albumViewRestrictionEmail->save();
                echo 'Client proof '.$album->name.' for '.$email.' has been extended by a week.';
            }else{
                echo 'Client proof '.$album->name.' already has '.$email.' as a restriction';
            }

        }else{
            $albumViewRestrictionEmail = new AlbumViewRestrictionEmail();
            $albumViewRestrictionEmail->album_id = $album->id;
            $albumViewRestrictionEmail->expiry = date('Y-m-d', strtotime(date("Y-m-d") . "+1 months") );
            $albumViewRestrictionEmail->email = $email;
            $albumViewRestrictionEmail->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $albumViewRestrictionEmail->user_id = Auth::user()->id;
            $albumViewRestrictionEmail->save();
            echo 'Client proof '.$album->name.' restricted to '.$email;
        }


    }

    public function clientProofViewRestrictionEmailDelete($album_download_restriction_id)
    {

        $albumViewRestrictionEmail = AlbumViewRestrictionEmail::findOrFail($album_download_restriction_id);
        $albumViewRestrictionEmail->delete();

        return back()->withSuccess(__('Client proof view restriction email successfully deleted.'));
    }

    public function clientProofSetStore(Request $request, $album_id)
    {

        $albumSet = new AlbumSet();
        $albumSet->album_id = $album_id;
        $albumSet->name = $request->name;
        $albumSet->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumSet->user_id = Auth::user()->id;
        $albumSet->save();

        return back()->withSuccess(__('Album set successfully saved.'));
    }

    public function clientProofSetShow($album_set_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $albumSet = AlbumSet::findOrFail($album_set_id);
        $albumSet = AlbumSet::where('id',$album_set_id)->with('album','status','album_images.upload')->first();
        // album restricted emails
        $albumSetViewRestrictionEmails = AlbumSetViewRestrictionEmail::where('album_set_id',$album_set_id)->get();
        return view('admin.client_proof_set_show',compact('user','navbarValues','albumSet','albumSetViewRestrictionEmails'));

    }

    public function clientProofSetViewRestrictionEmail ($album_set_id,$email) {
        // Remove appended %7D
        $remove = '%7D' ;
        $trimmed = str_replace($remove, '', $album_set_id) ;

        $albumSet = AlbumSet::where('id', $trimmed)->first();

        // TODO check if already exists
        $albumSetViewRestrictionEmail = AlbumSetViewRestrictionEmail::where('album_set_id',$albumSet->id)->where('email',$email)->first();
        if($albumSetViewRestrictionEmail){
            if($albumSetViewRestrictionEmail->expiry<date("Y-m-d")){
                // expired
                $albumSetViewRestrictionEmail->expiry = date('Y-m-d', strtotime(date("Y-m-d") . "+7 day") );
                $albumSetViewRestrictionEmail->save();
                echo 'Client proof '.$albumSet->name.' for '.$email.' has been extended by a week.';
            }else{
                echo 'Client proof '.$albumSet->name.' already has '.$email.' as a restriction';
            }

        }else{
            $albumSetViewRestrictionEmail = new AlbumSetViewRestrictionEmail();
            $albumSetViewRestrictionEmail->album_set_id = $albumSet->id;
            $albumSetViewRestrictionEmail->expiry = date('Y-m-d', strtotime(date("Y-m-d") . "+1 months") );
            $albumSetViewRestrictionEmail->email = $email;
            $albumSetViewRestrictionEmail->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $albumSetViewRestrictionEmail->user_id = Auth::user()->id;
            $albumSetViewRestrictionEmail->save();

            // check if email is part of albumViewRestrictionEmail
            $albumViewRestrictionEmail = AlbumViewRestrictionEmail::where('album_id',$albumSet->album_id)->where('email',$email)->first();
            if($albumViewRestrictionEmail){

                // if expired
                if($albumViewRestrictionEmail->expiry<date("Y-m-d")){
                    // expired
                    $albumViewRestrictionEmail->expiry = date('Y-m-d', strtotime(date("Y-m-d") . "+7 day") );
                    $albumViewRestrictionEmail->save();
                    echo 'Client proof '.$albumSet->name.' for '.$email.' has been extended by a week.';
                }

            }else{
                $albumViewRestrictionEmail = new AlbumViewRestrictionEmail();
                $albumViewRestrictionEmail->album_id = $albumSet->album_id;
                $albumViewRestrictionEmail->expiry = date('Y-m-d', strtotime(date("Y-m-d") . "+1 months") );
                $albumViewRestrictionEmail->email = $email;
                $albumViewRestrictionEmail->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $albumViewRestrictionEmail->user_id = Auth::user()->id;
                $albumViewRestrictionEmail->save();
            }

            echo 'Client proof '.$albumSet->name.' restricted to '.$email;
        }
    }

    public function clientProofSetViewRestrictionEmailDelete($album_download_restriction_id)
    {

        $albumSetViewRestrictionEmail = AlbumSetViewRestrictionEmail::findOrFail($album_download_restriction_id);
        $albumSetViewRestrictionEmail->delete();

        return back()->withSuccess(__('Client proof set view restriction email successfully deleted.'));
    }

    public function clientProofSetImageUpload(Request $request,$album_set_id)
    {

        // todo If already image delete
        // todo hash the folder name
        $albumSet = AlbumSet::where('id',$album_set_id)->with('album')->first();
        $folderName = str_replace(' ', '', $albumSet->album->name."/" .$albumSet->name.'/');
        $originalFolderName = str_replace(' ', '', $albumSet->album->name."/Original/" .$albumSet->name.'/');
        $smallFolderName = str_replace(' ', '', $albumSet->album->name."/Small/" .$albumSet->name.'/');

        $pixel100FolderName = str_replace(' ', '', "work/client_proof/".$albumSet->album->name."/100/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "work/client_proof/".$albumSet->album->name."/300/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "work/client_proof/".$albumSet->album->name."/500/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/client_proof/".$albumSet->album->name."/750/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "work/client_proof/".$albumSet->album->name."/1000/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/client_proof/".$albumSet->album->name."/1500/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "work/client_proof/".$albumSet->album->name."/2500/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "work/client_proof/".$albumSet->album->name."/3600/" .$albumSet->name.'/');
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("file");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/client_proof/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/client_proof/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            $orientation = "landscape";

            Image::make( $path )->resize(null, 100, function ($constraint) {
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

            $orientation = "portrait";

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
        $upload->orientation = $orientation;
        $upload->size = $size;
        $upload->name = $file_name;

        // Get the extension type
        $extensionType = $this->uploadExtension($extension);
        $upload->file_type = $extensionType;

        $upload->pixels100 = $pixel100FolderName.$image_name;
        $upload->pixels300 = $pixel300FolderName.$image_name;
        $upload->pixels500 = $pixel500FolderName.$image_name;
        $upload->pixels750 = $pixel750FolderName.$image_name;
        $upload->pixels1000 = $pixel1000FolderName.$image_name;
        $upload->pixels1500 = $pixel1500FolderName.$image_name;
        $upload->pixels2500 = $pixel2500FolderName.$image_name;
        $upload->pixels3600 = $pixel3600FolderName.$image_name;
        $upload->original = $originalFolderName.$image_name;

        $upload->is_restrict_to_specific_email = False;
        $upload->is_album_set_image = True;
        $upload->album_set_id = $album_set_id;
        $upload->album_id = $albumSet->album_id;
        $upload->upload_type_id = "b3399a38-b355-4235-8f93-36baf410eef2";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        $albumImage = new AlbumImage();
        $albumImage->is_print = False;
        $albumImage->is_text = False;
        $albumImage->limit = 0;
        $albumImage->album_set_id = $album_set_id;
        $albumImage->upload_id = $upload->id;
        $albumImage->date_time = $DateTime;
        $albumImage->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumImage->user_id = Auth::user()->id;
        $albumImage->save();


        return back()->withSuccess(__('Album set image successfully uploaded.'));
    }

    public function albumImageDelete($album_image_id)
    {
        $albumImage = AlbumImage::findOrFail($album_image_id);
        $albumImage->delete();

        return back()->withSuccess('Album image deleted!');
    }

    public function personalAlbumCreateJournal($album_id)
    {
        $album = Album::findOrFail($album_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Labels
        $labels = Label::all();
        return view('admin.album_journal_create',compact('album','user','labels','navbarValues'));
    }

}
