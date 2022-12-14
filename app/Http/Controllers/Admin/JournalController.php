<?php

namespace App\Http\Controllers\Admin;

use DB;
use Storage;
use App\ToDo;
use App\Album;
use App\Label;
use App\Design;
use App\Upload;
use App\Tudeme;
use App\Status;
use App\Project;
use App\Contact;
use App\Journal;
use App\AlbumTag;
use App\ProjectType;
use App\JournalLabel;
use App\JournalSeries;
use App\ThumbnailSize;
use App\ProjectGallery;
use App\Traits\UserTrait;
use App\Traits\NavbarTrait;
use App\Traits\JournalTrait;
use Illuminate\Http\Request;
use App\Traits\StatusCountTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Traits\DocumentExtensionTrait;
use App\Traits\DownloadViewNumbersTrait;
use Intervention\Image\ImageManagerStatic as Image;

class JournalController extends Controller
{
    use UserTrait;
    use NavbarTrait;
    use JournalTrait;
    use StatusCountTrait;
    use DocumentExtensionTrait;
    use DownloadViewNumbersTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function journalSeriesCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get journal series
        $journalSeries = JournalSeries::all();
        return view('admin.work.journal_series_create',compact('journalSeries','user','navbarValues'));
    }

    public function journalSeriesStore(Request $request)
    {

        $journalSeries = new JournalSeries();
        $journalSeries->name = $request->name;
        $journalSeries->description = $request->description;
        if($request->is_journal_series == "on"){
            $journalSeries->is_journal_series = True;
            $journalSeries->journal_series_id = $request->journal_series;
        }else{
            $journalSeries->is_journal_series = False;
        }
        if($request->is_tudeme == "on"){
            $journalSeries->is_tudeme = True;
        }else{
            $journalSeries->is_tudeme = False;
        }
        $journalSeries->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $journalSeries->user_id = Auth::user()->id;
        $journalSeries->save();

        return redirect()->route('admin.journal.series.show',$journalSeries->id)->withSuccess('Journal series updated!');
    }

    public function journalSeriesShow($journal_series_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get journal series
        $journalSerieses = JournalSeries::all();

        // Get journal series
        $journalSeries = JournalSeries::findOrFail($journal_series_id);
        $journalSeries = JournalSeries::where('id',$journal_series_id)->with('user','status')->first();
        // project journals
        $journalSeriesJournals = Journal::with('user','status')->where('journal_series_id',$journal_series_id)->get();

        return view('admin.work.journal_series_show',compact('journalSeriesJournals','journalSeries','journalSerieses','user','navbarValues'));
    }

    public function journalSeriesJournalCreate($journal_series_id)
    {
        // get journal series
        $journalSeries = JournalSeries::findOrFail($journal_series_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Labels
        $labels = Label::all();
        return view('admin.journal_series_journal_create',compact('journalSeries','user','labels','navbarValues'));
    }


    // journals
    public function journals()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get the design status counts
        $journalsStatusCount = $this->journalsStatusCount();
        // Get journals
        $journals = Journal::with('user','status')->get();
        // get journal series
        $journalSeries = JournalSeries::with('user','status')->withCount('journals')->get();
        // get albums
        $albums = Album::with('user','status')->get();
        // Projects
        $projects = Project::all();
        // Design
        $designs = Design::all();
        // Tudeme
        $tudemes = Tudeme::all();
        // Label
        $labels = Label::all();
        return view('admin.work.journals',compact('journalSeries','journals','user','navbarValues','journalsStatusCount','albums','projects','designs','tudemes','labels'));
    }

    public function journalCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Labels
        $labels = Label::all();
        return view('admin.work.journal_create',compact('user','labels','navbarValues'));
    }

    public function journalStore(Request $request)
    {

        $journal = new Journal();
        $journal->name = $request->name;
        $journal->description = $request->description;
        $journal->color = $request->color;
        $journal->date = date('Y-m-d', strtotime($request->date));

        if($request->is_project == "on"){
            $journal->is_project = True;
            $journal->project_id = $request->project;
        }else{
            $journal->is_project = False;
        }
        if($request->is_design == "on"){
            $journal->is_design = True;
            $journal->design_id = $request->design;
        }else{
            $journal->is_design = False;
        }
        if($request->is_album == "on"){
            $journal->is_album = True;
            $journal->album_id = $request->album;
        }else{
            $journal->is_album = False;
        }
        if($request->is_journal_series == "on"){
            $journal->is_journal_series = True;
            $journal->journal_series_id = $request->journal_series;
        }else{
            $journal->is_journal_series = False;
        }
        if($request->is_tudeme == "on"){
            $journal->is_tudeme = True;
        }else{
            $journal->is_tudeme = False;
        }

        $journal->views = 0;
        $journal->thumbnail_size_id = "36400ca6-68d0-4897-b22f-6bc04bbaa929";
        $journal->status_id = "cad5abf4-ed94-4184-8f7a-fe5084fb7d56";
        $journal->user_id = Auth::user()->id;
        $journal->save();

        foreach ($request->labels as $journalLabelLabel){
            $journalLabel = new JournalLabel();
            $journalLabel->journal_id = $journal->id;
            $journalLabel->label_id = $journalLabelLabel;
            $journalLabel->user_id = Auth::user()->id;
            $journalLabel->save();
        }

        return redirect()->route('admin.journal.show',$journal->id)->withSuccess('Journal '.$journal->name.' succesfully created');
    }

    public function journalShow($journal_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get project aggregations
        $journalArray = $this->getJournal($journal_id);
        // Get views and downloads
        $journalViews = $this->getJournalViews($journal_id);
        // Get thumbnail sizes
        $thumbnailSizes = ThumbnailSize::all();
        // Labels
        $labels = Label::all();
        // Get journal
        $journal = Journal::findOrFail($journal_id);
        $journal = Journal::where('id',$journal_id)->with('user','status','cover_image')->first();
        // Journal status
        $journalStatuses = Status::where('status_type_id','12a49330-14a5-41d2-b62d-87cdf8b252f8')->get();

        $journalLabels = JournalLabel::where('journal_id',$journal_id)->with('journal','label')->get();
        // projects
        $projects = Project::all();
        // designs
        $designs = Design::all();
        // albums
        $albums = Album::all();
        // tudemes
        $tudemes = Tudeme::all();
        // journal series
        $journalSeries = JournalSeries::all();
        return view('admin.work.journal_show',compact('user','journal','journalStatuses','thumbnailSizes','labels','journalLabels','navbarValues','journalArray','journalViews','projects', 'designs', 'albums', 'tudemes', 'journalSeries'));
    }

    public function journalTextShow($journal_id)
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get journal
        $journal = Journal::findOrFail($journal_id);
        $journal = Journal::where('id',$journal_id)->with('user','status','cover_image')->first();

        return view('admin.work.journal_text_show',compact('user','journal','navbarValues'));
    }

    public function journalUpdate(Request $request, $journal_id)
    {

        // User
        $user = $this->getAdmin();

        // Check if journal exists and get
        $journal = Journal::findOrFail($journal_id);

        // Check if the cover image has been uploaded if the status is being updated to published
        if ($request->status == "be8843ac-07ab-4373-83d9-0a3e02cd4ff5" && $journal->cover_image_id == ""){
            return back()->withWarning(__('Please set a cover image before making the journal to published.'));
        }


        // Journal labels update
        $journalRequestLabels =array();
        foreach ($request->labels as $journalAlbumLabel){
            // Append to array
            $journalRequestLabels[]['id'] = $journalAlbumLabel;

            // Check if journal label exists
            $journalLabel = JournalLabel::where('journal_id',$journal->id)->where('label_id',$journalAlbumLabel)->first();

            if($journalLabel === null) {
                $journalLabel = new JournalLabel();
                $journalLabel->journal_id = $journal->id;
                $journalLabel->label_id = $journalAlbumLabel;
                $journalLabel->user_id = Auth::user()->id;
                $journalLabel->save();
            }
        }

        $journalLabelsIds = JournalLabel::where('journal_id',$journal_id)->whereNotIn('label_id',$journalRequestLabels)->select('id')->get()->toArray();
        DB::table('journal_labels')->whereIn('id', $journalLabelsIds)->delete();

        $journal->name = $request->name;
        $journal->description = $request->description;
        $journal->body = $request->body;
        $journal->thumbnail_size_id = $request->thumbnail_size;
        $journal->typography_id = $request->typography;
        $journal->color = $request->color;
        $journal->status_id = $request->status;
        $journal->date = date('Y-m-d', strtotime($request->date));
        $journal->save();


        return back()->withSuccess(__('Journal successfully uploaded.'));
    }

    public function journalTextUpdate(Request $request, $journal_id)
    {

        // User
        $user = $this->getAdmin();

        // Check if journal exists and get
        $journal = Journal::findOrFail($journal_id);
        $journal->body = $request->body;
        $journal->save();


        return back()->withSuccess(__('Journal successfully uploaded.'));
    }

    public function journalCoverImageUpload(Request $request,$journal_id)
    {

//        return $request;
        $journal = Journal::where('id',$journal_id)->first();
        $folderName = str_replace(' ', '', "work/journal/".$journal->name);
        $originalFolderName = str_replace(' ', '', $journal->name."/Cover Image/Original/");

        $pixel100FolderName = str_replace(' ', '', $folderName."/Cover Image"."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
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

            $smallImage = Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name)->encode();

            $mediumImage = Image::make( $path )->fit(563, 750)
                ->save(public_path()."/".$pixel750FolderName.$image_name)->encode();

            $largeImage = Image::make( $path )->resize(1500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name)->encode();


        } else {

            $orientation = "portrait";

            $smallImage = Image::make( $path )->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel100FolderName.$image_name)->encode();

            $mediumImage = Image::make( $path )->fit(563, 750)
                ->save(public_path()."/".$pixel750FolderName.$image_name)->encode();

            $largeImage = Image::make( $path )->resize(null, 1500, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/".$pixel1500FolderName.$image_name)->encode();

        }

        // upload image
        $created = Storage::disk('linode')->put( $pixel100FolderName.'/'.$image_name, (string) $smallImage);
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
        $upload->journal_id = $journal_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update journal cover image
        $journal = Journal::findOrFail($journal_id);
        $journal->cover_image_id = $upload->id;
        $journal->save();

        // delete the local folder
        File::deleteDirectory(public_path()."/".$folderName);

        return back()->withSuccess(__('Journal cover image successfully uploaded.'));
    }

    public function journalUpdateDesign(Request $request, $journal_id)
    {
        $journal = Journal::findOrFail($journal_id);
        $journal->typography_id = $request->typography;
        $journal->thumbnail_size_id = $request->thumbnail_size;
        $journal->save();

        return back()->withSuccess('Journal design updated!');
    }

    public function journalDelete($album_type_id)
    {

        $journal = Journal::findOrFail($album_type_id);
        $journal->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $journal->save();

        return back()->withSuccess(__('Journal '.$journal->name.' successfully deleted.'));
    }

    public function journalRestore($album_type_id)
    {

        $journal = Journal::findOrFail($album_type_id);
        $journal->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $journal->save();

        return back()->withSuccess(__('Journal '.$journal->name.' successfully restored.'));
    }
}
