{{-- add action type modal --}}
<div class="modal fade addPriceList" tabindex="-1" role="dialog" aria-labelledby="addPriceList" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPriceList">Add Price List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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

                    <div class="position-relative form-group">
                        <label for="price" class="">
                            Price
                        </label>
                        <input name="price" id="price" placeholder="price" type="number" class="mb-2 form-control" {{ $errors->has('price') ? ' is-invalid' : '' }} required="required">
                        <i>price</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="sub_type" class="">
                            Sub Type
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('sub_type') ? ' is-invalid' : '' }} name="sub_type" id="sub_type" class="sub-type-select form-control input-lg">
                            <option selected disabled>Select Type</option>
                            @foreach($subTypes as $subType)
                                <option value="{{$subType->id}}">[{{$subType->type->name}}]{{$subType->name}}</option>
                            @endforeach
                        </select>
                        <i>sub type</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="size" class="">
                            Sizes
                        </label>
                        <select required="required" style="width: 100%" {{ $errors->has('size') ? ' is-invalid' : '' }} name="size" id="size" class="size-select form-control input-lg">
                            <option selected disabled>Select Type</option>
                            @foreach($sizes as $size)
                                <option value="{{$size->id}}">{{$size->size}}</option>
                            @endforeach
                        </select>
                        <i>sizes</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="description" class="">
                            Description
                        </label>
                        <textarea id="description" name="description" class="mb-2 form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"></textarea>
                        <i>description</i>
                    </div>

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
