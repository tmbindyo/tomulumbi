<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Campaign;
use App\CampaignType;
use App\Traits\UserTrait;
use App\Traits\NavbarTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CRMController extends Controller
{

    use UserTrait;
    use NavbarTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function feed()
    {
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // User
        $user = $this->getAdmin();
        return view('admin.feed',compact('navbarValues','user'));
    }

    // campaigns
    public function campaigns()
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        $campaigns = Campaign::with('user','status','campaign_type')->get();
        return view('admin.campaigns',compact('campaigns','user','navbarValues'));

    }

    public function campaignCreate()
    {

        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // campaign types
        $campaignTypes = CampaignType::all();
        return view('admin.campaign_create',compact('user','navbarValues','campaignTypes'));

    }

    public function campaignStore(Request $request)
    {

        $campaign = new Campaign();
        $campaign->name = $request->name;
        $campaign->start_date = strtotime($request->start_date);
        $campaign->end_date = strtotime($request->end_date);
        $campaign->campaign_type_id = $request->type;
        $campaign->expected_revenue = $request->expected_revenue;
        $campaign->actual_cost = $request->actual_cost;
        $campaign->budgeted_cost = $request->budgeted_cost;
        $campaign->description = $request->description;
        $campaign->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $campaign->user_id = Auth::user()->id;
        $campaign->save();
        return redirect()->route('admin.campaign.show',$campaign->id)->withSuccess('Contact type created!');

    }

    public function campaignShow($campaign_id)
    {
        // Check if contact type exists
        $campaignExists = Campaign::findOrFail($campaign_id);
        // User
        $user = $this->getAdmin();
        // Get the navbar values
        $navbarValues = $this->getNavbarValues();
        // Get contact type
        $campaign = Campaign::with('user','status','journal_campaigns.journal')->where('id',$campaign_id)->withCount('journal_campaigns')->first();
        return view('admin.campaign_show',compact('campaign','user','navbarValues'));
    }

    public function campaignUpdate(Request $request, $campaign_id)
    {

        $campaign = Campaign::findOrFail($campaign_id);
        $campaign->name = $request->name;
        $campaign->start_date = strtotime($request->start_date);
        $campaign->end_date = strtotime($request->end_date);
        $campaign->campaign_type_id = $request->type;
        $campaign->expected_revenue = $request->expected_revenue;
        $campaign->actual_cost = $request->actual_cost;
        $campaign->budgeted_cost = $request->budgeted_cost;
        $campaign->description = $request->description;
        $campaign->user_id = Auth::user()->id;
        $campaign->save();
        return redirect()->route('admin.campaign.show',$campaign->id)->withSuccess('Contact type updated!');

    }

    public function campaignDelete($campaign_id)
    {

        $campaign = Campaign::findOrFail($campaign_id);
        $campaign->status_id = "b810f2f1-91c2-4fc9-b8e1-acc068caa03a";
        $campaign->user_id = Auth::user()->id;
        $campaign->save();

        return back()->withSuccess(__('Contact type '.$campaign->name.' successfully deleted.'));
    }
    public function campaignRestore($campaign_id)
    {

        $campaign = Campaign::findOrFail($campaign_id);
        $campaign->status_id = "c670f7a2-b6d1-4669-8ab5-9c764a1e403e";
        $campaign->user_id = Auth::user()->id;
        $campaign->save();

        return back()->withSuccess(__('Contact type '.$campaign->name.' successfully restored.'));
    }

}
