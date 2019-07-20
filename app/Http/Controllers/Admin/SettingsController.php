<?php

namespace App\Http\Controllers\Admin;

use App\Traits\UserTrait;
use Auth;
use App\AlbumType;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('admin.albumTypes',compact('album_types','user'));
    }
    public function albumType($album_type_id)
    {
        // User
        $user = $this->getAdmin();
        $albumType = AlbumType::with('user','status')->where('id',$album_type_id)->first();
        return view('admin.albumType',compact('albumType','user'));
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
        // User
        $user = $this->getAdmin();
        $tag = Tag::with('user','status')->where('id',$tag_id)->first();
        return view('admin.tag',compact('tag','user'));
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
        $tag->name = $request->name;
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
        // User
        $user = $this->getAdmin();
        $category = Category::with('user','status')->where('id',$category_id)->first();
        return view('admin.category',compact('category','user'));
    }
    public function categorySave(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $category->user_id = Auth::user()->id;
        $category->save();

        return back()->withStatus(__('Category successfully created.'));
    }
    public function categoryUpdate(Request $request, $album_type_id)
    {

        $category = Category::findOrFail($album_type_id);
        $category->name = $request->name;
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





}
