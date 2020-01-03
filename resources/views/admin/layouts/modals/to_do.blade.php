<div class="modal inmodal" id="toDoRegistration" tabindex="-1" role="dialog" aria-labelledby="tagRegistrationLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-laptop modal-icon"></i>
                <h4 class="modal-title">To Do Registration</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.to.do.store') }}" autocomplete="off" class="form-horizontal form-label-left">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="has-warning">
                                <input type="text" id="name" name="name" required="required" placeholder="Name" class="form-control input-lg">
                                <i>Give your to do a name</i>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="has-warning" id="data_1">
                                <div class="input-group date">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </span>
                                    <input type="text" name="due_date" id="due_date" class="form-control input-lg">
                                </div>
                                <i>Due date.</i>
                                <span id="inputSuccess2Status4" class="sr-only">(success)</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="has-warning">
                                <textarea id="notes" rows="6" name="notes" class="resizable_textarea form-control input-lg" required="required" placeholder="Notes..."></textarea>
                                <i>Due date.</i>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_album" type="checkbox" class="js-switch_3" />
                                    <br>
                                    <i>Check if it belongs to an Album.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <select name="album" class="select2_demo_tag form-control input-lg">
                                    <option>Select Album</option>
                                    @foreach($albums as $album)
                                        <option value="{{$album->id}}">{{$album->name}}</option>
                                    @endforeach
                                </select>
                                <i>What album does the to do belong to</i>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_design" type="checkbox" class="js-switch_4" />
                                    <br>
                                    <i>Check if it belongs to a design.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <select name="design" class="select2_demo_2 form-control input-lg">
                                    <option>Select Design</option>
                                    @foreach($designs as $design)
                                        <option value="{{$design->id}}">{{$design->name}}</option>
                                    @endforeach
                                </select>
                                <i>What design does the to do belong to</i>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_journal" type="checkbox" class="js-switch_5" />
                                    <br>
                                    <i>Check if it belongs to a Journal.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <select name="journal" class="select2_demo_2 form-control input-lg">
                                    <option>Select Journal</option>
                                    @foreach($journals as $journal)
                                        <option value="{{$journal->id}}">{{$journal->name}}</option>
                                    @endforeach
                                </select>
                                <i>What journal does the to do belong to</i>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_project" type="checkbox" class="js-switch_6" />
                                    <br>
                                    <i>Check if it belongs to a Project.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <select name="project" class="select2_demo_2 form-control input-lg">
                                    <option>Select Project</option>
                                    @foreach($projects as $project)
                                        <option value="{{$project->id}}">{{$project->name}}</option>
                                    @endforeach
                                </select>
                                <i>What project does the to do belong to</i>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_product" type="checkbox" class="js-switch_7" />
                                    <br>
                                    <i>Check if it belongs to a Product.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <select name="product" class="select2_demo_2 form-control input-lg">
                                    <option>Select Product</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach
                                </select>
                                <i>What product does the to do belong to</i>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_order" type="checkbox" class="js-switch_8" />
                                    <br>
                                    <i>Check if it belongs to a Order.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <select name="order" class="select2_demo_2 form-control input-lg">
                                    <option>Select Order</option>
                                    @foreach($orders as $order)
                                        <option value="{{$order->id}}">{{$order->name}}</option>
                                    @endforeach
                                </select>
                                <i>What order does the to do belong to</i>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_email" type="checkbox" class="js-switch_9" />
                                    <br>
                                    <i>Check if it belongs to a Email.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <select name="email" class="select2_demo_2 form-control input-lg">
                                    <option>Select Email</option>
                                    @foreach($emails as $email)
                                        <option value="{{$email->id}}">{{$email->name}}</option>
                                    @endforeach
                                </select>
                                <i>What email does the to do belong to</i>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_contact" type="checkbox" class="js-switch_10" />
                                    <br>
                                    <i>Check if it belongs to a Contact.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <select name="contact" class="select2_demo_2 form-control input-lg">
                                    <option>Select Contact</option>
                                    @foreach($contacts as $contact)
                                        <option value="{{$contact->id}}">{{$contact->name}}</option>
                                    @endforeach
                                </select>
                                <i>What contact does the to do belong to</i>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_organization" type="checkbox" class="js-switch_11" />
                                    <br>
                                    <i>Check if it belongs to a Organization.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <select name="organization" class="select2_demo_2 form-control input-lg">
                                    <option>Select Organization</option>
                                    @foreach($organizations as $organization)
                                        <option value="{{$organization->id}}">{{$organization->name}}</option>
                                    @endforeach
                                </select>
                                <i>What organization does the to do belong to</i>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_deal" type="checkbox" class="js-switch_12" />
                                    <br>
                                    <i>Check if it belongs to a Deal.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <select name="deal" class="select2_demo_2 form-control input-lg">
                                    <option>Select Deal</option>
                                    @foreach($deals as $deal)
                                        <option value="{{$deal->id}}">{{$deal->name}}</option>
                                    @endforeach
                                </select>
                                <i>What deal does the to do belong to</i>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_campaign" type="checkbox" class="js-switch_13" />
                                    <br>
                                    <i>Check if it belongs to a Campaign.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <select name="campaign" class="select2_demo_2 form-control input-lg">
                                    <option>Select Campaign</option>
                                    @foreach($campaigns as $campaign)
                                        <option value="{{$campaign->id}}">{{$campaign->name}}</option>
                                    @endforeach
                                </select>
                                <i>What campaign does the to do belong to</i>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_asset" type="checkbox" class="js-switch_14" />
                                    <br>
                                    <i>Check if it belongs to a Asset.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <select name="asset" class="select2_demo_2 form-control input-lg">
                                    <option>Select Asset</option>
                                    @foreach($assets as $asset)
                                        <option value="{{$asset->id}}">{{$asset->name}}</option>
                                    @endforeach
                                </select>
                                <i>What asset does the to do belong to</i>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_kit" type="checkbox" class="js-switch_15" />
                                    <br>
                                    <i>Check if it belongs to a Kit.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <select name="kit" class="select2_demo_2 form-control input-lg">
                                    <option>Select Kit</option>
                                    @foreach($kits as $kit)
                                        <option value="{{$kit->id}}">{{$kit->name}}</option>
                                    @endforeach
                                </select>
                                <i>What kit does the to do belong to</i>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="has-warning">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <input name="is_asset_action" type="checkbox" class="js-switch_16" />
                                    <br>
                                    <i>Check if it belongs to a Asset Action.</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="has-warning">
                                <select name="asset_action" class="select2_demo_2 form-control input-lg">
                                    <option>Select Asset Action</option>
                                    @foreach($assetActions as $assetAction)
                                        <option value="{{$assetAction->id}}">{{$assetAction->reference}} [{{$assetAction->due_date}}]</option>
                                    @endforeach
                                </select>
                                <i>What asset action does the to do belong to</i>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="ln_solid"></div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-block btn-outline btn-lg btn-success mt-4">{{ __('Save') }}</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
