@extends('admin.components.main')

@section('title', 'Settings')

@section('content')


<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                    </i>
                </div>
                <div>
                    <a href="{{route( 'admin.settings')}}">
                        Settings
                    </a>
                </div>
            </div>
            <div class="page-title-actions">
                <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                    <i class="fa fa-star"></i>
                </button>
                <div class="d-inline-block dropdown">
                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                        <span class="btn-icon-wrapper pr-2 opacity-7">
                            <i class="fa fa-business-time fa-w-20"></i>
                        </span>
                        Buttons
                    </button>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-inbox"></i>
                                    <span>
                                        Inbox
                                    </span>
                                    <div class="ml-auto badge badge-pill badge-secondary">86</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-book"></i>
                                    <span>
                                        Book
                                    </span>
                                    <div class="ml-auto badge badge-pill badge-danger">5</div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="javascript:void(0);" class="nav-link">
                                    <i class="nav-link-icon lnr-picture"></i>
                                    <span>
                                        Picture
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a disabled href="javascript:void(0);" class="nav-link disabled">
                                    <i class="nav-link-icon lnr-file-empty"></i>
                                    <span>
                                        File Disabled
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="mb-3 card">
                <div class="card-body">
                    <ul class="tabs-animated-shadow tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-c-0" data-toggle="tab" href="#album-types">
                                <span>Album Types ({{$albumTypes->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#album-tags">
                                <span>Album Tags ({{$albumTags->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-1" data-toggle="tab" href="#action-types">
                                <span>(Asset)Action Types ({{$actionTypes->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#asset-categories">
                                <span>Asset Categories ({{$assetCategories->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#dietary-preferences">
                                <span>Dietary Preferences ({{$dietaryPreferences->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#campaign-types">
                                <span>Campaign Types ({{$campaignTypes->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#contact-types">
                                <span>Contact Types ({{$contactTypes->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#cooking-skills">
                                <span>Cooking Skill ({{$cookingSkills->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#cooking-styles">
                                <span>Cooking Style ({{$cookingStyles->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#cuisines">
                                <span>Cuisine ({{$cuisines->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#courses">
                                <span>Course ({{$courses->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#categories">
                                <span>(Design)Categories ({{$categories->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#dish-types">
                                <span>Dish Type ({{$dishTypes->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#expense-accounts">
                                <span>Expense Accounts ({{$expenseAccounts->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#frequencies">
                                <span>Frequencies ({{$frequencies->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#labels">
                                <span>(Journal) Labels ({{$labels->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#lead-sources">
                                <span>Lead Source ({{$leadSources->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#letter-tags">
                                <span>Letter Tags ({{$letterTags->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#organization-types">
                                <span>Organization Types ({{$organizationTypes->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#project-types">
                                <span>Project Types ({{$projectTypes->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#sizes">
                                <span>(Store) Sizes ({{$sizes->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#sub-types">
                                <span>(Store) Sub Types ({{$subTypes->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#types">
                                <span>(Store)Types ({{$types->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#titles">
                                <span>Titles ({{$titles->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#tudeme-types">
                                <span>Tudeme Types ({{$tudemeTypes->count()}})</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-c-2" data-toggle="tab" href="#tudeme-tags">
                                <span>Tudeme Tags ({{$tudemeTags->count()}})</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">


                        <div class="tab-pane active" id="album-types" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Album Types
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($albumTypes as $albumType)
                                                        <tr>
                                                            <td>{{$albumType->name}}</td>
                                                            <td>{{$albumType->user->name}}</td>
                                                            <td>
                                                                <span class="label {{$albumType->status->label}}">{{$albumType->status->name}}</span>
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.album.type.show', $albumType->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                    @if($albumType->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                        <a href="{{ route('admin.album.type.restore', $albumType->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                    @else
                                                                        <a href="{{ route('admin.album.type.delete', $albumType->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="album-tags" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Album Tags
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addAlbumTag"><i class="fa fa-plus"></i> Album Tags</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Thumbnail Size</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($albumTags as $albumTag)
                                                        <tr>
                                                            <td>{{$albumTag->name}}</td>
                                                            <td>{{$albumTag->thumbnail_size->name}}</td>
                                                            <td>{{$albumTag->user->name}}</td>
                                                            <td>
                                                                <span class="label {{$albumTag->status->label}}">{{$albumTag->status->name}}</span>
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.tag.show', $albumTag->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                    @if($albumTag->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                        <a href="{{ route('admin.tag.restore', $albumTag->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                    @else
                                                                        <a href="{{ route('admin.tag.delete', $albumTag->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Thumbnail Size</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="action-types" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Action Types
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addActionType"><i class="fa fa-plus"></i> Action Type</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Description</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($actionTypes as $actionType)
                                                        <tr>
                                                            <td>{{$actionType->name}}</td>
                                                            <td>{{$actionType->description}}</td>
                                                            <td>{{$actionType->user->name}}</td>
                                                            <td>
                                                                <span class="label {{$actionType->status->label}}">{{$actionType->status->name}}</span>
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.action.type.show', $actionType->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                    @if($actionType->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                        <a href="{{ route('admin.action.type.restore', $actionType->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                    @else
                                                                        <a href="{{ route('admin.action.type.delete', $actionType->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Description</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="asset-categories" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Asset Categories
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addAssetCategory"><i class="fa fa-plus"></i> Asset Category</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($assetCategories as $assetCategory)
                                                        <tr>
                                                            <td>{{$assetCategory->name}}</td>
                                                            <td>{{$assetCategory->user->name}}</td>
                                                            <td>
                                                                <span class="label {{$assetCategory->status->label}}">{{$assetCategory->status->name}}</span>
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.asset.category.show', $assetCategory->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                    @if($assetCategory->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                        <a href="{{ route('admin.asset.category.restore', $assetCategory->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                    @else
                                                                        <a href="{{ route('admin.asset.category.delete', $assetCategory->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="dietary-preferences" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Dietary Preferences
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addDietaryPreference"><i class="fa fa-plus"></i> Dietary Preference</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($dietaryPreferences as $dietaryPreference)
                                                        <tr>
                                                            <td>{{$dietaryPreference->name}}</td>
                                                            <td>{{$dietaryPreference->user->name}}</td>
                                                            <td>
                                                                <span class="label {{$dietaryPreference->status->label}}">{{$dietaryPreference->status->name}}</span>
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.dietary.preference.show', $dietaryPreference->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                    @if($dietaryPreference->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                        <a href="{{ route('admin.dietary.preference.restore', $dietaryPreference->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                    @else
                                                                        <a href="{{ route('admin.dietary.preference.delete', $dietaryPreference->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="campaign-types" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Campaign Types
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addCampaignType"><i class="fa fa-plus"></i> Campaign Type</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($campaignTypes as $campaignType)
                                                        <tr>
                                                            <td>{{$campaignType->name}}</td>
                                                            <td>{{$campaignType->user->name}}</td>
                                                            <td>
                                                                <span class="label {{$campaignType->status->label}}">{{$campaignType->status->name}}</span>
                                                            </td>

                                                            <td class="text-right">
                                                                <div class="btn-group">
                                                                    <a href="{{ route('admin.campaign.type.show', $campaignType->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                    @if($campaignType->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                        <a href="{{ route('admin.campaign.type.restore', $campaignType->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                    @else
                                                                        <a href="{{ route('admin.campaign.type.delete', $campaignType->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>User</th>
                                                            <th>Status</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="contact-types" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Contact Types
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addContactType"><i class="fa fa-plus"></i> Contact Type</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($contactTypes as $contactType)
                                                            <tr>
                                                                <td>{{$contactType->name}}</td>
                                                                <td>{{$contactType->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$contactType->status->label}}">{{$contactType->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.contact.type.show', $contactType->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($contactType->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.contact.type.restore', $contactType->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.contact.type.delete', $contactType->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="cooking-skills" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Cooking Skills
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addCookingSkill"><i class="fa fa-plus"></i> Cooking Skill</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($cookingSkills as $cookingSkill)
                                                            <tr>
                                                                <td>{{$cookingSkill->name}}</td>
                                                                <td>{{$cookingSkill->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$cookingSkill->status->label}}">{{$cookingSkill->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.cooking.skill.show', $cookingSkill->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($cookingSkill->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.cooking.skill.restore', $cookingSkill->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.cooking.skill.delete', $cookingSkill->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="cooking-styles" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Cooking Styles
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addCookingStyle"><i class="fa fa-plus"></i> Cooking Style</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($cookingStyles as $cookingStyle)
                                                            <tr>
                                                                <td>{{$cookingStyle->name}}</td>
                                                                <td>{{$cookingStyle->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$cookingStyle->status->label}}">{{$cookingStyle->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.cooking.style.show', $cookingStyle->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($cookingStyle->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.cooking.style.restore', $cookingStyle->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.cooking.style.delete', $cookingStyle->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="cuisines" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Cuisines
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addCuisine"><i class="fa fa-plus"></i> Cuisine</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($cuisines as $cuisine)
                                                            <tr>
                                                                <td>{{$cuisine->name}}</td>
                                                                <td>{{$cuisine->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$cuisine->status->label}}">{{$cuisine->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.cuisine.show', $cuisine->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($cuisine->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.cuisine.restore', $cuisine->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.cuisine.delete', $cuisine->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="courses" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Courses
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addCourse"><i class="fa fa-plus"></i> Course</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($courses as $course)
                                                            <tr>
                                                                <td>{{$course->name}}</td>
                                                                <td>{{$course->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$course->status->label}}">{{$course->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.course.show', $course->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($course->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.course.restore', $course->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.course.delete', $course->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="categories" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Categories
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addCategory"><i class="fa fa-plus"></i> Category</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($categories as $category)
                                                            <tr>
                                                                <td>{{$category->name}}</td>
                                                                <td>{{$category->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$category->status->label}}">{{$category->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.category.show', $category->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($category->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.category.restore', $category->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.category.delete', $category->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="dish-types" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Dish Types
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addDishType"><i class="fa fa-plus"></i> Dish Type</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($dishTypes as $dishType)
                                                            <tr>
                                                                <td>{{$dishType->name}}</td>
                                                                <td>{{$dishType->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$dishType->status->label}}">{{$dishType->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.dish.type.show', $dishType->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($dishType->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.dish.type.restore', $dishType->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.dish.type.delete', $dishType->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="expense-accounts" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Expense Accounts
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addExpenseAccount"><i class="fa fa-plus"></i> Expense Accounts</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Code</th>
                                                                <th>Description</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($expenseAccounts as $expenseAccount)
                                                            <tr>
                                                                <td>{{$expenseAccount->name}}</td>
                                                                <td>{{$expenseAccount->code}}</td>
                                                                <td>{{$expenseAccount->description}}</td>
                                                                <td>{{$expenseAccount->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$expenseAccount->status->label}}">{{$expenseAccount->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.expense.account.show', $expenseAccount->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($expenseAccount->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.expense.account.restore', $expenseAccount->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.expense.account.delete', $expenseAccount->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Code</th>
                                                                <th>Description</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="frequencies" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Frequencies
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addFrequency"><i class="fa fa-plus"></i> Frequency</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Type</th>
                                                                <th>Frequency</th>
                                                                <th>User</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($frequencies as $frequency)
                                                            <tr>
                                                                <td>{{$frequency->name}}</td>
                                                                <td>{{$frequency->type}}</td>
                                                                <td>{{$frequency->frequency}}</td>
                                                                <td>{{$frequency->user->name}}</td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.frequency.show', $frequency->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($frequency->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.frequency.restore', $frequency->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.frequency.delete', $frequency->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Type</th>
                                                                <th>Frequency</th>
                                                                <th>User</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="labels" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Labels
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addLabel"><i class="fa fa-plus"></i> Label</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($labels as $label)
                                                            <tr>
                                                                <td>{{$label->name}}</td>
                                                                <td>{{$label->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$label->status->label}}">{{$label->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.label.show', $label->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($label->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.label.restore', $label->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.label.delete', $label->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="lead-sources" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Lead Sources
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addLeadSource"><i class="fa fa-plus"></i> Lead Source</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($leadSources as $leadSource)
                                                            <tr>
                                                                <td>{{$leadSource->name}}</td>
                                                                <td>{{$leadSource->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$leadSource->status->label}}">{{$leadSource->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.lead.source.show', $leadSource->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($leadSource->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.lead.source.restore', $leadSource->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.lead.source.delete', $leadSource->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="letter-tags" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Letter Tags
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addLettertag"><i class="fa fa-plus"></i> Letter Tag</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($letterTags as $letterTag)
                                                            <tr>
                                                                <td>{{$letterTag->name}}</td>
                                                                <td>{{$letterTag->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$letterTag->status->label}}">{{$letterTag->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.letter.tag.show', $letterTag->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($letterTag->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.letter.tag.restore', $letterTag->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.letter.tag.delete', $letterTag->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="organization-types" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Organization Types
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addOrganizationType"><i class="fa fa-plus"></i> Organization Type</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($organizationTypes as $organizationType)
                                                            <tr>
                                                                <td>{{$organizationType->name}}</td>
                                                                <td>{{$organizationType->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$organizationType->status->label}}">{{$organizationType->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.organization.type.show', $organizationType->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($organizationType->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.organization.type.restore', $organizationType->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.organization.type.delete', $organizationType->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="project-types" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Project Types
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addProjectType"><i class="fa fa-plus"></i> Project Type</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($projectTypes as $projectType)
                                                            <tr>
                                                                <td>{{$projectType->name}}</td>
                                                                <td>{{$projectType->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$projectType->status->label}}">{{$projectType->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.project.type.show', $projectType->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($projectType->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.project.type.restore', $projectType->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.project.type.delete', $projectType->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="sizes" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Sizes
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addSize"><i class="fa fa-plus"></i> Size</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Size</th>
                                                                <th>Type</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($sizes as $size)
                                                            <tr>
                                                                <td>{{$size->size}}</td>
                                                                <td>{{$size->type->name}}</td>
                                                                <td>{{$size->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$size->status->label}}">{{$size->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.size.show', $size->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($size->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.size.restore', $size->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.size.delete', $size->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Size</th>
                                                                <th>Type</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="sub-types" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Sub Types
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addSubType"><i class="fa fa-plus"></i> Sub Type</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Description</th>
                                                                <th>Type</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($subTypes as $subType)
                                                            <tr>
                                                                <td>{{$subType->name}}</td>
                                                                <td>{{$subType->description}}</td>
                                                                <td>{{$subType->type->name}}</td>
                                                                <td>{{$subType->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$subType->status->label}}">{{$subType->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.sub.type.show', $subType->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($subType->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.sub.type.restore', $subType->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.sub.type.delete', $subType->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Description</th>
                                                                <th>Type</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="types" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Types
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addType"><i class="fa fa-plus"></i> Type</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($types as $type)
                                                            <tr>
                                                                <td>{{$type->name}}</td>
                                                                <td>{{$type->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$type->status->label}}">{{$type->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.type.show', $type->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($type->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.type.restore', $type->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.type.delete', $type->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="titles" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Title
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addTitle"><i class="fa fa-plus"></i> Title</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($titles as $title)
                                                            <tr>
                                                                <td>{{$title->name}}</td>
                                                                <td>{{$title->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$title->status->label}}">{{$title->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.title.show', $title->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($title->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.title.restore', $title->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.title.delete', $title->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="tudeme-types" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Tudeme Types
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addTudemeType"><i class="fa fa-plus"></i> Tudeme Type</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($tudemeTypes as $tudemeType)
                                                            <tr>
                                                                <td>{{$tudemeType->name}}</td>
                                                                <td>{{$tudemeType->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$tudemeType->status->label}}">{{$tudemeType->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.tudeme.type.show', $tudemeType->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($tudemeType->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.tudeme.type.restore', $tudemeType->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.tudeme.type.delete', $tudemeType->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane" id="tudeme-tags" role="tabpanel">
                            <div class="card-hover-shadow card-border mb-3 card">
                                <div class="card-header">
                                    <i class="header-icon lnr-screen icon-gradient bg-warm-flame"></i>
                                    Tudeme Tags
                                    <div class="btn-actions-pane-right">
                                        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target=".addTudemeTag"><i class="fa fa-plus"></i> Tudeme Tag</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="col-lg-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-body"><h5 class="card-title">Table striped</h5>
                                                <div class="table-responsive">
                                                    <table class="mb-0 table table-bordered table-hover table-striped dataTables-example" >
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($tudemeTags as $tudemeTag)
                                                            <tr>
                                                                <td>{{$tudemeTag->name}}</td>
                                                                <td>{{$tudemeTag->user->name}}</td>
                                                                <td>
                                                                    <span class="label {{$tudemeTag->status->label}}">{{$tudemeTag->status->name}}</span>
                                                                </td>

                                                                <td class="text-right">
                                                                    <div class="btn-group">
                                                                        <a href="{{ route('admin.tudeme.tag.show', $tudemeTag->id) }}" class="mb-2 mr-2 btn btn-primary">View</a>
                                                                        @if($tudemeTag->status_id == "b810f2f1-91c2-4fc9-b8e1-acc068caa03a")
                                                                            <a href="{{ route('admin.tudeme.tag.restore', $tudemeTag->id) }}" class="mb-2 mr-2 btn btn-danger">Restore</a>
                                                                        @else
                                                                            <a href="{{ route('admin.tudeme.tag.delete', $tudemeTag->id) }}" class="mb-2 mr-2 btn btn-warning">Delete</a>
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>User</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@include('admin.components.modals.add_album_type')

@include('admin.components.modals.add_album_tag')

@include('admin.components.modals.add_action_type')

@include('admin.components.modals.add_asset_category')

@include('admin.components.modals.add_dietary_preference')

@include('admin.components.modals.add_campaign_type')

@include('admin.components.modals.add_contact_type')

@include('admin.components.modals.add_cooking_skill')

@include('admin.components.modals.add_cooking_style')

@include('admin.components.modals.add_cuisine')

@include('admin.components.modals.add_course')

@include('admin.components.modals.add_category')

@include('admin.components.modals.add_dish_type')

@include('admin.components.modals.add_expense_account')

@include('admin.components.modals.add_frequency')

@include('admin.components.modals.add_label')

@include('admin.components.modals.add_lead_source')

@include('admin.components.modals.add_letter_tag')

@include('admin.components.modals.add_organization_type')

@include('admin.components.modals.add_project_type')

@include('admin.components.modals.add_size')

@include('admin.components.modals.add_sub_type')

@include('admin.components.modals.add_type')

@include('admin.components.modals.add_title')

@include('admin.components.modals.add_tudeme_type')

@include('admin.components.modals.add_tudeme_tag')
