<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\AlbumCategory;
use App\AlbumSet;
use App\AlbumTag;
use App\Contact;
use App\Traits\UserTrait;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function testMasonry()
    {
        // User
        $user = $this->getAdmin();

        $albumSets = AlbumSet::where('album_id',"d1004fc1-e286-47a1-af01-ec485772619a")->with('status','user','album_images','album_set_favourites','album_set_downloads')->withCount('album_images')->orderBy('created_at', 'asc')->get();
        return view('admin.test_masonry',compact('user'));
    }


    public function albumTypes()
    {
        // User
        $user = $this->getAdmin();
        $albumTypes = AlbumType::with('user','status')->get();
        return view('admin.album_types',compact('albumTypes','user'));
    }
    public function albumType($album_type_id)
    {
        // Check if album type exists
        $albumTypeExists = AlbumType::findOrFail($album_type_id);
        // User
        $user = $this->getAdmin();
        $albumType = AlbumType::with('user','status')->where('id',$album_type_id)->first();
        $albumTypeAlbums = Album::with('user','status')->where('album_type_id',$album_type_id)->get();
        return view('admin.albumType',compact('albumType','user','albumTypeAlbums'));
    }
    public function albumTypeSave(Request $request)
    {

        $albumType = new AlbumType();
        $albumType->name = $request->name;
        $albumType->description = $request->description;
        $albumType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumType->user_id = Auth::user()->id;
        $albumType->save();

        return back()->withSuccess('Album type updated!');

    }
    public function albumTypeUpdate(Request $request, $album_type_id)
    {

        $albumType = AlbumType::findOrFail($album_type_id);
        $albumType->name = $request->name;
        $albumType->description = $request->description;
        $albumType->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $albumType->save();

        return redirect()->route('admin.album.types')->withSuccess('Album type updated!');
    }
    public function albumTypeDelete($album_type_id)
    {

        $albumType = AlbumType::findOrFail($album_type_id);
        $albumType->delete();

        return back()->withStatus(__('Album type successfully deleted.'));
    }
    public function albumTypeRestore($album_type_id)
    {

        $albumType = AlbumType::findOrFail($album_type_id);
        $albumType->restore();

        return back()->withStatus(__('Album type successfully restored.'));
    }








    public function tags()
    {
        // User
        $user = $this->getAdmin();
        $tags = Tag::with('user','status')->get();
        return view('admin.tags',compact('tags','user'));
    }
    public function tag($tag_id)
    {
        // Check if tag exists
        $tagExists = Tag::findOrFail($tag_id);

        // User
        $user = $this->getAdmin();
        $tag = Tag::with('user','status')->where('id',$tag_id)->first();

        // Get albums
        $albums = AlbumTag::where('tag_id',$tag_id)->select('id')->get()->toArray();
        // Get albums
        $tagAlbums = Album::whereIn('id', $albums)->with('user','status')->get();

        return view('admin.tag_show',compact('tag','user','tagAlbums'));
    }
    public function tagSave(Request $request)
    {
        $tag = new Tag();
        $tag->name = strtolower($request->name);
        $tag->thumbnail_size_id = "36400ca6-68d0-4897-b22f-6bc04bbaa929";
        $tag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $tag->user_id = Auth::user()->id;
        $tag->save();

        return back()->withStatus(__('Tag successfully created.'));
    }
    public function tagUpdate(Request $request, $album_type_id)
    {

        $tag = Tag::findOrFail($album_type_id);
        $tag->name = mb_strtolower($request->name);
        $tag->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
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
        $tag->save();


        return back()->withStatus(__('Tag cover image successfully uploaded.'));
    }

    public function tagDelete($album_type_id)
    {

        $tag = Tag::findOrFail($album_type_id);
        $tag->delete();

        return back()->withStatus(__('Tag successfully deleted.'));
    }

    public function tagRestore($album_type_id)
    {

        $tag = Tag::findOrFail($album_type_id);
        $tag->restore();

        return back()->withStatus(__('Tag successfully restored.'));
    }





    public function categories()
    {
        // User
        $user = $this->getAdmin();
        $categories = Category::with('user','status')->get();
        return view('admin.categories',compact('categories','user'));
    }
    public function category($category_id)
    {
        // Check if category exists
        $categoryExists = Category::findOrFail($category_id);

        // User
        $user = $this->getAdmin();
        $category = Category::with('user','status')->where('id',$category_id)->first();

        // Get albums
        $albums = AlbumCategory::where('category_id',$category_id)->select('id')->get()->toArray();
        // Get albums
        $categoryAlbums = Album::whereIn('id', $albums)->with('user','status')->get();

        return view('admin.category',compact('category','user','categoryAlbums'));
    }
    public function categorySave(Request $request)
    {
        $category = new Category();
        $category->name = mb_strtolower($request->name);
        $category->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $category->user_id = Auth::user()->id;
        $category->save();

        return back()->withStatus(__('Category successfully created.'));
    }
    public function categoryUpdate(Request $request, $album_type_id)
    {

        $category = Category::findOrFail($album_type_id);
        $category->name = mb_strtolower($request->name);
        $category->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $category->save();

        return redirect()->route('admin.categories')->withSuccess('Category updated!');
    }
    public function categoryDelete($album_type_id)
    {

        $category = Category::findOrFail($album_type_id);
        $category->delete();

        return back()->withStatus(__('Category successfully deleted.'));
    }
    public function categoryRestore($album_type_id)
    {

        $category = Category::findOrFail($album_type_id);
        $category->restore();

        return back()->withStatus(__('Category successfully restored.'));
    }





    public function typographies()
    {
        // User
        $user = $this->getAdmin();
        $typographies = Typography::with('user','status')->get();
        return view('admin.typographies',compact('typographies','user'));
    }
    public function typography($typography_id)
    {
        // Check if typography exists
        $typographyExists = Typography::findOrFail($typography_id);

        // User
        $user = $this->getAdmin();
        $typography = Typography::with('user','status')->where('id',$typography_id)->first();

        // Get albums
        $typographyAlbums = Album::whereIn('typography_id', $typography_id)->with('user','status')->get();

        return view('admin.typography',compact('user','typographyAlbums'));
    }
    public function typographySave(Request $request)
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
        $typography->delete();

        return back()->withStatus(__('Typography successfully deleted.'));
    }
    public function typographyRestore($album_type_id)
    {

        $typography = Typography::findOrFail($album_type_id);
        $typography->restore();

        return back()->withStatus(__('Typography successfully restored.'));
    }



    public function contacts()
    {
        // User
        $user = $this->getAdmin();
        $contacts = Contact::with('status')->get();

        return view('admin.contacts',compact('contacts','user'));
    }
    public function contactShow($contact_id)
    {
        // User
        $user = $this->getAdmin();

        $contact = Contact::findOrFail($contact_id);
        $contact = Contact::where('id',$contact_id)->with('status')->get();

        return view('admin.contacts',compact('contacts','user'));
    }


}
