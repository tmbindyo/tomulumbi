{{-- add sizes modal --}}
<div class="modal fade addSize" tabindex="-1" role="dialog" aria-labelledby="addSize" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSizeTitle">Add Size</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{ route('admin.size.store') }}" autocomplete="off" class="form-horizontal form-label-left">
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
                        <label for="size" class="">
                            Size
                        </label>
                        <input name="size" id="size" placeholder="size" type="text" class="form-control" {{ $errors->has('size') ? ' is-invalid' : '' }} required="required">
                        <i>size</i>
                    </div>

                    <div class="position-relative form-group">
                        <label for="type" class="">
                            Type
                        </label>
                        <select required="required" style="width: 100%" name="type" id="type" class="type-select form-control input-lg">
                            <option>Select type</option>
                            @foreach ($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                        <i>type</i>
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
