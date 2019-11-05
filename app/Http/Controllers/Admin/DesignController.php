<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\AlbumImage;
use App\Category;
use App\Client;
use App\Design;
use App\DesignCategory;
use App\DesignGallery;
use App\DesignWork;
use App\Status;
use App\Tag;
use App\ToDo;
use App\Typography;
use App\Upload;
use Auth;
use App\Traits\UserTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class DesignController extends Controller
{
    use UserTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function designs()
    {
        // User
        $user = $this->getAdmin();
        // Get albums
        $designs = Design::with('user','status')->get();
        return view('admin.designs',compact('designs','user'));
    }

    public function designCreate()
    {
        // User
        $user = $this->getAdmin();

        // Tags
        $clients = Client::all();
        // Categories
        $categories = Category::all();

        return view('admin.design_create',compact('user','clients','categories'));
    }

    public function designStore(Request $request)
    {

        $design = new Design();
        $design->name = $request->name;
        $design->date = date('Y-m-d', strtotime($request->date));


        $design->views = 0;
        $design->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $design->user_id = Auth::user()->id;
        $design->save();

        foreach ($request->categories as $designAlbumCategory){
            $designCategory = new DesignCategory();
            $designCategory->design_id = $design->id;
            $designCategory->category_id = $designAlbumCategory;
            $designCategory->user_id = Auth::user()->id;
            $designCategory->save();
        }

        return redirect(route('admin.designs'));
    }

    public function designShow($design_id)
    {

        // User
        $user = $this->getAdmin();
        // Clients
        $clients = Client::all();
        // Categories
        $categories = Category::all();
        // Get typography
        $typographies = Typography::all();
        // Get design
        $design = Design::findOrFail($design_id);
        $design = Design::where('id',$design_id)->with('design_categories','client','user','status')->first();
        // Album & Image status
        $designStatuses = Status::where('status_type_id','12a49330-14a5-41d2-b62d-87cdf8b252f8')->get();

        // Pending to dos
        $pendingToDos = ToDo::with('user','status','design')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('design_id',$design->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','design')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('design_id',$design->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','design')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('design_id',$design->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','design')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('design_id',$design->id)->get();

        $designGallery = DesignGallery::where('design_id',$design_id)->get();
        $designWork = DesignWork::where('design_id',$design_id)->get();

        return view('admin.design_show',compact('pendingToDos','inProgressToDos','completedToDos','overdueToDos','user','clients','categories','design','designGallery','designWork','designStatuses','typographies'));
    }

    public function designUpdate(Request $request, $design_id)
    {

        // Check if design exists and get
        $design = Design::findOrFail($design_id);
        $design->name = $request->name;
        $design->date = date('Y-m-d', strtotime($request->date));
        $design->save();

        // Design categories update
        $designRequestCategories =array();
        foreach ($request->categories as $designAlbumCategory){
            // Append to array
            $designRequestCategories[]['id'] = $designAlbumCategory;

            // Check if design category exists
            $designCategory = DesignCategory::where('design_id',$design->id)->where('category_id',$designAlbumCategory)->first();

            if($designCategory === null) {
                $designCategory = new DesignCategory();
                $designCategory->design_id = $design->id;
                $designCategory->category_id = $designAlbumCategory;
                $designCategory->user_id = Auth::user()->id;
                $designCategory->save();
            }
        }

        $designCategoriesIds = AlbumCategory::where('design_id',$design_id)->whereNotIn('category_id',$designRequestCategories)->select('id')->get()->toArray();
        DB::table('design_categories')->whereIn('id', $designCategoriesIds)->delete();


        return view('admin.design_create',compact('user','tags','categories'));
    }

    public function designCoverImageUpload(Request $request,$design_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $design = Design::where('id',$design_id)->first();
        $folderName = str_replace(' ', '', $design->name."/");

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/design/".$folderName, $file_name_extension);
        $path = public_path()."/design/".$folderName.$file_name_extension;

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
            Image::make( $path )->fit(150, 150)->save(public_path()."/design/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/design/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(550, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/design/".$folderName.$large_thumbnail);

        } else {

            //Small image
            Image::make( $path )->fit(150, 150)->save(public_path()."/design/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/design/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(null, 550, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/design/".$folderName.$large_thumbnail);

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
        $albumImage->image = "design/".$folderName.$file_name;
        $albumImage->small_thumbnail = "design/".$folderName.$small_thumbnail;
        $albumImage->large_thumbnail = "design/".$folderName.$large_thumbnail;
        $albumImage->banner = "design/".$folderName.$banner;

        $albumImage->size = $size;
        $albumImage->is_client_exclusive_access = False;
        $albumImage->is_album_set_image = False;
        $albumImage->is_album_cover = False;
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
    public function designGalleryImageUpload(Request $request,$design_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $design = Design::where('id',$design_id)->first();
        $folderName = str_replace(' ', '', $design->name.'/');

        $file = Input::file("file");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/design/".$folderName, $file_name_extension);
        $path = public_path()."/design/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $smallthumbnail = $file_name."_small.".$extension;
        $mediumthumbnail = $file_name."_medium.".$extension;
        $largethumbnail = $file_name."_large.".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            //Small image
            Image::make( $path )->fit(150, 150)->save(public_path()."/design/".$folderName.$smallthumbnail);

            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/design/".$folderName.$mediumthumbnail);

            Image::make( $path )->resize(550, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/design/".$folderName.$largethumbnail);

        } else {

            //Small image
            Image::make( $path )->fit(150, 150)->save(public_path()."/design/".$folderName.$smallthumbnail);

            Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/design/".$folderName.$mediumthumbnail);

            Image::make( $path )->resize(null, 550, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/design/".$folderName.$largethumbnail);

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
        $upload->image = "design/".$folderName.$file_name;
        $upload->small = "design/".$folderName.$smallthumbnail;
        $upload->medium = "design/".$folderName.$mediumthumbnail;
        $upload->large = "design/".$folderName.$largethumbnail;

        $upload->size = $size;

        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = False;
        $upload->is_album_cover = False;
        $upload->is_album_set_image = False;
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->upload_type_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Design gallery record
        $designGallery = new DesignGallery();
        $designGallery->is_design_work = False;
        $designGallery->upload_id = $upload->id;
        $designGallery->design_id = $design->id;
        $designGallery->user_id = Auth::user()->id;
        $designGallery->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->save();

        return back()->withStatus(__('Design gallery image successfully uploaded.'));
    }

    public function designUpdateDesign(Request $request, $design_id)
    {
        return $request;
        $design = Design::findOrFail($album_id);
        $design->typography_id = $request->typography;
        $design->save();

        return back()->withSuccess('Design design updated!');
    }
}
