{{-- add action type modal --}}
<div class="modal fade addKitAsset" tabindex="-1" role="dialog" aria-labelledby="addKitAsset" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="addKitAsset">Add Kit Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.kit.asset.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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

                    <div class="position-relative form-group">
                        <label for="kit" class="">
                            Action Type
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('kit') ? ' is-invalid' : '' }} name="kit" id="kit" class="kit-select form-control input-lg">
                            <option>Select Kits</option>
                            @foreach($kits as $kit)
                                <option @isset($kitExists) @if($kitExists->id == $kit->id) selected @endif @endisset value="{{$kit->id}}">{{$kit->name}}</option>
                            @endforeach()
                        </select>
                        <i>kit</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="asset" class="">
                            Asset
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('asset') ? ' is-invalid' : '' }} name="asset" id="asset" class="asset-select form-control input-lg">
                            <option>Select Asset</option>
                            @foreach($assets as $asset)
                                <option @foreach($kit->kit_assets as $kitAsset) @if($asset->id == $kitAsset->asset->id) disabled @endif @endforeach value="{{$asset->id}}">{{$asset->name}}</option>
                            @endforeach()
                        </select>
                        <i>asset</i>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <button type="button" class="btn btn-block btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-outline btn-block btn-success">{{ __('SAVE') }}</button>
                        </div>
                    </div>


                </form>
            </div>

            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>
