<?php

namespace App\Http\Controllers\Admin;

use App\ActionType;
use Illuminate\Support\Facades\Auth;
use App\Kit;
use App\ToDo;
use App\Asset;
use App\AssetAction;
use App\AssetCategory;
use App\Contact;
use App\Traits\UserTrait;
use App\Traits\NavbarTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KitAsset;
use App\Traits\ReferenceNumberTrait;

class AssetController extends Controller
{

    use UserTrait;
    use NavbarTrait;
    use ReferenceNumberTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    // asset functions
    public function assets()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $assets = Asset::with('user','status','asset_category')->get();

        return view('admin.assets',compact('assets','user','navbarValues'));
    }

    public function assetCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // asset categories
        $assetCategories = AssetCategory::all();
        return view('admin.asset_create',compact('user','navbarValues','assetCategories'));
    }

    public function assetStore(Request $request)
    {

        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);

        $asset = new Asset();
        $asset->reference = $reference;
        $asset->name = $request->name;
        $asset->notes = $request->notes;
        $asset->date_acquired = date('Y-m-d', strtotime($request->date_acquired));
        $asset->asset_category_id = $request->asset_category;
        if($request->is_insured == "on"){
            $asset->is_insured = True;
        }else{
            $asset->is_insured = False;
        }
        $asset->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $asset->user_id = Auth::user()->id;
        $asset->save();

        return redirect()->route('admin.asset.show',$asset->id)->withSuccess('Asset updated!');
    }

    public function assetAssignKit($asset_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get asset
        $asset = Asset::findOrFail($asset_id);
        // action types
        $kits = Kit::all();
        return view('admin.asset_kit_create',compact('kits','asset','user','navbarValues'));
    }

    public function assetShow($asset_id)
    {
        // Check if asset exists
        $assetExists = Asset::findOrFail($asset_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // asset categories
        $assetCategories = AssetCategory::all();
        // asset
        $asset = Asset::with('user','status','asset_category','expenses','kit_assets','asset_actions.action_type')->where('id',$asset_id)->first();

        // Pending to dos
        $pendingToDos = ToDo::with('user','status','asset')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('asset_id',$asset->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','asset')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('asset_id',$asset->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','asset')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('asset_id',$asset->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','asset')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('asset_id',$asset->id)->get();

        return view('admin.asset_show',compact('assetCategories','asset','user','navbarValues','pendingToDos','inProgressToDos','completedToDos','overdueToDos'));
    }

    public function assetAssetActionCreate($asset_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get asset
        $asset = Asset::findOrFail($asset_id);
        // action types
        $actionTypes = ActionType::all();
        // contacts
        $contacts = Contact::with('organization')->get();
        return view('admin.asset_asset_action_create',compact('contacts','actionTypes','asset','user','navbarValues'));
    }

    public function assetUpdate(Request $request, $asset_id)
    {

        $asset = Asset::findOrFail($asset_id);
        $asset->name = $request->name;
        $asset->notes = $request->notes;
        $asset->date_acquired = date('Y-m-d', strtotime($request->date_acquired));
        $asset->asset_category_id = $request->asset_category;
        if($request->is_insured == "on"){
            $asset->is_insured = True;
        }else{
            $asset->is_insured = False;
        }
        $asset->user_id = Auth::user()->id;
        $asset->save();

        return redirect()->route('admin.asset.show',$asset_id)->withSuccess('Asset '. $asset->name .' updated!');
    }

    public function assetDelete($asset_id)
    {

        $asset = Asset::findOrFail($asset_id);
        $asset->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $asset->user_id = Auth::user()->id;
        $asset->save();

        return back()->withSuccess(__('Asset '.$asset->name.' successfully deleted.'));
    }

    public function assetRestore($asset_id)
    {

        $asset = Asset::findOrFail($asset_id);
        $asset->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $asset->user_id = Auth::user()->id;
        $asset->save();

        return back()->withSuccess(__('Asset '.$asset->name.' successfully restored.'));
    }

    // asset actions
    public function assetActions()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $assetActions = AssetAction::with('user','status','action_type','contact','asset','kit')->get();

        return view('admin.asset_actions',compact('assetActions','user','navbarValues'));
    }

    public function assetActionCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get asset
        $assets = Asset::all();
        // get kits
        $kits = Kit::all();
        // action types
        $actionTypes = ActionType::all();
        // contacts
        $contacts = Contact::with('organization')->get();
        return view('admin.asset_action_create',compact('kits','contacts','actionTypes','assets','user','navbarValues'));
    }

    public function assetActionStore(Request $request)
    {

        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);

        $assetAction = new AssetAction();
        $assetAction->reference = $reference;
        $assetAction->notes = $request->notes;
        $assetAction->amount = $request->amount;
        $assetAction->date = date('Y-m-d', strtotime($request->date));
        $assetAction->due_date = date('Y-m-d', strtotime($request->due_date));
        $assetAction->action_type_id = $request->action_type;
        $assetAction->contact_id = $request->contact;
        if($request->is_asset == "on"){
            $assetAction->is_asset = True;
            $assetAction->asset_id = $request->asset;
        }else{
            $assetAction->is_asset = False;
        }
        if($request->is_kit == "on"){
            $assetAction->is_kit = True;
            $assetAction->kit_id = $request->kit;
        }else{
            $assetAction->is_kit = False;
        }
        $assetAction->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $assetAction->user_id = Auth::user()->id;
        $assetAction->save();

        return redirect()->route('admin.asset.action.show',$assetAction->id)->withSuccess('Kit updated!');
    }

    public function assetActionShow($asset_action_id)
    {
        // Check if kit exists
        $assetActionExists = AssetAction::findOrFail($asset_action_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // kit
        $assetAction = AssetAction::with('user','status','asset','kit','action_type')->where('id',$asset_action_id)->first();

        // Pending to dos
        $pendingToDos = ToDo::with('user','status','kit')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('asset_action_id',$assetAction->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','kit')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('asset_action_id',$assetAction->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','kit')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('asset_action_id',$assetAction->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','kit')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('asset_action_id',$assetAction->id)->get();

        return view('admin.asset_action_show',compact('assetAction','user','navbarValues','pendingToDos','inProgressToDos','completedToDos','overdueToDos'));
    }

    public function assetActionUpdate(Request $request, $asset_action_id)
    {

        $assetAction = AssetAction::findOrFail($asset_action_id);
        $assetAction->notes = $request->notes;
        $assetAction->amount = $request->amount;
        $assetAction->date = date('Y-m-d', strtotime($request->date));
        $assetAction->due_date = date('Y-m-d', strtotime($request->due_date));
        $assetAction->action_type_id = $request->action_type;
        $assetAction->contact_id = $request->contact;
        $assetAction->user_id = Auth::user()->id;
        $assetAction->save();

        return redirect()->route('admin.asset.action.show',$asset_action_id)->withSuccess('Asset '. $assetAction->name .' updated!');
    }

    public function assetActionDelete($asset_action_id)
    {

        $assetAction = AssetAction::findOrFail($asset_action_id);
        $assetAction->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $assetAction->user_id = Auth::user()->id;
        $assetAction->save();

        return back()->withSuccess(__('Asset '.$assetAction->reference.' successfully deleted.'));
    }

    public function assetActionRestore($asset_action_id)
    {

        $assetAction = AssetAction::findOrFail($asset_action_id);
        $assetAction->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $assetAction->user_id = Auth::user()->id;
        $assetAction->save();

        return back()->withSuccess(__('Asset '.$assetAction->reference.' successfully restored.'));
    }


    // kit functions
    public function kits()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $kits = Kit::with('user','status')->get();

        return view('admin.kits',compact('kits','user','navbarValues'));
    }

    public function kitCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        return view('admin.kit_create',compact('user','navbarValues'));
    }

    public function kitStore(Request $request)
    {

        // Generate reference
        $size = 5;
        $reference = $this->getRandomString($size);
        $kit = new Kit();
        $kit->reference = $reference;
        $kit->name = $request->name;
        $kit->notes = $request->notes;
        $kit->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $kit->user_id = Auth::user()->id;
        $kit->save();

        return redirect()->route('admin.kit.show',$kit->id)->withSuccess('Kit updated!');
    }

    public function kitShow($kit_id)
    {
        // Check if kit exists
        $kitExists = Kit::findOrFail($kit_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // kit
        $kit = Kit::with('user','status','kit_assets.asset','asset_actions')->where('id',$kit_id)->first();

        // Pending to dos
        $pendingToDos = ToDo::with('user','status','kit')->where('status_id','f3df38e3-c854-4a06-be26-43dff410a3bc')->where('kit_id',$kit->id)->get();
        // In progress to dos
        $inProgressToDos = ToDo::with('user','status','kit')->where('status_id','2a2d7a53-0abd-4624-b7a1-a123bfe6e568')->where('kit_id',$kit->id)->get();
        // Completed to dos
        $completedToDos = ToDo::with('user','status','kit')->where('status_id','facb3c47-1e2c-46e9-9709-ca479cc6e77f')->where('kit_id',$kit->id)->get();
        // Overdue to dos
        $overdueToDos = ToDo::with('user','status','kit')->where('status_id','99372fdc-9ca0-4bca-b483-3a6c95a73782')->where('kit_id',$kit->id)->get();

        return view('admin.kit_show',compact('kit','user','navbarValues','pendingToDos','inProgressToDos','completedToDos','overdueToDos'));
    }

    public function kitActionCreate($kit_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // kit
        $kit = Kit::findOrFail($kit_id);
        // asset actions
        $actionTypes = ActionType::all();
        // contacts
        $contacts = Contact::with('organization')->get();
        return view('admin.kit_action_create',compact('contacts','actionTypes','kit','user','navbarValues'));
    }

    public function kitUpdate(Request $request, $kit_id)
    {

        $kit = Kit::findOrFail($kit_id);
        $kit->name = $request->name;
        $kit->notes = $request->notes;
        $kit->user_id = Auth::user()->id;
        $kit->save();

        return redirect()->route('admin.kit.show',$kit_id)->withSuccess('Kit '. $kit->name .' updated!');
    }

    public function kitDelete($kit_id)
    {

        $kit = Kit::findOrFail($kit_id);
        $kit->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $kit->user_id = Auth::user()->id;
        $kit->save();

        return back()->withSuccess(__('Kit '.$kit->name.' successfully deleted.'));
    }

    public function kitRestore($kit_id)
    {

        $kit = Kit::findOrFail($kit_id);
        $kit->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $kit->user_id = Auth::user()->id;
        $kit->save();

        return back()->withSuccess(__('Kit '.$kit->name.' successfully restored.'));
    }



    // kit asset
    public function kitAssetCreate($kit_id)
    {

        // get kit
        $kit = Kit::findOrFail($kit_id);
        // get assets
        $assets = Asset::with('user','status','asset_category')->get();
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        return view('admin.kit_asset_create',compact('assets','kit','user','navbarValues'));
    }

    public function kitAssetStore(Request $request)
    {

        $kitAsset = new KitAsset();
        $kitAsset->asset_id = $request->asset;
        $kitAsset->kit_id = $request->kit;
        $kitAsset->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $kitAsset->user_id = Auth::user()->id;
        $kitAsset->save();

        return redirect()->route('admin.kit.show',$request->kit)->withSuccess(__('Kit asset successfully stored.'));
    }

    public function kitAssetDelete($kit_asset_id)
    {

        $kitAsset = KitAsset::findOrFail($kit_asset_id);
        $kitAsset->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $kitAsset->user_id = Auth::user()->id;
        $kitAsset->save();

        return back()->withSuccess(__('Kit asset successfully deleted.'));
    }

    public function kitAssetRestore($kit_asset_id)
    {

        $kitAsset = KitAsset::findOrFail($kit_asset_id);
        $kitAsset->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $kitAsset->user_id = Auth::user()->id;
        $kitAsset->save();

        return back()->withSuccess(__('Kit asset successfully restored.'));
    }
}
