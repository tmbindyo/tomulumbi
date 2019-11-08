<?php

namespace App\Http\Controllers\Admin;

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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
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
        $design->description = $request->description;
        $design->date = date('Y-m-d', strtotime($request->date));

        $design->views = 0;
        $design->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $design->user_id = Auth::user()->id;
        $design->save();

        foreach ($request->categories as $designCategoryId){
            $designCategory = new DesignCategory();
            $designCategory->design_id = $design->id;
            $designCategory->category_id = $designCategoryId;
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
        $design = Design::where('id',$design_id)->with('design_categories','client','user','status','cover_image')->first();

//        return $design;
        // Design status
        $designStatuses = Status::where('status_type_id','12a49330-14a5-41d2-b62d-87cdf8b252f8')->get();

        // Pending to dos
        $pendingToDos = ToDo::with('user','status','design')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('design_id',$design->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','design')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('design_id',$design->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','design')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('design_id',$design->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','design')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('design_id',$design->id)->get();

        $designGallery = DesignGallery::where('design_id',$design_id)->with('upload')->get();
        $designWork = DesignWork::where('design_id',$design_id)->with('upload')->get();

//        return $designWork;
        return view('admin.design_show',compact('pendingToDos','inProgressToDos','completedToDos','overdueToDos','user','clients','categories','design','designGallery','designWork','designStatuses','typographies'));
    }

    public function designUpdate(Request $request, $design_id)
    {

        // User
        $user = $this->getAdmin();


        // Check if design exists and get
        $design = Design::findOrFail($design_id);
        $design->name = $request->name;
        $design->description = $request->description;
        $design->client_id = $request->client;
        $design->status_id = $request->status;
        $design->date = date('Y-m-d', strtotime($request->date));
        $design->save();

        // Design categories update
        $designRequestCategories =array();
        foreach ($request->categories as $designCategory){
            // Append to array
            $designRequestCategories[]['id'] = $designCategory;

            // Check if design category exists
            $designCategory = DesignCategory::where('design_id',$design->id)->where('category_id',$designCategory)->first();

            if($designCategory === null) {
                $designCategory = new DesignCategory();
                $designCategory->design_id = $design->id;
                $designCategory->category_id = $designCategory;
                $designCategory->user_id = Auth::user()->id;
                $designCategory->save();
            }
        }

        $designCategoriesIds = DesignCategory::where('design_id',$design_id)->whereNotIn('category_id',$designRequestCategories)->select('id')->get()->toArray();
        DB::table('design_categories')->whereIn('id', $designCategoriesIds)->delete();


        return back()->withStatus(__('Design successfully uploaded.'));
    }

    public function designCoverImageUpload(Request $request,$design_id)
    {

//        return $request;
        $design = Design::where('id',$design_id)->first();
        $folderName = str_replace(' ', '', $design->name."/Banner/");

//        return $folderName;

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/design/".$folderName, $file_name_extension);
        $path = public_path()."/work/design/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $cover_image = $file_name.".".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();


        $small_thumbnail = "Thumbnail/Small/".$file_name.".".$extension;
        $large_thumbnail = "Thumbnail/Large/".$file_name.".".$extension;
        $banner = "banner".".".$extension;

        // Make directories
        File::makeDirectory(public_path()."/work/design/".$folderName."Thumbnail/Small/", $mode = 0750, true, true);
        File::makeDirectory(public_path()."/work/design/".$folderName."Thumbnail/Large/", $mode = 0750, true, true);

        // Resize image
        // image

        if ($width > $height) { //landscape

            Image::make( $path )->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(571, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$large_thumbnail);

            Image::make( $path )->resize(1000, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$banner);


        } else {

            Image::make( $path )->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(null, 499, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$large_thumbnail);

            Image::make( $path )->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$banner);

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
        $upload->image = "work/design/".$folderName.$file_name;
        $upload->small_thumbnail = "work/design/".$folderName.$small_thumbnail;
        $upload->large_thumbnail = "work/design/".$folderName.$large_thumbnail;
        $upload->banner = "work/design/".$folderName.$banner;

        $upload->size = $size;
        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = False;
        $upload->design_id = $design_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update design cover image
        $design = Design::findOrFail($design_id);
        $design->cover_image_id = $upload->id;
        $design->save();

        //return $design;

        return back()->withStatus(__('Design cover image successfully uploaded.'));
    }

    public function designWorkStore(Request $request,$design_id)
    {
//        return $request;
        // Save design work
        // Update album cover image
        $designWork = new DesignWork();
        $designWork->name = $request->name;
        $designWork->description = $request->description;
        $designWork->upload_id = $design_id;
        $designWork->design_id = $design_id;
        $designWork->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $designWork->user_id = Auth::user()->id;
        $designWork->save();


        // todo If already image delete
        // todo hash the folder name
        $folderName = str_replace(' ', '', $designWork->design->name."/" .$designWork->name.'/');

        $file = Input::file("design_work");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/design/".$folderName, $file_name_extension);
        $path = public_path()."/work/design/".$folderName.$file_name_extension;

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
            Image::make( $path )->fit(150, 150)->save(public_path()."/work/design/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(550, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$large_thumbnail);

        } else {

            //Small image
            Image::make( $path )->fit(150, 150)->save(public_path()."/work/design/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(null, 550, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(null, 700, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$large_thumbnail);

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
        $upload->image = "work/design/".$folderName.$file_name;
        $upload->small_thumbnail = "work/design/".$folderName.$small_thumbnail;
        $upload->large_thumbnail = "work/design/".$folderName.$large_thumbnail;
        $upload->banner = "work/design/".$folderName.$banner;

        $upload->size = $size;
        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = False;
//        $upload->is_album_cover = False;
        $upload->upload_type_id = $designWork->id;
        $upload->upload_type_id = "b64c0d17-2e06-4b1e-83ed-55cd606ff4fe";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update design work upload
        $designWork = DesignWork::findOrFail($designWork->id);
        $designWork->upload_id = $upload->id;
        $designWork->save();

        // Save new design work gallery
        $designGallery = new DesignGallery();
        $designGallery->is_design_work = True;
        $designGallery->design_id = $designWork->design_id;
        $designGallery->design_work_id = $designWork->id;
        $designGallery->user_id = Auth::user()->id;
        $designGallery->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $designGallery->save();

        return back()->withStatus(__('Design work successfully uploaded.'));
    }

    public function designWorkUpdate(Request $request,$design_work_id)
    {
//        return $request;
        // Save design work
        // Update album cover image
        $designWork = DesignWork::findOrFail($design_work_id);

        // todo If already image delete
        // todo hash the folder name
        $folderName = str_replace(' ', '', $designWork->design->name."/" .$designWork->name.'/');

        $file = Input::file("design_work");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/design/".$folderName, $file_name_extension);
        $path = public_path()."/work/design/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $cover_image = $file_name.".".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        $small_thumbnail = $file_name."_small_thumbnail.".$extension;
        $medium_thumbnail = $file_name."_medium_thumbnail.".$extension;
        $large_thumbnail = $file_name."_large_thumbnail.".$extension;
        $banner = $file_name."_banner.".$extension;

        if ($width > $height) { //landscape

            Image::make( $path )->fit(150, 150)->save(public_path()."/work/design/".$folderName.$small_thumbnail);
            //Small image
            Image::make( $path )->resize(550, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$large_thumbnail);

        } else {

            Image::make( $path )->fit(150, 150)->save(public_path()."/work/design/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(null, 550, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(null, 700, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$large_thumbnail);

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
        $upload->image = "work/design/".$folderName.$file_name;
        $upload->small_thumbnail = "work/design/".$folderName.$small_thumbnail;
        $upload->large_thumbnail = "work/design/".$folderName.$large_thumbnail;
        $upload->banner = "work/design/".$folderName.$banner;

        $upload->size = $size;
        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = False;
//        $upload->is_album_cover = False;
        $upload->upload_type_id = $designWork->id;
        $upload->upload_type_id = "b64c0d17-2e06-4b1e-83ed-55cd606ff4fe";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Design gallery record
        // Delete previous design gallery work
        $previousDesignWorkGallery = DesignGallery::where('upload_id',$designWork->upload_id)->where('is_design_work',True)->first();
        if ($previousDesignWorkGallery){
            $previousDesignWorkGallery->delete();
        }

        // Update design work upload
        $designWork->name = $request->name;
        $designWork->description = $request->description;
        $designWork->upload_id = $upload->id;
        $designWork->save();

        // Save new design work gallery
        $designGallery = new DesignGallery();
        $designGallery->is_design_work = True;
        $designGallery->upload_id = $upload->id;
        $designGallery->design_id = $designWork->design_id;
        $designGallery->design_work_id = $designWork->id;
        $designGallery->user_id = Auth::user()->id;
        $designGallery->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $designGallery->save();

        return back()->withStatus(__('Design work successfully uploaded.'));
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

        $file->move(public_path()."/work/design/".$folderName, $file_name_extension);
        $path = public_path()."/work/design/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $smallthumbnail = $file_name."_small.".$extension;
        $mediumthumbnail = $file_name."_medium.".$extension;
        $largethumbnail = $file_name."_large.".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            //Small image
            Image::make( $path )->fit(150, 150)->save(public_path()."/work/design/".$folderName.$smallthumbnail);

            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$mediumthumbnail);

            Image::make( $path )->resize(550, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$largethumbnail);

        } else {

            //Small image
            Image::make( $path )->fit(150, 150)->save(public_path()."/work/design/".$folderName.$smallthumbnail);

            Image::make( $path )->resize(null, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$mediumthumbnail);

            Image::make( $path )->resize(null, 550, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/work/design/".$folderName.$largethumbnail);

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
        $upload->image = "work/design/".$folderName.$file_name;
        $upload->small_thumbnail = "work/design/".$folderName.$smallthumbnail;
        $upload->large_thumbnail = "work/design/".$folderName.$largethumbnail;

        $upload->size = $size;

        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = False;
//        $upload->is_album_cover = False;
        $upload->is_album_set_image = False;
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->upload_type_id = "720a967d-16b1-46c4-b22d-9e734e94c9e9";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Design gallery record
        $designGallery = new DesignGallery();
        $designGallery->is_design_work = False;
        $designGallery->upload_id = $upload->id;
        $designGallery->design_id = $design->id;
        $designGallery->user_id = Auth::user()->id;
        $designGallery->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $designGallery->save();

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
