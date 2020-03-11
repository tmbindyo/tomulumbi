<div class="modal inmodal" id="priceListRegistration" tabindex="-1" role="dialog" aria-labelledby="tagRegistrationLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-money modal-icon"></i>
                <h4 class="modal-title">Price List Registration</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.price.list.store',$product->id) }}" autocomplete="off" class="form-horizontal form-label-left">
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


                    <div class="">
                        <div class="has-warning">
                            <input type="number" id="price" name="price" required="required" placeholder="Price" class="form-control input-lg">
                            <i>Give your price list a price</i>
                        </div>
                    </div>
                    <br>
                    <div class="">
                        <div class="has-warning">
                            <textarea class="form-control" rows="5" name="description" placeholder="Description..."></textarea>
                            <i>Give your price list a price</i>
                        </div>
                    </div>
                    <br>
                    <div class="has-warning">
                        <label class="control-label">Sub Types</label>
                        <select class="form-control m-b input-lg" name="sub_type">
                            @foreach($subTypes as $subType)
                                <option value="{{$subType->id}}">[{{$subType->type->name}}]{{$subType->name}}</option>
                            @endforeach
                        </select>
                        <i>You can take the collection online/offline quickly. Hidden collections can only be seen by you.</i>
                    </div>
                    <br>
                    <div class="has-warning">
                        <label class="control-label">Sizes</label>
                        <select class="form-control m-b input-lg" name="size">
                            @foreach($sizes as $size)
                                <option value="{{$size->id}}">{{$size->size}}</option>
                            @endforeach
                        </select>
                        <i>You can take the collection online/offline quickly. Hidden collections can only be seen by you.</i>
                    </div>
                    <br>

                    <div class="ln_solid"></div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-block btn-outline btn-lg btn-success mt-4">{{ __('SAVE') }}</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
