<?php

namespace App\Http\Controllers\Admin;

use App\Kit;
use App\ToDo;
use App\Loan;
use App\Asset;
use App\Order;
use App\Quote;
use App\Account;
use App\Contact;
use App\KitAsset;
use App\ActionType;
use App\AssetAction;
use App\AssetCategory;
use App\Traits\UserTrait;
use App\Traits\NavbarTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
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

    public function dashboard()
    {
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // User
        $user = $this->getAdmin();
        return view('admin.assets.dashboard',compact('navbarValues','user'));
    }

    // asset functions
    public function assets()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get assets
        $assets = Asset::with('user','status','asset_category')->get();
        // asset categories
        $assetCategories = AssetCategory::all();
        return view('admin.assets.assets',compact('assets','user','navbarValues', 'assetCategories'));
    }

    public function assetCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // asset categories
        $assetCategories = AssetCategory::all();
        return view('admin.assets.asset_create',compact('user','navbarValues','assetCategories'));
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
        return view('admin.assets.asset_assign_kit',compact('kits','asset','user','navbarValues'));
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
        $asset = Asset::with('user','status','asset_category','expenses.expense_account','kit_assets','asset_actions.action_type')->where('id',$asset_id)->first();
        // get assets
        $assets = Asset::with('user','status','asset_category')->get();
        // kits
        $kits = Kit::all();
        // action types
        $actionTypes = ActionType::all();
        // contacts
        $contacts = Contact::with('organization')->get();

        return view('admin.assets.asset_show',compact('assetCategories','asset','user','navbarValues', 'actionTypes', 'contacts', 'kits','assets','assetExists'));
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
        return view('admin.assets.asset_asset_action_create',compact('contacts','actionTypes','asset','user','navbarValues'));
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
        // get asset
        $assets = Asset::all();
        // get kits
        $kits = Kit::all();
        // action types
        $actionTypes = ActionType::all();
        // contacts
        $contacts = Contact::with('organization')->get();
        $assetActions = AssetAction::with('user','status','action_type','contact','asset','kit')->get();

        return view('admin.assets..asset_actions',compact('assetActions','user','navbarValues','assets','kits','actionTypes','contacts'));
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
        $assetAction->paid = 0;
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

        return redirect()->route('admin.asset.action.show',$assetAction->id)->withSuccess('Asset Action updated!');
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
        // get accounts
        $accounts = Account::all();
        // get asset actions
        $assetActions = AssetAction::with('user','status','action_type','contact','asset','kit')->get();
        // loans
        $loans = Loan::all();
        // orders
        $orders = Order::all();
        // quotes
        $quotes = Quote::all();

        return view('admin.assets.asset_action_show',compact('assetAction','user','navbarValues','accounts','assetActionExists','assetActions','loans','orders','quotes'));
    }

    public function assetActionPaymentCreate($asset_action_id)
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // get accounts
        $accounts = Account::all();
        // asset actions
        $assetAction = AssetAction::findOrFail($asset_action_id);
        return view('admin.assets.asset_action_payment_create',compact('user','navbarValues','accounts','assetAction'));
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

        return view('admin.assets.kits',compact('kits','user','navbarValues'));
    }

    public function kitCreate()
    {
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();

        return view('admin.assets.kit_create',compact('user','navbarValues'));
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
        // get assets
        $assets = Asset::with('user','status','asset_category')->get();
        // get all kits
        $kits = Kit::with('user','status', 'kit_assets')->get();
        // action types
        $actionTypes = ActionType::all();
        // contacts
        $contacts = Contact::with('organization')->get();
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // kit
        $kit = Kit::with('user','status','kit_assets.asset','asset_actions')->where('id',$kit_id)->first();

        return view('admin.assets.kit_show',compact('kit','user','navbarValues', 'kitExists', 'assets', 'kits', 'actionTypes', 'contacts'));
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
        return view('admin.assets.kit_action_create',compact('contacts','actionTypes','kit','user','navbarValues'));
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
        return view('admin.assets.kit_asset_create',compact('assets','kit','user','navbarValues'));
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
