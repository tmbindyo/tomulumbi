<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\AlbumCategory;
use App\AlbumTag;
use App\Traits\UserTrait;
use App\Typography;
use Auth;
use App\AlbumType;
use App\Category;
use App\Tag;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    use UserTrait;
    public function __construct()
    {
        $this->middleware('auth');
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

        return view('admin.tag',compact('tag','user','tagAlbums'));
    }
    public function tagSave(Request $request)
    {
        $tag = new Tag();
        $tag->name = strtolower($request->name);
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





}
