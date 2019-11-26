<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\AlbumCategory;
use App\AlbumSet;
use App\AlbumTag;
use App\Contact;
use App\ContactType;
use App\Design;
use App\Journal;
use App\Project;
use App\ProjectType;
use App\Size;
use App\SubType;
use App\ThumbnailSize;
use App\Traits\NavbarTrait;
use App\Traits\UserTrait;
use App\Type;
use App\Typography;
use App\Upload;
use Auth;
use App\AlbumType;
use App\Category;
use App\Tag;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class SettingsController extends Controller
{
    use UserTrait;
    use NavbarTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function albumTypes()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $albumTypes = AlbumType::with('user','status')->get();

        return view('admin.album_types',compact('albumTypes','user','navbarValues'));
    }

    public function albumTypeCreate()
    {
        // User
        $user = $this->getAdmin();
        return view('admin.album_type_create',compact('user'));
    }

    public function albumTypeStore(Request $request)
    {

        $albumType = new AlbumType();
        $albumType->name = $request->name;
        $albumType->description = $request->description;
        $albumType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumType->user_id = Auth::user()->id;
        $albumType->save();

        return redirect()->route('admin.album.types')->withSuccess('Album type updated!');
    }

    public function albumTypeShow($album_type_id)
    {
        // Check if album type exists
        $albumTypeExists = AlbumType::findOrFail($album_type_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // album type
        $albumType = AlbumType::with('user','status')->where('id',$album_type_id)->with('albums.status')->first();
        // album type albums
        $albumTypeAlbums = Album::with('user','status')->where('album_type_id',$album_type_id)->withCount('album_views')->get();
        return view('admin.album_type_show',compact('albumType','user','albumTypeAlbums','navbarValues'));
    }

    public function albumTypeUpdate(Request $request, $album_type_id)
    {

        $albumType = AlbumType::findOrFail($album_type_id);
        $albumType->name = $request->name;
        $albumType->description = $request->description;
        $albumType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumType->user_id = Auth::user()->id;
        $albumType->save();

        return redirect()->route('admin.album.type.show',$album_type_id)->withSuccess('Album type '. $albumType->name .' updated!');
    }

    public function albumTypeDelete($album_type_id)
    {

        $albumType = AlbumType::findOrFail($album_type_id);
        $albumType->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $albumType->user_id = Auth::user()->id;
        $albumType->save();

        return back()->withSuccess(__('Album type '.$albumType->name.' successfully deleted.'));
    }

    public function albumTypeRestore($album_type_id)
    {

        $albumType = AlbumType::findOrFail($album_type_id);
        $albumType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumType->user_id = Auth::user()->id;
        $albumType->save();

        return back()->withSuccess(__('Album type '.$albumType->name.' successfully restored.'));
    }


    public function contactTypes()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $contactTypes = ContactType::with('user','status')->get();
        return view('admin.contact_types',compact('contactTypes','user','navbarValues'));
    }

    public function contactTypeCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        return view('admin.contact_type_create',compact('user','navbarValues'));
    }

    public function contactTypeStore(Request $request)
    {
        $contactType = new ContactType();
        $contactType->name = $request->name;
        $contactType->description = $request->description;
        $contactType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $contactType->user_id = Auth::user()->id;
        $contactType->save();

        return redirect()->route('admin.contact.types')->withSuccess('Contact type updated!');
    }

    public function contactTypeShow($contact_type_id)
    {
        // Check if contact type exists
        $contactTypeExists = ContactType::findOrFail($contact_type_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get contact type
        $contactType = ContactType::with('user','status')->where('id',$contact_type_id)->withCount('contacts')->first();
        $contactTypeContacts = Contact::with('user','status')->where('contact_type_id',$contact_type_id)->get();
        return view('admin.contact_type_show',compact('contactType','user','contactTypeContacts','navbarValues'));
    }

    public function contactTypeUpdate(Request $request, $contact_type_id)
    {

        $contactType = ContactType::findOrFail($contact_type_id);
        $contactType->name = $request->name;
        $contactType->description = $request->description;
        $contactType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $contactType->save();

        return redirect()->route('admin.contact.types')->withSuccess('Contact type updated!');
    }

    public function contactTypeDelete($contact_type_id)
    {

        $contactType = ContactType::findOrFail($contact_type_id);
        $contactType->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $contactType->user_id = Auth::user()->id;
        $contactType->save();

        return back()->withSuccess(__('Contact type '.$contactType->name.' successfully deleted.'));
    }
    public function contactTypeRestore($contact_type_id)
    {

        $contactType = ContactType::findOrFail($contact_type_id);
        $contactType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $contactType->user_id = Auth::user()->id;
        $contactType->save();

        return back()->withSuccess(__('Contact type '.$contactType->name.' successfully restored.'));
    }


    public function projectTypes()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $projectTypes = ProjectType::with('user','status')->get();

        return view('admin.project_types',compact('projectTypes','user','navbarValues'));
    }

    public function projectTypeCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        return view('admin.project_type_create',compact('user','navbarValues'));
    }

    public function projectTypeStore(Request $request)
    {

        $projectType = new ProjectType();
        $projectType->name = $request->name;
        $projectType->description = $request->description;
        $projectType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $projectType->user_id = Auth::user()->id;
        $projectType->save();
        return redirect()->route('admin.project.types')->withSuccess('Project type '.$projectType->name.' created!');
    }

    public function projectTypeShow($project_type_id)
    {
        // Check if project type exists
        $projectTypeExists = ProjectType::findOrFail($project_type_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $projectType = ProjectType::with('user','status')->where('id',$project_type_id)->first();
        $projectTypeProjects = Project::with('user','status')->where('project_type_id',$project_type_id)->get();
        return view('admin.project_type_show',compact('projectType','user','projectTypeProjects','navbarValues'));
    }

    public function projectTypeUpdate(Request $request, $project_type_id)
    {

        $projectType = ProjectType::findOrFail($project_type_id);
        $projectType->name = $request->name;
        $projectType->description = $request->description;
        $projectType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $projectType->user_id = Auth::user()->id;
        $projectType->save();

        return redirect()->route('admin.project.types')->withSuccess('Project type updated!');
    }

    public function projectTypeDelete($project_type_id)
    {

        $projectType = ProjectType::findOrFail($project_type_id);
        $projectType->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $projectType->user_id = Auth::user()->id;
        $projectType->save();

        return back()->withSuccess(__('Project type '.$projectType->name.' successfully deleted.'));
    }

    public function projectTypeRestore($project_type_id)
    {

        $projectType = ProjectType::findOrFail($project_type_id);
        $projectType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $projectType->user_id = Auth::user()->id;
        $projectType->save();

        return back()->withSuccess(__('Project type '.$projectType->name.' successfully restored.'));
    }








    public function tags()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $tags = Tag::with('user','status','thumbnail_size')->get();
        return view('admin.tags',compact('tags','user','navbarValues'));
    }
    public function tagCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $thumbnailSizes = ThumbnailSize::all();
        return view('admin.tag_create',compact('user','thumbnailSizes','navbarValues'));
    }

    public function tagStore(Request $request)
    {
        $tag = new Tag();
        $tag->name = strtolower($request->name);
        $tag->thumbnail_size_id = $request->thumbnail_size;
        $tag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tag->user_id = Auth::user()->id;
        $tag->save();
        return redirect()->route('admin.tags')->withSuccess(__('Tag successfully created.'));
    }

    public function tagShow($tag_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Check if tag exists
        $tagExists = Tag::findOrFail($tag_id);
        $tag = Tag::with('user','status')->where('id',$tag_id)->first();

        // Get thumbnail sizes
        $thumbnailSizes = ThumbnailSize::all();
        // Get albums
        $albums = AlbumTag::where('tag_id',$tag_id)->select('album_id')->get()->toArray();
        // Get albums
        $tagAlbums = Album::whereIn('id', $albums)->with('user','status','album_type')->get();

        return view('admin.tag_show',compact('tag','user','tagAlbums','thumbnailSizes','navbarValues'));
    }
    public function tagUpdate(Request $request, $album_type_id)
    {

        $tag = Tag::findOrFail($album_type_id);
        $tag->name = mb_strtolower($request->name);
        $tag->thumbnail_size_id = $request->thumbnail_size;
        $tag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tag->user_id = Auth::user()->id;
        $tag->save();

        return redirect()->route('admin.tags')->withSuccess('Tag updated!');
    }

    public function tagCoverImageUpload(Request $request,$tag_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $tag = Tag::where('id',$tag_id)->first();
        $folderName = str_replace(' ', '', $tag->name."/");

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/tag/".$folderName, $file_name_extension);
        $path = public_path()."/tag/".$folderName.$file_name_extension;

        $file_name = pathinfo($path, PATHINFO_FILENAME);

        $cover_image = $file_name.".".$extension;

        $width = Image::make( $path )->width();
        $height = Image::make( $path )->height();

        $small_thumbnail = $file_name."_small_thumbnail.".$extension;
        $medium_thumbnail = $file_name."_medium_thumbnail.".$extension;
        $large_thumbnail = $file_name."_large_thumbnail.".$extension;
        $banner = $file_name."_banner.".$extension;

//        Image::make( $path )->fit(300, 291)->save(public_path()."/tag/".$folderName.$small_thumbnail);
//        Image::make( $path )->fit(900, 874)->save(public_path()."/tag/".$folderName.$medium_thumbnail);
//        Image::make( $path )->fit(1200, 1165)->save(public_path()."/tag/".$folderName.$large_thumbnail);

        if ($width > $height) { //landscape

            //Small image
            Image::make( $path )->fit(300, 150)->save(public_path()."/tag/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/tag/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(900, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/tag/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(1200, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/tag/".$folderName.$large_thumbnail);

        } else {


            Image::make( $path )->resize(null, 291, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/tag/".$folderName.$small_thumbnail);

            Image::make( $path )->resize(null, 874, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/tag/".$folderName.$medium_thumbnail);

            Image::make( $path )->resize(null, 1165, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path()."/tag/".$folderName.$large_thumbnail);

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
        $upload->image = "tag/".$folderName.$file_name;
        $upload->small_thumbnail = "tag/".$folderName.$small_thumbnail;
        $upload->large_thumbnail = "tag/".$folderName.$large_thumbnail;
        $upload->banner = "tag/".$folderName.$banner;

        $upload->size = $size;
        $upload->is_client_exclusive_access = False;
        $upload->is_album_set_image = False;
        $upload->upload_type_id = "b2877336-2866-47f6-9b44-094b4d414d1b";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update tag cover image
        $tag = Tag::findOrFail($tag_id);
        $tag->cover_image_id = $upload->id;
        $tag->user_id = Auth::user()->id;
        $tag->save();


        return back()->withSuccess(__('Tag cover image successfully uploaded.'));
    }

    public function tagDelete($album_type_id)
    {

        $tag = Tag::findOrFail($album_type_id);
        $tag->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $tag->user_id = Auth::user()->id;
        $tag->save();

        return back()->withSuccess(__('Tag '.$tag->name.' successfully deleted.'));
    }

    public function tagRestore($album_type_id)
    {

        $tag = Tag::findOrFail($album_type_id);
        $tag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tag->user_id = Auth::user()->id;
        $tag->save();

        return back()->withSuccess(__('Tag '.$tag->name.' successfully restored.'));
    }





    public function categories()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $categories = Category::with('user','status')->get();
        return view('admin.categories',compact('categories','user','navbarValues'));
    }

    public function categoryCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        return view('admin.category_create',compact('user','navbarValues'));
    }

    public function categoryStore(Request $request)
    {
        $category = new Category();
        $category->name = mb_strtolower($request->name);
        $category->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $category->user_id = Auth::user()->id;
        $category->save();
        return redirect()->route('admin.categories')->withSuccess(__('Category '.$category->name.' successfully created.'));
    }

    public function categoryShow($category_id)
    {
        // Check if category exists
        $categoryExists = Category::findOrFail($category_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $category = Category::with('user','status')->where('id',$category_id)->with('design_categories.design.status')->first();
        return view('admin.category_show',compact('category','user','navbarValues'));
    }

    public function categoryUpdate(Request $request, $album_type_id)
    {

        $category = Category::findOrFail($album_type_id);
        $category->name = mb_strtolower($request->name);
        $category->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $category->user_id = Auth::user()->id;
        $category->save();

        return redirect()->route('admin.categories')->withSuccess('Category updated!');
    }

    public function categoryDelete($album_type_id)
    {

        $category = Category::findOrFail($album_type_id);
        $category->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $category->user_id = Auth::user()->id;
        $category->save();

        return back()->withSuccess(__('Category '.$category->name.' successfully deleted.'));
    }

    public function categoryRestore($album_type_id)
    {

        $category = Category::findOrFail($album_type_id);
        $category->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $category->user_id = Auth::user()->id;
        $category->save();

        return back()->withSuccess(__('Category '.$category->name.' successfully restored.'));
    }




    public function types()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $types = Type::with('user','status')->get();
        return view('admin.types',compact('types','user','navbarValues'));
    }

    public function typeCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        return view('admin.type_create',compact('user','navbarValues'));
    }

    public function typeStore(Request $request)
    {
        $type = new Type();
        $type->name = mb_strtolower($request->name);
        $type->description = $request->description;
        $type->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $type->user_id = Auth::user()->id;
        $type->save();
        return redirect()->route('admin.types')->withSuccess(__('Type '.$type->name.' successfully created.'));
    }

    public function typeShow($type_id)
    {
        // Check if type exists
        $typeExists = Type::findOrFail($type_id);
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // User
        $user = $this->getAdmin();
        $type = Type::with('user','status')->where('id',$type_id)->with('sub_types')->first();

        return view('admin.type_show',compact('type','user','navbarValues'));
    }

    public function typeUpdate(Request $request, $type_id)
    {

        $type = Type::findOrFail($type_id);
        $type->name = mb_strtolower($request->name);
        $type->description = $request->description;
        $type->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $type->user_id = Auth::user()->id;
        $type->save();

        return redirect()->route('admin.types')->withSuccess('Type updated!');
    }

    public function typeDelete($type_id)
    {

        $type = Type::findOrFail($type_id);
        $type->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $type->user_id = Auth::user()->id;
        $type->save();

        return back()->withSuccess(__('Type '.$type->name.' successfully deleted.'));
    }

    public function typeRestore($type_id)
    {

        $type = Type::findOrFail($type_id);
        $type->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $type->user_id = Auth::user()->id;
        $type->save();

        return back()->withSuccess(__('Type '.$type->name.' successfully restored.'));
    }


    // Sub types
    public function subTypes()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // sub types
        $subTypes = SubType::with('user','status','type')->get();
        return view('admin.sub_types',compact('subTypes','user','navbarValues'));
    }

    public function subTypeCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // types
        $types = Type::all();
        return view('admin.sub_type_create',compact('user','types','navbarValues'));
    }

    public function subTypeStore(Request $request)
    {
        $subType = new SubType();
        $subType->name = mb_strtolower($request->name);
        $subType->description = $request->description;
        $subType->type_id = $request->type;
        $subType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $subType->user_id = Auth::user()->id;
        $subType->save();
        return redirect()->route('admin.sub_types')->withSuccess(__('Sub type '.$subType->name.' successfully created.'));
    }

    public function subTypeShow($sub_type_id)
    {
        // Check if type exists
        $subTypeExists = SubType::findOrFail($sub_type_id);
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // types
        $types = Type::all();
        // User
        $user = $this->getAdmin();
        $subType = SubType::with('user','status')->where('id',$sub_type_id)->with('type','price_lists.product')->first();
        return view('admin.sub_type_show',compact('subType','user','types','navbarValues'));
    }

    public function subTypeUpdate(Request $request, $sub_type_id)
    {

        $subType = SubType::findOrFail($sub_type_id);
        $subType->name = mb_strtolower($request->name);
        $subType->description = $request->description;
        $subType->type_id = $request->type;
        $subType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $subType->user_id = Auth::user()->id;
        $subType->save();

        return redirect()->route('admin.sub.types')->withSuccess('Sub Type updated!');
    }

    public function subTypeDelete($sub_type_id)
    {

        $subType = SubType::findOrFail($sub_type_id);
        $subType->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $subType->user_id = Auth::user()->id;
        $subType->save();

        return back()->withSuccess(__('Type '.$subType->name.' successfully deleted.'));
    }

    public function subTypeRestore($sub_type_id)
    {

        $subType = SubType::findOrFail($sub_type_id);
        $subType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $subType->user_id = Auth::user()->id;
        $subType->save();

        return back()->withSuccess(__('Type '.$subType->name.' successfully restored.'));
    }



    public function sizes()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $sizes = Size::with('user','status')->get();
        return view('admin.sizes',compact('sizes','user','navbarValues'));
    }

    public function sizeCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        return view('admin.size_create',compact('user','navbarValues'));
    }

    public function sizeStore(Request $request)
    {
        $size = new Size();
        $size->size = mb_strtolower($request->size);
        $size->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $size->user_id = Auth::user()->id;
        $size->save();
        return redirect()->route('admin.sizes')->withSuccess(__('Size '.$size->name.' successfully created.'));
    }

    public function sizeShow($size_id)
    {
        // Check if size exists
        $sizeExists = Size::findOrFail($size_id);
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // User
        $user = $this->getAdmin();
        $size = Size::with('user','status')->where('id',$size_id)->with('price_lists')->first();

        return view('admin.size_show',compact('size','user','navbarValues'));
    }

    public function sizeUpdate(Request $request, $size_id)
    {

        $size = Size::findOrFail($size_id);
        $size->size = mb_strtolower($request->size);
        $size->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $size->user_id = Auth::user()->id;
        $size->save();

        return redirect()->route('admin.sizes')->withSuccess('Size updated!');
    }

    public function sizeDelete($size_id)
    {

        $size = Size::findOrFail($size_id);
        $size->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $size->user_id = Auth::user()->id;
        $size->save();

        return back()->withSuccess(__('Size '.$size->name.' successfully deleted.'));
    }

    public function sizeRestore($size_id)
    {

        $size = Size::findOrFail($size_id);
        $size->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $size->user_id = Auth::user()->id;
        $size->save();

        return back()->withSuccess(__('Size '.$size->name.' successfully restored.'));
    }









    public function typographies()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $typographies = Typography::with('user','status')->get();
        return view('admin.typographies',compact('typographies','user','navbarValues'));
    }

    public function typographyCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        return view('admin.typography_create',compact('user','navbarValues'));
    }

    public function typographyStore(Request $request)
    {

        $file = Input::file("file");
        $file_name = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $file_name_extension = $file->getClientOriginalName();

        // Folder name
        $folder_name = str_replace([' ','-'], '', mb_strtolower($file_name));

        // Font name
        $font_name = ucwords(str_replace('-', ' ', mb_strtolower($file_name)));

        // Check if already exists
        if (Typography::where('name', '=', $font_name)->count() > 0) {
            return "Typography exists";
        }

        // TODO move impmimentation to storage::
        $file->move(public_path()."/typography/".$folder_name, $file_name_extension);
        $path = public_path()."/typography/".$folder_name.'/'.$file_name_extension;
        \Zipper::make($path)->extractTo('typography/'.$folder_name);

        // rename font file
        $files = glob(public_path()."/typography/".$folder_name.'/*.{ttf,otf}', GLOB_BRACE);
        if ($files) {

            // Get file name

            //return $files[0];
            $search = public_path() . "/typography/" . $folder_name . '/';
            $trimmed = str_replace($search, '', $files);

            // Get file extension
            $ext = pathinfo($files[0], PATHINFO_EXTENSION);

            // Remove file extension
            $removeFullStop = str_replace('.', '', $trimmed);
            $newFontName = str_replace($ext, '', $removeFullStop);

            // Replace caps with small
            $new_font_name = str_replace([' ','-'], '', mb_strtolower($newFontName[0]));
            $font_family = str_replace([' ','-'], '', lcfirst($newFontName[0]));

            // Move file(rename)
            rename($files[0], public_path()."/typography/".$folder_name.'/'.$new_font_name);

            $typography = new Typography();
            $typography->name = $font_name;
            $typography->font_family = $font_family;
            $typography->url = public_path()."/typography/".$folder_name.'/'.$new_font_name;
            $typography->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
            $typography->user_id = Auth::user()->id;
            $typography->save();

        }

        // Delete zip
        unlink($path);

        return 'Typography '.$typography->name.' successfully created.';
    }

    public function typographyShow($typography_id)
    {
        // Check if typography exists
        $typographyExists = Typography::findOrFail($typography_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $typography = Typography::with('user','status')->where('id',$typography_id)->first();

        // journals
        $journals = Journal::where('typography_id',$typography_id)->with('status','user')->get();
        // projects
        $projects = Project::where('typography_id',$typography_id)->with('status','user')->get();
        // designs
        $designs = Design::where('typography_id',$typography_id)->with('status','user')->get();
        // albums
        $albums = Album::where('typography_id',$typography_id)->with('status','user','album_type')->get();

        return view('admin.typography_show',compact('user','journals','projects','designs','albums','typography','navbarValues'));
    }

    public function typographyUpdate(Request $request, $album_type_id)
    {

        $typography = Typography::findOrFail($album_type_id);
        $typography->name = mb_strtolower($request->name);
        $typography->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $typography->save();

        return redirect()->route('admin.typographies')->withSuccess('Typography updated!');
    }

    public function typographyDelete($album_type_id)
    {

        $typography = Typography::findOrFail($album_type_id);
        $typography->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $typography->save();

        return back()->withSuccess(__('Typography '.$typography->name.' successfully deleted.'));
    }

    public function typographyRestore($album_type_id)
    {

        $typography = Typography::findOrFail($album_type_id);
        $typography->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $typography->save();

        return back()->withSuccess(__('Typography '.$typography->name.' successfully restored.'));
    }

}
