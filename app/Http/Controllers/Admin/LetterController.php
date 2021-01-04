<?php

namespace App\Http\Controllers\Admin;

use App\Letter;
use App\LetterLetterTag;
use App\Status;
use App\Traits\DocumentExtensionTrait;
use App\Traits\LetterTrait;
use App\Upload;
use App\LetterTag;
use App\Traits\UserTrait;
use App\Traits\NavbarTrait;
use Illuminate\Http\Request;
use App\Traits\StatusCountTrait;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class LetterController extends Controller
{

    use LetterTrait;
    use UserTrait;
    use NavbarTrait;
    use StatusCountTrait;
    use DocumentExtensionTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function letters()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the letter status counts
        $lettersStatusCount = $this->lettersStatusCount();
        // Get letters
        $letters = Letter::with('user','status','letterLetterTags')->get();
        // get letter statuses
        $letterStatuses = Status::where('status_type_id','12a49330-14a5-41d2-b62d-87cdf8b252f8')->get();

        return view('admin.letters',compact('letters','user','navbarValues','lettersStatusCount', 'letterStatuses'));
    }

    public function letterCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // letter tags
        $letterTags = LetterTag::all();
        return view('admin.letter_create',compact('user','letterTags', 'navbarValues'));
    }

    public function letterStore(Request $request)
    {

        $letter = new Letter();
        $letter->name = $request->name;
        $letter->description = $request->description;
        $letter->date = date('Y-m-d', strtotime($request->date));

        $letter->views = 0;
        $letter->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $letter->user_id = Auth::user()->id;
        $letter->save();

        if($request->letter_tags){
            foreach ($request->letter_tags as $letterRequestTag){
                $letterLetterTag = new LetterLetterTag();
                $letterLetterTag->letter_id = $letter->id;
                $letterLetterTag->letter_tag_id = $letterRequestTag;
                $letterLetterTag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                $letterLetterTag->user_id = Auth::user()->id;
                $letterLetterTag->save();
            }
        }

        return redirect()->route('admin.letter.show',$letter->id)->withSuccess('Letter '.$letter->name.' succesfully created');
    }

    public function letterShow($letter_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get letter aggregations
        $letterArray = $this->getLetter($letter_id);
        // letter types
        $letterTags = LetterTag::all();
        // Get letter
        $letter = Letter::findOrFail($letter_id);
        $letter = Letter::where('id',$letter_id)->with('user','status','cover_image', 'letterLetterTags')->first();

        // Letter status
        $letterStatuses = Status::where('status_type_id','12a49330-14a5-41d2-b62d-87cdf8b252f8')->get();

        return view('admin.letter_show',compact('user','letter','letterStatuses','letterTags','navbarValues','letterArray'));
    }

    public function letterUpdate(Request $request, $letter_id)
    {

        // User
        $user = $this->getAdmin();

        // Check if letter exists and get
        $letter = Letter::findOrFail($letter_id);

        // Check if the cover image has been uploaded if the status is being updated to published
        if ($request->status == "be8843ac-07ab-4373-83d9-0a3e02cd4ff5" && $letter->cover_image_id == ""){
            return back()->withWarning(__('Please set a cover image before making the letter to published.'));
        }

        $letter->name = $request->name;
        $letter->description = $request->description;
        $letter->body = $request->body;
        $letter->status_id = $request->status;
        $letter->date = date('Y-m-d', strtotime($request->date));
        $letter->save();

        if($request->contacts){
            // Design contacts update
            $letterTagsRequest =array();
            foreach ($request->letter_tags as $letterRequestTag){
                // Append to array
                $letterTagsRequest[]['id'] = $letterRequestTag;

                // Check if letter contact exists
                $letterContact = LetterContact::where('letter_id',$letter->id)->where('letter_tag_id',$letterRequestTag)->first();

                if($letterContact === null) {
                    $letterLetterTag = new LetterLetterTag();
                    $letterLetterTag->letter_id = $letter->id;
                    $letterLetterTag->letter_tag_id = $letterRequestTag;
                    $letterLetterTag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
                    $letterLetterTag->user_id = Auth::user()->id;
                    $letterLetterTag->save();
                }
            }

            $letterContactsIds = LetterLetterTag::where('letter_id',$letter_id)->whereNotIn('letter_tag_id',$letterTagsRequest)->select('id')->get()->toArray();
            DB::table('letter_contacts')->whereIn('id', $letterContactsIds)->delete();

        }


        return back()->withSuccess(__('Letter successfully uploaded.'));
    }

    public function letterCoverImageUpload(Request $request,$letter_id)
    {

//        return $request;
        $letter = Letter::where('id',$letter_id)->first();
        $folderName = str_replace(' ', '', "work/letter/".$letter->name);

        $originalFolderName = str_replace(' ', '', $folderName."/Cover Image/Original/");

        $pixel750FolderName = str_replace(' ', '', $folderName."/Cover Image"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', $folderName."/Cover Image"."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/".$originalFolderName, $file_name_extension);
        $path = public_path()."/".$originalFolderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);
        $image_name = $file_name.'.'.$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        if ($width > $height) { //landscape

            $orientation = "landscape";

            $mediumImage = Image::make( $path )->fit(460, 460, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name)->encode();

            $largeImage = Image::make( $path )->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name)->encode();


        } else {

            $orientation = "portrait";

            $mediumImage = Image::make( $path )->fit(460, 460, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel750FolderName.$image_name)->encode();

            $largeImage = Image::make( $path )->resize(null, 1500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name)->encode();


        }

        // upload image
        $created = Storage::disk('linode')->put( $pixel750FolderName.'/'.$image_name, (string) $mediumImage);
        $created = Storage::disk('linode')->put( $pixel1500FolderName.'/'.$image_name, (string) $largeImage);

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
        $upload->letter_id = $letter_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update letter cover image
        $letter = Letter::findOrFail($letter_id);
        $letter->cover_image_id = $upload->id;
        $letter->save();

        // delete original file
        File::delete($path);
        File::deleteDirectory(public_path()."/work/letter/");

        return back()->withSuccess(__('Letter cover image successfully uploaded.'));
    }

    public function letterDelete($album_type_id)
    {

        $letter = Letter::findOrFail($album_type_id);
        $letter->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $letter->save();

        return back()->withSuccess(__('Letter '.$letter->name.' successfully deleted.'));
    }

    public function letterRestore($album_type_id)
    {

        $letter = Letter::findOrFail($album_type_id);
        $letter->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $letter->save();

        return back()->withSuccess(__('Letter '.$letter->name.' successfully restored.'));
    }

}
