<?php

namespace App\Http\Controllers\Admin;

use App\CookingSkill;
use App\CookingStyle;
use App\Course;
use App\Cuisine;
use App\DietaryPreference;
use App\DishType;
use App\FoodType;
use App\ToDo;
use App\Status;
use App\Tudeme;
use App\Traits\UserTrait;
use App\Traits\NavbarTrait;
use Illuminate\Http\Request;
use App\Traits\TudemeTrait;
use App\Traits\StatusCountTrait;
use App\Http\Controllers\Controller;
use App\Ingredient;
use App\Instruction;
use App\Journal;
use App\Meal;
use App\MealCookingStyle;
use App\MealCourse;
use App\MealDietaryPreference;
use App\MealIngredient;
use App\MealType;
use App\Measurment;
use App\Note;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Traits\DocumentExtensionTrait;
use App\Traits\DownloadViewNumbersTrait;
use App\TudemeGallery;
use App\TudemeTag;
use App\TudemeTudemeTag;
use App\TudemeTudemeType;
use App\TudemeType;
use App\Upload;
use Intervention\Image\ImageManagerStatic as Image;

class TudemeController extends Controller
{


    use UserTrait;
    use NavbarTrait;
    use TudemeTrait;
    use StatusCountTrait;
    use DocumentExtensionTrait;
    use DownloadViewNumbersTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    // tudemes
    public function tudeme()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $tudemeStatusCount = $this->tudemeStatusCount();
        // Get tudemes
        $tudemes = Tudeme::with('user','status')->get();

        return view('admin.tudeme',compact('tudemes','user','navbarValues','tudemeStatusCount'));
    }

    public function tudemeCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // tudeme types
        $tudemeTypes = TudemeType::all();
        // tudeme tags
        $tudemeTags = TudemeTag::all();
        return view('admin.tudeme_create',compact('user','navbarValues','tudemeTags','tudemeTypes'));
    }

    public function tudemeStore(Request $request)
    {

        $tudeme = new Tudeme();
        $tudeme->name = $request->name;
        $tudeme->description = $request->description;
        $tudeme->body = $request->body;
        $tudeme->prep_time = $request->prep_time;
        $tudeme->cook_time = $request->cook_time;
        $tudeme->yield = $request->yield;
        $tudeme->serves = $request->serves;
        $tudeme->date = date('Y-m-d', strtotime($request->date));
        $tudeme->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $tudeme->user_id = Auth::user()->id;
        $tudeme->save();

        // tudeme tudeme type
        foreach ($request->tudeme_types as $tudeme_type){
            $tudemeTudemeType = new TudemeTudemeType();
            $tudemeTudemeType->tudeme_id = $tudeme->id;
            $tudemeTudemeType->tudeme_type_id = $tudeme_type;
            $tudemeTudemeType->user_id = Auth::user()->id;
            $tudemeTudemeType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $tudemeTudemeType->save();
        }

        // tudeme tudeme tag
        foreach ($request->tudeme_tags as $tudeme_tag){
            $tudemeTudemeTag = new TudemeTudemeTag();
            $tudemeTudemeTag->tudeme_id = $tudeme->id;
            $tudemeTudemeTag->tudeme_tag_id = $tudeme_tag;
            $tudemeTudemeTag->user_id = Auth::user()->id;
            $tudemeTudemeTag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $tudemeTudemeTag->save();
        }

        return redirect()->route('admin.tudeme.show',$tudeme->id)->withSuccess('Tudeme '.$tudeme->name.' succesfully created');
    }

    public function tudemeShow($tudeme_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get project aggregations
        $tudemeArray = $this->getTudeme($tudeme_id);
        // Get views and downloads
        $tudemeViews = $this->getTudemeViews($tudeme_id);
        // Get tudeme
        $tudeme = Tudeme::findOrFail($tudeme_id);
        $tudeme = Tudeme::where('id',$tudeme_id)->with('user','status','cover_image','spread','icon')->first();
        // Tudeme status
        $tudemeStatuses = Status::where('status_type_id','12a49330-14a5-41d2-b62d-87cdf8b252f8')->get();
        // tudeme journals
        $journals = Journal::where('is_tudeme',True)->where('tudeme_id',$tudeme_id)->with('user','status')->orderBy('created_at', 'desc')->get();
        // tudeme meals
        $meals = Meal::where('tudeme_id',$tudeme_id)->with('user','status')->orderBy('created_at', 'desc')->get();

        // tudeme gallery
        $tudemeGallery = TudemeGallery::where('tudeme_id',$tudeme_id)->with('upload')->get();
        return view('admin.tudeme_show',compact('user','tudeme','tudemeGallery','tudemeStatuses','navbarValues','tudemeArray','tudemeViews','meals','journals'));
    }

    public function tudemePersonalAlbumCreate($tudeme_id)
    {

        // get design
        $tudeme = Tudeme::findOrFail($tudeme_id);
        // Tags
        $tags = Tag::all();
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        return view('admin.tudeme_personal_album_create',compact('user','tags','navbarValues','tudeme'));

    }

    public function tudemeUpdate(Request $request, $tudeme_id)
    {

        // User
        $user = $this->getAdmin();

        // Check if tudeme exists and get
        $tudeme = Tudeme::findOrFail($tudeme_id);

        // Check if the cover image has been uploaded if the status is being updated to published
        if ($request->status == "be8843ac-07ab-4373-83d9-0a3e02cd4ff5" && $tudeme->cover_image_id == ""){
            return back()->withWarning(__('Please set a cover image before making the tudeme to published.'));
        }

        // Tudeme labels update
        $tudemeRequestLabels =array();
        foreach ($request->labels as $tudemeAlbumLabel){
            // Append to array
            $tudemeRequestLabels[]['id'] = $tudemeAlbumLabel;

            // Check if tudeme label exists
            $tudemeLabel = TudemeLabel::where('tudeme_id',$tudeme->id)->where('label_id',$tudemeAlbumLabel)->first();

            if($tudemeLabel === null) {
                $tudemeLabel = new TudemeLabel();
                $tudemeLabel->tudeme_id = $tudeme->id;
                $tudemeLabel->label_id = $tudemeAlbumLabel;
                $tudemeLabel->user_id = Auth::user()->id;
                $tudemeLabel->save();
            }
        }

        $tudemeLabelsIds = TudemeLabel::where('tudeme_id',$tudeme_id)->whereNotIn('label_id',$tudemeRequestLabels)->select('id')->get()->toArray();
        DB::table('tudeme_labels')->whereIn('id', $tudemeLabelsIds)->delete();

        $tudeme->name = $request->name;
        $tudeme->description = $request->description;
        $tudeme->body = $request->body;
        $tudeme->thumbnail_size_id = $request->thumbnail_size;
        $tudeme->typography_id = $request->typography;
        $tudeme->status_id = $request->status;
        $tudeme->date = date('Y-m-d', strtotime($request->date));
        $tudeme->save();


        return back()->withSuccess(__('Tudeme successfully uploaded.'));
    }

    public function tudemeCoverImageUpload(Request $request,$tudeme_id)
    {

        $tudeme = Tudeme::where('id',$tudeme_id)->first();
        $folderName = str_replace(' ', '', $tudeme->name."/Banner/");
        $originalFolderName = str_replace(' ', '', $tudeme->name."/Cover Image/Original/");

        $pixel100FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/tudeme/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/tudeme/".$originalFolderName.$file_name_extension;

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

            Image::make( $path )->fit(1766, 698)->save(public_path()."/".$pixel750FolderName.$image_name);

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

            Image::make( $path )->fit(1766, 698)->save(public_path()."/".$pixel750FolderName.$image_name);

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
        $upload->is_album_set_image = False;
        $upload->tudeme_id = $tudeme_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update tudeme cover image
        $tudeme = Tudeme::findOrFail($tudeme_id);
        $tudeme->cover_image_id = $upload->id;
        $tudeme->save();

        return back()->withSuccess(__('Tudeme cover image successfully uploaded.'));
    }

    public function tudemeSpreadUpload(Request $request,$tudeme_id)
    {

        $tudeme = Tudeme::where('id',$tudeme_id)->first();
        $folderName = str_replace(' ', '', $tudeme->name."/Banner/");
        $originalFolderName = str_replace(' ', '', $tudeme->name."/Cover Image/Original/");

        $pixel100FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/tudeme/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/tudeme/".$originalFolderName.$file_name_extension;

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

            Image::make( $path )->fit(1766, 698)->save(public_path()."/".$pixel750FolderName.$image_name);

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

            Image::make( $path )->fit(1766, 698)->save(public_path()."/".$pixel750FolderName.$image_name);

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
        $upload->is_album_set_image = False;
        $upload->tudeme_id = $tudeme_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update tudeme cover image
        $tudeme = Tudeme::findOrFail($tudeme_id);
        $tudeme->spread_id = $upload->id;
        $tudeme->save();

        return back()->withSuccess(__('Tudeme spread successfully uploaded.'));
    }

    public function tudemeIconUpload(Request $request,$tudeme_id)
    {

        $tudeme = Tudeme::where('id',$tudeme_id)->first();
        $folderName = str_replace(' ', '', $tudeme->name."/Banner/");
        $originalFolderName = str_replace(' ', '', $tudeme->name."/Cover Image/Original/");

        $pixel100FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/Cover Image"."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/tudeme/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/tudeme/".$originalFolderName.$file_name_extension;

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
        $upload->is_album_set_image = False;
        $upload->tudeme_id = $tudeme_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update tudeme cover image
        $tudeme = Tudeme::findOrFail($tudeme_id);
        $tudeme->icon_id = $upload->id;
        $tudeme->save();

        return back()->withSuccess(__('Tudeme cover image successfully uploaded.'));
    }

    public function tudemeGalleryImageUpload(Request $request,$tudeme_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $tudeme = Tudeme::where('id',$tudeme_id)->first();
        $folderName = str_replace(' ', '', $tudeme->name.'/');
        $originalFolderName = str_replace(' ', '', $tudeme->name."/Original/");

        $pixel100FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "work/tudeme/".$tudeme->name."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("file");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/tudeme/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/tudeme/".$originalFolderName.$file_name_extension;

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
        $upload->size = $size;

        $upload->name = $file_name;
        $upload->extension = $extension;
        $upload->orientation = $orientation;

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
        $upload->is_album_set_image = False;
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->upload_type_id = "720a967d-16b1-46c4-b22d-9e734e94c9e9";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Tudeme gallery record
        $tudemeGallery = new TudemeGallery();
        $tudemeGallery->upload_id = $upload->id;
        $tudemeGallery->tudeme_id = $tudeme->id;
        $tudemeGallery->user_id = Auth::user()->id;
        $tudemeGallery->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tudemeGallery->save();

        return back()->withSuccess(__('Tudeme gallery image successfully uploaded.'));
    }

    public function tudemeUpdateDesign(Request $request, $tudeme_id)
    {
        $tudeme = Tudeme::findOrFail($tudeme_id);
        $tudeme->typography_id = $request->typography;
        $tudeme->thumbnail_size_id = $request->thumbnail_size;
        $tudeme->save();

        return back()->withSuccess('Tudeme design updated!');
    }

    public function tudemeDelete($album_type_id)
    {

        $tudeme = Tudeme::findOrFail($album_type_id);
        $tudeme->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $tudeme->save();

        return back()->withSuccess(__('Tudeme '.$tudeme->name.' successfully deleted.'));
    }

    public function tudemeRestore($album_type_id)
    {

        $tudeme = Tudeme::findOrFail($album_type_id);
        $tudeme->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tudeme->save();

        return back()->withSuccess(__('Tudeme '.$tudeme->name.' successfully restored.'));
    }

    public function tudemeMealCreate($tudeme_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // tudeme
        $tudeme = Tudeme::findOrFail($tudeme_id);

        // cuisine
        $cuisines = Cuisine::all();
        // cooking skill
        $cookingSkills = CookingSkill::all();
        // cooking style
        $cookingStyles = CookingStyle::all();
        // course
        $courses = Course::all();
        // dietary preference
        $dietaryPreferences = DietaryPreference::all();
        // dish type
        $dishTypes = DishType::all();
        // food type
        $foodTypes = FoodType::all();
        // meal type
        $mealTypes = MealType::all();
        // ingredients
        $ingredients = Ingredient::all();
        // measurments
        $measurments = Measurment::all();

        return view('admin.tudeme_meal_create',compact('measurments','ingredients','user','navbarValues','tudeme','mealTypes','foodTypes','dishTypes','dietaryPreferences','courses','cookingStyles','cookingSkills','cuisines'));

    }

    public function tudemeMealStore(Request $request, $tudeme_id)
    {

        // return $request;

        $meal = new Meal();
        $meal->name = $request->name;
        $meal->number = 1;
        $meal->cook_time = 1;
        $meal->description = $request->description;
        $meal->body = $request->body;
        $meal->tudeme_id = $tudeme_id;
        $meal->cooking_skill_id = $request->cooking_skill;
        // $meal->cuisine_id = $request->cuisine;
        $meal->meal_type_id = $request->meal_type;
        $meal->dish_type_id = $request->dish_type;
        $meal->food_type_id = $request->food_type;
        $meal->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $meal->user_id = Auth::user()->id;
        $meal->save();

        // meal cooking styles
        foreach ($request->cooking_styles as $cookingStyles){
            $mealCookingStyle = new MealCookingStyle();
            $mealCookingStyle->meal_id = $meal->id;
            $mealCookingStyle->cooking_style_id = $cookingStyles;
            $mealCookingStyle->user_id = Auth::user()->id;
            $mealCookingStyle->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $mealCookingStyle->save();
        }

        // meal course
        foreach ($request->course as $course){
            $mealCourse = new MealCourse();
            $mealCourse->meal_id = $meal->id;
            $mealCourse->course_id = $course;
            $mealCourse->user_id = Auth::user()->id;
            $mealCourse->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $mealCourse->save();
        }

        // meal dietary preference
        foreach ($request->dietary_preferences as $dietaryPreference){
            $mealDietaryPreference = new MealDietaryPreference();
            $mealDietaryPreference->meal_id = $meal->id;
            $mealDietaryPreference->dietary_preference_id = $dietaryPreference;
            $mealDietaryPreference->user_id = Auth::user()->id;
            $mealDietaryPreference->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $mealDietaryPreference->save();
        }

        // meal ingredients
        foreach ($request->ingredients as $ingredients){
            $mealIngredient = new MealIngredient();
            $mealIngredient->meal_id = $meal->id;

            // measurment
            $mealIngredient->measurment_id = $ingredients['measurment'];
            $measurment = Measurment::findOrFail($ingredients['measurment']);

            // ingredient
            $mealIngredient->ingredient_id = $ingredients['ingredient'];
            $ingredient = Ingredient::findOrFail($ingredients['ingredient']);

            $mealIngredient->ingredient = $ingredients['amount'].' '. $measurment->name.' '.$ingredient->name.''.$ingredients['extra'];
            $mealIngredient->details = $ingredients['amount'].' '. $measurment->name.' '.$ingredient->name.''.$ingredients['extra'];
            $mealIngredient->extra = $ingredients['extra'];
            $mealIngredient->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $mealIngredient->user_id = Auth::user()->id;
            $mealIngredient->save();
        }

        // instructions
        foreach ($request->instructions as $mealInstruction){
            // return $mealInstruction;
            $instruction = new Instruction();
            $instruction->instruction = $mealInstruction['instruction'];
            $instruction->number = $mealInstruction['number'];
            $instruction->meal_id = $meal->id;
            $instruction->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $instruction->user_id = Auth::user()->id;
            $instruction->save();
        }

        // notes
        foreach ($request->notes as $mealNote){
            // return $mealInstruction;
            $note = new Note();
            $note->notes = $mealNote['note'];
            $note->tudeme_id = $tudeme_id;
            $note->is_meal = True;
            $note->meal_id = $meal->id;
            $note->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $note->user_id = Auth::user()->id;
            $note->save();
        }

        return redirect()->route('admin.tudeme.meal.show',$meal->id)->withSuccess(__('Meal sucessfully saved.'));

    }
    public function tudemeMealShow($tudeme_meal_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // cuisine
        $cuisines = Cuisine::all();
        // cooking skill
        $cookingSkills = CookingSkill::all();
        // cooking style
        $cookingStyles = CookingStyle::all();
        // course
        $courses = Course::all();
        // dietary preference
        $dietaryPreferences = DietaryPreference::all();
        // dish type
        $dishTypes = DishType::all();
        // food type
        $foodTypes = FoodType::all();
        // meal type
        $mealTypes = MealType::all();
        // ingredients
        $ingredients = Ingredient::all();
        // measurments
        $measurments = Measurment::all();

        $tudemeMeal = Meal::findOrFail($tudeme_meal_id);
        $tudemeMeal = Meal::where('id',$tudeme_meal_id)->with('cooking_skill','dish_type','food_type','meal_type','tudeme','meal_cooking_styles','meal_courses','meal_dietary_preferences','meal_ingredients.measurment','meal_ingredients.ingredient','instructions')->withCount('instructions')->first();

        // return $tudemeMeal;

        return view('admin.tudeme_meal_show',compact('measurments','ingredients','user','navbarValues','tudemeMeal','mealTypes','foodTypes','dishTypes','dietaryPreferences','courses','cookingStyles','cookingSkills','cuisines'));

    }

}
