<?php

namespace App\Http\Controllers\Admin;


use App\Size;
use App\Type;
use App\ToDo;
use App\Status;
use App\Upload;
use App\Product;
use App\SubType;
use App\PriceList;
use App\Typography;
use App\OrderProduct;
use App\ThumbnailSize;
use App\ProductGallery;
use App\Traits\UserTrait;
use App\Traits\NavbarTrait;
use Illuminate\Http\Request;
use App\Traits\ProductTrait;
use App\Traits\StatusCountTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use App\Traits\DocumentExtensionTrait;
use App\Traits\DownloadViewNumbersTrait;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    use UserTrait;
    use NavbarTrait;
    use ProductTrait;
    use StatusCountTrait;
    use DocumentExtensionTrait;
    use DownloadViewNumbersTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function products()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get albums
        $products = Product::with('user','status')->withCount('order_products')->get();
        // Get the design status counts
        $productsStatusCount = $this->productsStatusCount();

//        return $productsStatusCount;

        return view('admin.products',compact('products','user','navbarValues','productsStatusCount'));
    }

    public function productCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Types
        $types = Type::all();
        return view('admin.product_create',compact('user','types','navbarValues'));
    }

    public function productStore(Request $request)
    {

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;

        $product->views = 0;
        $product->status_id = "f1a32788-4016-4104-804b-92186b340eb0";
        $product->type_id = $request->type;
        $product->user_id = Auth::user()->id;
        $product->save();


        return redirect()->route('admin.product.show',$product->id)->withSuccess('Product '.$product->name.' succesfully created');
    }

    public function productShow($product_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get product aggregations
        $productArray = $this->getProduct($product_id);
        // Get views and downloads
        $productViews = $this->getProductViews($product_id);
        // Get typography
        $typographies = Typography::all();
        // Get thumbnail sizes
        $thumbnailSizes = ThumbnailSize::all();
        // Types
        $types = Type::all();
        // Get product
        $product = Product::findOrFail($product_id);
        $product = Product::where('id',$product_id)->with('user','status','cover_image','second_cover_image')->first();
        // Product status
        $productStatuses = Status::where('status_type_id','b7870001-b1f1-442d-8b7a-a9551b1fc239')->get();
        // Price lists
        $priceLists = PriceList::where('product_id',$product->id)->with('sub_type.type','size','status','user')->get();
        // sub types
        $subTypes = SubType::where('type_id', $product->type_id)->with('type')->get();
        // sizes
        $sizes = Size::where('type_id', $product->type_id)->get();
        // Pending to dos
        $pendingToDos = ToDo::with('user','status','product')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('product_id',$product->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','product')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('product_id',$product->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','product')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('product_id',$product->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','product')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('product_id',$product->id)->get();
        // product gallery
        $productGallery = ProductGallery::where('product_id',$product_id)->with('upload')->get();
        return view('admin.product_show',compact('pendingToDos','inProgressToDos','completedToDos','overdueToDos','user','product','productGallery','productStatuses','typographies','thumbnailSizes','types','priceLists','subTypes','sizes','navbarValues','productViews','productArray'));
    }

    public function productUpdate(Request $request, $product_id)
    {

        // User
        $user = $this->getAdmin();

        // Check if product exists and get
        $product = Product::findOrFail($product_id);

        // Check if the cover image has been uploaded if the status is being updated to published
        if ($request->status == "e5d06435-7df5-45dd-a4e9-e57f538b8366" && $product->cover_image_id == ""){
            return back()->withWarning(__('Please set a cover image before making the product to published.'));
        }
        if ($request->status == "e5d06435-7df5-45dd-a4e9-e57f538b8366" && $product->second_cover_image_id == ""){
            return back()->withWarning(__('Please set the secondary cover image before making the product to published.'));
        }
        // if has no price list
        $priceList = PriceList::where('product_id',$product_id)->first();
        if (!($priceList)){
            return back()->withWarning(__("The product can't be set to live without a price list"));
        }


        $product->name = $request->name;
        $product->description = $request->description;
        $product->status_id = $request->status;
        $product->type_id = $request->type;
        $product->user_id = Auth::user()->id;
        $product->save();

        return back()->withSuccess(__('Product successfully uploaded.'));
    }

    public function productCoverImageUpload(Request $request,$product_id)
    {

//        return $request;
        $product = Product::where('id',$product_id)->first();
        $folderName = str_replace(' ', '', $product->name."/Banner/");
        $originalFolderName = str_replace(' ', '', $product->name."/Cover Image/Original/");

        $pixel100FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/product/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/product/".$originalFolderName.$file_name_extension;

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

//            Image::make( $path )->fit(563, 750)->save(public_path()."/".$pixel750FolderName.$image_name);


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

//            Image::make( $path )->fit(563, 750)->save(public_path()."/".$pixel750FolderName.$image_name);

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
        $upload->product_id = $product_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update product cover image
        $product = Product::findOrFail($product_id);
        $product->cover_image_id = $upload->id;
        $product->save();

        return back()->withSuccess(__('Product cover image successfully uploaded.'));
    }

    public function productCoverImageUploadSecond(Request $request,$product_id)
    {

        $product = Product::where('id',$product_id)->first();
        $folderName = str_replace(' ', '', $product->name."/Banner/");
        $originalFolderName = str_replace(' ', '', $product->name."/Cover Image/Original/");

        $pixel100FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "work/product/".$product->name."/Cover Image"."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("cover_image");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/product/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/product/".$originalFolderName.$file_name_extension;

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

//            Image::make( $path )->fit(563, 750)->save(public_path()."/".$pixel750FolderName.$image_name);


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

//            Image::make( $path )->fit(563, 750)->save(public_path()."/".$pixel750FolderName.$image_name);

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
        $upload->product_id = $product_id;
        $upload->upload_type_id = "11bde94f-e686-488e-9051-bc52f37df8cf";
        $upload->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $upload->user_id = Auth::user()->id;
        $upload->save();

        // Update product cover image
        $product = Product::findOrFail($product_id);
        $product->second_cover_image_id = $upload->id;
        $product->save();

        return back()->withSuccess(__('Product cover image successfully uploaded.'));
    }

    public function productGalleryImageUpload(Request $request,$product_id)
    {
        // todo If already image delete
        // todo hash the folder name
        $product = Product::where('id',$product_id)->first();
        $folderName = str_replace(' ', '', $product->name.'/');
        $originalFolderName = str_replace(' ', '', $product->name."/Original/");

        $pixel100FolderName = str_replace(' ', '', "work/product/".$product->name."/100/");
        File::makeDirectory(public_path()."/".$pixel100FolderName, $mode = 0750, true, true);
        $pixel300FolderName = str_replace(' ', '', "work/product/".$product->name."/300/");
        File::makeDirectory(public_path()."/".$pixel300FolderName, $mode = 0750, true, true);
        $pixel500FolderName = str_replace(' ', '', "work/product/".$product->name."/500/");
        File::makeDirectory(public_path()."/".$pixel500FolderName, $mode = 0750, true, true);
        $pixel750FolderName = str_replace(' ', '', "work/product/".$product->name."/750/");
        File::makeDirectory(public_path()."/".$pixel750FolderName, $mode = 0750, true, true);
        $pixel1000FolderName = str_replace(' ', '', "work/product/".$product->name."/1000/");
        File::makeDirectory(public_path()."/".$pixel1000FolderName, $mode = 0750, true, true);
        $pixel1500FolderName = str_replace(' ', '', "work/product/".$product->name."/1500/");
        File::makeDirectory(public_path()."/".$pixel1500FolderName, $mode = 0750, true, true);
        $pixel2500FolderName = str_replace(' ', '', "work/product/".$product->name."/2500/");
        File::makeDirectory(public_path()."/".$pixel2500FolderName, $mode = 0750, true, true);
        $pixel3600FolderName = str_replace(' ', '', "work/product/".$product->name."/3600/");
        File::makeDirectory(public_path()."/".$pixel3600FolderName, $mode = 0750, true, true);

        $file = Input::file("file");
        $file_name_extension = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();

        $file->move(public_path()."/work/product/".$originalFolderName, $file_name_extension);
        $path = public_path()."/work/product/".$originalFolderName.$file_name_extension;

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

        // Product gallery record
        $productGallery = new ProductGallery();
        $productGallery->upload_id = $upload->id;
        $productGallery->product_id = $product->id;
        $productGallery->user_id = Auth::user()->id;
        $productGallery->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $productGallery->save();

        return back()->withSuccess(__('Product gallery image successfully uploaded.'));
    }

    public function productDelete($album_type_id)
    {

        $product = Product::findOrFail($album_type_id);
        $product->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $product->save();
        return back()->withSuccess(__('Product '.$product->name.' successfully deleted.'));

    }

    public function productRestore($album_type_id)
    {

        $product = Product::findOrFail($album_type_id);
        $product->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $product->save();
        return back()->withSuccess(__('Product '.$product->name.' successfully restored.'));
    }

    // Price lists
    public function priceListStore(Request $request, $product_id)
    {

        $priceList = new PriceList();
        $priceList->name = $request->price;
        $priceList->description = $request->description;
        $priceList->price = $request->price;
        $priceList->product_id = $request->product_id;
        $priceList->sub_type_id = $request->sub_type;
        $priceList->product_id = $product_id;
        $priceList->size_id = $request->size;
        $priceList->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $priceList->user_id = Auth::user()->id;
        $priceList->save();
        return back()->withSuccess(__('Price list successfully restored.'));

    }

    public function priceListShow($price_list_id)
    {
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get views and downloads
        $ordersAndSales = $this->getPriceListOrders($price_list_id);
        // Check if priceList exists
        $priceListExists = PriceList::findOrFail($price_list_id);
        // User
        $user = $this->getAdmin();
        // sub types
        $subTypes = SubType::with('type')->get();
        // sizes
        $sizes = Size::all();
        // get price list
        $priceList = PriceList::with('user','status','product')->where('id',$price_list_id)->first();
        // orders
        $orders = OrderProduct::with('product','status','order.contact')->where('is_paid',False)->where("price_list_id",$price_list_id)->get();
        // return $orders;
        // sales
        $sales = OrderProduct::with('product','status','order.contact')->where('is_paid',True)->where("price_list_id",$price_list_id)->get();

//        return $orders;
        return view('admin.price_list_show',compact('priceList','user','navbarValues','orders','sales','subTypes','sizes','ordersAndSales'));
    }

    public function priceListUpdate(Request $request, $price_list_id)
    {

        $priceList = PriceList::findOrFail($price_list_id);
        $priceList->name = $request->price;
        $priceList->description = $request->description;
        $priceList->price = $request->price;
        $priceList->sub_type_id = $request->sub_type;
        $priceList->size_id = $request->size;
        $priceList->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $priceList->user_id = Auth::user()->id;
        $priceList->save();
        return back()->withSuccess('Price list updated!');
    }

    public function priceListDelete($price_list_id)
    {

        $priceList = PriceList::findOrFail($price_list_id);
        $priceList->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $priceList->user_id = Auth::user()->id;
        $priceList->save();

        return back()->withSuccess(__('Price list '.$priceList->name.' successfully deleted.'));
    }

    public function priceListRestore($price_list_id)
    {

        $priceList = PriceList::findOrFail($price_list_id);
        $priceList->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $priceList->user_id = Auth::user()->id;
        $priceList->save();

        return back()->withSuccess(__('Price list '.$priceList->name.' successfully restored.'));
    }
}
